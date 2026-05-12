<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GallaryPackage;
use Illuminate\Http\Request;

class GallaryPackageController extends Controller
{
    public function index()
    {
        $galleries = GallaryPackage::query()->get();

        return view('dashboard.gallary_packages.create', compact('galleries'));
    }

    public function storegallary(Request $request)
    {

        $file = $request->file('dzfile');
        $destination = 'assets/images/gallary_packages/';
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
                    // $data['image'] = uploadimage('gallary_packages', $image);
                    GallaryPackage::create([
                        'image' => $image,
                    ]);
                }
            }

            return redirect()->route('gallary_packages.index')->with(['success' => 'Add Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('gallary_packages.index')->with(['error' => 'There are problem try later']);
        }
    }

    public function destroy($id)
    {
        $photos = GallaryPackage::find($id);

        if (! $photos) {
            return redirect()->route('gallary_packages.index')->with(['error' => 'the photo not found']);
        }

        $photos->delete();
        delete_photo($photos->photo);

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
