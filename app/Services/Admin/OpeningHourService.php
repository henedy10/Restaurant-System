<?php

namespace App\Services\Admin;

use App\Models\OpeningHour;

class OpeningHourService {

    public function index()
    {
        return OpeningHour::paginate(4);
    }

    public function update($data,$openingHour)
    {
        return $openingHour->update($data);
    }

    public function destroy($openingHour)
    {
        return $openingHour->delete();
    }
}
