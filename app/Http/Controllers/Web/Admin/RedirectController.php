<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // TODO: Check if user is not admin. And redirect also check if 
        //      logged in user is has permission to access admin panel.

        return redirect()->route('admin.dashboard');
    }
}
