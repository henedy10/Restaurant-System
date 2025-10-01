<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\OpeningHour;

class NewPeriod extends Component
{
    #[Validate]
    public $from_day   = '';
    public $to_day     = '';
    public $from_time  = '';
    public $to_time    = '';

    public $number = 0;

    public function addPeriod()
    {
        $this->number = 1;
    }

    public function removePeriod()
    {
        $this->number = 0;
    }

    protected function rules()
    {
        return [
            'from_day'   => 'required|in:Friday,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday',
            'to_day'     => 'in:Friday,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday',
            'from_time'  => 'required|date_format:H:i',
            'to_time'    => 'required|date_format:H:i',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        OpeningHour::create($validated);
        return $this->redirect('/system');
    }

    public function deleteAll()
    {
        OpeningHour::truncate();
        return $this->redirect('/system');
    }

    public function render()
    {
        return view('livewire.new-period');
    }
}
