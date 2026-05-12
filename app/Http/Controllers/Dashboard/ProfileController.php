<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editProfile()
    {

        $admin = Admin::find(Auth::id());

        return view('dashboard.edit_profile', compact('admin'));

    }

    public function change_password()
    {

        return view('dashboard.edit_password');

    }

    public function updateProfile(ProfileRequest $request)
    {
        //validate
        // db

        try {

            $admin = Auth::user();
            $admin->username = $request->username;
            $admin->email = $request->email;

            $admin->save();

            return redirect()->back()->with('success', 'تم تعديل بيانات المشرف بنجاح');

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }

    }

    public function update_password(UpdatePasswordRequest $request)
    {

        if (! Hash::check($request->old_password, Auth::user()->password)) {

            return redirect()->back()->with('error', 'كلمه المرو الحاليه غير صحيحه');
        }

        $admin = Auth::user();
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->back()->with('success', 'تم تعديل كلمة المرور الحاليه');
    }
}
