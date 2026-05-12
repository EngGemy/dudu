<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Notification;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($not_id = null)
    {
        if ($not_id != null) {
            $not = Notification::find($not_id);
            if ($not) {
                $not->read_at = now();
                $not->save();
            }
        }
        $messages = Message::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.message.index', compact('messages'));
    }

    public function delete($id)
    {
        try {
            $message = Message::findOrFail($id);
            $message->delete();

            return redirect()->route('message.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('message.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}
