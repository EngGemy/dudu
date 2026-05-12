<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Tour;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function index($id)
    {

        $tour = Tour::with('galleries')->find($id);
        $galleries = $tour->galleries;

        return view('dashboard.tours.gallery', compact('galleries', 'id'));
    }

    public function storegallary(Request $request)
    {

        $file = $request->file('dzfile');
        $destination = 'assets/images/tours/';
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
                    Gallery::create([
                        'tour_id' => $request->tour_id,
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->route('tours.index')->with(['success' => 'Add Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('tours.index')->with(['error' => 'There are problem try later']);
        }
    }

    public function destroy($id)
    {
        $photos = Gallery::find($id);

        if (! $photos) {
            return redirect()->route('tours.index')->with(['error' => 'the photo not found']);
        }

        //        $photo=delete_photo($photos->photo);
        $photos->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
