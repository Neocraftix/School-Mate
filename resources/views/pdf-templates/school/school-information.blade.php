<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        /* A4 Setup */
        @page {
            margin: 0px;
        }

        body {
            font-family: 'Helvetica', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #1e293b;
        }

        /* --- Full Geometric Background Design --- */
        .bg-layer {
            position: fixed;
            z-index: -1;
        }

        /* 1. The Grid/Net Pattern */
        .bg-net {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(#cbd5e1 0.7px, transparent 0.7px);
            background-size: 25px 25px;
            opacity: 0.3;
        }

        /* 2. Top Right Large Gradient Circle */
        .shape-circle-tr {
            top: -150px;
            right: -150px;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, #dbeafe 0%, #eff6ff 100%);
            border-radius: 50%;
        }

        /* 3. Bottom Left Square Accent */
        .shape-square-bl {
            bottom: -80px;
            left: -80px;
            width: 300px;
            height: 300px;
            background: #f1f5f9;
            border-radius: 40px;
            transform: rotate(25deg);
            opacity: 0.6;
        }

        /* 4. Small Floating Geometric Items */
        .ring-1 {
            top: 100px;
            left: 50px;
            width: 40px;
            height: 40px;
            border: 3px solid #3b82f6;
            border-radius: 50%;
            opacity: 0.1;
        }

        .ring-2 {
            top: 450px;
            right: 80px;
            width: 60px;
            height: 60px;
            border: 8px solid #f1f5f9;
            border-radius: 10px;
            transform: rotate(45deg);
            opacity: 0.4;
        }

        .dot-accent {
            top: 200px;
            right: 150px;
            width: 50px;
            height: 50px;
            background-image: radial-gradient(#3b82f6 2px, transparent 2px);
            background-size: 10px 10px;
            opacity: 0.2;
        }

        /* --- Main Content --- */
        .wrapper {
            position: relative;
            height: 100%;
            width: 100%;
        }

        .container {
            padding: 60px 50px;
        }

        /* Header Section */
        .header {
            margin-bottom: 50px;
        }

        .doc-tag {
            font-size: 14px;
            color: #2563eb;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        .school-name {
            font-size: 42px;
            font-weight: 900;
            color: #0f172a;
            margin: 10px 0;
            text-transform: uppercase;
            letter-spacing: -1.5px;
        }

        .accent-bar {
            width: 100px;
            height: 8px;
            background: #2563eb;
            border-radius: 4px;
        }

        /* Information Grid */
        .info-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.7);
            border-bottom: 2px solid #e2e8f0;
            padding: 22px 15px;
            vertical-align: top;
        }

        .label {
            font-size: 11px;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
            letter-spacing: 1px;
        }

        .value {
            font-size: 20px;
            font-weight: 700;
            color: #1e293b;
            display: block;
        }

        /* Status Pill */
        .status-badge {
            display: inline-block;
            background: #dcfce7;
            color: #15803d;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 800;
        }

        /* Postal Address Area */
        .address-box {
            margin-top: 30px;
            padding: 35px;
            background: #f8fafc;
            border-radius: 20px;
            border-left: 12px solid #0f172a;
        }

        /* --- Fixed Footer --- */
        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #0f172a;
            color: #ffffff;
            padding: 35px 50px;
        }

        .footer-table {
            width: 100%;
        }

        .footer-left {
            text-align: left;
            width: 70%;
        }

        .footer-right {
            text-align: right;
            width: 30%;
        }

        .gen-text {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.6;
        }

        .footer-logo {
            font-size: 20px;
            font-weight: 900;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="bg-layer bg-net"></div>
    <div class="bg-layer shape-circle-tr"></div>
    <div class="bg-layer shape-square-bl"></div>
    <div class="bg-layer ring-1"></div>
    <div class="bg-layer ring-2"></div>
    <div class="bg-layer dot-accent"></div>

    <div class="wrapper">
        <div class="container">
            <div class="header">
                <div class="doc-tag">School Information</div>
                <h1 class="school-name">{{ $school->school_name }}</h1>
                <div class="accent-bar"></div>
            </div>

            <table class="info-table">
                <tr>
                    <td class="info-card" width="50%">
                        <span class="label">Census Number</span>
                        <span class="value">{{ $school->census_number }}</span>
                    </td>
                    <td class="info-card" width="50%">
                        <span class="label">School Unique ID</span>
                        <span class="value"># {{ $school->school_id }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="info-card">
                        <span class="label">Official Contact</span>
                        <span class="value">{{ $school->phone_number }}</span>
                    </td>
                    <td class="info-card">
                        <span class="label">Education Division</span>
                        <span class="value">{{ $school->division->division_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="info-card">
                        <span class="label">Institutional Type</span>
                        <span class="value">{{ $school->schoolType->school_type_name }}</span>
                    </td>
                    <td class="info-card">
                        <span class="label">Current Status</span>
                        <span class="status-badge">{{ $school->status->status_name }}</span>
                    </td>
                </tr>
            </table>

            <div class="address-box">
                <span class="label">Registered Postal Address</span>
                <span class="value" style="font-size: 22px; margin-top: 10px; line-height: 1.4; color: #0f172a;">
                    {{ $school->school_postal_address }}
                </span>
            </div>
        </div>

        <div class="footer">
            <table class="footer-table">
                <tr>
                    <td class="footer-left">
                        <div class="gen-text">
                            <strong>SCHOOL-MATE</strong><br>
                            Generated on: {{ date('F d, Y h:i A') }}<br>
                            ID: {{ $reportId }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
