<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationZone extends Model
{
    protected $table = 'education_zone';
    protected $fillable = [
        'zone_name',
        'province_id',
    ];
}
