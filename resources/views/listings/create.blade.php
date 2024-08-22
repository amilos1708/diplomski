<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novi oglas') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex flex-col">
            
            <div class="overflow-hidden sm:rounded-lg bg-gray-200 m-2 p-2">
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Kreiraj novi oglas</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="category_id" class="block text-sm font-medium text-gray-700">
                                                    Kategorija
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="category_id" id="category_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach (App\Models\Category::all() as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="sub_category_id" class="block text-sm font-medium text-gray-700">
                                                    Potkategorija
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="sub_category_id" id="sub_category_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach (App\Models\SubCategory::all() as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="child_category_id" class="block text-sm font-medium text-gray-700">
                                                    Podpotkategorija
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="child_category_id" id="child_category_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach (App\Models\ChildCategory::all() as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Naslov oglasa
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="title" id="title"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Naslov oglasa">
                                                    @error('title') 
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="description" class="block text-sm font-medium text-gray-700">
                                                    Opis oglasa
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <textarea name="description" id="description"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Upisi opis oglasa"></textarea>
                                                    @error('description') 
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="price" class="block text-sm font-medium text-gray-700">
                                                    Cijena
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="price" id="price"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Cijena">
                                                    @error('price') 
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="price_negotiable" class="block text-sm font-medium text-gray-700">
                                                    Cijena po dogovoru
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="price_negotiable" id="price_negotiable"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                            <option value="fixed">Fiksna cijena</option>
                                                            <option value="negotiable">Cijena po dogovoru</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="condition" class="block text-sm font-medium text-gray-700">
                                                    Stanje
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="condition" id="condition"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                            <option value="new">Novo</option>
                                                            <option value="used">Korišteno</option>
                                                    </select>
                                                    @error('condition')<span
                                                        class="text-red-500">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="location" class="block text-sm font-medium text-gray-700">
                                                    Lokacija
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="location" id="location"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Lokacija">
                                                    @error('location') 
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="country_id" class="block text-sm font-medium text-gray-700">
                                                    Država
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="country_id" id="country_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach (App\Models\Country::all() as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="state_id" class="block text-sm font-medium text-gray-700">
                                                    Županija
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="state_id" id="state_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach (App\Models\State::all() as $state)
                                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="col-span-6 sm:col-span-3 md:col-span-2">
                                                <label for="city_id" class="block text-sm font-medium text-gray-700">
                                                    Grad
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="city_id" id="city_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach (App\Models\City::all() as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="phone_number" class="block text-sm font-medium text-gray-700">
                                                    Broj telefona
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="tel" name="phone_number" id="phone_number"
                                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                        placeholder="Broj telefona">
                                                    @error('phone_number') 
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="is_published" class="block text-sm font-medium text-gray-700">
                                                    Objavljeno
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="is_published" id="is_published"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                            <option value="0">Neobjavljeno</option>
                                                            <option value="1">Objavljeno</option>
                                                    </select>
                                                    @error('is_published')<span
                                                        class="text-red-500">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="featured_image" class="block text-sm font-medium text-gray-700">
                                                Naslovna Slika
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="featured_image" name="featured_image"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                @error('featured_image') 
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="image_one" class="block text-sm font-medium text-gray-700">
                                                 Slika prva
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="image_one" name="image_one"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                @error('image_one') 
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="image_two" class="block text-sm font-medium text-gray-700">
                                                 Slika druga
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="image_two" name="image_two"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                @error('image_two') 
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="image_three" class="block text-sm font-medium text-gray-700">
                                                 Slika treća
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="image_three" name="image_three"
                                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                @error('image_three') 
                                                    <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Spremi
                                        </button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
