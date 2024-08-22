<div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3 md:col-span-2">
        <label for="category_id" class="block text-sm font-medium text-gray-700">
            Država
        </label>
        <select wire:model.live="selectedCountry" name="country_id"
            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="">Odaberi državu</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">
                    {{ $country->name }}</option>
            @endforeach
        </select>
        @error('country_id') <span class="error">{{ $message }}</span>
        @enderror
    </div>
    @if (!is_null($selectedCountry))
        <div class="col-span-6 sm:col-span-3 md:col-span-2">
            <label for="state_id" class="block text-sm font-medium text-gray-700">
                Županija
            </label>
            <select wire:model.live="selectedState" name="state_id"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Odaberi Županiju</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">
                        {{ $state->name }}</option>
                @endforeach
            </select>
            @error('state_id"') <span class="error">{{ $message }}</span>
            @enderror
        </div>
    @endif
    @if (!is_null($selectedState))
        <div class="col-span-6 sm:col-span-3 md:col-span-2">
            <label for="city_id" class="block text-sm font-medium text-gray-700">
                Grad
            </label>
            <select name="city_id"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Odaberi grad</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">
                        {{ $city->name }}</option>
                @endforeach
            </select>
            @error('city_id') <span class="error">{{ $message }}</span>
            @enderror
        </div>
    @endif

</div>