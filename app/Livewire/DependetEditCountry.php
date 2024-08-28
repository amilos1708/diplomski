<?php

namespace App\Livewire;

use App\Models\State;
use App\Models\Country;
use App\Models\City;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class DependetEditCountry extends Component
{
    public $countries;
    public $states = [];
    public $cities = [];
    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    public function mount($country, $state, $city)
    {
        Log::info('Mount method called', ['country' => $country, 'state' => $state, 'city' => $city]);
        $this->countries = Country::all();
        $this->selectedCountry = $country;
        $this->selectedState = $state;
        $this->selectedCity = $city;
        $this->updateStates();
        $this->updateCities();
    }

    public function updatedSelectedCountry($country)
    {
        Log::info('updatedSelectedCountry called', ['country' => $country]);
        $this->selectedState = null;
        $this->selectedCity = null;
        $this->states = [];
        $this->cities = [];
        $this->updateStates();
        Log::info('After updateStates', ['states' => $this->states]);
    }

    public function updatedSelectedState($state)
    {
        Log::info('updatedSelectedState called', ['state' => $state]);
        $this->selectedCity = null;
        $this->cities = [];
        $this->updateCities();
        Log::info('After updateCities', ['cities' => $this->cities]);
    }

    private function updateStates()
    {
        if (!is_null($this->selectedCountry)) {
            $this->states = State::where('country_id', $this->selectedCountry)->get();
            Log::info('updateStates', ['selectedCountry' => $this->selectedCountry, 'statesCount' => count($this->states)]);
        } else {
            Log::info('updateStates: selectedCountry is null');
        }
    }

    private function updateCities()
    {
        if (!is_null($this->selectedState)) {
            $this->cities = City::where('state_id', $this->selectedState)->get();
            Log::info('updateCities', ['selectedState' => $this->selectedState, 'citiesCount' => count($this->cities)]);
        } else {
            Log::info('updateCities: selectedState is null');
        }
    }

    public function render()
    {
        Log::info('Render method called', [
            'selectedCountry' => $this->selectedCountry,
            'selectedState' => $this->selectedState,
            'selectedCity' => $this->selectedCity,
            'statesCount' => count($this->states),
            'citiesCount' => count($this->cities)
        ]);
        return view('livewire.dependet-edit-country');
    }
}