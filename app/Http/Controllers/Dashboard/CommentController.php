<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($id)
    {
        $comments = TourComment::where('tour_id', $id)->get();
        $tour = Tour::find($id);

        return view('dashboard.tours.comments', compact('comments', 'tour'));
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

            $comment = TourComment::create($request->except('photo'));
            if ($request->has('photo')) {
                $filename = uploadimage('comments', $request->photo);
                $comment->photo = $filename;
                $comment->save();
            }

            return redirect()->back()->with(['success' => 'Add Comment Success']);
        } catch (\Exception $ex) {

            return redirect()->route('tours.create')->with(['error' => 'There is problem']);
        }
    }

    public function update(Request $request, $question_id)
    {
        $this->validate($request, [
            'username' => 'required',
            'date' => 'required',
            'photo' => 'required',
            'rate' => 'required',
            'comment' => 'required',

        ]);

        try {

            $comment = TourComment::find($question_id);
            if (! $comment) {
                return redirect()->route('question.create')->with(['error' => 'هناك مشكلة']);
            } else {
                if ($request->has('photo')) {
                    $filename = uploadimage('comments', $request->photo);
                    $comment->photo = $filename;
                }
                $comment->update($request->except('photo'));

                return redirect()->back()->with(['success' => 'Update Success']);
            }
        } catch (\Exception $ex) {

            return redirect()->route('tours.create')->with(['error' => 'There is problem']);
        }
    }

    public function delete($id)
    {
        $comments = TourComment::find($id);
        $comments->delete();

        return redirect()->back()->with(['success' => 'Delete Successful']);
    }
}
