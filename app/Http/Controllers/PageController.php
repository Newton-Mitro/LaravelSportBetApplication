<?php

namespace App\Http\Controllers;

use App\Models\BettingChoice;
use App\Models\BettingChoiceUser;
use App\Models\BettingQuestion;
use App\Models\Club;
use App\Models\Slider;
use App\Models\Deposit;
use App\Models\Match;
use App\Models\Sport;
use App\Models\TeamOrPlayer;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\User;

class PageController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
//        dd($sliders);
        $sports = Sport::all();
        return view('frontend.index')->with('sports',$sports)->with('selectedSports',$sports)->with('sliders',$sliders);
    }

    /**
     * @return $this
     */
    public function about()
    {
        $totalClub = Club::all()->count();
        $totalDeposit = Deposit::all()->count();
        $totalWithdraw = Withdraw::all()->count();
        $totalSport = Sport::all()->count();
        $totalTeam = TeamOrPlayer::all()->count();
        $totalMatch = Match::all()->count();
        $totalUser = User::all()->count();
        $totalTransaction = Transaction::all()->count();
        $totalUserBet = BettingChoiceUser::all()->count();
        $totalBettingQuestion = BettingQuestion::all()->count();
        $totalBettingChoice = BettingChoice::all()->count();
        $totalBet = BettingChoiceUser::all()->count();
        $totalWiningBet = BettingChoiceUser::where('wining_status',2)->count();
//        dd($totalClub);
        return view('frontend.about')
            ->with('totalClub',$totalClub)
            ->with('totalDeposit',$totalDeposit)
            ->with('totalWithdraw',$totalWithdraw)
            ->with('totalTeam',$totalTeam)
            ->with('totalSport',$totalSport)
            ->with('totalMatch',$totalMatch)
            ->with('totalUser',$totalUser)
            ->with('totalUserBet',$totalUserBet)
            ->with('totalBettingQuestion',$totalBettingQuestion)
            ->with('totalTransaction',$totalTransaction)
            ->with('totalBet',$totalBet)
            ->with('totalWiningBet',$totalWiningBet)
            ->with('totalBettingChoice',$totalBettingChoice);
    }

    public function sport($id)
    {
//        dd($id);
        $sports = Sport::all();
//        $upcommingMatches = \App\Models\Match::where('sport_id', $id)
//            ->where('status_id', 1)
//            ->where('is_open', 1)->get();
//        $liveMatches = \App\Models\Match::where('sport_id', $id)
//            ->where('status_id', 2)
//            ->where('is_open', 1)->get();
////        dd($sport);
        $selectedSports = Sport::where('id',$id)->get();
        return view('frontend.index')
            ->with('sports',$sports)
            ->with('selectedSports',$selectedSports);
    }


}
