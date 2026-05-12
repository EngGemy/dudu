<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuStateController extends Controller
{
    public function saveMenuState(Request $request)
    {
        $isMenuCollapsed = $request->input('isMenuCollapsed');
        Session::put('menuCollapsed', $isMenuCollapsed);

        return response()->json(['success' => true]);
    }

    public function getMenuState()
    {
        $isMenuCollapsed = Session::get('menuCollapsed', false);

        return response()->json(['isMenuCollapsed' => $isMenuCollapsed]);
    }
}
