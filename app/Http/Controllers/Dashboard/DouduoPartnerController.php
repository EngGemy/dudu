<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DoudouPartner;
use Illuminate\Http\Request;

class DouduoPartnerController extends Controller
{
    public function index()
    {
        $galleries = DoudouPartner::query()->get();

        return view('dashboard.doudou_partner.create', compact('galleries'));
    }

    public function storegallary(Request $request)
    {

        $file = $request->file('dzfile');
        $destination = 'assets/images/doudou_partner/';

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
                    DoudouPartner::create([
                        'image' => $image,
                    ]);
                }
            }

            return redirect()->route('doudou_partner.index')->with(['success' => 'Add Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('doudou_partner.index')->with(['error' => 'There are problem try later']);
        }
    }

    public function destroy($id)
    {
        $photos = DoudouPartner::find($id);

        if (! $photos) {
            return redirect()->route('doudou_partner.index')->with(['error' => 'the photo not found']);
        }

        $photos->delete();

        //        delete_photo($photos->image);
        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
