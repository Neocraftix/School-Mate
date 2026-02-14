<!DOCTYPE html>
<html>

<head>
    <title>Furniture Inventory Report | SCHOOL-MATE</title>
    <style>
        @page {
            margin: 0cm 0cm;
            /* Full page design eka ganna */
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
            margin-top: 2cm;
            margin-bottom: 2cm;
            margin-left: 1cm;
            margin-right: 1cm;
            line-height: 1.5;
        }

        /* Top Bar Accent */
        .top-accent {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
        }

        .header-section {
            text-align: left;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
        }

        .report-title {
            font-size: 22px;
            font-weight: bold;
            color: #1e3c72;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .report-subtitle {
            font-size: 12px;
            color: #7f8c8d;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th {
            background-color: #1e3c72;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 10px;
            padding: 12px 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #edf2f7;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .badge {
            background-color: #e2e8f0;
            color: #475569;
            padding: 3px 8px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 9px;
        }

        /* NEXT LEVEL FOOTER DESIGN */
        .footer-container {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 10px 1cm;
        }

        .footer-content {
            display: table;
            width: 100%;
        }

        .footer-left {
            display: table-cell;
            text-align: left;
            vertical-align: middle;
        }

        .footer-right {
            display: table-cell;
            text-align: right;
            vertical-align: middle;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 900;
            color: #1e3c72;
            letter-spacing: 1.5px;
        }

        .system-tag {
            font-size: 9px;
            color: #94a3b8;
            text-transform: uppercase;
        }

        .gen-id-box {
            background-color: #1e3c72;
            color: #fff;
            padding: 4px 10px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="top-accent"></div>

    <div class="header-section">
        <h1 class="report-title">Furniture Inventory</h1>
        <div class="report-subtitle">Official Furniture Inventory Asset Management Report</div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 25%;">Furniture Name</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Location</th>
                <th>Purchase</th>
                <th>Warranty</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($furnitures as $furniture)
                <tr>
                    <td>{{ $furniture->id }}</td>
                    <td><strong style="color: #2d3748;">{{ $furniture->furniture_name }}</strong></td>
                    <td>{{ $furniture->subCategory->category_name }}</td>
                    <td><span class="badge">{{ $furniture->quantity }}</span></td>
                    <td>{{ $furniture->location }}</td>
                    <td>{{ \Carbon\Carbon::parse($furniture->purchase_date)->format('Y-m-d') }}</td>
                    <td>{{ $furniture->warranty }} Mo.</td>
                    <td>{{ $furniture->supplier }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-left">
                <div class="system-tag">Powered by System</div>
                <div class="brand-name">SCHOOL-MATE</div>
            </div>
            <div class="footer-right">
                <span class="gen-id-box">ID: {{ $reportId }}</span>
                <div style="font-size: 8px; color: #94a3b8; margin-top: 5px;">
                    Generated on: {{ date('F d, Y h:i A') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
