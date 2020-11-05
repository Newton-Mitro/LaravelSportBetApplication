<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BettingChoice;
use App\Models\BettingChoiceUser;
use App\Models\Transaction;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BettingChoiceUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index')->with('users', $users);
    }

    public function create($id)
    {

        $bet = BettingChoice::find($id);
        return view('frontend.placebet')->with('bet', $bet);
    }

    public function storebet(Request $request)
    {
        $setting = Setting::find(1);
        $validatedData = $request->validate([
            'amount' => ['required'],
        ]);

        $canBet = Auth::user()->balance - $request->amount;
        if ($canBet >= 0) {
            if ($setting->max_bet >= $request->amount and $setting->min_bet <= $request->amount) {
                $choice = BettingChoice::find($request->id);
                $choiceBetable = $choice->can_place_bet;
                $questionBetable = $choice->bettingQuestion->can_place_bet;
                $matchBetable = $choice->bettingQuestion->match->can_place_bet;
                if ($matchBetable) {
                    if ($questionBetable) {
                        if ($choiceBetable) {
                            $placeBet = new BettingChoiceUser();
                            $user = User::find(Auth::user()->id);
                            $user->balance -= $request->amount;
//                    $club = Club::find($user->club_id);
//                    $club->balance += $request->amount * $setting->club_commission_rate;


                            $placeBet->amount = $request->amount;
                            $placeBet->user_id = Auth::user()->id;
                            $placeBet->sport_id = $choice->bettingQuestion->match->sport->id;
                            $placeBet->match_id = $choice->bettingQuestion->match->id;
                            $placeBet->betting_question_id = $choice->bettingQuestion->id;
                            $placeBet->betting_choice_id = $request->id;
                            $placeBet->wining_rate = $choice->wining_rate;
                            $placeBet->balance = Auth::user()->balance - $request->amount;
                            $placeBet->save();


                            $transaction = new Transaction();
                            $transaction->user_id = Auth::user()->id;
                            $transaction->transaction_type_id = 5;
                            $transaction->dr_amount = $request->amount;
                            $transaction->balance = $user->balance;
                            $user->save();
//                    $club->save();
                            $transaction->save();

                            return redirect()->route('index')->with('success', 'Bet successfully placed.');
                        } else {
                            return redirect()->route('index')->with('warning', 'Betting is not available for this moment.');
                        }
                    } else {
                        return redirect()->route('index')->with('warning', 'Betting is not available for this moment.');
                    }

                } else {
                    return redirect()->route('index')->with('warning', 'Betting is not available for this moment.');
                }
            } else {
                return redirect()->back()->with('danger', 'Bet amount is not correct.');
            }
        } else {
            return redirect()->back()->with('danger', 'You do not have sufficient balance to make this bet.');
        }
    }


    public function bets()
    {
        $bets = BettingChoiceUser::where('user_id', Auth::user()->id)->get();
//        dd($depositHistory);
        return view('frontend.bets')->with('bets', $bets);
    }

    public function memberbets($id)
    {
//        dd($id);
        $bets = BettingChoiceUser::where('user_id', $id)->get();
//        dd($depositHistory);
        return view('frontend.member_bets')->with('bets', $bets);
    }
}
