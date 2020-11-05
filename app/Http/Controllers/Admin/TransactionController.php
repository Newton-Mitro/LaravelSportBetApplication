<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
//        dd($transactions);
        return view('backend.transactions.index')->with('transactions', $transactions);
    }

    public function complete($id)
    {

    }

    public function transactions(){
        $transactions = Transaction::orderBy('created_at', 'desc')->where('user_id',Auth::user()->id)->get();
//        dd($transactions);
        return view('frontend.transaction')->with('transactions',$transactions);
    }
}
