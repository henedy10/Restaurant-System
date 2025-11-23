<?php
namespace App\Services\Client;

use App\Models\
{
    Chef,
    Menu,
    OpeningHour,
    RestaurantInfo,
    Image,
};


class LandingPageService {

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
}
