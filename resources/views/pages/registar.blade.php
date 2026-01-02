@extends('layouts.app')

@section('title', 'School Mate | Registration')

@push('link')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush

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
            overflow-x: hidden;
        }

        /* Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape-3 {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .shape-4 {
            width: 100px;
            height: 100px;
            top: 10%;
            right: 30%;
            animation-delay: 1s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Main Container */
        .registration-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .registration-wrapper {
            max-width: 1400px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 60px 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            font-size: 4rem;
            margin-bottom: 15px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            60%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            80% {
                transform: translateY(-5px);
            }
        }

        .logo-section h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .logo-section p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .features-list {
            margin-bottom: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(10px);
        }

        .feature-icon {
            font-size: 2rem;
            margin-right: 20px;
            min-width: 60px;
        }

        .feature-text h4 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .feature-text p {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .stats-section {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 40px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Form Section */
        .form-section {
            padding: 60px 40px;
            background: white;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Progress Indicator */
        .progress-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e7eb;
            color: #9ca3af;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }

        .progress-step.active .step-number {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: scale(1.1);
        }

        .step-label {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
        }

        .progress-step.active .step-label {
            color: #667eea;
            font-weight: 600;
        }

        .progress-line {
            width: 60px;
            height: 2px;
            background: #e5e7eb;
            margin: 0 10px;
        }

        /* Form Steps */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: slideIn 0.3s ease;
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

        .step-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .step-header h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 8px;
        }

        .step-header p {
            color: #666;
        }

        /* Form Controls */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
        }

        .input-wrapper,
        .select-wrapper,
        .textarea-wrapper {
            position: relative;
        }

        .input-icon,
        .select-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1rem;
            color: #9ca3af;
            z-index: 2;
        }

        .textarea-wrapper .input-icon {
            top: 20px;
            transform: none;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        select.form-control {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            appearance: none;
        }

        /* Password Field */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-bar {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .strength-fill {
            height: 100%;
            border-radius: 2px;
            transition: all 0.3s ease;
            width: 0%;
        }

        .strength-fill.weak {
            background: #ef4444;
            width: 25%;
        }

        .strength-fill.fair {
            background: #f59e0b;
            width: 50%;
        }

        .strength-fill.good {
            background: #10b981;
            width: 75%;
        }

        .strength-fill.strong {
            background: #059669;
            width: 100%;
        }

        .strength-text {
            font-size: 0.8rem;
            color: #6b7280;
        }

        /* Buttons */
        .step-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
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

        .btn-next {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            margin-left: auto;
        }

        .btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-back {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-back:hover {
            background: #e5e7eb;
            transform: translateY(-1px);
        }

        .btn-icon {
            font-size: 1.1rem;
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-icon {
            font-size: 1.2rem;
        }

        /* Footer */
        .form-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e5e7eb;
        }

        .login-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        .security-note {
            margin-top: 15px;
            font-size: 0.9rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .security-icon {
            font-size: 1.1rem;
        }

        /* Mobile Responsive */
        @media screen and (max-width: 1024px) {
            .registration-wrapper {
                grid-template-columns: 1fr;
                max-width: 600px;
            }

            .welcome-section {
                padding: 40px 30px;
            }

            .stats-section {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .form-section {
                padding: 40px 30px;
            }
        }

        @media screen and (max-width: 768px) {
            .registration-container {
                padding: 15px;
            }

            .welcome-section {
                padding: 30px 20px;
            }

            .form-section {
                padding: 30px 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .step-navigation {
                flex-direction: column;
                gap: 15px;
            }

            .btn-back {
                order: 2;
            }

            .btn-next,
            .btn-primary {
                order: 1;
            }

            .progress-indicator {
                flex-direction: column;
                gap: 15px;
            }

            .progress-line {
                display: none;
            }

            .stats-section {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media screen and (max-width: 480px) {
            .form-header h1 {
                font-size: 2rem;
            }

            .logo-section h2 {
                font-size: 2rem;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .stats-section {
                grid-template-columns: 1fr;
            }

            .feature-item {
                padding: 15px;
            }

            .feature-icon {
                margin-right: 15px;
                min-width: 50px;
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            // Province → Zones
            $('#provinceSelect').change(function() {
                let provinceId = $(this).val();

                $('#zoneSelect').html('<option>Loading...</option>');
                $('#divisionSelect').html('<option>Select Education Division</option>');

                if (provinceId) {
                    $.ajax({
                        url: '/get-zones/' + provinceId,
                        type: 'GET',
                        success: function(data) {
                            $('#zoneSelect').html(
                                '<option value="">Select Education Zone</option>');
                            $.each(data, function(key, zone) {
                                $('#zoneSelect').append(
                                    '<option value="' + zone.id + '">' + zone
                                    .zone_name + '</option>'
                                );
                            });
                        }
                    });
                }
            });

            // Zone → Divisions
            $('#zoneSelect').change(function() {
                let zoneId = $(this).val();

                $('#divisionSelect').html('<option>Loading...</option>');

                if (zoneId) {
                    $.ajax({
                        url: '/get-divisions/' + zoneId,
                        type: 'GET',
                        success: function(data) {
                            $('#divisionSelect').html(
                                '<option value="">Select Education Division</option>');
                            $.each(data, function(key, division) {
                                $('#divisionSelect').append(
                                    '<option value="' + division.id + '">' +
                                    division.division_name + '</option>'
                                );
                            });
                        }
                    });
                }
            });

        });

        let currentStep = 1;
        const totalSteps = 3;

        // Step Navigation
        function nextStep() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    document.getElementById(`step${currentStep}`).classList.remove('active');
                    currentStep++;
                    document.getElementById(`step${currentStep}`).classList.add('active');
                    updateProgressIndicator();
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateProgressIndicator();
            }
        }

        function updateProgressIndicator() {
            for (let i = 1; i <= totalSteps; i++) {
                const step = document.querySelector(`.progress-step:nth-child(${i * 2 - 1})`);
                if (i <= currentStep) {
                    step.classList.add('active');
                } else {
                    step.classList.remove('active');
                }
            }
        }

        // Form Validation
        function validateCurrentStep() {
            const currentStepElement = document.getElementById(`step${currentStep}`);
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#ef4444';
                    field.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.1)';
                    isValid = false;

                    // Remove error styling after user starts typing
                    field.addEventListener('input', function() {
                        this.style.borderColor = '#e5e7eb';
                        this.style.boxShadow = '';
                    }, {
                        once: true
                    });
                } else {
                    field.style.borderColor = '#e5e7eb';
                    field.style.boxShadow = '';
                }
            });

            if (!isValid) {
                // Scroll to first invalid field
                const firstInvalidField = currentStepElement.querySelector(
                    '[required]:invalid, [required][style*="border-color: rgb(239, 68, 68)"]');
                if (firstInvalidField) {
                    firstInvalidField.focus();
                    firstInvalidField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }

            return isValid;
        }

        // Password Strength Checker
        function checkPasswordStrength(password) {
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');

            if (!password) {
                strengthFill.className = 'strength-fill';
                strengthText.textContent = 'Enter password';
                return;
            }

            let score = 0;
            const checks = {
                length: password.length >= 8,
                lowercase: /[a-z]/.test(password),
                uppercase: /[A-Z]/.test(password),
                numbers: /\d/.test(password),
                symbols: /[^A-Za-z0-9]/.test(password)
            };

            score = Object.values(checks).filter(Boolean).length;

            if (score < 2) {
                strengthFill.className = 'strength-fill weak';
                strengthText.textContent = 'Weak password';
                strengthText.style.color = '#ef4444';
            } else if (score < 3) {
                strengthFill.className = 'strength-fill fair';
                strengthText.textContent = 'Fair password';
                strengthText.style.color = '#f59e0b';
            } else if (score < 5) {
                strengthFill.className = 'strength-fill good';
                strengthText.textContent = 'Good password';
                strengthText.style.color = '#10b981';
            } else {
                strengthFill.className = 'strength-fill strong';
                strengthText.textContent = 'Strong password';
                strengthText.style.color = '#059669';
            }
        }

        // Password Toggle
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('passwordToggleIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        // Form Enhancement
        document.addEventListener('DOMContentLoaded', function() {
            // Password strength checker
            const passwordField = document.getElementById('password');
            if (passwordField) {
                passwordField.addEventListener('input', function() {
                    checkPasswordStrength(this.value);
                });
            }

            // Enhanced form validation
            const form = document.getElementById('registrationForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    if (!validateCurrentStep()) {
                        e.preventDefault();
                        return false;
                    }

                    // Show loading state
                    const submitBtn = document.getElementById('submitBtn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span class="btn-icon">⏳</span> Registering...';
                    submitBtn.disabled = true;

                    // Re-enable button after 5 seconds (in case of error)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 5000);
                });
            }

            // Auto-advance on complete fields
            const requiredFields = document.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                field.addEventListener('blur', function() {
                    if (this.value.trim()) {
                        this.style.borderColor = '#10b981';
                        this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';

                        setTimeout(() => {
                            this.style.borderColor = '#e5e7eb';
                            this.style.boxShadow = '';
                        }, 1000);
                    }
                });
            });

            // Province change handler (if needed for dynamic dropdowns)
            const provinceSelect = document.getElementById('provinceSelect');
            if (provinceSelect) {
                provinceSelect.addEventListener('change', function() {
                    // Add logic here to filter education zones based on selected province
                    console.log('Province changed to:', this.value);
                });
            }

            // Auto-dismiss alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }, 5000);
            });

            // Add smooth scrolling for form navigation
            const formSteps = document.querySelectorAll('.form-step');
            formSteps.forEach(step => {
                step.addEventListener('transitionend', function() {
                    if (this.classList.contains('active')) {
                        this.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Initialize tooltips for form fields
            const tooltips = {
                'schoolName': 'Enter the full official name of your school',
                'schoolCensusNumber': 'Unique census number assigned by education department',
                'schoolId': 'Internal school identification number',
                'schoolEmailAddress': 'Official school email for communication',
                'schoolTelephoneNumber': 'Main contact number for the school',
                'schoolPassword': 'Choose a strong password with at least 8 characters'
            };

            Object.keys(tooltips).forEach(fieldName => {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.title = tooltips[fieldName];
                }
            });
        });

        // Enhanced keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                const activeElement = document.activeElement;

                if (activeElement.tagName === 'INPUT' || activeElement.tagName === 'SELECT') {
                    e.preventDefault();

                    if (currentStep < totalSteps) {
                        nextStep();
                    } else {
                        // Submit form if on last step
                        document.getElementById('registrationForm').dispatchEvent(new Event('submit'));
                    }
                }
            }
        });

        // Add loading animation for page
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';

            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>
