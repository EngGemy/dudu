<?php

namespace App\Http\Controllers\Dashboard\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventGallery;
use Illuminate\Http\Request;

class GallaryEventController extends Controller
{
    public function index($id)
    {

        $event = Event::with('galleries')->find($id);
        $galleries = $event->galleries;

        return view('dashboard.events.gallery', compact('galleries', 'id'));
    }

    public function storegallary(Request $request)
    {

        $file = $request->file('dzfile');
        $destination = 'public/assets/images/events/';
        //   $photo=$request->photo;
        $filename = $file->hashname();
        $file->move($destination, $filename);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    public function update(Request $request)
    {
        $this->validate($request, [

            'documentplans' => 'required|array|min:1',
            'documentplans.*' => 'required|string',

        ]);

        try {

            if ($request->has('documentplans') && count($request->documentplans) > 0) {
                foreach ($request->documentplans as $image) {
                    EventGallery::create([
                        'event_id' => $request->tour_id,
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->route('events.index')->with(['success' => 'Add Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('events.index')->with(['error' => 'There are problem try later']);
        }
    }

    public function destroy($id)
    {
        $photos = EventGallery::find($id);

        if (! $photos) {
            return redirect()->route('events.index')->with(['error' => 'the photo not found']);
        }

        //        $photo=delete_photo($photos->photo);
        $photos->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
