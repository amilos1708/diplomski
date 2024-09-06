<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Listing;

class Category extends Model
{
    protected $fillable=['name', 'slug', 'image'];

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
