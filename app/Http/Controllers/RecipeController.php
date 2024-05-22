<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Category;
use App\Models\Recipe;

class RecipeController extends Controller
{
    // Generate all crud operations

    public function index()
    {
        $recipes = Recipe::with('category')->get();

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('recipes.create', compact('categories'));
    }

    public function store(RecipeRequest $request)
    {
        $recipe_data = $request->validated();

        $recipe_data['image'] = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : '';
        $recipe_data['user_id'] = auth()->id();
        $recipe_data['description'] = nl2br($recipe_data['description']);

        $recipe = Recipe::create($recipe_data);

        return redirect()->route('recipes.show', compact('recipe'))
            ->with('success', 'Recipe created successfully.');
    }

    public function show(Recipe $recipe)
    {
        $recipe->load('category');

        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(RecipeRequest $request, Recipe $recipe)
    {
        $recipe_data = $request->validated();

        $recipe_data['image'] = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : '';
        $recipe_data['description'] = nl2br($recipe_data['description']);

        $recipe->update($recipe_data);

        return redirect()->route('recipes.show', compact('recipe'))
            ->with('success', 'Recipe updated successfully');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully');
    }
}
