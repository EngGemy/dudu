<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function toggleMenu(Request $request)
    {
        $isExpanded = $request->session()->get('is_expanded', 'collapsed'); // Default to 'collapsed' if not set
        $newStatus = ($isExpanded === 'expanded') ? 'collapsed' : 'expanded';
        $request->session()->put('is_expanded', $newStatus);

        return response()->json(['message' => 'success']);
    }
}
