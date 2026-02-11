@extends('layouts.app')

@section('title', 'School Mate | Inventory Management')

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush


@push('style')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .main-container {
            padding: 30px 15px;
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .header-title {
            color: #764ba2;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-subtitle {
            color: #667eea;
            font-size: 1rem;
        }

        .control-panel {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            border-radius: 50px;
            padding: 12px 50px 12px 20px;
            border: 2px solid #667eea;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            border-color: #764ba2;
        }

        .search-box .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-green-custom {
            background: linear-gradient(135deg, #2563eb 0%, #1e3a8a 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
        }

        .btn-green-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.6);
        }


        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-outline-custom {
            border: 2px solid #667eea;
            color: #667eea;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-2px);
        }

        .filter-select {
            border-radius: 50px;
            border: 2px solid #667eea;
            padding: 10px 20px;
        }

        .inventory-table-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
        }

        .inventory-table {
            margin-bottom: 0;
        }

        .inventory-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .inventory-table thead th {
            border: none;
            padding: 18px 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .inventory-table tbody tr {
            transition: all 0.3s ease;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .inventory-table tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            transform: scale(1.01);
        }

        .inventory-table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e0e0e0;
        }

        .badge-category {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-low {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        }

        .badge-medium {
            background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
        }

        .badge-high {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .btn-action {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s ease;
            margin: 0 3px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .btn-edit:hover {
            transform: rotate(15deg) scale(1.1);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-delete:hover {
            transform: rotate(-15deg) scale(1.1);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.4);
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 20px 30px;
        }

        .modal-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .stats-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #667eea;
        }

        .empty-state i {
            font-size: 5rem;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 1.5rem;
            }

            .control-panel {
                padding: 15px;
            }

            .btn-primary-custom,
            .btn-outline-custom {
                padding: 10px 20px;
                font-size: 0.9rem;
                margin-bottom: 10px;
                width: 100%;
            }

            .inventory-table {
                font-size: 0.85rem;
            }

            .inventory-table thead th,
            .inventory-table tbody td {
                padding: 10px 8px;
            }
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateInventory(inventoryID) {
            // modal element eka ganna
            const modalElement = document.getElementById('updateModal');

            const inventorieName = document.getElementById('inventorieName' + inventoryID).innerText;
            const inventorieQuantity = document.getElementById('inventorieQuantity' + inventoryID).innerText;
            const inventorieUnit = document.getElementById('inventorieUnit' + inventoryID).innerText;
            const inventorieWarranty_expiry = document.getElementById('inventorieWarranty_expiry' + inventoryID).innerText;
            const inventorieLocation = document.getElementById('inventorieLocation' + inventoryID).innerText;


            document.getElementById('updateIteminventoryId').value = inventoryID;
            document.getElementById('updateItemName').value = inventorieName;
            document.getElementById('updateItemQuantity').value = inventorieQuantity;
            document.getElementById('updateItemUnit').value = inventorieUnit;
            document.getElementById('updateItemWarrantyExpiry').value = inventorieWarranty_expiry;
            document.getElementById('updateItemLocation').value = inventorieLocation;

            // bootstrap modal instance eka hadala show karanawa
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    </script>
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')

        <div class="container-fluid main-container">
            <!-- Header Section -->
            <div class="header-section">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="header-title">Inventory System</h1>

                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addItemModal">
                            <i class="fas fa-plus-circle me-2"></i>Add New Item
                        </button>
                        <br><br>
                        <button class="btn btn-green-custom" onclick="window.location='{{ route('inventories.pdf') }}'">
                            📊 </i>Generate Report
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            {{-- <div class="row mb-4">
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="fas fa-boxes text-white"></i>
                        </div>
                        <h3 class="mb-1" id="totalItems">0</h3>
                        <p class="text-muted mb-0">Total Items</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <h3 class="mb-1" id="inStock">0</h3>
                        <p class="text-muted mb-0">In Stock</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <h3 class="mb-1" id="lowStock">0</h3>
                        <p class="text-muted mb-0">Low Stock</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stats-card">
                        <div class="stats-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                            <i class="fas fa-layer-group text-white"></i>
                        </div>
                        <h3 class="mb-1" id="categories">0</h3>
                        <p class="text-muted mb-0">Categories</p>
                    </div>
                </div>
            </div> --}}

            <!-- Control Panel -->
            {{-- <div class="control-panel">
                <div class="row g-3">
                    <div class="col-md-5">
                        <div class="search-box">
                            <input type="text" class="form-control" id="searchInput"
                                placeholder="Search items by name, category, or supplier...">
                            <i class="fas fa-search search-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select filter-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="Glassware">Glassware</option>
                            <option value="Chemicals">Chemicals</option>
                            <option value="Equipment">Equipment</option>
                            <option value="Consumables">Consumables</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select filter-select" id="stockFilter">
                            <option value="">All Stock</option>
                            <option value="high">High Stock</option>
                            <option value="medium">Medium Stock</option>
                            <option value="low">Low Stock</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-custom w-100" onclick="generateReport()">
                            <i class="fas fa-file-pdf me-2"></i>Report
                        </button>
                    </div>
                </div>
            </div> --}}

            <!-- Inventory Table -->
            <div class="inventory-table-container" id="inventory-table">
                <div class="table-responsive">
                    <table class="table inventory-table">
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
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inventoryTableBody">
                            @foreach ($inventories as $inventorie)
                                <tr>
                                    <td id="inventorieName{{ $inventorie->id }}"><strong>{{ $inventorie->name }}</strong>
                                    </td>
                                    <td><span class="badge-category">{{ $inventorie->category->name }}</span></td>
                                    <td id="inventorieQuantity{{ $inventorie->id }}">{{ $inventorie->quantity }}</td>
                                    <td id="inventorieUnit{{ $inventorie->id }}">{{ $inventorie->unit }}</td>
                                    <td>{{ $inventorie->purchase_date }}</td>
                                    <td id="inventorieWarranty_expiry{{ $inventorie->id }}">
                                        {{ $inventorie->warranty_expiry }}</td>
                                    <td>{{ $inventorie->supplier->supplier_name }}</td>
                                    <td id="inventorieLocation{{ $inventorie->id }}">{{ $inventorie->location }}</td>
                                    <td class="text-center">
                                        <button class="btn-action btn-edit" title="Edit"
                                            onclick="updateInventory({{ $inventorie->id }})" style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('inventories.destroy', $inventorie->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-action btn-delete" title="Delete" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add/Edit Item Modal -->
        <div class="modal fade" id="addItemModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">
                            <i class="fas fa-plus-circle me-2"></i>Add New Inventory Item
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('inventories.store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="editIndex">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Item Name *</label>
                                    <input type="text" class="form-control" id="itemName" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Category *</label>
                                    <select class="form-select" id="itemCategory" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Quantity *</label>
                                    <input type="number" class="form-control" id="itemQuantity" min="0"
                                        name="quantity">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Unit *</label>
                                    <input type="text" class="form-control" id="itemUnit"
                                        placeholder="e.g., pcs, ml, kg" name="unit">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Purchase Date *</label>
                                    <input type="date" class="form-control" id="itemPurchaseDate" name="purchase_date">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Warranty Expiry</label>
                                    <input type="date" class="form-control" id="itemWarrantyExpiry"
                                        name="warranty_expiry">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Supplier *</label>
                                    <select class="form-select" id="" name="supplier_id" required>
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Location *</label>
                                    <input type="text" class="form-control" id="itemLocation"
                                        placeholder="e.g., Room A, Shelf 3" name="location">
                                </div>
                            </div>
                            <div class="mt-4 text-end">
                                <button type="button" class="btn btn-outline-custom me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-save me-2"></i>Save Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalTitle">
                            <i class="fas fa-plus-circle me-2"></i>Update Inventory Item
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('inventories.update') }}" method="POST">
                            @csrf
                            <input type="hidden" id="editIndex">
                            <div class="row g-3">
                                <input type="text" name="inventoryId" id="updateIteminventoryId" name="inventoryId"
                                    class="d-none">
                                <div class="col-md-6">
                                    <label class="form-label">Item Name *</label>
                                    <input type="text" class="form-control" id="updateItemName" name="updateName"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Quantity *</label>
                                    <input type="number" class="form-control" id="updateItemQuantity" min="0"
                                        name="updateQuantity">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Unit *</label>
                                    <input type="text" class="form-control" id="updateItemUnit"
                                        placeholder="e.g., pcs, ml, kg" name="updateUnit">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Warranty Expiry</label>
                                    <input type="date" class="form-control" id="updateItemWarrantyExpiry"
                                        name="updateWarranty_expiry">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location *</label>
                                    <input type="text" class="form-control" id="updateItemLocation"
                                        placeholder="e.g., Room A, Shelf 3" name="Updatelocation">
                                </div>
                            </div>
                            <div class="mt-4 text-end">
                                <button type="button" class="btn btn-outline-custom me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-save me-2"></i>update Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
