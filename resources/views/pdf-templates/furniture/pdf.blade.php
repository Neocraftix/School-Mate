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
    <h2 class="text-center">Furnitures List</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Furniture Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Purchase Date</th>
                <th>Warranty</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($furnitures as $furniture)
                <tr>
                    <td>{{ $furniture->id }}</td>
                    <td>
                        <strong id="furnitureName{{ $furniture->id }}">{{ $furniture->furniture_name }}<strong>
                    </td>
                    <td>{{ $furniture->subCategory->category_name }}</td>
                    <td id="furnitureQuantity{{ $furniture->id }}"><span
                            class="badge bg-secondary">{{ $furniture->quantity }}</span></td>
                    <td id="furnitureLocation{{ $furniture->id }}">{{ $furniture->location }}</td>
                    <td>{{ $furniture->purchase_date }}</td>
                    <td>{{ $furniture->warranty }} months</td>
                    <td>{{ $furniture->supplier }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
