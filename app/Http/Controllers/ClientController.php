<?php

namespace App\Http\Controllers;

use App\Models\{
    Chef,
    Menu,
    client\BookingRoom,
    client\Contact,
    client\Subscriber,
    OpeningHour,
    RestaurantInfo,
};

use App\Http\Requests\client\{
    storeBookingTable,
    storeSubsribers,
    storeContactMessage
};

use App\Mail\{
    BookingConfirmedMail,
    SubscribeConfirmedMail
};

use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function index()
    {
        $Menu         = Menu::where('special',0)->get();
        $specialMenu  = Menu::where('special',1)->get();
        $chefs        = Chef::with('awards')->get();
        $info         = RestaurantInfo::latest()->first();
        $openingHours = OpeningHour::get();

        return view('client.index',compact('Menu','specialMenu','chefs','info','openingHours'));
    }

    public function storeBookingTable(storeBookingTable $request)
    {
        $validated = $request->validated();
        BookingRoom::create($validated);
        Mail::to($validated['email_booking'])->send(new BookingConfirmedMail($validated));
        return redirect()->back()->with('success','تم تسجيل الحجز بنجاح');
    }

    public function storeSubscribers(storeSubsribers $request)
    {
        $validated = $request->validated();
        Subscriber::create($validated);
        Mail::to($validated['email'])->send(new SubscribeConfirmedMail($validated));
        return redirect()->back()->with('success','تم تسجيل الحساب بنجاح');
    }

    public function storeContactMessage(storeContactMessage $request)
    {
        $validated = $request->validated();
        Contact::create($validated);
        return redirect()->back()->with('contactMsgSuccess','تم تسجيل الرسالة بنجاح');
    }

    public function downloadMenu()
    {
        return response()->download(storage_path('app/public/Menu.jpg'));
    }
}
