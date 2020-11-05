<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamOrPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamOrPlayerController extends Controller
{

    public function index()
    {
        $teams = TeamOrPlayer::orderBy('id', 'desc')->get();
        return view('backend.teams.index')->with('teams', $teams);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $team = new TeamOrPlayer();
        $team->name = $request->name;
        $team->image = $request->image;
        $team->save();
        return Redirect::back()->with('success', 'A team/player has been created.');
    }

    public function show($id)
    {
        $team = TeamOrPlayer::find($id);
        return view('backend.teams.view')->with('team', $team);
    }

    public function edit($id)
    {
        $team = TeamOrPlayer::find($id);
        return view('backend.teams.edit')->with('team', $team);
    }

    public function update(Request $request, $id)
    {
        if ($request->name != null) {
            $team = TeamOrPlayer::find($id);
            $team->name = $request->name;
            if ($request->image != null) {
                $team->image = $request->image;
            }
            $team->save();
        }
        return Redirect::back()->with('team', $team)->with('success', 'A team/player has been updated.');
    }

    public function destroy($id)
    {
        $team = TeamOrPlayer::find($id);
        $team->delete();
        return Redirect::back()->with('success', 'A team/player has been deleted.');
    }
}
