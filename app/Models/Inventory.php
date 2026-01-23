<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'supplier',
        'location',
    ];

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_id');
    }
}
