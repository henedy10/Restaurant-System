<?php

namespace App\Http\Controllers;

use App\Models\{
        BookingRoom,
        Chef,
        Menu,
        Subscriber
};
use App\Http\Requests\{
    storeBookingTable,
    storeSubsribers
};
use App\Mail\{
    BookingConfirmedMail,
    SubscribeConfirmedMail
};
use Illuminate\Support\Facades\Mail;

class SystemController extends Controller
{
    public function index(){

        $Menu=Menu::where('special',0)->get();
        $specialMenu=Menu::where('special',1)->get();
        $chefs=Chef::with('awards')->get();
        return view('index',compact('Menu','specialMenu','chefs'));
    }

    public function storeBookingTable(storeBookingTable $request){

        $validated = $request->validated();
        BookingRoom::create($validated);
        Mail::to($validated['email'])->send(new BookingConfirmedMail($validated));
        return redirect()->back()->with('success','تم تسجيل الحجز بنجاح');
    }

    public function storeSubscribers(storeSubsribers $request){
        $validated=$request->validated();
        Subscriber::create($validated);
        Mail::to($validated['email'])->send(new SubscribeConfirmedMail($validated));
        return redirect()->back()->with('success','تم تسجيل الحساب بنجاح');
    }
}
