<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FurnitureSubCategory extends Model
{
    protected $table = 'sub_furniture_categories';

    protected $fillable = [
        'category_name',
        'main_furniture_category_id',
    ];

    // Sub Category -> Main Category
    public function mainCategory()
    {
        return $this->belongsTo(
            MainFurnitureCategory::class,
            'main_furniture_category_id'
        );
    }

    // Sub Category -> Furnitures
    public function furnitures()
    {
        return $this->hasMany(
            Furniture::class,
            'sub_furniture_category_id'
        );
    }
}
