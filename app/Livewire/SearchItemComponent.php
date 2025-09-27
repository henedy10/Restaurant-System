<?php

namespace App\Livewire;
use App\Models\Menu;
use Livewire\WithPagination;
use Livewire\Component;

class SearchItemComponent extends Component
{
    use WithPagination;
    public $query = '';

    public function updatedQuery(){
        $this->resetPage();
    }

    public function render()
    {
        if(!empty($this->query)){
            $results = Menu::where   ('name' ,'LIKE','%' . $this->query . '%')
                            ->orWhere('type' ,'LIKE','%' . $this->query . '%')
                            ->simplePaginate(8);
        }else{
            $results = Menu::simplePaginate(8);
        }
        return view('livewire.search-item-component',['results' => $results]);
    }
}
