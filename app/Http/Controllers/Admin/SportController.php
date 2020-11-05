<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::orderBy('id', 'desc')->get();
        return view('backend.sports.index')->with('sports', $sports);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required',
        ]);

        $sport = new Sport();
        $sport->name = $request->name;
        $sport->icon = $request->icon;
        $sport->save();
        return Redirect::back()->with('success', 'A sport has been created.');
    }

    public function show($id)
    {
        $sport = Sport::find($id);
        return view('backend.sports.view')->with('sport', $sport);
    }

    public function edit($id)
    {
        $sport = Sport::find($id);
        return view('backend.sports.edit')->with('sport', $sport);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        if ($request->name != null) {
            $sport = Sport::find($id);
            $sport->name = $request->name;
            if ($request->icon != null) {
                $sport->icon = $request->icon;
            }
            $sport->save();
        }
        return Redirect::back()->with('sport', $sport)->with('success', 'A sport has been updated.');
    }

    public function destroy($id)
    {
        $sport = Sport::find($id);
        $sport->delete();
        return Redirect::back()->with('success', 'A sport has been deleted.');
    }

}
