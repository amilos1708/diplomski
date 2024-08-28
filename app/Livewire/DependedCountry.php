<?php

namespace App\Livewire;

use App\Models\State;
use App\Models\Country;
use App\Models\City;
use Livewire\Component;

class DependedCountry extends Component
{
    public $countries;
    public $states=[];
    public $cities= null;
    public $selectedCountry = null;
    public $selectedState = null;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedSelectedCountry($country)
    {
        $this->states = [];
        $this->cities = null;
        $this->selectedState = null;

        if (!is_null($this->selectedCountry)) {
            $this->states = State::where('country_id', $country)->get();
        }
    }
    public function updatedSelectedState($state)
    {
        if (!is_null($this->selectedState)) {
            $this->cities = City::where('state_id', $state)->get();
        }
    }

    public function render()
    {
        return view('livewire.depended-country');
    }
}
