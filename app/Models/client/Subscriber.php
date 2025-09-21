<?php

namespace App\Models\client;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use Notifiable;

    protected $guarded=[];
}
