<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'admission_number',
        'child_name',
        'full_name_with_initials',
        'gender_id',
        'date_of_birth',
        'transport_id',
        'sibling_details',
        'address',
        'mother_name',
        'father_name',
        'guardian_name',
        'guardian_address',
        'telephone_number',
        'blood_type_id',
        'special_medical_conditions',
        'skill_id',
        'assistance_id',
        'grade_id',
        'student_status_id',
        'school_id',
    ];

    /**
     * 🔐 AUTO ENCRYPT / DECRYPT
     */

    protected $casts = [
        'address' => 'encrypted',
        'guardian_address' => 'encrypted',
        'telephone_number' => 'encrypted',
        'special_medical_conditions' => 'encrypted',
        'sibling_details' => 'encrypted',
    ];

    /* =======================
        RELATIONSHIPS
    ======================== */

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function assistance()
    {
        return $this->belongsTo(Assistance::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function studentStatus()
    {
        return $this->belongsTo(StudentStatus::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
