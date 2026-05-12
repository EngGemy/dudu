<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminDashboard extends Controller
{
    public function index()
    {

        return view('dashboard.index');
    }

    public function toggleMenuState(Request $request)
    {
        $isMenuOpen = $request->input('isMenuOpen');

        Session::put('isMenuOpen', $isMenuOpen);

        return response()->json(['status' => 'success']);
    }

    public function MarkAsRead_all(Request $request)
    {

        $userUnreadNotification = auth()->user()->unreadNotifications;

        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            Notification::where('notifiable_type', 'App\Models\Admin')->where('notifiable_id', Auth::id())->delete();

            return back();
        }

    }

    public function updateSession(Request $request)
    {
        // Validate the incoming request
        //        $request->validate([
        //            'data' => 'required|string',
        //        ]);

        // Update the session variable based on the received data
        Session::put('menu', $request->data);

        // Return a JSON response
        return response()->json(['message' => 'Session updated successfully!', 'data' => $request->input('data')]);
    }
}
