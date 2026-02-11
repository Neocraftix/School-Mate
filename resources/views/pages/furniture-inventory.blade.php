@extends('layouts.app')

@section('title', 'School Mate | Furniture Inventory')

@push('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.7);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            animation: fadeInDown 0.6s ease;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            font-weight: 700;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 25px;
            animation: fadeInUp 0.6s ease;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }

        .btn {
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-success-gradient {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        .btn-success-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(17, 153, 142, 0.4);
            color: white;
        }

        .btn-warning-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .btn-warning-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(240, 147, 251, 0.4);
            color: white;
        }

        .table-responsive {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table thead th {
            border: none;
            padding: 15px;
            font-weight: 600;
            white-space: nowrap;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            animation: slideIn 0.4s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .badge-new {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .badge-good {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .badge-damaged {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .badge-active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .badge-repair {
            background: linear-gradient(135deg, #ffa751 0%, #ffe259 100%);
        }

        .badge-disposed {
            background: linear-gradient(135deg, #868f96 0%, #596164 100%);
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stats-card .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .stats-card h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0;
        }

        .stats-card p {
            color: #6c757d;
            margin: 0;
            font-weight: 600;
        }

        .action-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 3px;
            font-size: 0.9rem;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .btn-edit {
            background: #4facfe;
            color: white;
        }

        .btn-delete {
            background: #f5576c;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            animation: modalSlideIn 0.3s ease;
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 20px 25px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-body {
            padding: 25px;
        }

        .modal-footer {
            border-top: none;
            padding: 0 25px 25px 25px;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8rem;
            }

            .header p {
                font-size: 0.95rem;
            }

            .stats-card {
                margin-bottom: 15px;
            }

            .table {
                font-size: 0.85rem;
            }

            .action-btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        let editingIndex = -1;
        const modal = new bootstrap.Modal(document.getElementById('addFurnitureModal'));

        // Reset modal on close
        document.getElementById('addFurnitureModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('furnitureForm').reset();
            editingIndex = -1;
            document.getElementById('modalTitle').innerHTML =
                '<i class="fas fa-plus-circle me-2"></i>Add New Furniture';
        });

        $(document).ready(function() {

            $('#main_category').on('change', function() {

                let mainCategoryId = $(this).val();
                let subCategorySelect = $('#sub_category');

                // reset
                subCategorySelect.html('<option value="">Loading...</option>');

                if (mainCategoryId === '') {
                    subCategorySelect.html('<option value="">Select Sub Category</option>');
                    return;
                }

                $.ajax({
                    url: "{{ url('/get-sub-categories') }}/" + mainCategoryId,
                    type: 'GET',
                    success: function(response) {

                        let options = '<option value="">Select Sub Category</option>';

                        $.each(response, function(index, subCat) {
                            options += `<option value="${subCat.id}">
                                    ${subCat.category_name}
                               </option>`;
                        });

                        subCategorySelect.html(options);
                    },
                    error: function() {
                        subCategorySelect.html(
                            '<option value="">Failed to load</option>'
                        );
                    }
                });
            });

        });

        function editFurniture(furnitureID) {
            // modal element eka ganna
            const modalElement = document.getElementById('updateFurnitureModal');

            const furnitureQuantity = document.getElementById('furnitureQuantity' + furnitureID).innerText;
            const furnitureLocation = document.getElementById('furnitureLocation' + furnitureID).innerText;
            const furnitureName = document.getElementById('furnitureName' + furnitureID).innerText;

            const updateQuantity = document.getElementById('updateQuantity').value = furnitureQuantity;
            const updateLocation = document.getElementById('updateLocation').value = furnitureLocation;
            const updateFurnitureName = document.getElementById('updateFurnitureName').innerHTML = furnitureName;
            const updateFurnitureId = document.getElementById('updateFurnitureId').value = furnitureID;

            // bootstrap modal instance eka hadala show karanawa
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    </script>
@endpush

@push('link')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')

        <div class="container">
            <!-- Header -->
            <div class="header">
                <h1>🪑 Furniture Inventory Management System</h1>
                <p>Track and Manage Your Furniture Assets Efficiently</p>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="icon" style="color: #667eea;">📊</div>
                        <h3 id="totalItems">5</h3>
                        <p>Total Items</p>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="icon" style="color: #11998e;">✅</div>
                        <h3 id="activeItems">4</h3>
                        <p>Active Items</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="icon" style="color: #ffa751;">🔧</div>
                        <h3 id="repairItems">1</h3>
                        <p>Under Repair</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card">
                        <div class="icon" style="color: #f5576c;">⚠️</div>
                        <h3 id="damagedItems">1</h3>
                        <p>Damaged</p>
                    </div>
                </div> --}}
            </div>

            <!-- Search & Filter Section -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    {{-- <span><i class="fas fa-search me-2"></i>Search & Filter</span> --}}
                    <button class="btn btn-success-gradient btn-sm mt-2 mt-md-0" data-bs-toggle="modal"
                        data-bs-target="#addFurnitureModal">
                        <i class="fas fa-plus me-2"></i>Add New Furniture
                    </button>

                    <button class="btn btn-success-gradient btn-sm mt-2 mt-md-0"
                        onclick="window.location='{{ route('furniture.pdf') }}'">
                        📊 </i>Generate Report
                    </button>
                </div>
                {{-- <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="searchInput"
                                placeholder="🔍 Search by name, location, supplier...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="categoryFilter">
                                <option value="">📁 All Categories</option>
                                <option value="Classroom">Classroom</option>
                                <option value="Lab">Lab</option>
                                <option value="Office">Office</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">🏷️ All Status</option>
                                <option value="Active">Active</option>
                                <option value="Under Repair">Under Repair</option>
                                <option value="Disposed">Disposed</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-gradient w-100" onclick="clearFilters()">
                                <i class="fas fa-redo me-2"></i>Clear
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Inventory Table -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <span><i class="fas fa-table me-2"></i>Furniture Inventory</span>
                    {{-- <button class="btn btn-warning-gradient btn-sm mt-2 mt-md-0" onclick="generateReport()">
                        <i class="fas fa-file-pdf me-2"></i>Generate Report
                    </button> --}}
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($furnitures as $furniture)
                                    <tr>
                                        <td>{{ $furniture->id }}</td>
                                        <td>
                                            <strong
                                                id="furnitureName{{ $furniture->id }}">{{ $furniture->furniture_name }}<strong>
                                        </td>
                                        <td>{{ $furniture->subCategory->category_name }}</td>
                                        <td id="furnitureQuantity{{ $furniture->id }}"><span
                                                class="badge bg-secondary">{{ $furniture->quantity }}</span></td>
                                        <td id="furnitureLocation{{ $furniture->id }}">{{ $furniture->location }}</td>
                                        <td>{{ $furniture->purchase_date }}</td>
                                        <td>{{ $furniture->warranty }} months</td>
                                        <td>{{ $furniture->supplier }}</td>
                                        <td>
                                            <button class="action-btn btn-edit"
                                                onclick="editFurniture({{ $furniture->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('furniture.delete', $furniture->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action-btn btn-delete mt-1">
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
        </div>

        <!-- Add/Edit Furniture Modal -->
        <div class="modal fade" id="addFurnitureModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <form action="{{ route('furniture.store') }}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">
                                <i class="fas fa-plus-circle me-2"></i>Add New Furniture
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="furnitureForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Furniture Name</label>
                                        <input type="text" class="form-control" id="furnitureName"
                                            placeholder="e.g., Wooden Desk" name="furnitureName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Main Category</label>
                                        <select class="form-select" id="main_category" required>
                                            <option value="">Select Main Category</option>
                                            @foreach ($mainCategories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Sub Category</label>
                                        <select class="form-select" id="sub_category" name="sub_category" required>
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            placeholder="0" min="1" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            placeholder="e.g., Grade 10A" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Purchase Date</label>
                                        <input type="date" class="form-control" id="purchaseDate" name="purchaseDate"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Warranty Period (months)</label>
                                        <input type="number" class="form-control" id="warranty" name="warranty"
                                            placeholder="12" min="0">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Supplier</label>
                                        <input type="text" class="form-control" id="supplier" name="supplier"
                                            placeholder="Supplier Name">
                                    </div>
                                    {{-- <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" id="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Active">✅ Active</option>
                                        <option value="Under Repair">🔧 Under Repair</option>
                                        <option value="Disposed">🗑️ Disposed</option>
                                    </select>
                                </div> --}}
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-success-gradient">
                                <i class="fas fa-save me-2"></i>Save Furniture
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="updateFurnitureModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('furniture.update') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateFurnitureName">
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="text" name="updateFurnitureId" class="d-none" id="updateFurnitureId">
                                <div class="col-md-6">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="updateQuantity" name="updateQuantity"
                                        placeholder="0" min="1" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" id="updateLocation" name="updateLocation"
                                        placeholder="e.g., Grade 10A" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-success-gradient">
                                <i class="fas fa-save me-2"></i>Update Furniture
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
