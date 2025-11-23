<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\storeBookingTable;
use App\Services\Client\BookingTableService;

class BookingTableController extends Controller
{
    public function __invoke(storeBookingTable $request, BookingTableService $client)
    {
        $client->store($request->validated());
        return redirect()->back()->with('success','تم تسجيل الحجز بنجاح');
    }
}
