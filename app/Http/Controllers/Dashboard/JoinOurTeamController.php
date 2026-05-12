<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JoinOurTeam;
use App\Models\Notification;

class JoinOurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($not_id = null)
    {
        if ($not_id != null) {
            $not = Notification::find($not_id);
            if ($not) {
                $not->read_at = now();
                $not->save();
            }
        }
        $messages = JoinOurTeam::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.join_teams.index', compact('messages'));
    }

    public function delete($id)
    {
        try {
            $message = JoinOurTeam::findOrFail($id);
            $message->delete();

            return redirect()->route('join_teams.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('join_teams.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}
