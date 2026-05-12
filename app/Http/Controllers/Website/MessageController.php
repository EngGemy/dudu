<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Admin;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(MessageRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);
        $user = $message->id;
        $title = 'New Message';
        $admins = Admin::get();
        $not_type = 'message';
        \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\Memberacoount($user, $title, $not_type));

        return response()->json([
            'status' => 'success',
            'res' => 'Message Created Successfully',
            'full_message' => 'Your message has been sent to us successfully, We will contact you
            soon Have a nice day',
            'message_header' => ' Your Message Received',
            'message_icon' => './assets/images/icons/approve.png',
        ]);
    }
}
