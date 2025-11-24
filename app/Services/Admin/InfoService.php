<?php

namespace App\Services\Admin;

use App\Models\RestaurantInfo;

class InfoService {

    public function index()
    {
        return RestaurantInfo::first();
    }

    public function store($data)
    {
        return RestaurantInfo::create([
            'email'             => $data['email'],
            'address'           => $data['address'],
            'phone'             => $data['phone'],
            'number_of_tables'  => 0,
        ]);
    }

    public function update($data)
    {
        $systemInfo = RestaurantInfo::first();
        return $systemInfo->update($data);
    }

}
