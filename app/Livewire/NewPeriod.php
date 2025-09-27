<?php

namespace App\Livewire;

use Livewire\Component;

class NewPeriod extends Component
{
    public $number = 0;

    public function addPeriod()
    {
        $this->number = 1;
    }

    public function removePeriod()
    {
        $this->number = 0;
    }

    // public function removeAll()
    // {
    //     $this->number = 0;
    // }
    public function render()
    {
        return view('livewire.new-period');
    }
}
