<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\ValidateFirstForm;
use App\Models\Admin;
use App\Models\Booking\Booking;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function store(BookingRequest $request)
    {

        $data = $request->validated();
        $booking = Booking::create($data);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $filePath = 'booking/'.$fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $booking->program_file = $fileName;
            $booking->save();
        }
        $user = $booking->id;
        $title = 'New Booking';
        $admins = Admin::get();
        $not_type = 'booking';
        \Illuminate\Support\Facades\Notification::send($admins, new \App\Notifications\Memberacoount($user, $title, $not_type));

        return response()->json([
            'status' => 'success',
            'res' => 'Booking Created Successfully',
            'booking' => $booking,
        ]);

    }

    public function validateFirstForm(ValidateFirstForm $request)
    {

        //        $data = $request->validated();
        //        $validation = Validator::make($request->all(), (new ValidateFirstForm())->rules());
        //        if($validation->fails()) {
        //            return response()->json(['status' => false, 'errors' => $validation->errors()], 422);
        //        }
        // If validation passes, return success response
        return response()->json(['status' => true]);
    }
}
