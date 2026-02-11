@extends('layouts.app')

@section('title', 'School Mate | Teachers')

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
        }


        /* Container Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .breadcrumb-link {
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.3s ease;
        }

        .breadcrumb-link:hover {
            color: white;
        }

        .breadcrumb-separator {
            color: rgba(255, 255, 255, 0.6);
            margin: 0 5px;
        }

        .breadcrumb-current {
            color: white;
            font-weight: 500;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-content h1 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .header-content p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 25px;
        }

        .header-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        /* Main Card */
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Action Bar */
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.4);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 187, 120, 0.6);
        }

        .btn-secondary {
            background: rgba(107, 114, 128, 0.1);
            color: #374151;
            border: 1px solid rgba(107, 114, 128, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(107, 114, 128, 0.2);
            transform: translateY(-1px);
        }

        .btn-icon {
            font-size: 1rem;
        }

        .filter-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-select {
            min-width: 150px;
        }

        /* Search Section */
        .search-section {
            margin-bottom: 25px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 4px;
            transition: border-color 0.3s ease;
        }

        .search-bar:focus-within {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-icon {
            padding: 12px 15px;
            color: #9ca3af;
            font-size: 1.1rem;
        }

        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 12px 0;
            font-size: 1rem;
            outline: none;
            color: #374151;
        }

        .search-input::placeholder {
            color: #9ca3af;
        }

        .search-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Table Styles */
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            margin-bottom: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.9rem;
        }

        .data-table td {
            padding: 16px 12px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }

        .data-table tr:hover {
            background: #f8fafc;
        }

        .checkbox-all,
        .row-checkbox {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .student-id {
            font-family: 'Courier New', monospace;
            background: #f3f4f6;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #6b7280;
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .student-details {
            display: flex;
            flex-direction: column;
        }

        .student-name {
            font-weight: 600;
            color: #374151;
            margin-bottom: 2px;
        }

        .student-email {
            font-size: 0.8rem;
            color: #6b7280;
        }

        .grade-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            color: white;
        }

        .grade-9 {
            background: linear-gradient(135deg, #f093fb, #f5576c);
        }

        .grade-10 {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .grade-11 {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }

        .class-badge {
            background: #f3f4f6;
            color: #374151;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .contact-info {
            font-family: 'Courier New', monospace;
            color: #6b7280;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-badge.active {
            background: #dcfce7;
            color: #166534;
        }

        .status-badge.inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons-table {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-action.view {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .btn-action.view:hover {
            background: rgba(59, 130, 246, 0.2);
            transform: scale(1.1);
        }

        .btn-action.edit {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .btn-action.edit:hover {
            background: rgba(245, 158, 11, 0.2);
            transform: scale(1.1);
        }

        .btn-action.delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .btn-action.delete:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: scale(1.1);
        }

        /* Form Controls */
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-large {
            max-width: 800px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 30px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-header h2 {
            color: #374151;
            font-size: 1.5rem;
            margin: 0;
        }

        .modal-close {
            width: 32px;
            height: 32px;
            border: none;
            background: #f3f4f6;
            color: #6b7280;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: #e5e7eb;
            color: #374151;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 20px 30px;
            border-top: 1px solid #e5e7eb;
            background: #f8fafc;
        }

        /* Form Sections */
        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            color: #374151;
            font-size: 1.2rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e5e7eb;
        }

        /* Tabs */
        .form-tabs {
            display: flex;
            margin-bottom: 25px;
            border-bottom: 1px solid #e5e7eb;
        }

        .tab-btn {
            padding: 12px 24px;
            border: none;
            background: transparent;
            color: #6b7280;
            font-weight: 500;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            color: #667eea;
            border-bottom-color: #667eea;
        }

        .tab-btn:hover {
            color: #374151;
        }

        .tab-content {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Upload Area */
        .upload-area {
            margin-bottom: 25px;
        }

        .upload-zone {
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .upload-zone:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .upload-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .upload-zone h3 {
            color: #374151;
            margin-bottom: 8px;
        }

        .upload-zone p {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .file-input {
            display: none;
        }

        /* CSV Requirements */
        .csv-requirements {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .csv-requirements h4 {
            color: #075985;
            margin-bottom: 12px;
        }

        .csv-requirements ul {
            color: #0c4a6e;
            margin-left: 20px;
        }

        .csv-requirements li {
            margin-bottom: 8px;
        }

        .download-template {
            width: 100%;
        }

        /* Manual Entry */
        .manual-entry-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .manual-students-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .student-entry {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            background: #f8fafc;
        }

        .entry-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .entry-header h5 {
            color: #374151;
            margin: 0;
        }

        .btn-remove {
            width: 24px;
            height: 24px;
            border: none;
            background: #fee2e2;
            color: #dc2626;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .btn-remove:hover {
            background: #fecaca;
        }

        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .action-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .action-buttons {
                justify-content: center;
            }

            .header-stats {
                gap: 15px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .modal-content {
                margin: 20px;
                max-width: none;
            }

            .data-table {
                font-size: 0.85rem;
            }

            .data-table th,
            .data-table td {
                padding: 10px 8px;
            }

            .pagination-section {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }

        @media screen and (max-width: 480px) {
            .header-content h1 {
                font-size: 2rem;
            }

            .student-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .action-buttons-table {
                flex-direction: column;
                gap: 4px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        function deleteStudent(studentId, studentName) {
            if (confirm(`Are you sure you want to delete student ${studentName} ?`)) {
                window.location.href = `{{ url('/delete-student/${studentId}') }}`;
                // alert(`Student ${studentName} deleted`);
            }
        }
    </script>
@endpush

@push('link')
    <!-- In your main layout <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')

        <!-- Students Page Content -->
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="header-content">
                    <h1>👨‍🎓 Teacher Management</h1>
                    <p>Manage teacher information, enrollment, and academic records</p>
                </div>
                <div class="header-stats">
                    <div class="stat-card">
                        <div class="stat-number">1,245</div>
                        <div class="stat-label">Total Teachers</div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="main-card">
                <!-- Action Buttons -->
                <div class="action-bar">
                    <div class="action-buttons">
                        <button class="btn btn-primary" onclick="showModal('add-student-modal')">
                            <span class="btn-icon">➕</span>
                            Add Teacher
                        </button>
                        <button class="btn btn-success" onclick="showModal('bulk-add-modal')">
                            <span class="btn-icon">📊</span>
                            Bulk Add Teacher
                        </button>

                        <button class="btn btn-secondary"
                            onclick="window.location='{{ route('teachers.teacherGenarateReportIndex') }}'">
                            <span class="btn-icon">📥</span>
                            Generate Report
                        </button>
                    </div>

                    {{-- <div class="filter-section">
                        <select class="form-control filter-select">
                            <option value="">All Grades</option>

                            <option value="">1</option>

                        </select>
                    </div> --}}
                </div>

                <!-- Search Bar -->
                <div class="search-section">
                    <div class="search-bar">
                        <span class="search-icon">🔍</span>
                        <input type="text" class="search-input" placeholder="Search students by name, ID, or class...">
                        <button class="search-btn">Search</button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>N.I.C</th>
                                <th>Name</th>
                                <th>Date Of Birth</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="students-table">
                            @forelse ($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->nic }}</td>
                                    <td>
                                        <div class="student-info">
                                            <div class="student-avatar">{{ strtoupper(substr($teacher->full_name, 0, 1)) }}
                                            </div>
                                            <div class="student-details">
                                                <div class="student-name">{{ $teacher->full_name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span>
                                            {{ $teacher->dob }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="contact-info">{{ $teacher->phone }}</span>
                                    </td>
                                    <td>
                                        <span class="status-badge">{{ $teacher->teacherStatus->name }}</span>
                                    </td>
                                    <td>
                                        <div class="action-buttons-table">
                                            <form action="{{ route('teachers.teacherDetails', $teacher->id) }}"
                                                method="get">
                                                <button type="submit" class="btn-action view" title="View">👁️</button>
                                            </form>
                                            <form action="{{ route('teachers.teacherUpdateIndex', $teacher->id) }}"
                                                method="get">
                                                <button type="submit" class="btn-action edit" title="Edit">✏️ </button>
                                            </form>
                                            <form action="{{ route('teachers.teacherDelete', $teacher->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-action delete" title="Delete">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Teachers found</td>
                                </tr>
                            @endforelse
                            {{-- 
                            <tr>
                                <td colspan="6" class="text-center">No students found</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination-section">
                    <div class="pagination-controls">
                        {{ $teachers->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Student Modal -->
        <div class="modal" id="add-student-modal">
            <div class="modal-overlay" onclick="closeModal('add-student-modal')"></div>
            <div class="modal-content">


                <div class="modal-header">
                    <h2>➕ Add New Teacher</h2>
                    <button type="button" class="modal-close" onclick="closeModal('add-student-modal')">✕</button>
                </div>
                <form action="{{ route('teachers.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        {{-- BASIC INFO --}}
                        <div class="form-section">
                            <h3>Personal Information</h3>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Title *</label>
                                    <select name="title_id" class="form-control" required>
                                        <option value="">Select Title</option>
                                        @foreach ($titles as $title)
                                            <option value="{{ $title->id }}">{{ $title->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Full Name *</label>
                                    <input type="text" name="full_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Full Name with Initials *</label>
                                    <input type="text" name="name_with_initials" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>NIC *</label>
                                    <input type="text" name="nic" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Date of Birth *</label>
                                    <input type="date" name="dob" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Ethnicity *</label>
                                    <select name="ethnicity_id" class="form-control" required>
                                        <option value="">Select Ethnicity</option>
                                        @foreach ($ethnicityes as $ethnicitye)
                                            <option value="{{ $ethnicitye->id }}">{{ $ethnicitye->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Gender *</label>
                                    <select name="gender_id" class="form-control" required>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Religion *</label>
                                    <select name="religion_id" class="form-control" required>
                                        <option value="">Select Religion</option>
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address Permanent</label>
                                <textarea name="address_permanent" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Address Temporary </label>
                                <textarea name="address_temporary" class="form-control"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>District *</label>
                                    <select name="district_id" class="form-control" required>
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">
                                                {{ trim(str_ireplace('zone', '', $district->zone_name)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>DS Division *</label>
                                    <input type="text" name="ds_division" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>GS Division *</label>
                                    <input type="text" name="gs_division" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        {{-- Family --}}
                        <div class="form-section">
                            <h3>Family Information</h3>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Civil Status *</label>
                                    <select name="civil_status_id" class="form-control" required>
                                        <option value="">Select Civil Status</option>

                                        @foreach ($civilStatuses as $civilStatus)
                                            <option value="{{ $civilStatus->id }}">{{ $civilStatus->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name of Spouse</label>
                                    <input type="text" name="spouse_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Names of the Children</label>
                                    <input type="text" name="children_names" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Date of Birth of the Children </label>
                                    <input type="text" name="children_dobs" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- Qualifications --}}
                        <div class="form-section">
                            <h3>Qualifications Information</h3>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>NCOE</label>
                                    <input type="text" name="ncoe" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Degree</label>
                                    <input type="text" name="degree" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>AL</label>
                                    <input type="text" name="al" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Diploma</label>
                                    <input type="text" name="diploma" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Other</label>
                                    <input type="text" name="other" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- SUBJECT INFO --}}
                        {{-- <div class="form-section">
                            <h3>Subject Information</h3>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Appointed Subject *</label>
                                    <input type="text" name="" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Most Teaching Subject 01 *</label>
                                    <input type="text" name="" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Most Teaching Subject 02 *</label>
                                    <input type="text" name="" class="form-control" required>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">💾 Add Teacher</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bulk Add Students Modal -->
        <div class="modal" id="bulk-add-modal">
            <div class="modal-overlay" onclick="closeModal('bulk-add-modal')"></div>
            <div class="modal-content modal-large">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h2>📊 Bulk Add Teachers</h2>
                        <button class="modal-close" onclick="closeModal('bulk-add-modal')">✕</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-tabs">
                            <button type="button" class="tab-btn active" onclick="switchTab('csv-upload')">
                                📥 Excel Upload
                            </button>
                            {{-- <button type="button" class="tab-btn" onclick="switchTab('manual-entry')">
                        ✏️ Manual Entry
                    </button> --}}
                        </div>

                        <div id="csv-upload" class="tab-content">

                            <div class="upload-area">
                                <div class="upload-zone" onclick="document.getElementById('excelFile').click()">
                                    <div class="upload-icon">📁</div>
                                    <h3>Drop Excel file here or click to browse</h3>
                                    <p>Supported format: .xlsx files only</p>
                                    <input type="file" id="excelFile" class="file-input" accept=".xlsx" hidden
                                        name="excelFile">
                                </div>
                            </div>

                            <div class="csv-requirements">
                                <h4>Excel Format Requirements:</h4>
                                <ul>
                                    <li>Admission Number, Student Name, Full Name with Initials, Gender, Date of Birth, Mode
                                        of
                                        Transport to School, Sibling Details , Address, Mother’s Name, Father’s Name,
                                        Guardian’s
                                        Name, Guardian’s Address, Telephone Number, Child’s Blood Type, . Any Special
                                        Medical
                                        Conditions, Special Skills, Government Assistance, Current Grade, Class</li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-secondary download-template"
                                    onclick="window.location.href=''">
                                    <span class="btn-icon">📥</span>
                                    Download Sample Excel Template
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal('bulk-add-modal')">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span class="btn-icon">🚀</span>
                            Process Teacher
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
