<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function __invoke()
    {
        return response()->download(storage_path('app/public/Menu.jpg'));
    }
}
