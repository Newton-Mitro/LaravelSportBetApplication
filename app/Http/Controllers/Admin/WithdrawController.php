<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = Withdraw::orderBy('id', 'desc')->get();
        return view('backend.withdraws.index')->with('withdraws', $withdraws);
    }

    public function complete($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status = 1;
        $withdraw->save();
        return redirect()->back()->with('success', 'Added to transaction and status has been changed.');
    }

    public function create()
    {
        return view('frontend.withdraw');
    }

    public function store(Request $request)
    {
        $setting = Setting::find(1);
        if ($setting->withdraw_enable) {
            $balCheck = Auth::user()->balance - $request->amount;
            if ($balCheck >= 0) {
                if($setting->max_withdraw >= $request->amount and $setting->min_withdraw <= $request->amount){
                    $user = User::find(Auth::user()->id);
                    $withdraw = new Withdraw();
                    $withdraw->user_id = Auth::user()->id;
                    $withdraw->to = $request['to'];
                    $withdraw->account_type_id = $request['account_type_id'];
                    $withdraw->amount = $request['amount'];
                    $withdraw->method_id = $request['method_id'];
                    $withdraw->save();

                    $transaction = new Transaction();
                    $transaction->user_id = $withdraw->user_id;
                    $transaction->transaction_type_id = 1;
                    $transaction->dr_amount = $withdraw->amount;
                    $transaction->balance = $balCheck;

                    $user->balance = $balCheck;
                    $transaction->save();
                    $user->save();
                    return redirect()->route('index')->with('success', 'A withdraw request has been sent.');
                }else{
                    return redirect()->back()->with('warning','Withdraw amount is not correct.');
                }
            } else {
                return redirect()->back()->with('info', 'You do not have sufficient balance.');
            }
        }else{
            return redirect()->back()->with('warning','Withdraw service is temporarily unavailable, please try again later');
        }
    }

    public function withdrawsHistory()
    {
        $withdrawHistorys = Withdraw::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('frontend.withdrawhistory')->with('withdrawHistorys', $withdrawHistorys);
    }

    public function withdrawcancel($id)
    {
        $withdraw = Withdraw::find($id);
        if ($withdraw->status < 2) {
            $withdraw->status = 2;
            $user = User::find(Auth::user()->id);
            $transaction = new Transaction();
            $transaction->user_id = $withdraw->user_id;
            $transaction->transaction_type_id = 10;
            $transaction->cr_amount = $withdraw->amount;
            $transaction->balance = $user->balance + $withdraw->amount;
            $user->balance += $withdraw->amount;
            $transaction->save();
            $user->save();
            $withdraw->save();
            return redirect()->back()->with('success', "Withdraw canceled.");
        } else {
            return redirect()->back()->with('warning', "Withdraw already canceled.");
        }
    }
}
