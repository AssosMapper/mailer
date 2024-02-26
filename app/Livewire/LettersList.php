<?php

namespace App\Livewire;

use App\Models\PostalLetter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class LettersList extends Component
{
    use WithPagination;

    public string $search = '';

    #[On('search')]
    public function search(string $commingSearch): void
    {
        $this->search = $commingSearch;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.letters-list',[
            'letters' => PostalLetter::where('title', 'like', '%' . $this->search . '%')->cursorPaginate(10)
        ]);
    }
}
