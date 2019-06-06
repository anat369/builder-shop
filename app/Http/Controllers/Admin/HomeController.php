<?php

namespace App\Http\Controllers\Admin;

use App\{Product, Message, Order, Project, Service, User};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard()
    {
        $countOrders = Order::all()->count();
        return view('admin.pages.dashboard', [
            'countUsers' => User::all()->count(),
            'countProjects' => Project::all()->count(),
            'countServices' => Service::all()->count(),
            'countMessages' => Message::all()->count(),
            'countProducts' => Product::all()->count(),
            'countOrders' => $countOrders,
        ]);
    }

}
