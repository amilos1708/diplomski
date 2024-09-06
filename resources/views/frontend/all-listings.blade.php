<x-main-layout>
    <x-slot name="header">
        <x-main-header></x-main-header>
    </x-slot>

    <section>
        <x-main-hero></x-main-hero>
    </section>

    <section class="container mx-auto px-4 py-8">
        @if($listings->isEmpty())
            <p class="text-center text-gray-500 text-xl">Nema rezultata koji odgovaraju vašem filtru.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($listings as $listing)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <a href="{{ route('listings.show', $listing) }}" class="block">
                            <img 
                                src="{{ $listing->featured_image ? Storage::url($listing->featured_image) : asset('images/placeholder.jpg') }}"
                                alt="{{ $listing->title }}"
                                class="w-full h-48 object-cover"
                                loading="lazy"
                            >
                            <div class="p-4">
                                <h3 class="text-gray-500 text-xs tracking-widest">{{ $listing->category->name }}</h3>
                                <h2 class="text-gray-900 font-medium text-lg mb-2">{{ Str::limit($listing->title, 30) }}</h2>
                                <p class="text-indigo-600 font-bold">
                                    {{ isset($listing->price) ? number_format($listing->price, 2) . ' €' : 'Cijena nije dostupna' }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        @endif
    </section>

    <x-main-footer></x-main-footer>
</x-main-layout>