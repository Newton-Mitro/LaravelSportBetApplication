<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BettingChoiceUser;
use App\Models\Match;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Match::orderBy('id', 'desc')->get();
        return view('backend.matches.index')->with('matches', $matches);
    }

    public function create($id)
    {
        return view('backend.matches.create')->with('sport_id', $id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
        ]);



        $match = new Match();
        $match->sport_id = $request->sport_id;
        $match->title = $request->title;
        $match->contestant_one = $request->contestant_one;
        $match->contestant_two = $request->contestant_two;
        $match->description = $request->description;
        $match->start_date = $request->start_date;

        $new_time = DateTime::createFromFormat('h:i A', $request->start_time);
        $time_24 = $new_time->format('H:i:s');


        $match->start_time = $time_24;
        $match->is_open = $request->is_open;
        $match->status_id = $request->status_id;
        $match->save();
        return redirect()->route('match.index')->with('success', 'A sport has been created.');
    }

    public function show($id)
    {
        $match = Match::find($id);
        return view('backend.matches.view')->with('match', $match);
    }

    public function edit($id)
    {
        $match = Match::find($id);
        return view('backend.matches.edit')->with('match', $match);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
        ]);
        $match = Match::find($id);
        $match->sport_id = $request->sport_id;
        $match->title = $request->title;
        $match->contestant_one = $request->contestant_one;
        $match->contestant_two = $request->contestant_two;
        $match->description = $request->description;
        $match->start_date = $request->start_date;

        $new_time = DateTime::createFromFormat('h:i A', $request->start_time);
        $time_24 = $new_time->format('H:i:s');

        $match->start_time = $time_24;
        $match->is_open = $request->is_open;
        $match->status_id = $request->status_id;
        $match->save();
        return Redirect::back()->with('match', $match)->with('success', 'A match has been updated.');

    }

    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();
        return Redirect::back()->with('success', 'A match has been deleted.');
    }

    public function matches($id)
    {
//        dd($id);
        $matches = Match::where('sport_id', $id)->get();
        return view('backend.matches.index')->with('matches', $matches);
    }
}
