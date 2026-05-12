<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\BlogPragraph\BlogPragraph;
use Illuminate\Http\Request;

class BlogPragraphController extends Controller
{
    public function create($id)
    {
        $pragraphs = BlogPragraph::where('blog_id', $id)->get();
        $blog = Blog::find($id);

        return view('dashboard.blogs.pragraph', compact('pragraphs', 'blog'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|string|max:255',
            'image' => 'required|image',

        ]);

        try {

            $pragraph = BlogPragraph::create($request->except('image'));
            if ($request->has('image')) {
                $filename = uploadimage('blog_pragraph', $request->image);
                $pragraph->image = $filename;
                $pragraph->save();
            }

            return redirect()->back()->with(['success' => 'Add Blog Pragraph Success']);
        } catch (\Exception $ex) {

            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        }
    }

    public function update(Request $request, $pragraph_id)
    {
        $this->validate($request, [
            'title' => 'sometimes|string|max:255',
            'image' => 'sometimes|image',

        ]);

        try {

            $pragraph = BlogPragraph::find($pragraph_id);
            if (! $pragraph) {
                return redirect()->route('blog.pragraph.index')->with(['error' => 'هناك مشكلة']);
            } else {
                if ($request->has('image')) {
                    $filename = uploadimage('blog_pragraph', $request->image);
                    $pragraph->image = $filename;
                }
                $pragraph->update($request->except('image'));

                return redirect()->back()->with(['success' => 'Update Success']);
            }
        } catch (\Exception $ex) {

            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        }
    }

    public function delete($id)
    {
        $pragraph = BlogPragraph::find($id);
        $pragraph->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
