<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BettingChoice;
use App\Models\BettingChoiceUser;
use App\Models\BettingQuestion;
use App\Models\Club;
use App\Models\Deposit;
use App\Models\Match;
use App\Models\Sport;
use App\Models\TeamOrPlayer;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $totalClub = Club::all()->count();
        $totalDeposit = Deposit::all()->count();
        $totalDepositAmount = Deposit::all()->sum('amount');
        $totalWithdraw = Withdraw::all()->count();
        $totalWithdrawAmount = Withdraw::where('status',1)->get()->sum('amount');
        $totalSport = Sport::all()->count();
        $totalTeam = TeamOrPlayer::all()->count();
        $totalMatch = Match::all()->count();
        $totalUser = User::all()->count();
        $totalTransaction = Transaction::all()->count();
        $totalTransactionDr = Transaction::all()->sum('dr_amount');
        $totalTransactionCr = Transaction::all()->sum('cr_amount');
        $totalUserBet = BettingChoiceUser::all()->count();
        $totalUserBetAmount = BettingChoiceUser::all()->sum('amount');
        $totalBettingQuestion = BettingQuestion::all()->count();
        $totalBettingChoice = BettingChoice::all()->count();
        $totalBet = BettingChoiceUser::all()->count();
        $totalWiningBet = BettingChoiceUser::where('wining_status', 2)->count();
//        dd($totalClub);
        return view('backend.home')
            ->with('totalClub', $totalClub)
            ->with('totalDeposit', $totalDeposit)
            ->with('totalWithdraw', $totalWithdraw)
            ->with('totalTeam', $totalTeam)
            ->with('totalSport', $totalSport)
            ->with('totalMatch', $totalMatch)
            ->with('totalUser', $totalUser)
            ->with('totalUserBet', $totalUserBet)
            ->with('totalBettingQuestion', $totalBettingQuestion)
            ->with('totalTransaction', $totalTransaction)
            ->with('totalBet', $totalBet)
            ->with('totalWiningBet', $totalWiningBet)
            ->with('totalDepositAmount', $totalDepositAmount)
            ->with('totalWithdrawAmount', $totalWithdrawAmount)
            ->with('totalTransactionDr', $totalTransactionDr)
            ->with('totalTransactionCr', $totalTransactionCr)
            ->with('totalUserBetAmount', $totalUserBetAmount)
            ->with('totalBettingChoice', $totalBettingChoice);
    }

    /**
     * @return $this
     */
    public function betCalculate()
    {
        $setting = Setting::find(1);
        $bettingChoiceUsers = BettingChoiceUser::where('calculation_status', 0)->get();
        foreach ($bettingChoiceUsers as $bettingChoiceUser) {
            $bettingQuestion = BettingQuestion::find($bettingChoiceUser->betting_question_id);
            $bettingQuestion->can_place_bet = 0;
            $bettingQuestion->save();
            if ($bettingQuestion->winning_answer > 0 and $bettingQuestion->cancel_bet ==0 and $bettingChoiceUser->calculation_status == 0) {
                if ($bettingChoiceUser->betting_choice_id == $bettingQuestion->winning_answer) {
                    $user = User::find($bettingChoiceUser->user_id);
                    $user->balance += (($bettingChoiceUser->amount * $bettingChoiceUser->wining_rate) - ($bettingChoiceUser->amount * $setting->club_commission_rate));
                    $club = Club::find($user->club_id);
                    $club->balance += ($bettingChoiceUser->amount * $setting->club_commission_rate);

                    $transaction = new Transaction();
                    $transaction->user_id = $bettingChoiceUser->user_id;
                    $transaction->transaction_type_id = 3;
                    $transaction->cr_amount = (($bettingChoiceUser->amount * $bettingChoiceUser->wining_rate) - ($bettingChoiceUser->amount * $setting->club_commission_rate));
                    $transaction->balance = $user->balance;

                    $bettingChoiceUser->wining_status = 1;
                    $bettingChoiceUser->calculation_status = 1;

                    $bettingChoiceUser->save();
                    $user->save();
                    $club->save();
                    $transaction->save();

                } else {
                    $bettingChoiceUser->wining_status = 2;
                    $bettingChoiceUser->calculation_status = 1;
                    $bettingChoiceUser->save();
                }
            }elseif($bettingQuestion->winning_answer == 0 and $bettingQuestion->cancel_bet ==1 and $bettingChoiceUser->calculation_status == 0){
                $bettingChoiceUser->wining_status = 3;
                $bettingChoiceUser->save();
            }
        }
        return view('backend.userbets.betcalculation')->with('bettingChoiceUsers', $bettingChoiceUsers)->with('success', 'Calculation Completed.');
    }

    public function betsale($id)
    {
        $setting = Setting::find(1);
        $bettingChoiceUser = BettingChoiceUser::find($id);
//        dd($bettingChoiceUser);
        if(Auth::user()->id == $bettingChoiceUser->user_id){
            $user = User::find(Auth::user()->id);
            $user->balance += ($bettingChoiceUser->amount - ($bettingChoiceUser->amount * $setting->bet_sale_commission_rate));

            $transaction = new Transaction();
            $transaction->user_id = $bettingChoiceUser->user_id;
            $transaction->transaction_type_id = 11;
            $transaction->cr_amount = ($bettingChoiceUser->amount - ( $bettingChoiceUser->amount * $setting->bet_sale_commission_rate ));
            $transaction->balance = $user->balance;
            $bettingChoiceUser->calculation_status = 1;

            $bettingChoiceUser->save();
            $user->save();
            $transaction->save();

            return redirect()->back()->with('success','Bet Sale Amount is '. ($bettingChoiceUser->amount - ($bettingChoiceUser->amount * $setting->bet_sale_commission_rate)));
        }else{
            return redirect()->back()->with('danger','Unauthorised activity is detected');
        }
    }

    public function betindex()
    {
        $bettingChoiceUsers = BettingChoiceUser::all();
        return view('backend.userbets.betcalculation')->with('bettingChoiceUsers', $bettingChoiceUsers);
    }


}
