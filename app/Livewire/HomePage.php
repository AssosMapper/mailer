<?php

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class HomePage extends Component
{
    public function render(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\View\View|Application
    {
        return view('livewire.home-page')->title("Interpéle ton élu !");
    }
}
