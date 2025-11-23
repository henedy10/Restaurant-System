<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\LandingPageService;

class LandingPageController extends Controller
{
    public function __invoke(LandingPageService $client)
    {
        $data = $client->index();
        return view('client.index',compact('data'));
    }
}
