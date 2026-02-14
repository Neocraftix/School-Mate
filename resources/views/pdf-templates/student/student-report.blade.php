<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Report - {{ $student->child_name }}</title>

    <style>
        /* PDF Page Setup */
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #334155;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            line-height: 1.4;
        }

        /* Dynamic Header Strip */
        .header-strip {
            height: 15px;
            background-color: {{ $theme['primary'] }};
            width: 100%;
        }

        .container {
            padding: 30px;
        }

        /* Top Branding */
        .top-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .school-name {
            font-size: 26px;
            font-weight: bold;
            color: {{ $theme['accent'] }};
            letter-spacing: -1px;
        }

        .report-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #64748b;
            margin-top: 5px;
        }

        /* Student Hero Card */
        .student-card {
            width: 100%;
            background-color: {{ $theme['secondary'] }};
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid {{ $theme['border'] }};
        }

        .student-photo {
            width: 110px;
            height: 110px;
            border-radius: 12px;
            border: 4px solid #ffffff;
            object-fit: cover;
        }

        .student-name {
            font-size: 22px;
            font-weight: bold;
            color: {{ $theme['accent'] }};
            margin: 0;
        }

        .admission-no {
            font-size: 13px;
            color: {{ $theme['primary'] }};
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        /* Section Headings */
        .section-header {
            background-color: #f8fafc;
            padding: 8px 12px;
            border-left: 5px solid {{ $theme['primary'] }};
            font-weight: bold;
            color: #1e293b;
            margin: 25px 0 12px 0;
            font-size: 13px;
            text-transform: uppercase;
        }

        /* Data Tables */
        .info-table {
            width: 100%;
        }

        .info-table td {
            padding: 7px 0;
            vertical-align: top;
            border-bottom: 1px solid #f1f5f9;
        }

        .label {
            width: 35%;
            color: #94a3b8;
            font-size: 11px;
            font-weight: normal;
        }

        .value {
            width: 65%;
            color: #1e293b;
            font-weight: bold;
        }

        /* Medical Highlight Box */
        .medical-box {
            background-color: {{ $theme['isFemale'] ? '#fff1f2' : '#f0f9ff' }};
            border: 1px dashed {{ $theme['primary'] }};
            padding: 15px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .blood-badge {
            background-color: {{ $theme['isFemale'] ? '#db2777' : '#0ea5e9' }};
            color: white;
            padding: 3px 10px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 11px;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 20px;
            left: 30px;
            right: 30px;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
        }

        /* Helper for clear layout */
        .row-table {
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="header-strip"></div>

    <div class="container">
        
        <table class="top-table">
            <tr>
                <td>
                    <div class="school-name">SCHOOL-MATE</div>
                    <div class="report-title">Official Student Cumulative Record</div>
                </td>
                <td style="text-align: right; color: #64748b; font-size: 11px;">
                    <strong>Date:</strong> {{ date('d M, Y') }}<br>
                    <strong>ID:</strong> #STD-{{ $student->id }}
                </td>
            </tr>
        </table>

        <table class="student-card">
            <tr>
                <td width="125px">                    
                        <img src="{{ public_path('assets/images/system/teacher-profile-img.jpg') }}" class="student-photo">
                    
                </td>
                <td valign="top" style="padding-left: 20px;">
                    <span class="admission-no">Admission No: {{ $student->admission_number ?? 'N/A' }}</span>
                    <h1 class="student-name">{{ $student->child_name }}</h1>
                    <p style="margin: 5px 0; color: #64748b; font-size: 12px;">
                        {{ $student->full_name_with_initials }}
                    </p>
                    <div style="margin-top: 10px;">
                        <span style="background: #fff; padding: 2px 10px; border-radius: 20px; font-size: 11px; border: 1px solid {{ $theme['border'] }}">
                            Grade: {{ $student->grade->grade ?? 'N/A' }}
                        </span>
                    </div>
                </td>
            </tr>
        </table>

        <table class="row-table">
            <tr>
                <td width="48%" valign="top">
                    <div class="section-header">Personal Details</div>
                    <table class="info-table">
                        <tr><td class="label">Date of Birth</td><td class="value">{{ $student->date_of_birth ?? '-' }}</td></tr>
                        <tr><td class="label">Gender</td><td class="value">{{ $student->gender->gender ?? '-' }}</td></tr>
                        <tr><td class="label">Siblings</td><td class="value">{{ $student->sibling_details ?? 'None' }}</td></tr>
                    </table>

                    <div class="section-header">Contact Info</div>
                    <table class="info-table">
                        <tr><td class="label">Phone</td><td class="value">{{ $student->	telephone_number ?? '-' }}</td></tr>
                        <tr><td class="label">Transport</td><td class="value">{{ $student->transport->transport_methord ?? 'Public' }}</td></tr>
                        <tr><td class="label">Address</td><td class="value" style="font-size: 11px;">{{ $student->address ?? '-' }}</td></tr>
                    </table>
                </td>

                <td width="4%"></td> <td width="48%" valign="top">
                    <div class="section-header">Guardian Details</div>
                    <table class="info-table">
                        <tr><td class="label">Father</td><td class="value">{{ $student->father_name ?? '-' }}</td></tr>
                        <tr><td class="label">Mother</td><td class="value">{{ $student->mother_name ?? '-' }}</td></tr>
                        <tr><td class="label">Guardian</td><td class="value">{{ $student->guardian_name ?? '-' }}</td></tr>
                        <tr><td class="label">G. Address</td><td class="value" style="font-size: 11px;">{{ $student->guardian_address ?? '-' }}</td></tr>
                    </table>

                    <div class="section-header"> Medical Info</div>
                    <div class="medical-box">
                        <table width="100%">
                            <tr>
                                <td class="label" style="color: {{ $theme['accent'] }};">Blood Type</td>
                                <td class="value"><span class="blood-badge">{{ $student->bloodType->blood_type ?? 'N/A' }}</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 10px; font-size: 11px; color: #64748b;">
                                    <strong>Medical Conditions:</strong><br>
                                    <span style="color: {{ $theme['isFemale'] ? '#be185d' : '#0369a1' }};">
                                        {{ $student->special_medical_conditions ?? 'No special medical conditions reported.' }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>

    </div>

    <div class="footer">
        This is a computer-generated document by <strong>School-Mate Management System</strong>.<br>
         on {{ date('Y-m-d') }} at {{ date('h:i A') }} | ID: {{ $reportId }}
    </div>

</body>
</html>