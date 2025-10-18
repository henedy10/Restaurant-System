<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Builder;

class BookingRoom extends Model
{
    use MassPrunable;

    protected $guarded=[];

    public function prunable(): Builder
    {
        return static::where('date', '<', now()->subDay());
    }
}
