<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="category" :value="__('Category')" />
                        
                        <x-select-input id="category" class="block mt-1 w-full" name="category_id" :value="old('category', $recipe->category_id)" required>
                            
                            <option value="">Select a category</option>
                            
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($category->id == $recipe->category_id) >{{ $category->name }}</option>
                            @endforeach

                        </x-select-input>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $recipe->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="ingredients" :value="__('Ingredients')" />
                        <x-text-input id="ingredients" class="block mt-1 w-full" name="ingredients" :value="old('ingredients', $recipe->ingredients)" required />
                        <x-input-error :messages="$errors->get('ingredients')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" type="file" class="block mt-1 w-full" name="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4 mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea-input id="description" class="block mt-1 w-full" name="description" :value="old('description', $recipe->description)" required />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button>{{ __('Update') }}</x-primary-button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>