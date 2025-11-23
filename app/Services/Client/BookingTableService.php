<?php
namespace App\Services\Client;

use Illuminate\Support\Facades\Log;
use App\Models\client\BookingRoom;
use App\Mail\BookingConfirmedMail;
use Exception;
use Illuminate\Support\Facades\Mail;

class BookingTableService {

    public function store(array $data)
    {
        $storeBookingTable = BookingRoom::create($data);

        try{
            Mail::to($data['email_booking'])->send(new BookingConfirmedMail($data));
        }catch(Exception $e){
            Log::error('Mail Failed : '.$e->getMessage());
        }

        return $storeBookingTable;
    }
}
