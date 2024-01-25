<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\team;

class TeamController extends Controller
{
    //add team information
    public function storeteam(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'jobTitle' => 'required|max:255|string',
            'file' => 'nullable|mimes:png,jpg,jpeg,webp',
            'description' => 'nullable'
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'uploads/aboutImage/teams';
            $file->move($path, $filename);

            // Save the file path in the database
            $data['image'] = $path . '/' . $filename;
        }

        $team = team::create($data);

        return response()->json(['message' => 'Team member added successfully.']);
    }

    //shwo teams member
    public function getAllTeams()
    {
        $team = team::all();
        return response()->json($team);
    }

    //Edit team info
    public function team_edit($id)
    {
        $teamData = team::findOrFail($id);

        return view('admin.team.admin_team_edit', ['teamData' => $teamData]);
    }
    //Team update
    public function team_update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required|max:255|string',
            'jobTitle' => 'required|max:255|string',
            'file' => 'nullable|mimes:png,jpg,jpeg,webp',
            'description' => 'nullable'
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'uploads/aboutImage/teams';
            $file->move($path, $filename);

            // Save the file path in the database
            $data['image'] = $path . '/' . $filename;
        }

        $team = team::findOrFail($id);
        $team->update($data);

        return redirect(route('admin_about'))->with('success', 'Teams updated successfully.');
    }
    //Team delete
    public function team_delete($id)
    {
        $team = team::findOrFail($id);
        $team->delete();

        return redirect(route('admin_about'))->with('success', 'Delete Teams successfully.');
    }
}
