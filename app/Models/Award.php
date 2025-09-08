<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $guarded=[];

    public function chef(){
        return $this->belongsTo(Chef::class);
    }
}
