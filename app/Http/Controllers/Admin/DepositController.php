<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\PhoneNumber;
use App\Models\Transaction;
use App\User;
use App\Setting;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {

        $deposits = Deposit::orderBy('id', 'desc')->get();
        return view('backend.deposits.index')->with('deposits', $deposits);
    }

    public function complete($id)
    {

        $deposit = Deposit::find($id);
        $user = User::find($deposit->user_id);
        $user->balance += $deposit->amount;

        $transaction = new Transaction();
        $transaction->user_id = $deposit->user_id;
        $transaction->transaction_type_id = 2;
        $transaction->cr_amount = $deposit->amount;
        $transaction->balance = $user->balance;
        $transaction->save();
        $user->save();

        $deposit->status = 1;
        $deposit->save();

        return redirect()->back()->with('success', 'Added to transaction and status has been updated.');

    }

    public function create()
    {
        $numbers = PhoneNumber::all();
        return view('frontend.deposit')->with('numbers', $numbers);
    }

    public function store(Request $request)
    {
        $setting = Setting::find(1);
        if ($setting->deposit_enable) {
            if($setting->max_deposit >= $request->amount and $setting->min_deposit <= $request->amount){
                $number = PhoneNumber::where('id', $request['to'])->first();

                $deposit = new Deposit();
                $deposit->user_id = Auth::user()->id;
                $deposit->to = $number->phone_number;
                $deposit->form = $request['form'];
                $deposit->amount = $request['amount'];
                $deposit->method_id = $number->method_id;
                $deposit->transaction_code = $request['transaction_code'];
                $deposit->save();
                return redirect()->route('index')->with('success', 'A deposit request has been sent.');
            }else {
                return redirect()->back()->with('warning','Deposit amount is not correct.');
            }

        } else {
            return redirect()->back()->with('warning','Deposit service is temporarily unavailable, please try again later');
        }
    }

    public function depositHistory()
    {
        $depositHistorys = Deposit::where('user_id', Auth::user()->id)->get();
//        dd($depositHistory);
        return view('frontend.deposithistory')->with('depositHistorys', $depositHistorys);
    }
}

