<?php

namespace App\Services\Admin;

class OpeningHourService {

    public function update($data,$openingHour)
    {
        return $openingHour->update($data);
    }

    public function destroy($openingHour)
    {
        return $openingHour->delete();
    }
}
