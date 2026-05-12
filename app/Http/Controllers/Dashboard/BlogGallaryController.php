<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\BlogGallary;
use Illuminate\Http\Request;

class BlogGallaryController extends Controller
{
    public function index($id)
    {

        $blog = Blog::with('galleries')->find($id);
        $galleries = $blog->galleries;

        return view('dashboard.blogs.gallery', compact('galleries', 'id'));
    }

    public function storegallary(Request $request)
    {

        $file = $request->file('dzfile');
        $destination = 'assets/images/blog_gallary/';
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
                    BlogGallary::create([
                        'blog_id' => $request->blog_id,
                        'photo' => $image,
                    ]);
                }
            }

            return redirect()->route('blogs.index')->with(['success' => 'Add Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('blogs.index')->with(['error' => 'There are problem try later']);
        }
    }

    public function destroy($id)
    {
        $photos = BlogGallary::find($id);

        if (! $photos) {
            return redirect()->route('blogs.index')->with(['error' => 'the photo not found']);
        }

        //        $photo=delete_photo($photos->photo);
        $photos->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
