<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'title_id',
        'full_name',
        'name_with_initials',
        'nic',
        'dob',
        'ethnicity_id',
        'gender_id',
        'religion_id',
        'email',
        'phone',
        'address_permanent',
        'address_temporary',
        'district_id',
        'ds_division',
        'gs_division',
        'school_id',
        'civil_status_id',
        'spouse_name',
        'children_names',
        'children_dobs',
        'ncoe',
        'degree',
        'al',
        'diploma',
        'other',
        'teacher_status_id',
    ];

    /* =======================
        🔐 Encryption Mutators
       ======================= */

    protected $casts = [
        'nic' => 'encrypted',
        'address_permanent' => 'encrypted',
        'address_temporary' => 'encrypted',
        'phone' => 'encrypted',
        'spouse_name' => 'encrypted',
        'children_names' => 'encrypted',
        'children_dobs' => 'encrypted',
    ];

    protected static function booted()
    {
        static::saving(function ($teacher) {
            if ($teacher->nic) {
                $teacher->nic_hash = hash('sha256', $teacher->nic);
            }
        });
    }

    /* =======================
        🔗 Relationships
       ======================= */

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function ethnicity()
    {
        return $this->belongsTo(Ethnicity::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function district()
    {
        return $this->belongsTo(EducationZone::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }

    public function teacherStatus()
    {
        return $this->belongsTo(TeacherStatus::class);
    }
}
