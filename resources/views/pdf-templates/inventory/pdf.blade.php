<!DOCTYPE html>
<html>

<head>
    <title>Inventory List</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="text-center">Inventory List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Purchase Date</th>
                <th>Warranty Expiry</th>
                <th>Supplier</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $inventory->category->name ?? '' }}</td>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ $inventory->unit }}</td>
                    <td>{{ $inventory->purchase_date }}</td>
                    <td>{{ $inventory->warranty_expiry }}</td>
                    <td>{{ $inventory->supplier->supplier_name ?? '' }}</td>
                    <td>{{ $inventory->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
