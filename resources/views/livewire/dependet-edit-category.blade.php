<div>
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3 md:col-span-2">
            <label for="category_id" class="block text-sm font-medium text-gray-700">
                Kategorija
            </label>
            <select required wire:model.live="selectedCategory" name="category_id" wire:change="$refresh"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Odaberi kategoriju</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3 md:col-span-2">
            <label for="sub_category_id" class="block text-sm font-medium text-gray-700">
                Potkategorija
            </label>
            <select required wire:model.live="selectedSubCategory" name="sub_category_id" wire:change="$refresh"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                {{ is_null($selectedCategory) ? 'disabled' : '' }}>
                <option value="">Odaberi potkategoriju</option>
                @foreach ($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                @endforeach
            </select>
            @error('sub_category_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3 md:col-span-2">
            <label for="child_category_id" class="block text-sm font-medium text-gray-700">
                Podpotkategorija
            </label>
            <select required wire:model.live="selectedChildCategory" name="child_category_id" wire:change="$refresh"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                {{ is_null($selectedSubCategory) ? 'disabled' : '' }}>
                <option value="">Odaberi podpotkategoriju</option>
                @foreach ($childCategories as $childCategory)
                    <option value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                @endforeach
            </select>
            @error('child_category_id') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Debug info -->
    @if(config('app.debug'))
        <div class="mt-4 p-4 bg-gray-100 rounded">
            <h3 class="text-lg font-semibold">Debug Info:</h3>
            <p>Selected Category: {{ $selectedCategory }}</p>
            <p>Selected SubCategory: {{ $selectedSubCategory }}</p>
            <p>Selected ChildCategory: {{ $selectedChildCategory }}</p>
            <p>SubCategories Count: {{ count($subCategories) }}</p>
            <p>ChildCategories Count: {{ count($childCategories) }}</p>
        </div>
    @endif
</div>