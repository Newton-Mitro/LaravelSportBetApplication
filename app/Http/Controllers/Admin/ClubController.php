<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Transaction;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::orderBy('id', 'desc')->get();
        return view('backend.clubs.index')->with('clubs', $clubs);
    }

    public function userclubindex($id)
    {
        $club = Club::find($id);
        $clubMembers = $club->users;
//        dd($clubMembers);
        return view('frontend.clubindex')->with('club', $club)->with('clubMembers',$clubMembers);
    }

    public function create()
    {
        return view('frontend.clubcreate');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'club_name' => 'required|max:255',
        ]);

        if (Auth::user()->club == null){
            $club = new Club();
            $club->user_id = $request->user()->id;
            $club->club_name = $request->club_name;
            $club->save();
            return redirect()->back()->with('success','Request Successful.');
        }else{
            return redirect()->route('index')->with('warning','User can not have more than one Club.');
        }

    }

    public function accept($id)
    {
        $club = Club::find($id);
        $club->status = 1;
        $club->save();
        return redirect()->back()->with('success','Status Change Successful.');
    }

    public function reject($id)
    {
        $club = Club::find($id);
        $club->status = 0;
        $club->save();
        return redirect()->back()->with('success','Status Change Successful.');
    }

    public function edit($id)
    {
        $club = Club::find($id);
        return view('backend.clubs.edit')->with('club', $club);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'club_name' => 'required|max:255',
        ]);
        $club = Club::find($id);
        $club->user_id = $request->user_id;
        $club->club_name = $request->club_name;
        $club->save();
        return redirect()->back()->with('club', $club)->with('success','Update Successful.');
    }

    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect()->back()->with('success','Club Deleted');
    }

    public function clubbalancetransfer()
    {
        $settings = Setting::find(1);
        $user = User::find(Auth::user()->id);
        $club = Club::find($user->club)->first();
        if($club->balance >=$settings->club_min_transfer_amount){
            $user->balance =  $user->balance+$club->balance;

            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->transaction_type_id = 8;
            $transaction->cr_amount = $club->balance;
            $transaction->balance = $user->balance;
            $transaction->save();

            $user->save();
            $club->balance = 0;
            $club->save();
            return redirect()->back()->with('success','Blance Transfer Successful.');
        }else{
            return redirect()->back()->with('info','You need minimum '.$settings->club_min_transfer_amount.' tk to transfer balance.');
        }

    }
}
