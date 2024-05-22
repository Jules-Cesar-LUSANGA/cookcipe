<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                
                {{-- Create grid for recipes cards --}}

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($recipes as $recipe)
                        <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">

                            {{-- Display recipe image --}}
                            <div class="mb-4">
                                <img src="{{ $recipe->getImage() }}" alt="{{ $recipe->name }}" class="w-full h-48 object-cover">
                            </div>

                            <div>
                                <h2 class="text-xl font-bold">{{ $recipe->name }}</h2>
                                <p class="text-gray-500">{{ $recipe->category->name }}</p>
                                <a href="{{ route('recipes.show', $recipe) }}" class="text-blue-500">View Recipe</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
