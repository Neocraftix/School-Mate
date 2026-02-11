<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Furniture extends Model
{
    protected $table = 'furnitures';

    protected $fillable = [
        'school_id',
        'furniture_name',
        'sub_furniture_category_id',
        'quantity',
        'location',
        'purchase_date',
        'warranty',
        'supplier',
    ];

    // Furniture -> Sub Category
    public function subCategory()
    {
        return $this->belongsTo(
            FurnitureSubCategory::class,
            'sub_furniture_category_id'
        );
    }

    // Furniture -> Main Category (via sub category)
    public function mainCategory()
    {
        return $this->hasOneThrough(
            MainFurnitureCategory::class,
            FurnitureSubCategory::class,
            'id', // FK on sub table
            'id', // FK on main table
            'sub_furniture_category_id',
            'main_furniture_category_id'
        );
    }

    protected static function booted()
    {
        static::addGlobalScope('furniture', function (Builder $builder) {
            // Check if user logged in
            if (Auth::check()) {
                // Only get students for logged in user's school
                $user = Auth::user();
                $builder->where('school_id', $user->school->id);
            }
        });
    }
}
