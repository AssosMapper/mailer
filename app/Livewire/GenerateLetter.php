<?php

namespace App\Livewire;

use App\Livewire\Forms\AskUserDataForm;
use App\Models\Personality;
use App\Models\PostalLetter;
use Barryvdh\DomPDF\Facade\Pdf;
use Faker\Provider\Person;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;
use Str;

class GenerateLetter extends Component
{
    public PostalLetter $letter;
    public int $step = 1;
    public int $totalSteps = 5;

    public $elus = [];

    public ?Personality $personality = null;

    public $address = "";

    public $addresses = [];

    public $letterPath = '';

    public AskUserDataForm $askUserDataForm;

    public function mount(PostalLetter $letter): void
    {
        $this->letter = $letter;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.generate-letter');
    }


    public function handleDepartmentChange(): void
    {
        $this->elus = Personality::where('departmentNumber', $this->askUserDataForm->departmentNumber)
            ->whereNotNull('full_address')
            ->get();

    }

    public function handleEluChange($eluId): void
    {
        $this->personality = Personality::where('id', $eluId)
            ->first();
    }

    public function getAddressFromApi($address)
    {
        $response = Http::get('https://api-adresse.data.gouv.fr/search/', [
            'q' => $address
        ]);
        if ($response->successful()) {
            return $response->json()['features'];
        }
    }

    public function handleAddressChange($address): void
    {
        // give suggestion to user to select the address from the list of addresses https://api-adresse.data.gouv.fr/search/?q=
        if (empty($address)) {
            return;
        }
        $this->addresses = $this->getAddressFromApi($address);
    }

    public function selectAddress($addressId): void
    {
        foreach ($this->addresses as $address) {
            if ($address['properties']['id'] === $addressId) {
                $this->address = $address['properties'];
                break;
            }
        }
        $this->addresses = [];
    }

    public function saveUserData()
    {
        $this->nextStep();
        $data = $this->askUserDataForm->save();
        $data["personality"] = $this->personality;
        $data["personalityAddress"] = $this->getAddressFromApi($this->personality->full_address)[0]['properties'];
        $data["letter"] = $this->letter;
        $data["address"] = $this->address;
        $content = Pdf::loadView('pdfs.letter', ['data' => $data]);
        // save the letter in the storage folder
        $name = 'lettersdocs/'.Str::slug(uniqid().uniqid().now()).'.pdf';
        $content->save($name);
        $this->letterPath = $name;
    }

    public function nextStep(): void
    {
        switch ($this->step) {
            case 1:
                // check if first name and last name and email and phone are not empty
                if ($this->askUserDataForm->firstName === '' or $this->askUserDataForm->lastName === '' or $this->askUserDataForm->email === '' or $this->askUserDataForm->phone === '') {
                    return;
                }
                break;
            case 2:
                // check if the address is not empty
                if ($this->address === '') {
                    return;
                }
                break;
            case 3:
                // check if the personality is not empty
                if ($this->personality === null) {
                    return;
                }
                break;
        }
        $this->step++;
    }

    public function previousStep(): void
    {
        $this->step--;
    }
}
