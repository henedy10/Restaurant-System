<?php

namespace App\Livewire;
use App\Models\client\Contact as contacts;
use Livewire\Component;

class Contact extends Component
{
    public $clientMessages = [];
    public $Name     = '';

    public function Query($contactName)
    {
        $this->Name     = $contactName;
        $this->clientMessages = contacts::where('firstName',$contactName)->get();
    }

    public function render()
    {
        $contacts = contacts::distinct()->pluck('firstName');
        return view('livewire.contact',compact('contacts'));
    }
}
