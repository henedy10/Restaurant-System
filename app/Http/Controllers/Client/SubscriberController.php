<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\storeSubscribers;
use App\Services\Client\SubscriberService;

class SubscriberController extends Controller
{
    public function __invoke(storeSubscribers $request,SubscriberService $client)
    {
        $client->store($request->validated());
        return redirect()->back()->with('success','تم تسجيل الحساب بنجاح');
    }
}
