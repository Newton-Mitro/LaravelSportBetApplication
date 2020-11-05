<?php

namespace App\Http\Controllers;

use App\Models\BettingChoiceUser;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function profileedit($id)
    {
        $user = User::find($id);
        return view('frontend.profileedit')->with('user', $user);
    }

    public function passwordReset($id)
    {
        $user = User::find($id);
        return view('frontend.profilepassword')->with('user', $user);
    }

    public function profileupdate(Request $request, $id)
    {
        $emiail = User::where('email', $request->email)->first();

        $user = User::find($id);
        $user->name = $request->name;
        $user->club_id = $request->club_id;
        if ($emiail == null) {
            $user->email = $request->email;
        }
        $user->phone = $request->phone;
        if ($request->avatar != null) {
            $user->avatar = $request->avatar;
        }
        $user->save();
        return redirect()->back()->with('success', "Profile Update Successful.")->with('user',$user);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->password != null or $request->confirm_password != null) {
            if ($request->password == $request->confirm_password) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                return redirect()->back()->with('success', "New Password Has Been Set Successfully.")
                    ->with('user',$user);
            } else {
                return redirect()->back()->with('error', "New password and confirm password do not match.")->with('user',$user);
            }
        } else {
            return redirect()->back()->with('error', "Password and Confirm Password Field Can't be Empty.")->with('user',$user);
        }
    }

    public function deposit()
    {
        $deposit = Deposit::all();
        return view('frontend.deposit')->with('deposit', $deposit);
    }

    public function depositHistory()
    {
        $deposits = Deposit::all();
        return view('frontend.deposithistory')->with('deposits', $deposits);
    }

    public function withdrawsHistory()
    {
        $withdraws = Withdraw::all();
        return view('frontend.withdrawhistory')->with('withdraws', $withdraws);
    }

    public function transactions()
    {
        $transactions = Transaction::all();
        return view('frontend.transaction')->with('transactions', $transactions);
    }

    public function bets()
    {
        $bets = BettingChoiceUser::all();
        return view('frontend.bets')->with('bets', $bets);
    }

}
