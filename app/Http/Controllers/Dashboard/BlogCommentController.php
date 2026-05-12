<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function create($id)
    {
        $comments = BlogComment::where('blog_id', $id)->get();
        $blog = Blog::find($id);

        return view('dashboard.blogs.comments', compact('comments', 'blog'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'username' => 'required',
            'date' => 'required',
            'photo' => 'required',
            'rate' => 'required',
            'comment' => 'required',

        ]);

        try {

            $comment = BlogComment::create($request->except('photo'));
            if ($request->has('photo')) {
                $filename = uploadimage('blog_comments', $request->photo);
                $comment->photo = $filename;
                $comment->save();
            }

            return redirect()->back()->with(['success' => 'Add Comment Success']);
        } catch (\Exception $ex) {

            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        }
    }

    public function update(Request $request, $question_id)
    {
        $this->validate($request, [
            'username' => 'required',
            'date' => 'required',
            'photo' => 'sometimes',
            'rate' => 'required',
            'comment' => 'required',

        ]);

        try {

            $comment = BlogComment::find($question_id);
            if (! $comment) {
                return redirect()->route('question.create')->with(['error' => 'هناك مشكلة']);
            } else {
                if ($request->has('photo')) {
                    $filename = uploadimage('blog_comments', $request->photo);
                    $comment->photo = $filename;
                }
                $comment->update($request->except('photo'));

                return redirect()->back()->with(['success' => 'Update Success']);
            }
        } catch (\Exception $ex) {

            return redirect()->route('blogs.create')->with(['error' => 'There is problem']);
        }
    }

    public function delete($id)
    {
        $comments = BlogComment::find($id);
        $comments->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
