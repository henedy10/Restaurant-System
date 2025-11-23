<?php
namespace App\Services\Client;

use App\Models\client\Contact;

class ContactService {

    public function store(array $data)
    {
        return Contact::create($data);
    }
}
