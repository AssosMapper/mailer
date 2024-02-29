<?php

namespace App\Livewire\Forms;

use App\Models\Personality;
use Livewire\Attributes\Validate;
use Livewire\Form;
use misterspelik\LaravelPdf\Facades\Pdf;

class AskUserDataForm extends Form
{
    #[Validate('required', 'string', 'max:255')]
    public string $firstName = '';
    #[Validate('required', 'string', 'max:255')]
    public string $lastName = '';

    #[Validate('required', 'email', 'max:255')]
    public string $email = '';

    #[Validate('required', 'max:255')]
    public string $phone = '';

    #[Validate('required', 'max:5')]
    public string $departmentNumber = '';

    #[Validate('required', 'integer')]
    public int $eluId;


    public function save(): array
    {
        $this->validate();
        return
            $this->toArray();
    }
}
