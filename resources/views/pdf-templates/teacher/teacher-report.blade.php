<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Teacher Report - {{ $teacher->full_name ?? 'Profile' }}</title>

    <style>
        /* PDF Page Setup */
        @page {
            size: A4;
            margin: 0;
            /* Margin eka body ekedi handle karamu clean wenna */
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            /* DejaVu Sans walata wada Helvetica lassanai */
            font-size: 12px;
            color: #334155;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }

        /* Top Accent Bar */
        .top-bar {
            height: 8px;
            background: #fb923c;
            /* Orange accent */
            width: 100%;
        }

        .main-container {
            padding: 30px;
        }

        /* Header Section */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .brand-name {
            font-size: 22px;
            font-weight: bold;
            color: #fb923c;
            letter-spacing: 1px;
        }

        .report-type {
            font-size: 10px;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 2px;
        }

        /* Profile Card */
        .profile-card {
            width: 100%;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            /* Dompdf 0.8.3+ support border-radius */
            padding: 20px;
            margin-bottom: 25px;
        }

        .photo-box {
            width: 120px;
            height: 120px;
            border: 4px solid #f1f5f9;
            border-radius: 8px;
        }

        .teacher-name {
            font-size: 20px;
            color: #1e293b;
            margin: 0 0 5px 0;
        }

        .nic-badge {
            background-color: #f1f5f9;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 11px;
            color: #475569;
            display: inline-block;
        }

        /* Sections */
        .section-title {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fb923c;
            margin-bottom: 10px;
            border-left: 4px solid #fb923c;
            padding-left: 10px;
        }

        .data-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .data-table td {
            padding: 6px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .label {
            width: 35%;
            color: #94a3b8;
            font-size: 11px;
        }

        .value {
            width: 65%;
            color: #1e293b;
            font-weight: 500;
        }

        /* Badges */
        .badge {
            background-color: #fff7ed;
            color: #c2410c;
            border: 1px solid #ffedd5;
            padding: 3px 10px;
            font-size: 11px;
            border-radius: 12px;
            margin-right: 5px;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 30px;
            left: 30px;
            right: 30px;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            font-size: 10px;
            color: #94a3b8;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="top-bar"></div>

    <div class="main-container">

        <table class="header-table">
            <tr>
                <td>
                    <div class="brand-name">SCHOOL-MATE</div>
                    <div class="report-type">Official Teacher Profile</div>
                </td>
                <td style="text-align: right; color: #64748b; font-size: 11px;">
                    ID: {{ $reportId }}<br>
                    Generated: {{ date('Y-m-d') }}
                </td>
            </tr>
        </table>

        <table class="profile-card">
            <tr>
                <td width="130px" valign="top">
                    <img src="{{ public_path('assets/images/system/teacher-profile-img.jpg') }}" class="photo-box">
                </td>
                <td valign="top" style="padding-left: 20px;">
                    <h1 class="teacher-name">{{ $teacher->full_name ?? 'N/A' }}</h1>
                    <div class="nic-badge">NIC: {{ $teacher->nic ?? 'Not Provided' }}</div>

                    <table style="margin-top: 15px; width: 100%;">
                        <tr>
                            <td style="color: #64748b; font-size: 11px;">Mobile</td>
                            <td style="color: #64748b; font-size: 11px;">Email</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">{{ $teacher->phone ?? '-' }}</td>
                            <td style="font-weight: bold;">{{ $teacher->email ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td width="48%" valign="top">
                    <div class="section-title">Personal Details</div>
                    <table class="data-table">
                        <tr>
                            <td class="label">Title</td>
                            <td class="value">{{ $teacher->title->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Date of Birth</td>
                            <td class="value">{{ $teacher->dob ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Gender</td>
                            <td class="value">{{ $teacher->gender->gender ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Religion</td>
                            <td class="value">{{ $teacher->religion->name ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="section-title">Family Status</div>
                    <table class="data-table">
                        <tr>
                            <td class="label">Civil Status</td>
                            <td class="value">{{ $teacher->civilStatus->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Spouse</td>
                            <td class="value">{{ $teacher->spouse_name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Names of the Children</td>
                            <td class="value">{{ $teacher->children_names ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Birth of Date of the Children</td>
                            <td class="value">{{ $teacher->children_dobs ?? '-' }}</td>
                        </tr>
                    </table>
                </td>

                <td width="4%"></td>

                <td width="48%" valign="top">
                    <div class="section-title">Professional Info</div>
                    <table class="data-table">
                        <tr>
                            <td class="label">DS Division</td>
                            <td class="value">{{ $teacher->ds_division ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">District</td>
                            <td class="value">{{ $teacher->district->zone_name ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="section-title">Qualifications</div>
                    <table class="data-table">
                        <tr>
                            <td class="label">Degree</td>
                            <td class="value">{{ $teacher->degree ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Diploma</td>
                            <td class="value">{{ $teacher->diploma ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">NCOE</td>
                            <td class="value">{{ $teacher->ncoe ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">AL</td>
                            <td class="value">{{ $teacher->al ?? '-' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="section-title">Residential Address</div>
        <table class="data-table">
            <tr>
                <td class="label">Permanent</td>
                <td class="value">{{ $teacher->address_permanent ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Temporary</td>
                <td class="value">{{ $teacher->address_temporary ?? '-' }}</td>
            </tr>
        </table>

        <div class="section-title">Assigned Subjects</div>
        <table class="data-table">
            <tr>
                <td class="label">Appointed Subject</td>
                <td class="value">{{ $teacher->appointed_subject ?? '-' }}</td>
            </tr>
            <br>
            <br>
            <tr>
                <td class="label">Most Teaching Subject 01</td>
                <td class="value">{{ $teacher->most_teaching_subject_01 ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Most Teaching Subject 02</td>
                <td class="value">{{ $teacher->most_teaching_subject_02 ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        School-Mate Management System {{ now()->format('h:i A') }}
    </div>

</body>

</html>
