<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BettingChoice;
use App\Models\BettingQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BettingChoiceController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {
        $bettingChoices = BettingChoice::orderBy('id', 'desc')->get();
        return view('backend.bettingChoices.index')->with('bettingChoices', $bettingChoices);
    }

    public function create($id)
    {
        $bettingQuestion = BettingQuestion::find($id);
        return view('backend.bettingChoices.create')->with('bettingQuestion', $bettingQuestion);
    }

    public function store(Request $request)
    {
        $bettingChoice = new BettingChoice();
        $bettingChoice->betting_question_id = $request->betting_question_id;
        $bettingChoice->choice_name = $request->choice_name;
        $bettingChoice->can_place_bet = $request->can_place_bet;
        $bettingChoice->wining_rate = $request->wining_rate;
        $bettingChoice->min_stake = $request->min_stake;
        $bettingChoice->max_stake = $request->max_stake;
        $bettingChoice->save();
        return redirect()->back()->with('success', 'A choice has been created.');
    }

    public function show($id)
    {
        $bettingChoice = BettingChoice::find($id);
        return view('backend.bettingChoices.view')->with('bettingChoice', $bettingChoice);
    }

    public function edit($id)
    {
        $bettingChoice = BettingChoice::find($id);
        $bettingQuestions = BettingQuestion::all();
        return view('backend.bettingChoices.edit')->with('bettingChoice', $bettingChoice)
            ->with('bettingQuestions', $bettingQuestions);
    }

    public function update(Request $request, $id)
    {
        $bettingChoice = BettingChoice::find($id);
        $bettingChoice->betting_question_id = $request->betting_question_id;
        $bettingChoice->choice_name = $request->choice_name;
        $bettingChoice->can_place_bet = $request->can_place_bet;
        $bettingChoice->wining_rate = $request->wining_rate;
        $bettingChoice->min_stake = $request->min_stake;
        $bettingChoice->max_stake = $request->max_stake;
        $bettingChoice->save();
        return Redirect::back()->with('bettingChoice', $bettingChoice)->with('success', 'A choice has been updated.');

    }

    public function destroy($id)
    {
        $bettingChoice = BettingChoice::find($id);
        $bettingChoice->delete();
        return Redirect::back()->with('success', 'A choice has been deleted.');
    }

    public function bettingChoice ($id)
    {
        $bettingChoices = BettingChoice::where('betting_question_id', $id)->get();
        return view('backend.bettingChoices.index')->with('bettingChoices', $bettingChoices);
    }

}
