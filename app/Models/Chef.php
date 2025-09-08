<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $guarded=[];

    public function awards(){
        return $this->hasMany(Award::class);
    }
}
