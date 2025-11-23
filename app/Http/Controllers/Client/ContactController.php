<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\storeContactMessage;
use App\Services\Client\ContactService;

class ContactController extends Controller
{
    public function __invoke(storeContactMessage $request,ContactService $client)
    {
        $client->store($request->validated());
        return redirect()->back()->with('contactMsgSuccess','تم تسجيل الرسالة بنجاح');
    }
}
