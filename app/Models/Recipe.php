<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'user_id', 'image', 'ingredients'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImage()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : asset('assets/images/default.jpg');
    }
}
