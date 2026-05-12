<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PragraphDetailsRequest;
use App\Models\Blog\Blog;
use App\Models\BlogPragraph\BlogPragraph;
use App\Models\PragraphDetails\PragraphDetails;

class PragraphDetailsController extends Controller
{
    public function show($id)
    {
        $pragraph_details = PragraphDetails::where('blog_pragraph_id', $id)->get();
        $pragraph = BlogPragraph::where('id', $id)->first();

        return view('dashboard.blog_pragraph_details.index', compact('pragraph', 'pragraph_details'));
    }

    public function create($id)
    {

        $blog_paragraph = BlogPragraph::find($id);
        $blog = Blog::find($blog_paragraph->blog_id);

        return view('dashboard.blog_pragraph_details.create', compact('blog_paragraph', 'blog'));
    }

    public function store(PragraphDetailsRequest $request, $blog_pragraph_id)
    {

        try {
            $data = $request->validated();

            $blog_paragraph = BlogPragraph::where('id', $blog_pragraph_id)->first();
            $data['blog_pragraph_id'] = $blog_paragraph->id;
            $data['blog_id'] = $blog_paragraph->blog_id;

            PragraphDetails::create($data);

            return redirect()->route('blog.pragraph.details.show', $blog_pragraph_id)->with(['success' => 'Add Pragraph Details Success']);
        } catch (\Exception $ex) {

            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        }
    }

    public function edit($id)
    {

        $paragraph_details = PragraphDetails::find($id);

        //        $blog = Blog::find($blog_paragraph->blog_id);
        return view('dashboard.blog_pragraph_details.edit', compact('paragraph_details'));
    }

    public function update(PragraphDetailsRequest $request, $pragraph_id)
    {

        //        try {

        $pragraph_details = PragraphDetails::find($pragraph_id);
        if (! $pragraph_details) {
            return redirect()->route('blog.pragraph.index')->with(['error' => 'هناك مشكلة']);
        }

        $data = $request->validated();

        $blog_paragraph = BlogPragraph::where('id', $pragraph_details->blog_pragraph_id)->first();
        $data['blog_pragraph_id'] = $blog_paragraph->id;
        $data['blog_id'] = $blog_paragraph->blog_id;

        $pragraph_details->update($data);

        return redirect()->route('blog.pragraph.details.show', $blog_paragraph->id)->with(['success' => 'Update Success']);
        //        }catch (\Exception $ex) {
        //
        //            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        //        }
    }

    public function delete($id)
    {
        $pragraph = PragraphDetails::find($id);
        $pragraph->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
