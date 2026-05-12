<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogSubHead;
use Illuminate\Http\Request;

class BlogSubHeadController extends Controller
{
    public function create($id)
    {
        $blog_sub_head = BlogSubHead::where('blog_id', $id)->get();
        $blog = Blog::find($id);

        return view('dashboard.blogs.sub_head', compact('blog_sub_head', 'blog'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string',

        ]);

        try {

            BlogSubHead::create($request->all());

            return redirect()->back()->with(['success' => 'Add Sub Head For Blog Success']);
        } catch (\Exception $ex) {

            return redirect()->route('blogs.index')->with(['error' => 'There is problem']);
        }
    }

    public function update(Request $request, $sub_head_id)
    {
        $this->validate($request, [
            'name' => 'sometimes|string',
        ]);

        try {

            $sub_head = BlogSubHead::find($sub_head_id);
            if (! $sub_head) {
                return redirect()->route('question.create')->with(['error' => 'هناك مشكلة']);
            } else {

                $sub_head->update($request->all());

                return redirect()->back()->with(['success' => 'Update Success']);
            }
        } catch (\Exception $ex) {

            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        }
    }

    public function delete($id)
    {
        $sub_head = BlogSubHead::find($id);
        $sub_head->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
