<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BettingQuestion;
use App\Models\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BettingQuestionController extends Controller
{
    public function index()
    {
        $bettingQuestions = BettingQuestion::orderBy('id', 'desc')->get();
        return view('backend.bettingQuestions.index')->with('bettingQuestions', $bettingQuestions);
    }

    public function create($id)
    {
        $matches = Match::all();
        return view('backend.bettingQuestions.create')->with('selected_match', $id)->with('matches',$matches);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|max:255',
        ]);
        $bettingQuestion = new BettingQuestion();
        $bettingQuestion->match_id = $request->match_id;
        $bettingQuestion->question = $request->question;
        $bettingQuestion->save();
        return redirect()->back()->with('success', 'A match question has been created.');
    }

    public function show($id)
    {
        $bettingQuestion = BettingQuestion::find($id);
        return view('backend.bettingQuestions.view')->with('bettingQuestion', $bettingQuestion);
    }

    public function edit($id)
    {
        $bettingQuestion = BettingQuestion::find($id);
        return view('backend.bettingQuestions.edit')->with('bettingQuestion', $bettingQuestion);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required|max:255',
        ]);

        $bettingQuestion = BettingQuestion::find($id);
        $bettingQuestion->match_id = $request->match_id;
        $bettingQuestion->question = $request->question;
        $bettingQuestion->winning_answer = $request->winning_answer;
        $bettingQuestion->cancel_bet = $request->cancel_bet;
        $bettingQuestion->save();
        return Redirect::back()->with('bettingQuestion', $bettingQuestion)->with('success', 'A match question has been updated.');

    }

    public function destroy($id)
    {
        $bettingQuestion = BettingQuestion::find($id);
        $bettingQuestion->delete();
        return Redirect::back()->with('success', 'A match question has been deleted.');
    }

    public function bettingQuestionChoices($id)
    {
//        dd($id);
        $bettingQuestions = BettingQuestion::where('match_id', $id)->get();
        return view('backend.bettingQuestions.index')->with('bettingQuestions', $bettingQuestions);
    }
}
