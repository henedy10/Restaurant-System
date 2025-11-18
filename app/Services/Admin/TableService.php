<?php
namespace App\Services\Admin;

use App\Models\RestaurantInfo;
use App\Models\client\BookingRoom;

class TableService {

    public function index()
    {
        $countTables        = RestaurantInfo::value('number_of_tables');
        $countBookingTables = BookingRoom::count();

        return [
            'countTables'        => $countTables,
            'countBookingTables' => $countBookingTables,
        ];
    }

    public function store($request)
    {
        $info = RestaurantInfo::select('number_of_tables','availability_booking')->first();

        $tableStore = $info->update([
            'number_of_tables'      => $request->number_of_tables,
            'availability_booking'  => $request->booking_availability ?? 0,
        ]);

        return $tableStore;
    }
}
