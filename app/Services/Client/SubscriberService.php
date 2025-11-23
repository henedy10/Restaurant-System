<?php

namespace App\Services\Client;

use Illuminate\Support\Facades\Log;
use App\Models\client\Subscriber;
use App\Mail\SubscribeConfirmedMail;
use Exception;
use Illuminate\Support\Facades\Mail;

class SubscriberService {

    public function store(array $data)
    {
        $storeSubscribers = Subscriber::create($data);

        try{
            Mail::to($data['email'])->send(new SubscribeConfirmedMail($data));
        }catch(Exception $e){
            Log::error('Mail Failed : '.$e->getMessage());
        }

        return $storeSubscribers;
    }
}
