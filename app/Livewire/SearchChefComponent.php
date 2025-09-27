<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\Chef;
use Livewire\Component;

class SearchChefComponent extends Component
{
    use WithPagination;
    public $query = '';

    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        if(!empty($this->query)){
            $results = Chef::where   ('name' ,'LIKE','%' . $this->query . '%')
                            ->orWhere('role' ,'LIKE','%' . $this->query . '%')
                            ->simplePaginate(8);
        }else{
            $results = Chef::simplePaginate(8);
        }
        return view('livewire.search-chef-component',['results' => $results]);
    }
}
