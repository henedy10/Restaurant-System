<?php

namespace App\Livewire;
use App\Models\Chef;
use Livewire\Component;

class SearchChefComponent extends Component
{
    public $query   = '';
    public $results = [];

    public function searchQuery(){
        $this->results = Chef::where('name'  ,'LIKE','%' . $this->query . '%')
                            ->orWhere('role' ,'LIKE','%' . $this->query . '%')
                            ->get();
    }

    public function render()
    {
        if($this->query === ''){
            $this->results = Chef::all();
        }
        return view('livewire.search-chef-component');
    }
}
