<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Notification;

class BookingController extends Controller
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
        $bookings = Booking::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.booking.index', compact('bookings'));
    }

    public function delete($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();

            return redirect()->route('booking.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('booking.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}
