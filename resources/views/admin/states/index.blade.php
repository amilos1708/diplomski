<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Županije') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        @if (session('message'))
            <div class="bg-indigo-600 text-gray-100 m-2 p-2 text-lg text-center">{{ session('message') }}</div>
        @endif
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="flex justify-end">
                        <a href="{{ route('admin.states.create') }}"
                            class="py-2 px-4 m-2 bg-blue-600 hover:bg-blue-500 text-black rounded-md">Nova županija
                            </a>
                    </div>
                </div>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Naziv
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Država
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Uredi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($states as $state)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                {{ $state->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                {{ $state->country->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                {{ $state->state_code }}
                                            </div>
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.states.edit', $state->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 px-2">Edit</a>
                                            <form method="POST"
                                                action="{{ route('admin.states.destroy', $state->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="text-red-500 hover:text-red-900 px-2"
                                                    href="{{ route('admin.states.destroy', $state->id) }}"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    Obriši
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="p-2 m-2">
                            {{ $states->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>