@endpush

@section('content')
    <!-- Registration Page -->
    <div class="registration-container">
        <!-- Background Animation -->
        <div class="bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>

        <div class="registration-wrapper">
            <!-- Left Side - Welcome Section -->
            <div class="welcome-section">
                <div class="welcome-content">
                    <div class="logo-section">
                        <div class="logo-icon">🏫</div>
                        <h2>School Mate</h2>
                        <p>Modern School Management System</p>
                    </div>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">👨‍🎓</div>
                            <div class="feature-text">
                                <h4>Student Management</h4>
                                <p>Complete student information system</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">👩‍🏫</div>
                            <div class="feature-text">
                                <h4>Teacher Portal</h4>
                                <p>Manage staff and academic records</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📊</div>
                            <div class="feature-text">
                                <h4>Analytics & Reports</h4>
                                <p>Comprehensive school analytics</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📱</div>
                            <div class="feature-text">
                                <h4>Mobile Responsive</h4>
                                <p>Access anywhere, anytime</p>
                            </div>
                        </div>
                    </div>

                    <div class="stats-section">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Schools Registered</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">50K+</div>
                            <div class="stat-label">Students Managed</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">99%</div>
                            <div class="stat-label">Satisfaction Rate</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="form-section">
                <div class="form-container">
                    <div class="form-header">
                        <h1>🏫 School Registration</h1>
                        <p>Register your school in our management system</p>
                    </div>

                    <!-- Progress Indicator -->
                    <div class="progress-indicator">
                        <div class="progress-step active">
                            <div class="step-number">1</div>
                            <div class="step-label">School Info</div>
                        </div>
                        <div class="progress-line"></div>
                        <div class="progress-step">
                            <div class="step-number">2</div>
                            <div class="step-label">Location</div>
                        </div>
                        <div class="progress-line"></div>
                        <div class="progress-step">
                            <div class="step-number">3</div>
                            <div class="step-label">Contact</div>
                        </div>
                    </div>


                    <form action="{{ route('school.create') }}" method="post">
                        @csrf
                        <!-- Step 1: School Information -->
                        <div class="form-step active" id="step1">
                            <div class="step-header">
                                <h3>📋 School Information</h3>
                                <p>Basic details about your school</p>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>School Name *</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🏫</span>
                                        <input type="text" class="form-control" required name="schoolName"
                                            placeholder="Enter school name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Type of School *</label>
                                    <div class="select-wrapper">
                                        <span class="select-icon">🎓</span>
                                        <select class="form-control" required name="schoolType">
                                            <option value="">Select School Type</option>
                                            @foreach ($scholTypes as $scholType)
                                                <option value="{{ $scholType->id }}">{{ $scholType->school_type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Census Number *</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🔢</span>
                                        <input type="text" class="form-control" required name="schoolCensusNumber"
                                            placeholder="Enter census number" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>School ID *</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">🆔</span>
                                        <input type="text" class="form-control" required name="schoolId"
                                            placeholder="Enter school ID" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="step-navigation">
                                <button type="button" class="btn btn-next" onclick="nextStep()">
                                    Next Step
                                    <span class="btn-icon">→</span>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Location Information -->
                        <div class="form-step" id="step2">
                            <div class="step-header">
                                <h3>📍 Location Information</h3>
                                <p>Where is your school located?</p>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Province *</label>
                                    <div class="select-wrapper">
                                        <span class="select-icon">🗺️</span>
                                        <select class="form-control" id="provinceSelect">
                                            <option value="">Select Province</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Education Zone *</label>
                                    <div class="select-wrapper">
                                        <span class="select-icon">🎯</span>
                                        <select class="form-control" id="zoneSelect">
                                            <option value="">Select Education Zone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Education Division *</label>
                                <div class="select-wrapper">
                                    <span class="select-icon">🏛️</span>
                                    <select class="form-control" id="divisionSelect" name="schoolEducatinDivision">
                                        <option value="">Select Education Division</option>
                                    </select>
                                </div>
                            </div>

                            <div class="step-navigation">
                                <button type="button" class="btn btn-back" onclick="prevStep()">
                                    <span class="btn-icon">←</span>
                                    Previous
                                </button>
                                <button type="button" class="btn btn-next" onclick="nextStep()">
                                    Next Step
                                    <span class="btn-icon">→</span>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Contact Information -->
                        <div class="form-step" id="step3">
                            <div class="step-header">
                                <h3>📞 Contact Information</h3>
                                <p>How can we reach your school?</p>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">📧</span>
                                        <input type="email" class="form-control" required name="schoolEmailAddress"
                                            placeholder="school@example.com" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Telephone Number *</label>
                                    <div class="input-wrapper">
                                        <span class="input-icon">📞</span>
                                        <input type="tel" class="form-control" required name="schoolTelephoneNumber"
                                            placeholder="011-1234567" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Postal Address *</label>
                                <div class="textarea-wrapper">
                                    <span class="input-icon">📮</span>
                                    <textarea class="form-control" rows="3" required name="schoolPostalAddress"
                                        placeholder="Enter complete postal address"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password *</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">🔒</span>
                                    <input type="password" class="form-control" required name="schoolPassword"
                                        placeholder="Create a strong password" id="password">
                                    <button type="button" class="password-toggle" onclick="togglePassword()">
                                        <span id="passwordToggleIcon">👁️</span>
                                    </button>
                                </div>
                                <div class="password-strength" id="passwordStrength">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>
                                    <span class="strength-text" id="strengthText">Enter password</span>
                                </div>
                            </div>

                            <div class="step-navigation">
                                <button type="button" class="btn btn-back" onclick="prevStep()">
                                    <span class="btn-icon">←</span>
                                    Previous
                                </button>

                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span class="btn-icon">🚀</span>
                                    Register School
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Messages -->

                    @if (session('success'))
                        <div class="alert alert-success">
                            <span class="alert-icon">✅</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-error">
                            <span class="alert-icon">❌</span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-footer">
                        <p>Already have an account?
                            <a href="{{ route('school.loginIndex') }}" class="login-link">Sign In</a>
                        </p>
                        <div class="security-note">
                            <span class="security-icon">🔐</span>
                            Your information is secure and encrypted
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
