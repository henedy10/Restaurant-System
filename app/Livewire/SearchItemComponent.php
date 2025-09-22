<?php

namespace App\Livewire;
use App\Models\Menu;
use Livewire\Component;

class SearchItemComponent extends Component
{
    public $query   = '';
    public $results = [];

    public function searchQuery(){
        $this->results = Menu::where('name'  ,'LIKE','%' . $this->query . '%')
                            ->orWhere('type' ,'LIKE','%' . $this->query . '%')
                            ->get();
    }
    public function render()
    {
        if($this->query === ''){
            $this->results = Menu::all();
        }
        return view('livewire.search-item-component');
    }
}
