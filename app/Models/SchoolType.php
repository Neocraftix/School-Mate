<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolType extends Model
{
    protected $table = 'school_type';
    protected $fillable = [
        'school_type_name',
        'school_type_status',
    ];
}
