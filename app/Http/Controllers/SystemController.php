<?php

namespace App\Http\Controllers;

use App\Models\{BookingRoom, Chef, Menu};
use Illuminate\Http\Request;
use App\Http\Requests\storeBookingTable;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmedMail;
class SystemController extends Controller
{
    public function index(){

        $Menu=Menu::where('special',0)->get();
        $specialMenu=Menu::where('special',1)->get();
        $chefs=Chef::with('awards')->get();
        return view('index',compact('Menu','specialMenu','chefs'));
    }

    public function store(storeBookingTable $request){

        $validated = $request->validated();
        BookingRoom::create($validated);
        Mail::to($validated['email'])->send(new BookingConfirmedMail($validated));
        return redirect()->back()->with('success','تم تسجيل الحجز بنجاح');
    }
}
