@extends('layouts.app')

@section('title', 'School Mate | Edit Student')

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

        /* Container */
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
            margin-bottom: 25px;
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
        }

        .breadcrumb-current {
            color: white;
            font-weight: 500;
        }

        /* Edit Header */
        .edit-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .student-avatar-edit {
            position: relative;
        }

        .avatar-display {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            font-weight: bold;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .avatar-change-btn {
            position: absolute;
            bottom: -5px;
            right: -5px;
            background: white;
            border: 3px solid #667eea;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            color: #667eea;
            font-weight: 500;
        }

        .avatar-change-btn:hover {
            transform: scale(1.1);
            background: #667eea;
            color: white;
        }

        .header-info {
            color: white;
        }

        .page-title {
            font-size: 2rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .title-icon {
            font-size: 1.8rem;
        }

        .student-info {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 5px;
        }

        .admission-info {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        /* Form Tabs */
        .form-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow-x: auto;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-tab {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: 2px solid transparent;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            position: relative;
        }

        .form-tab:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .form-tab.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .tab-icon {
            font-size: 1.1rem;
        }

        .tab-status {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            margin-left: 5px;
        }

        .tab-status.complete {
            background: #10b981;
            color: white;
        }

        /* Form Content */
        .form-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease;
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

        .form-tab-content {
            display: none;
        }

        .form-tab-content.active {
            display: block;
            animation: slideIn 0.4s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Form Section */
        .form-section {
            margin-bottom: 35px;
            padding: 25px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(249, 250, 251, 0.9));
            border-radius: 15px;
            border: 1px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .form-section:hover {
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.3rem;
            color: #374151;
            margin-bottom: 25px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(102, 126, 234, 0.2);
        }

        .section-icon {
            font-size: 1.5rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .form-group {
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-label.required::after {
            content: ' *';
            color: #ef4444;
        }

        .field-hint {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: normal;
            margin-left: 8px;
        }

        /* Input Wrapper */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            font-size: 1.2rem;
            z-index: 1;
        }

        .input-icon.textarea-icon {
            top: 15px;
            align-self: flex-start;
        }

        /* Form Input */
        .form-input {
            width: 100%;
            padding: 12px 16px 12px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input:hover {
            border-color: #9ca3af;
        }

        .form-input.disabled {
            background: #f3f4f6;
            color: #6b7280;
            cursor: not-allowed;
            opacity: 0.7;
        }

        /* Textarea */
        .form-textarea {
            min-height: 100px;
            resize: vertical;
            padding-top: 12px;
        }

        /* Select */
        select.form-input {
            appearance: none;
            padding-right: 40px;
            cursor: pointer;
        }

        .select-arrow {
            position: absolute;
            right: 15px;
            color: #6b7280;
            pointer-events: none;
            transition: transform 0.3s ease;
        }

        .input-wrapper:focus-within .select-arrow {
            transform: rotate(180deg);
            color: #667eea;
        }

        /* Checkbox Group */
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            padding: 15px;
            background: #f9fafb;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox-item:hover {
            transform: translateX(5px);
        }

        .checkbox-item input[type="checkbox"] {
            display: none;
        }

        .checkbox-custom {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            margin-right: 10px;
            position: relative;
            transition: all 0.3s ease;
        }

        .checkbox-item input[type="checkbox"]:checked+.checkbox-custom {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-color: #667eea;
        }

        .checkbox-item input[type="checkbox"]:checked+.checkbox-custom::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 0.8rem;
        }

        .checkbox-label {
            color: #374151;
            font-size: 0.95rem;
        }

        /* Field Error */
        .field-error {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        /* Document Upload Area */
        .document-upload-area {
            padding: 20px;
            background: #f9fafb;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .upload-zone {
            border: 2px dashed #d1d5db;
            border-radius: 10px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .upload-zone:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
            transform: translateY(-2px);
        }

        .upload-zone.dragging {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }

        .upload-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .upload-zone h4 {
            color: #374151;
            margin-bottom: 8px;
        }

        .upload-zone p {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .uploaded-files-list {
            margin-top: 20px;
            display: grid;
            gap: 10px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            bottom: 20px;
            z-index: 100;
        }

        .actions-left,
        .actions-right {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        /* Buttons */
        .btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
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

        .btn-secondary {
            background: rgba(107, 114, 128, 0.1);
            color: #374151;
            border: 2px solid rgba(107, 114, 128, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(107, 114, 128, 0.2);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.6);
        }

        .btn-icon {
            font-size: 1.1rem;
        }

        /* Loading State */
        .form-loading {
            position: relative;
            pointer-events: none;
            opacity: 0.6;
        }

        .form-loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 40px;
            height: 40px;
            border: 4px solid #f3f4f6;
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Success Message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.4);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideInRight 0.5s ease;
            z-index: 1000;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-left {
                flex-direction: column;
                align-items: center;
                text-align: center;
                width: 100%;
            }

            .page-title {
                font-size: 1.6rem;
            }

            .form-tabs {
                overflow-x: auto;
                gap: 8px;
            }

            .form-tab {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
                gap: 15px;
                position: relative;
                bottom: 0;
            }

            .actions-left,
            .actions-right {
                width: 100%;
                justify-content: center;
            }

            .btn {
                flex: 1;
                justify-content: center;
            }
        }

        @media screen and (max-width: 480px) {
            .page-title {
                font-size: 1.4rem;
            }

            .form-tab .tab-text {
                display: none;
            }

            .form-section {
                padding: 20px 15px;
            }

            .section-title {
                font-size: 1.1rem;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        // Form tab switching
        function switchFormTab(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.form-tab-content').forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all tabs
            document.querySelectorAll('.form-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabId).classList.add('active');

            // Add active class to clicked tab
            event.currentTarget.classList.add('active');

            // Update tab status
            updateTabStatus(event.currentTarget);
        }

        // Update tab completion status
        function updateTabStatus(tab) {
            const tabContent = document.getElementById(tab.getAttribute('onclick').match(/'([^']+)'/)[1]);
            const requiredFields = tabContent.querySelectorAll('[required]');
            let isComplete = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    isComplete = false;
                }
            });

            const statusElement = tab.querySelector('.tab-status');
            if (isComplete && requiredFields.length > 0) {
                statusElement.classList.add('complete');
                statusElement.textContent = '✓';
            }
        }

        // Show success message
        function showSuccessMessage(message) {
            const successDiv = document.createElement('div');
            successDiv.className = 'success-message';
            successDiv.innerHTML = `
                <span>✅</span>
                <span>${message}</span>
            `;
            document.body.appendChild(successDiv);

            setTimeout(() => {
                successDiv.remove();
            }, 5000);
        }

        // Delete confirmation
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this student? This action cannot be undone.')) {
                // Handle delete action
                console.log('Delete student');
            }
        }

        // Save as draft
        function saveAsDraft() {
            showSuccessMessage('Saved as draft successfully!');
        }

        // File upload handling
        const uploadZone = document.querySelector('.upload-zone');
        const fileInput = document.getElementById('documents');

        if (uploadZone && fileInput) {
            // Click to upload
            uploadZone.addEventListener('click', () => {
                fileInput.click();
            });

            // Drag and drop
            uploadZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadZone.classList.add('dragging');
            });

            uploadZone.addEventListener('dragleave', () => {
                uploadZone.classList.remove('dragging');
            });

            uploadZone.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadZone.classList.remove('dragging');

                const files = e.dataTransfer.files;
                handleFiles(files);
            });

            fileInput.addEventListener('change', (e) => {
                handleFiles(e.target.files);
            });
        }

        function handleFiles(files) {
            console.log('Files selected:', files.length);
            // Handle file upload logic here
        }

        // Real-time validation
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value) {
                    this.style.borderColor = '#ef4444';
                    const error = this.parentElement.nextElementSibling;
                    if (error && error.classList.contains('field-error')) {
                        error.style.display = 'block';
                    }
                } else {
                    this.style.borderColor = '';
                    const error = this.parentElement.nextElementSibling;
                    if (error && error.classList.contains('field-error')) {
                        error.style.display = 'none';
                    }
                }
            });
        });

        // Avatar change
        document.querySelector('.avatar-change-btn')?.addEventListener('click', (e) => {
            e.stopPropagation();
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.onchange = (e) => {
                const file = e.target.files[0];
                if (file) {
                    console.log('New avatar selected:', file.name);
                    // Handle avatar upload
                }
            };
            input.click();
        });

        // Auto-save functionality
        let autoSaveTimer;
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('input', () => {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(() => {
                    console.log('Auto-saving...');
                    // Implement auto-save logic here
                }, 2000);
            });
        });
    </script>
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')

        <!-- Edit Student Page Content -->
        <div class="container">
            <!-- Edit Form Header -->
            <div class="edit-header">
                <div class="header-content">
                    <div class="header-left">
                        <div class="student-avatar-edit">
                            <div class="avatar-display">
                                @php
                                    $words = explode(' ', $student->child_name); // Name -> words array
                                    $firstTwoWords = array_slice($words, 0, 2); // Get first 2 words
                                    $firstLetters = '';
                                    foreach ($firstTwoWords as $word) {
                                        $firstLetters .= mb_substr($word, 0, 1); // Get first letter of each word
                                    }
                                @endphp
                                <span>{{ $firstLetters }}</span>
                            </div>
                            {{-- <button class="avatar-change-btn">
                            <span class="change-icon">📷</span>
                            Change Photo
                        </button> --}}
                        </div>
                        <div class="header-info">
                            <h1 class="page-title">
                                <span class="title-icon">✏️</span>
                                {{ $student->child_name }}
                            </h1>
                            <p class="student-info">{{ $student->full_name_with_initials }}</p>
                            <p class="admission-info">Admission No: {{ $student->admission_number }} </p>
                        </div>
                    </div>
                    {{-- <div class="header-actions">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                        <span class="btn-icon">❌</span>
                        Cancel
                    </button>
                    <button type="submit" form="edit-student-form" class="btn btn-primary">
                        <span class="btn-icon">💾</span>
                        Save Changes
                    </button>
                </div> --}}
                </div>
            </div>

            <!-- Edit Form -->
            <form id="edit-student-form" action="{{ route('students.studentUpdate', $student->id) }}" method="POST">
                @csrf

                <!-- Tab Navigation -->
                <div class="form-tabs">
                    <button type="button" class="form-tab active" onclick="switchFormTab('basic-info')">
                        <span class="tab-icon">👤</span>
                        <span class="tab-text">Basic Information</span>
                        <span class="tab-status complete">✓</span>
                    </button>
                    <button type="button" class="form-tab" onclick="switchFormTab('academic-info')">
                        <span class="tab-icon">🎓</span>
                        <span class="tab-text">Academic Details</span>
                        <span class="tab-status"></span>
                    </button>
                    <button type="button" class="form-tab" onclick="switchFormTab('guardian-info')">
                        <span class="tab-icon">👨‍👩‍👦</span>
                        <span class="tab-text">Guardian Information</span>
                        <span class="tab-status"></span>
                    </button>
                    <button type="button" class="form-tab" onclick="switchFormTab('medical-info')">
                        <span class="tab-icon">🏥</span>
                        <span class="tab-text">Medical & Other</span>
                        <span class="tab-status"></span>
                    </button>
                </div>

                <!-- Form Content -->
                <div class="form-content">
                    <!-- Basic Information Tab -->
                    <div id="basic-info" class="form-tab-content active">
                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">📝</span>
                                Personal Information
                            </h3>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label required">
                                        Admission Number
                                        <span class="field-hint">Cannot be changed</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🆔</span>
                                        <input type="text" class="form-input disabled"
                                            value="{{ $student->admission_number }}" name="studentAdmissionNumber" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">Student Name</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">👤</span>
                                        <input type="text" class="form-input" value="{{ $student->child_name }}"
                                            name="child_name" required placeholder="Enter student name">
                                    </div>
                                    <span class="field-error" style="display: none;">Please enter student name</span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">Status</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🎫</span>
                                        <select class="form-input" name="student_status_id" required>
                                            @foreach ($studentStatues as $studentStatus)
                                                <option value="{{ $studentStatus->id }}"
                                                    {{ $student->student_status_id == $studentStatus->id ? 'selected' : '' }}>
                                                    {{ $studentStatus->student_status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                <div class="form-group full-width">
                                    <label class="form-label required">Full Name with Initials</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">📋</span>
                                        <input type="text" class="form-input"
                                            value="{{ $student->full_name_with_initials }}" name="full_name_with_initials"
                                            required placeholder="e.g., K.H. Perera">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">Date of Birth</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">📅</span>
                                        <input type="date" class="form-input" value="{{ $student->date_of_birth }}"
                                            name="date_of_birth" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">Gender</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">⚧</span>
                                        <select class="form-input" name="gender_id" required>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}"
                                                    {{ $student->grade_id == $gender->id ? 'selected' : '' }}>
                                                    {{ $gender->gender }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label required">Blood Type</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🩸</span>
                                        <select class="form-input" name="blood_type_id" required>
                                            <option value="">Select Blood Type</option>
                                            @foreach ($bloodTypes as $bloodType)
                                                <option value="{{ $bloodType->id }}"
                                                    {{ $student->blood_type_id == $bloodType->id ? 'selected' : '' }}>
                                                    {{ $bloodType->blood_type }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                <div class="form-group full-width">
                                    <label class="form-label required">Address</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon textarea-icon">🏠</span>
                                        <textarea class="form-input form-textarea" name="address" rows="3" required
                                            placeholder="Enter complete address">{{ $student->address }}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">📧</span>
                                    <input 
                                        type="email" 
                                        class="form-input" 
                                        value="email"
                                        name="studentEmail"
                                        placeholder="student@example.com"
                                    >
                                </div>
                            </div> --}}

                                <div class="form-group">
                                    <label class="form-label required">Contact Number</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">📱</span>
                                        <input type="tel" class="form-input"
                                            value="{{ $student->telephone_number }}" name="telephone_number" required
                                            placeholder="077-1234567">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Academic Information Tab -->
                    <div id="academic-info" class="form-tab-content">
                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">🎓</span>
                                Academic Information
                            </h3>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label required">Grade</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">📚</span>
                                        <select class="form-input" name="grade_id" required>
                                            <option value="">Select Grade</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    {{ $student->grade_id == $grade->id ? 'selected' : '' }}>
                                                    {{ $grade->grade }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label class="form-label required">Class</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🏫</span>
                                        <input type="text" class="form-input"
                                            value="{{ $studentData->student_class }}" name="studentClass" required
                                            placeholder="e.g., A / B / C">
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group">
                                <label class="form-label">Section</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">📑</span>
                                    <select class="form-input" name="studentSection">
                                        <option value="">Select Section</option>
                                        <option value="Science">Science</option>
                                        <option value="Commerce">Commerce</option>
                                        <option value="Arts">Arts</option>
                                    </select>
                                    <span class="select-arrow">▼</span>
                                </div>
                            </div> --}}

                                <div class="form-group">
                                    <label class="form-label required">Mode of Transport</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🚌</span>
                                        <select class="form-input" name="transport_id" required>
                                            <option value="">Select Transport Mode</option>
                                            @foreach ($transports as $transport)
                                                <option value="{{ $transport->id }}"
                                                    {{ $student->transport_id == $transport->id ? 'selected' : '' }}>
                                                    {{ $transport->transport_methord }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Special Skills</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">⭐</span>
                                        <select class="form-input" name="skill_id">
                                            <option value="">Select Special Skills</option>
                                            @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}"
                                                    {{ $student->skill_id == $skill->id ? 'selected' : '' }}>
                                                    {{ $skill->skill }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Government Assistance</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🏛️</span>
                                        <select class="form-input" name="assistance_id">
                                            <option value="">Select Assistance Type</option>
                                            @foreach ($assistances as $assistance)
                                                <option value="{{ $assistance->id }}"
                                                    {{ $student->assistance_id == $assistance->id ? 'selected' : '' }}>
                                                    {{ $assistance->assistance }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="select-arrow">▼</span>
                                    </div>
                                </div>

                                {{-- <div class="form-group full-width">
                                <label class="form-label">Extra-Curricular Activities</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="activities[]" value="sports">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-label">Sports</span>
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="activities[]" value="music">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-label">Music</span>
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="activities[]" value="art">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-label">Art</span>
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="activities[]" value="drama">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-label">Drama</span>
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="activities[]" value="debate">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-label">Debate</span>
                                    </label>
                                    <label class="checkbox-item">
                                        <input type="checkbox" name="activities[]" value="science">
                                        <span class="checkbox-custom"></span>
                                        <span class="checkbox-label">Science Club</span>
                                    </label>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Guardian Information Tab -->
                    <div id="guardian-info" class="form-tab-content">
                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">👨‍👩‍👦</span>
                                Parent/Guardian Information
                            </h3>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label required">Father's Name</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">👨</span>
                                        <input type="text" class="form-input" value="{{ $student->father_name }}"
                                            name="father_name" required placeholder="Enter father's name">
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                <label class="form-label">Father's Occupation</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">💼</span>
                                    <input type="text" class="form-input" value="FArmer"
                                        name="studentFathersOccupation" placeholder="Enter occupation">
                                </div>
                            </div> --}}

                                <div class="form-group">
                                    <label class="form-label required">Mother's Name</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">👩</span>
                                        <input type="text" class="form-input" value="{{ $student->mother_name }}"
                                            name="mother_name" required placeholder="Enter mother's name">
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                <label class="form-label">Mother's Occupation</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">💼</span>
                                    <input type="text" class="form-input" value="hw"
                                        name="studentMothersOccupation" placeholder="Enter occupation">
                                </div>
                            </div> --}}

                                <div class="form-group">
                                    <label class="form-label required">Guardian's Name</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">👤</span>
                                        <input type="text" class="form-input" value="{{ $student->guardian_name }}"
                                            name="guardian_name" required placeholder="Enter guardian's name">
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                <label class="form-label">Relationship to Student</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">🤝</span>
                                    <select class="form-input" name="guardianRelationship">
                                        <option value="">Select Relationship</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Uncle">Uncle</option>
                                        <option value="Aunt">Aunt</option>
                                        <option value="Grandparent">Grandparent</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="select-arrow">▼</span>
                                </div>
                            </div> --}}

                                {{-- <div class="form-group">
                                <label class="form-label required">Guardian Contact</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">📞</span>
                                    <input type="tel" class="form-input" value="0785757575" name="guardianContact"
                                        required placeholder="071-1234567">
                                </div>
                            </div> --}}

                                {{-- <div class="form-group">
                                <label class="form-label">Emergency Contact</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">🚨</span>
                                    <input type="tel" class="form-input" value="0712022111" name="emergencyContact"
                                        placeholder="Emergency contact number">
                                </div>
                            </div> --}}

                                <div class="form-group full-width">
                                    <label class="form-label">Guardian's Address</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon textarea-icon">📍</span>
                                        <textarea class="form-input form-textarea" name="guardian_address" rows="3"
                                            placeholder="Enter guardian's address">{{ $student->guardian_address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Information Tab -->
                    <div id="medical-info" class="form-tab-content">
                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">🏥</span>
                                Medical Information
                            </h3>

                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="form-label">Medical Conditions</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon textarea-icon">💊</span>
                                        <textarea class="form-input form-textarea" name="special_medical_conditions" rows="3"
                                            placeholder="Enter any medical conditions, allergies, or medications">{{ $student->special_medical_conditions }}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                <label class="form-label">Doctor's Name</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">👨‍⚕️</span>
                                    <input type="text" class="form-input" value="chandani" name="doctorName"
                                        placeholder="Family doctor's name">
                                </div>
                            </div> --}}

                                {{-- <div class="form-group">
                                <label class="form-label">Doctor's Contact</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">📞</span>
                                    <input type="tel" class="form-input" value="0909090808" name="doctorContact"
                                        placeholder="Doctor's contact number">
                                </div>
                            </div> --}}
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <span class="section-icon">👨‍👩‍👧‍👦</span>
                                Sibling Information
                            </h3>

                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="form-label">Sibling Details</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon textarea-icon">👥</span>
                                        <textarea class="form-input form-textarea" name="sibling_details" rows="4"
                                            placeholder="Enter details about siblings (names, ages, schools, etc.)">{{ $student->sibling_details }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-section">
                        <h3 class="section-title">
                            <span class="section-icon">📄</span>
                            Document Upload
                        </h3>

                        <div class="document-upload-area">
                            <div class="upload-zone" onclick="document.getElementById('documents').click()">
                                <div class="upload-icon">📁</div>
                                <h4>Drop files here or click to upload</h4>
                                <p>Supported formats: PDF, JPG, PNG (Max 5MB each)</p>
                                <input type="file" id="documents" name="documents[]" multiple hidden
                                    accept=".pdf,.jpg,.jpeg,.png">
                            </div>

                            <div class="uploaded-files-list">
                                <!-- Existing documents would be listed here -->
                            </div>
                        </div>
                    </div> --}}
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <div class="actions-right">
                        <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                            <span class="btn-icon">❌</span>
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span class="btn-icon">✅</span>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
@endsection
