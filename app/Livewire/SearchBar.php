<?php

namespace App\Livewire;

use App\Models\PostalLetter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    //send result to the parent component
    public function updatedSearch(): void
    {
        $this->dispatch('search', $this->search);
    }
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.components.search-bar');
    }
}
