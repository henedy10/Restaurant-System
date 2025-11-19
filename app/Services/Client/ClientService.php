<?php

namespace App\Services\Client;

use Illuminate\Support\Facades\Log;
use App\Models\{
    Chef,
    Menu,
    client\BookingRoom,
    client\Contact,
    client\Subscriber,
    OpeningHour,
    RestaurantInfo,
    Image,
};

use App\Mail\{
    BookingConfirmedMail,
    SubscribeConfirmedMail
};
use Exception;
use Illuminate\Support\Facades\Mail;

class ClientService {

    public function index()
    {
        return [
            'menu'           => Menu::where('special',0)->get(),
            'specialMenu'    => Menu::where('special',1)->get(),
            'chefs'          => Chef::with('awards')->get(),
            'info'           => RestaurantInfo::latest()->first(),
            'openingHours'   => OpeningHour::get(),
            'heroImages'     => Image::where('section','Hero')->get(),
            'bookingImages'  => Image::where('section','Booking')->latest()->first(),
            'aboutImages'    => Image::where('section','About')->latest()->first()
        ];
    }

    public function storeBookingTable(array $data)
    {
        $storeBookingTable = BookingRoom::create($data);

        try{
            Mail::to($data['email_booking'])->send(new BookingConfirmedMail($data));
        }catch(Exception $e){
            Log::error('Mail Failed : '.$e->getMessage());
        }

        return $storeBookingTable;
    }

    public function storeSubscribers(array $data)
    {
        $storeSubscribers = Subscriber::create($data);

        try{
            Mail::to($data['email'])->send(new SubscribeConfirmedMail($data));
        }catch(Exception $e){
            Log::error('Mail Failed : '.$e->getMessage());
        }

        return $storeSubscribers;
    }

    public function storeContactMessage(array $data)
    {
        $storeContactMessage = Contact::create($data);
        return $storeContactMessage;
    }
}
