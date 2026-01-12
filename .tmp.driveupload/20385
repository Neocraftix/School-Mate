<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainFurnitureCategory extends Model
{
    protected $table = 'main_furniture_categories';

    protected $fillable = [
        'category_name',
    ];

    // Main Category -> Sub Categories
    public function subCategories()
    {
        return $this->hasMany(
            FurnitureSubCategory::class,
            'main_furniture_category_id'
        );
    }
}
