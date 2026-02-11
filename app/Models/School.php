<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    
    protected $fillable = [
        'school_name',
        'census_number',
        'school_id',
        'phone_number',
        'school_postal_address',
        'tmp_code',
        'payment_start',
        'payment_expire',
        'division_id',
        'school_type',
        'school_status',
        'payment_id',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
