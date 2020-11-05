<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Providers\RouteServiceProvider;
use App\Setting;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'club_id' => ['required'],
            'sponsor_ref_code' => ['max:10'],
            'phone' => ['required', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $setting = Setting::find(1);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->club_id = $data['club_id'];
        if ($data['sponsor_ref_code'] != null) {
            $user->sponsor_ref_code = $data['sponsor_ref_code'];
            $userref = User::where('ref_code', $data['sponsor_ref_code'])->first();
            $userref->balance += $setting->reference_amount;
            $userref->save();
            if ($setting->reference_amount != 0) {
                $transaction = new Transaction();
                $transaction->user_id = $userref->id;
                $transaction->transaction_type_id = 13;
                $transaction->cr_amount = $setting->reference_amount;
                $transaction->balance = $userref->balance;
                $transaction->save();
            }

        }
        $user->password = Hash::make($data['password']);
        $user->ref_code = $this->rand_string();
        $user->balance += $setting->opening_balance;
        $user->save();
        if ($setting->opening_balance != 0) {
            $transaction1 = new Transaction();
            $transaction1->user_id = $user->id;
            $transaction1->transaction_type_id = 12;
            $transaction1->cr_amount = $setting->reference_amount;
            $transaction1->balance = $user->balance;
            $transaction1->save();
        }

        return $user;
    }

    public function rand_string()
    {
        $str = substr(md5(microtime()), 0, 10);
        if (User::where('ref_code', $str)->count() > 0) {
            rand_string();
        } else {
            return $str;
        }
    }
}
