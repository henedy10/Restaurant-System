<?php

namespace App\Http\Controllers;

use App\Models\{Menu};
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index(){

        $Menu=Menu::where('special',0)->get();
        $specialMenu=Menu::where('special',1)->get();
        return view('index',compact('Menu','specialMenu'));

    }
}
