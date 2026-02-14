@extends('layouts.app')

@section('title', 'School Mate | School Information')

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
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            animation: fadeInDown 0.8s ease;
        }

        .header h1 {
            font-size: 2.5em;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        /* Payment Plan - Compact */
        .payment-compact {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 0.8s ease;
        }

        .payment-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
        }

        .payment-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .payment-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .payment-title h3 {
            font-size: 1.3em;
            color: #2d3748;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .status-active {
            background: rgba(72, 187, 120, 0.2);
            color: #22543d;
            border: 2px solid #48bb78;
        }

        .status-warning {
            background: rgba(237, 137, 54, 0.2);
            color: #7c2d12;
            border: 2px solid #ed8936;
            animation: pulse 2s infinite;
        }

        .status-expired {
            background: rgba(245, 101, 101, 0.2);
            color: #742a2a;
            border: 2px solid #f56565;
            animation: shake 0.5s infinite;
        }

        .payment-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .payment-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .payment-label {
            font-size: 0.8em;
            font-weight: 600;
            color: #667eea;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .payment-value {
            font-size: 1.05em;
            color: #2d3748;
            font-weight: 600;
            padding: 8px 12px;
            background: #f7fafc;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
        }

        .countdown-compact {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .time-box-compact {
            background: #f7fafc;
            padding: 8px 15px;
            border-radius: 10px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            border: 2px solid #e2e8f0;
        }

        .time-value-compact {
            font-size: 1.3em;
            font-weight: 700;
            color: #2d3748;
        }

        .time-label-compact {
            font-size: 0.7em;
            color: #718096;
            text-transform: uppercase;
        }

        /* School Info Card - Main */
        .school-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #667eea;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card-header-left {
            display: flex;
            align-items: center;
        }

        .card-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 26px;
        }

        .card-title {
            font-size: 1.8em;
            font-weight: 600;
            color: #2d3748;
        }

        .card-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 12px 25px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .edit-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .export-btn {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
        }

        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(72, 187, 120, 0.4);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.85em;
            font-weight: 600;
            color: #667eea;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 1.15em;
            color: #2d3748;
            padding: 14px 18px;
            background: #f7fafc;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            font-weight: 500;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 35px;
            max-width: 900px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.3s ease;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
        }

        .modal-title {
            font-size: 1.8em;
            font-weight: 600;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .close-btn {
            background: #f56565;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5em;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background: #c53030;
            transform: rotate(90deg);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-item {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-size: 0.85em;
            font-weight: 600;
            color: #667eea;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .form-input {
            font-size: 1.1em;
            color: #2d3748;
            padding: 14px 18px;
            background: #f7fafc;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .save-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .save-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
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

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        /* Scrollbar styling for modal */
        .modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #764ba2;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .modal {
                display: none !important;
            }

            .card-actions {
                display: none !important;
            }

            .container {
                max-width: 100%;
            }

            .payment-compact,
            .school-card {
                box-shadow: none;
                page-break-inside: avoid;
            }
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .payment-info {
                grid-template-columns: 1fr;
            }

            .info-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-actions {
                width: 100%;
            }

            .action-btn {
                flex: 1;
                justify-content: center;
            }

            .modal-content {
                width: 95%;
                padding: 25px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        // Open edit modal
        function openEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('show');

            const schoolName = document.getElementById('school_name').textContent.trim();
            const censusNumber = document.getElementById('census_number').textContent.trim();
            const schoolID = document.getElementById('school_id').textContent.trim();
            const phoneNumber = document.getElementById('phone_number').textContent.trim();
            const postalAddress = document.getElementById('school_postal_address').textContent.trim();
            const schoolType = document.getElementById('school_type').textContent.trim();

            document.getElementById('edit_school_name').value = schoolName;
            document.getElementById('edit_census_number').value = censusNumber;
            document.getElementById('edit_school_id').value = schoolID;
            document.getElementById('edit_phone_number').value = phoneNumber;
            document.getElementById('edit_school_postal_address').value = postalAddress;
            // document.getElementById('edit_school_type').value = schoolType;
        }

        // Close edit modal
        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.remove('show');
        }


        // Show success message
        // alert('✅ Changes saved successfully!');

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('editModal');
            if (event.target == modal) {
                closeEditModal();
            }
        }

        // Update countdown timer
        function updateCountdown() {

            // Blade date eka string ekak widihata ganna
            const expireDateString = "{{ $user->school->payment_expire }}";

            // JS Date object ekak hadanna
            const expireDate = new Date(expireDateString + "T23:59:59");

            const now = new Date();
            const difference = expireDate - now;

            if (difference <= 0) {
                document.getElementById('days').textContent = 0;
                document.getElementById('hours').textContent = 0;
                document.getElementById('minutes').textContent = 0;
                document.getElementById('seconds').textContent = 0;

                document.getElementById('statusBadge').innerHTML =
                    '<span class="status-badge status-expired">⚠️ EXPIRED</span>';

                return;
            }

            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;

            const statusBadge = document.getElementById('statusBadge');

            if (days <= 7) {
                statusBadge.innerHTML =
                    '<span class="status-badge status-expired">🔴 CRITICAL - Renew Now!</span>';
            } else if (days <= 30) {
                statusBadge.innerHTML =
                    '<span class="status-badge status-warning">⚡ Expiring Soon</span>';
            } else {
                statusBadge.innerHTML =
                    '<span class="status-badge status-active">✅ Active</span>';
            }
        }

        window.onload = function() {
            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
    </script>
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')

        <div class="container">

            <div class="header">
                <h1>🎓 School Learning Management System</h1>
                <p>School Information Dashboard</p>
            </div>

            <!-- Payment Plan - Compact -->
            <div class="payment-compact">
                <div class="payment-header">
                    <div class="payment-title">
                        <div class="payment-icon">💳</div>
                        <h3>Payment Plan</h3>
                    </div>
                    <div id="statusBadge"></div>
                </div>

                <div class="payment-info">
                    <div class="payment-item">
                        <span class="payment-label">Plan Name</span>
                        <div class="payment-value">{{ $user->school->paymentPlane->plan_name }}</div>
                    </div>

                    <div class="payment-item">
                        <span class="payment-label">Start Date</span>
                        <div class="payment-value">{{ $user->school->payment_start }}</div>
                    </div>

                    <div class="payment-item">
                        <span class="payment-label">Expire Date</span>
                        <div class="payment-value">{{ $user->school->payment_expire }}</div>
                    </div>

                    <div class="payment-item">
                        <span class="payment-label">Time Remaining</span>
                        <div class="countdown-compact" id="countdown">
                            <div class="time-box-compact">
                                <span class="time-value-compact" id="days">0</span>
                                <span class="time-label-compact">Days</span>
                            </div>
                            <div class="time-box-compact">
                                <span class="time-value-compact" id="hours">0</span>
                                <span class="time-label-compact">Hrs</span>
                            </div>
                            <div class="time-box-compact">
                                <span class="time-value-compact" id="minutes">0</span>
                                <span class="time-label-compact">Min</span>
                            </div>
                            <div class="time-box-compact">
                                <span class="time-value-compact" id="seconds">0</span>
                                <span class="time-label-compact">Sec</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- School Information - Main Card -->
            <div class="school-card">
                <div class="card-header">
                    <div class="card-header-left">
                        <div class="card-icon">🏫</div>
                        <div class="card-title">School Information</div>
                    </div>
                    <div class="card-actions">
                        @if (auth()->user()->role->role_name === 'Supper Admin')
                            <button class="action-btn edit-btn" onclick="openEditModal()">
                                ✏️ Edit
                            </button>
                        @endif
                        <button class="action-btn export-btn"
                            onclick="window.location='{{ Route('settings.schoolInformationPdf') }}'">
                            📄 Export to PDF
                        </button>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <label class="info-label">School Name</label>
                        <div class="info-value" id="school_name">{{ $user->school->school_name }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">Census Number</label>
                        <div class="info-value" id="census_number">{{ $user->school->census_number }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">School ID</label>
                        <div class="info-value" id="school_id">{{ $user->school->school_id }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">Phone Number</label>
                        <div class="info-value" id="phone_number">{{ $user->school->phone_number }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">Postal Address</label>
                        <div class="info-value" id="school_postal_address">{{ $user->school->school_postal_address }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">Division</label>
                        <div class="info-value" id="division">{{ $user->school->division->division_name }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">School Type</label>
                        <div class="info-value" id="school_type">{{ $user->school->schoolType->school_type_name }}</div>
                    </div>

                    <div class="info-item">
                        <label class="info-label">School Status</label>

                        <div class="info-value" id="school_status">{{ $user->school->status->status_name }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        ✏️ Edit School Information
                    </div>
                    <button class="close-btn" onclick="closeEditModal()">×</button>
                </div>

                <form id="editForm" action="{{ route('settings.schoolInformationUpdate') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-item">
                            <label class="form-label">School Name</label>
                            <input type="text" class="form-input" id="edit_school_name" name="school_name" required>
                        </div>

                        <div class="form-item">
                            <label class="form-label">Census Number</label>
                            <input type="text" class="form-input" id="edit_census_number" name="census_number"
                                required>
                        </div>

                        <div class="form-item">
                            <label class="form-label">School ID</label>
                            <input type="text" class="form-input" id="edit_school_id" name="school_id" required>
                        </div>

                        <div class="form-item">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-input" id="edit_phone_number" name="phone_number"
                                required>
                        </div>

                        <div class="form-item">
                            <label class="form-label">Postal Address</label>
                            <input type="text" class="form-input" id="edit_school_postal_address"
                                name="school_postal_address" required>
                        </div>

                        <div class="form-item">
                            <label class="form-label">School Type</label>
                            <select name="school_type" id="" class=" form-input" required>
                                @foreach ($schoolTypes as $schoolType)
                                    <option value="{{ $schoolType->id }}"
                                        @if ($schoolType->id == $user->school->school_type) selected @endif>
                                        {{ $schoolType->school_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="save-btn">
                        💾 Save Changes
                    </button>
                </form>
            </div>
        </div>
    </body>
    <br>
@endsection
