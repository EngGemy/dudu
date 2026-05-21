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
            'res' => __('front.site.contact.message_created_successfully'),
            'full_message' => __('front.site.contact.message_sent_full'),
            'message_header' => __('front.site.contact.message_received_header'),
            'message_icon' => './assets/images/icons/approve.png',
        ]);
    }
}
