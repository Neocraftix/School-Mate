<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    protected $fillable = [
        'report_id',
        'report_type',
        'school_id',
        'generated_by',
        'meta_data',
    ];

    protected static function booted()
    {
        static::creating(function ($report) {
            if (Auth::check()) {
                $report->generated_by = Auth::user()->name;
                $report->school_id = Auth::user()->school->id;
            }

            $year = date('Y');

            $lastReport = self::whereYear('created_at', $year)
                ->latest()
                ->first();

            $number = 1;

            if ($lastReport) {
                $lastNumber = (int) substr($lastReport->report_id, -5);
                $number = $lastNumber + 1;
            }

            $report->report_id = 'RPT-' . $year . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
        });
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
