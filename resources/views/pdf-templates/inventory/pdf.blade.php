<!DOCTYPE html>
<html>

<head>
    <title>Inventory Report | SCHOOL-MATE</title>
    <style>
        /* Page Setup */
        @page {
            margin: 0cm 0cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11px;
            color: #334155;
            margin-top: 2.5cm;
            margin-bottom: 2.5cm;
            margin-left: 1.2cm;
            margin-right: 1.2cm;
            line-height: 1.6;
        }

        /* Top Accent Bar */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 12px;
            background: linear-gradient(90deg, #0f172a 0%, #2563eb 100%);
        }

        /* Modern Header */
        .header-section {
            margin-bottom: 40px;
            border-bottom: 3px solid #f1f5f9;
            padding-bottom: 20px;
        }

        .report-title {
            font-size: 26px;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .status-label {
            display: inline-block;
            background-color: #dcfce7;
            color: #166534;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 8px;
        }

        /* Professional Table Design */
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #1e293b;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 9px;
            padding: 14px 10px;
            text-align: left;
            border: none;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #f1f5f9;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .qty-badge {
            background-color: #334155;
            color: white;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 10px;
        }

        /* THE NEXT LEVEL FOOTER */
        .footer-container {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 20px 1.2cm;
        }

        .footer-table {
            width: 100%;
            border: none;
        }

        .footer-table td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 900;
            color: #2563eb;
            letter-spacing: 2px;
            margin: 0;
        }

        .system-tag {
            font-size: 9px;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .gen-id-box {
            background-color: #f1f5f9;
            color: #475569;
            padding: 6px 12px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 11px;
            font-weight: bold;
            border: 1px solid #e2e8f0;
        }

        .timestamp {
            font-size: 9px;
            color: #94a3b8;
            margin-top: 6px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="top-bar"></div>

    <div class="header-section">
        <h1 class="report-title">Inventory</h1>
        <div class="status-label">Official Inventory Asset Management Report</div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 25%;">Item Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Purchase Date</th>
                <th>Warranty Expiry</th>
                <th>Supplier</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td><strong style="color: #1e293b;">{{ $inventory->name }}</strong></td>
                    <td>{{ $inventory->category->name ?? 'N/A' }}</td>
                    <td><span class="qty-badge">{{ $inventory->quantity }} {{ $inventory->unit }}</span></td>
                    <td>{{ $inventory->purchase_date }}</td>
                    <td>{{ $inventory->warranty_expiry }}</td>
                    <td>{{ $inventory->supplier->supplier_name ?? 'N/A' }}</td>
                    <td><span style="color: #64748b;">{{ $inventory->location }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer-container">
        <table class="footer-table">
            <tr>
                <td align="left">
                    <div class="system-tag">Powered by System</div>
                    <div class="brand-name">SCHOOL-MATE</div>
                </td>
                <td align="right">
                    <span class="gen-id-box">ID: {{ $reportId }}</span>
                    <div class="timestamp">
                        Generated on: {{ date('M d, Y | h:i A') }}
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
