<?php

namespace App\Http\Controllers;
use App\Models\
{
    Chef,
    Menu,
    RestaurantInfo,
};
use App\Models\client\Subscriber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chefCount       = Chef::count();
        $itemCount       = Menu::count();
        $subscriberCount = Subscriber::count();
        $info            = RestaurantInfo::first();

        return view('admin.dashboard',compact('chefCount','itemCount','info','subscriberCount'));
    }
}
