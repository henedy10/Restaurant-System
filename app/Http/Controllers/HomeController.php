<?php

namespace App\Http\Controllers;
use App\Models\{Chef,Menu};
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
        $chefCount      = Chef::count();
        $itemCount      = Menu::count();
        $cheapItem      = Menu::select('name','price')->orderBy('price','asc')->first();
        $expensiveItem  = Menu::select('name','price')->orderBy('price','desc')->first();

        return view('admin.dashboard',compact('chefCount','itemCount','cheapItem','expensiveItem'));
    }


}
