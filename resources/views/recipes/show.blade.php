<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-6 flex justify-center">
                        <img src="{{ $recipe->getImage() }}" alt="{{ $recipe->name }}" class="w-1/2">
                    </div>

                    <div class="text-lg">
                        <span class="font-bold">Author : </span> {{ $recipe->user->name }}
                    </div>

                    <div class="mt-6">
                        <p>
                            <span class="text-lg font-bold">Category : </span> {{ $recipe->category->name }}
                        </p>
                    </div>

                    <div class="mt-6">
                        <p>
                            <span class="text-lg font-bold">Ingredients : </span> {{ $recipe->ingredients }}
                        </p>
                    </div>
                    <div class="mt-6">
                        <div class="text-lg font-bold">
                            Description
                        </div>
                        <div class="mt-2">

                            <p>{{ $recipe->description }}</p>
                            
                        </div>
                    </div>

                    <div class="mt-6">
                        @auth
                            @if (auth()->user()->id == $recipe->user_id)
                                <a href="{{ route('recipes.edit', $recipe) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>