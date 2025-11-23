<?php
namespace App\Services\Admin;

use App\Models\RestaurantInfo;
use App\Models\client\BookingRoom;

class TableService {

    public function index()
    {
        $infoTables         = RestaurantInfo::select('id','number_of_tables')->first();
        $countBookingTables = BookingRoom::count();

        return [
            'infoTables'         => $infoTables,
            'countBookingTables' => $countBookingTables,
        ];
    }

    public function update($request ,$id)
    {
        $info = RestaurantInfo::findOrFail($id);

        $tableStore = $info->update([
            'number_of_tables'      => $request['number_of_tables'],
            'availability_booking'  => $request['booking_availability'] ?? 0,
        ]);

        return $tableStore;
    }
}
