<?php

namespace App\Http\Controllers\Dashboard\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventInformation;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function create($id)
    {
        $infos = EventInformation::where('event_id', $id)->get();
        $event = Event::find($id);

        return view('dashboard.events.information', compact('infos', 'event'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',

        ]);

        //        try {

        $info = new EventInformation();
        $info->event_id = $request->event_id;
        $info->title = $request->title;
        $info->description = $request->description;
        $info->save();

        return redirect()->back()->with(['success' => 'Add Info Success']);
        //        }catch (\Exception $ex) {
        //
        //            return redirect()->route('events.index')->with(['error' => 'There is problem']);
        //        }
    }

    public function update(Request $request, $info_id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',

        ]);

        try {

            $info = EventInformation::find($info_id);
            if (! $info) {
                return redirect()->route('events.create')->with(['error' => 'هناك مشكلة']);
            }

            $info->title = $request->title;
            $info->description = $request->description;
            $info->save();

            return redirect()->back()->with(['success' => 'Update Success']);

        } catch (\Exception $ex) {

            return redirect()->route('events.create')->with(['error' => 'There is problem']);
        }
    }

    public function delete($id)
    {
        $info = EventInformation::find($id);
        $info->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
