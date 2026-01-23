@extends('layouts.app')

@section('title', 'School Mate | Teacher Report Generator')

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

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header */
        .page-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
            animation: slideDown 0.6s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 8px 40px rgba(102, 126, 234, 0.4);
            }
        }

        .header-text h1 {
            color: white;
            font-size: 2rem;
            margin-bottom: 5px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .header-text p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        /* Filter Section */
        .filter-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            font-size: 1.4rem;
            color: #374151;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .title-icon {
            font-size: 1.5rem;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            color: #374151;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .label-icon {
            font-size: 1rem;
            color: #667eea;
        }

        .form-input,
        .form-select {
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
            color: #374151;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23667eea' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 20px;
            padding-right: 45px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-search {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.6);
        }

        .btn-generate {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }

        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
        }

        .btn-reset {
            background: rgba(107, 114, 128, 0.1);
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-reset:hover {
            background: rgba(107, 114, 128, 0.2);
            border-color: #9ca3af;
            transform: translateY(-2px);
        }

        .btn-icon {
            font-size: 1.2rem;
        }

        /* Results Section */
        .results-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease;
            display: none;
        }

        .results-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .results-count {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .results-count span {
            font-weight: 700;
            color: #667eea;
            font-size: 1.1rem;
        }

        .export-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-export {
            padding: 10px 18px;
            border: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-export.excel {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-export.pdf {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-export:hover {
            transform: translateY(-2px);
        }

        /* Table */
        .table-container {
            overflow-x: auto;
            border-radius: 15px;
            border: 1px solid #e5e7eb;
            animation: slideUp 0.8s ease;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .data-table thead {
            background: linear-gradient(135deg, #667eea, #764ba2);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .data-table th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: white;
            font-size: 0.95rem;
            white-space: nowrap;
        }

        .data-table tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.3s ease;
        }

        .data-table tbody tr:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            transform: scale(1.01);
        }

        .data-table td {
            padding: 16px;
            color: #374151;
            font-size: 0.9rem;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge.male {
            background: rgba(59, 130, 246, 0.1);
            color: #1d4ed8;
        }

        .badge.female {
            background: rgba(236, 72, 153, 0.1);
            color: #be185d;
        }

        .badge.public {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .badge.private {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .badge.receiving {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .badge.not-receiving {
            background: rgba(107, 114, 128, 0.1);
            color: #4b5563;
        }

        .badge.active {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .badge.inactive {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 40px;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            width: 50px;
            height: 50px;
            margin: 0 auto 15px;
            border: 4px solid #e5e7eb;
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .loading-text {
            color: #6b7280;
            font-size: 1rem;
        }

        /* Empty State */
        .empty-state {
            display: none;
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state.active {
            display: block;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-text {
            color: #6b7280;
            font-size: 1.1rem;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .filters-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .results-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .export-buttons {
                width: 100%;
            }

            .btn-export {
                flex: 1;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .data-table {
                font-size: 0.85rem;
            }

            .data-table th,
            .data-table td {
                padding: 12px 8px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        function resetFilters() {
            document.getElementById('admissionNumber').value = '';
            document.getElementById('childName').value = '';
            document.getElementById('gender').value = '';
            document.getElementById('transport').value = '';
            document.getElementById('bloodType').value = '';
            document.getElementById('specialSkills').value = '';
            document.getElementById('govAssistance').value = '';
            document.getElementById('grade').value = '';
            document.getElementById('teacherStatus').value = '';

            document.getElementById('resultsSection').classList.remove('active');
        }

        function exportToPDF() {
            const printContents = document.getElementById('tableContainer').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = `
            <html>
                <head>
                    <title>Print teachers</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        table, th, td {
                            border: 1px solid #000;
                        }
                        th, td {
                            padding: 8px;
                            text-align: left;
                        }
                    </style>
                </head>
                <body>
                    ${printContents}
                </body>
            </html>
        `;

            window.print();
            window.location.reload(); // page eka normal widihata ganna
        }
    </script>
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        <!-- Massage -->
        @extends('components.massage')

        <div class="container">
            <!-- Header -->
            <div class="page-header">
                <div class="header-content">
                    <div class="header-icon">📊</div>
                    <div class="header-text">
                        <h1>Teacher Report Generator</h1>
                        <p>Generate comprehensive teacher reports with advanced filtering</p>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <form method="POST" action="{{ route('teachers.teacherGanarateReportFilter') }}">
                    @csrf
                    <h2 class="section-title">
                        <span class="title-icon">🔍</span>
                        Filter Criteria
                    </h2>

                    <div class="filters-grid">
                        <div class="form-group">
                            <label class="form-label">🆔 N.I.C</label>
                            <input type="text" class="form-input" id="nic" name="nic" value=""
                                placeholder="Enter NIC number">
                        </div>

                        <div class="form-group">
                            <label class="form-label">👤 Teacher Name</label>
                            <input type="text" class="form-input" id="full_name" name="full_name" value=""
                                placeholder="Enter teacher name">
                        </div>

                        <div class="form-group">
                            <label class="form-label">👪 Ethnicity</label>
                            <select class="form-select" id="ethnicity" name="ethnicity">
                                <option value="">All Ethnicity</option>
                                @foreach ($ethnicityes as $ethnicity)
                                    <option value="{{ $ethnicity->id }}">{{ $ethnicity->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">⚧ Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">All Genders</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label class="form-label">☸️ Religion</label>
                            <select class="form-select" id="religion" name="religion">
                                <option value="">All Religion</option>
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">📍 District</label>
                            <select class="form-select" id="district" name="district">
                                <option value="">All District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->zone_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">💑 Civil Status</label>
                            <select class="form-select" id="civilStatus" name="civilStatus">
                                <option value="">All</option>
                                @foreach ($civilStatuses as $civilStatus)
                                    <option value="{{ $civilStatus->id }}">{{ $civilStatus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn btn-search" type="submit">
                            <span class="btn-icon">🔍</span>
                            Search teachers
                        </button>
                        {{-- <button class="btn btn-generate" onclick="generateReport()">
                            <span class="btn-icon">📄</span>
                            Generate Report
                        </button> --}}
                        <button class="btn btn-reset" onclick="resetFilters()">
                            <span class="btn-icon">🔄</span>
                            Reset Filters
                        </button>
                    </div>
                </form>
            </div>




            <div class="filter-section">
                <form method="POST" action="{{ route('teachers.retirement') }}">
                    @csrf
                    <h2 class="section-title">
                        <span class="title-icon">🔍</span>
                        Find Retirement
                    </h2>

                    <div class="filters-grid">
                        <div class="form-group">
                            <label class="form-label">📅 Date</label>
                            <input type="date" class="form-input" id="retire_date" name="retire_date">
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn btn-search" type="submit">
                            <span class="btn-icon">🔍</span>
                            Search teachers
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results Section -->
            <div class="results-section active" id="resultsSection">
                <div class="results-header">
                    {{-- <div class="results-count">
                        Found <span id="resultCount">0</span> teachers
                    </div> --}}
                    <div class="export-buttons">
                        {{-- <button class="btn-export excel" onclick="exportToExcel()">
                            📊 Export to Excel
                        </button> --}}
                        <button class="btn-export pdf" onclick="exportToPDF()">
                            📑 Export to PDF
                        </button>
                    </div>
                </div>

                {{-- <div class="loading" id="loadingState">
                    <div class="spinner"></div>
                    <div class="loading-text">Loading teacher data...</div>
                </div>

                <div class="empty-state" id="emptyState">
                    <div class="empty-icon">📭</div>
                    <div class="empty-text">No teachers found matching your criteria</div>
                </div> --}}

                <div class="table-container" id="tableContainer">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>N.I.C</th>
                                <th>Name</th>
                                <th>Ethnicity</th>
                                <th>Gender</th>
                                <th>Religion</th>
                                <th>District</th>
                                <th>Civil Status</th>
                                <th>Date Of Birth</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td><strong>{{ $teacher->nic }}</strong></td>
                                    <td>{{ $teacher->full_name }}</td>
                                    <td>{{ $teacher->ethnicity->name }}</td>
                                    <td><span class="badge">{{ $teacher->gender->gender }}</span></td>
                                    <td>{{ $teacher->religion->name }}</td>
                                    <td><span class="badge">{{ $teacher->district->zone_name }}</span></td>
                                    <td>{{ $teacher->civilStatus->name }}</td>
                                    <td><span>{{ $teacher->dob }}</span></td>
                                    <td><span>{{ $teacher->teacherStatus->name }}</span></td>
                                    <td>

                                        <form action="{{ route('teachers.teacherDetails', $teacher->id) }}"
                                            method="get">
                                            <button type="submit" class="btn-action view" title="View">👁️</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
@endsection
