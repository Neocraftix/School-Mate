<?php

namespace App\Helpers;

use App\Models\Report;

class CommonHelper
{
    public static function generateAttendanceReport($reportType)
    {
        $report = Report::create([
            'report_type'   => $reportType,
        ]);

        return $report->report_id;
    }
}
