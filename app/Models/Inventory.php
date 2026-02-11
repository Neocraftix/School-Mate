<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Inventory extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'category_id',
        'quantity',
        'unit',
        'purchase_date',
        'warranty_expiry',
        'supplier_id',
        'location',
    ];

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(InventorySupplier::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('inventory', function (Builder $builder) {
            // Check if user logged in
            if (Auth::check()) {
                // Only get students for logged in user's school
                $user = Auth::user();
                $builder->where('school_id', $user->school->id);
            }
        });
    }
}
