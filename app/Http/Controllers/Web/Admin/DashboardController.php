<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = __('Dashboard');
        // dd((new \AdminMenu())->get('admin'));
        return view('web.admin.dashboard.index', compact('title'));
    }
}
