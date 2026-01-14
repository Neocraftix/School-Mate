@extends('layouts.app')

@section('title', 'School Mate | Login')

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
            animation: float 8s ease-in-out infinite;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            top: 20%;
            right: 15%;
            animation-delay: 2s;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            bottom: 30%;
            left: 15%;
            animation-delay: 4s;
        }

        .shape-4 {
            width: 120px;
            height: 120px;
            bottom: 10%;
            right: 20%;
            animation-delay: 1s;
        }

        .shape-5 {
            width: 90px;
            height: 90px;
            top: 50%;
            left: 5%;
            animation-delay: 3s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 1;
            }
        }

        /* Main Container */
        .signin-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .signin-wrapper {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
            min-height: 600px;
        }

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 60px 40px;
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 25s linear infinite;
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
            margin-bottom: 20px;
            animation: bounce 3s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            60%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-15px);
            }

            80% {
                transform: translateY(-8px);
            }
        }

        .logo-section h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .logo-section p {
            font-size: 1.2rem;
            opacity: 0.9;
            line-height: 1.5;
        }

        .features-showcase {
            margin-bottom: 40px;
        }

        .feature-highlight {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .feature-highlight:hover {
            transform: translateX(10px);
        }

        .feature-highlight .feature-icon {
            font-size: 2rem;
            margin-right: 20px;
            min-width: 60px;
        }

        .feature-highlight h4 {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .feature-highlight p {
            opacity: 0.9;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .testimonial {
            background: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            position: relative;
        }

        .quote-icon {
            font-size: 4rem;
            position: absolute;
            top: -10px;
            left: 20px;
            opacity: 0.3;
        }

        .testimonial p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .author-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .author-role {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        /* Form Section */
        .form-section {
            padding: 60px 40px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
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

        /* Form Controls */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #9ca3af;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: 16px 16px 16px 50px;
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

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.3rem;
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        /* Form Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 0.9rem;
            color: #374151;
        }

        .checkbox-wrapper input[type="checkbox"] {
            opacity: 0;
            position: absolute;
        }

        .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            margin-right: 10px;
            position: relative;
            transition: all 0.3s ease;
        }

        .checkbox-wrapper input[type="checkbox"]:checked+.checkmark {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-color: #667eea;
        }

        .checkbox-wrapper input[type="checkbox"]:checked+.checkmark::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 0.8rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        /* Buttons */
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 16px 24px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            width: 100%;
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
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
            transform: translateY(-1px);
        }

        .btn-icon {
            font-size: 1.1rem;
        }

        /* Social Sign In */
        .social-signin {
            margin: 30px 0;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #9ca3af;
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
            z-index: 1;
        }

        .divider span {
            background: white;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .social-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            background: white;
            color: #374151;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: #667eea;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.2);
            transform: translateY(-1px);
        }

        .social-icon {
            font-size: 1.2rem;
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
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .signup-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        .help-section {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
        }

        .help-link {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #6b7280;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .help-link:hover {
            color: #667eea;
        }

        .help-icon {
            font-size: 1rem;
        }

        /* Modal */
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
            z-index: 3000;
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
            max-width: 450px;
            width: 100%;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 30px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-header h3 {
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

        .modal-footer .btn {
            width: auto;
            min-width: 120px;
        }

        /* Mobile Responsive */
        @media screen and (max-width: 1024px) {
            .signin-wrapper {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .welcome-section {
                padding: 40px 30px;
                min-height: auto;
            }

            .features-showcase {
                display: none;
            }

            .testimonial {
                margin-top: 20px;
            }
        }

        @media screen and (max-width: 768px) {
            .signin-container {
                padding: 15px;
            }

            .welcome-section {
                padding: 30px 20px;
            }

            .form-section {
                padding: 40px 20px;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .social-buttons {
                grid-template-columns: 1fr;
            }

            .help-section {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media screen and (max-width: 480px) {
            .form-header h1 {
                font-size: 2rem;
            }

            .logo-section h2 {
                font-size: 2rem;
            }

            .feature-highlight {
                padding: 15px;
            }

            .testimonial {
                padding: 20px;
            }

            .modal-content {
                margin: 20px;
                max-width: none;
            }
        }
    </style>
@endpush

@push('js')
    <script>
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

        // Forgot Password Modal
        function showForgotModal() {
            document.getElementById('forgotModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeForgotModal() {
            document.getElementById('forgotModal').classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        function sendResetLink() {
            const email = document.getElementById('resetEmail').value;
            if (!email) {
                alert('Please enter your email address');
                return;
            }

            // Simulate sending reset link
            alert(`Password reset link sent to ${email}`);
            closeForgotModal();
        }

        // Form Enhancement
        document.addEventListener('DOMContentLoaded', function() {
            // Form submission
            const form = document.getElementById('signinForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const submitBtn = document.getElementById('signinBtn');
                    const originalText = submitBtn.innerHTML;

                    submitBtn.innerHTML = '<span class="btn-icon">⏳</span> Signing In...';
                    submitBtn.disabled = true;

                    // Re-enable button after 5 seconds (in case of error)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 5000);
                });
            }

            // Social button handlers
            document.querySelectorAll('.social-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const provider = this.textContent.trim();
                    alert(`${provider} sign-in functionality will be implemented here`);
                });
            });

            // Enhanced form validation
            const emailField = document.querySelector('input[type="email"]');
            const passwordField = document.querySelector('input[type="password"]');

            if (emailField) {
                emailField.addEventListener('blur', function() {
                    if (this.value && this.checkValidity()) {
                        this.style.borderColor = '#10b981';
                        this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';

                        setTimeout(() => {
                            this.style.borderColor = '#e5e7eb';
                            this.style.boxShadow = '';
                        }, 1500);
                    }
                });
            }

            if (passwordField) {
                passwordField.addEventListener('input', function() {
                    if (this.value.length >= 6) {
                        this.style.borderColor = '#10b981';
                        this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';
                    } else {
                        this.style.borderColor = '#e5e7eb';
                        this.style.boxShadow = '';
                    }
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

            // Remember me functionality
            const rememberCheckbox = document.getElementById('remember');
            const emailInput = document.querySelector('input[name="schoolEmailAddress"]');

            // Load remembered email
            if (localStorage.getItem('rememberedEmail')) {
                emailInput.value = localStorage.getItem('rememberedEmail');
                rememberCheckbox.checked = true;
            }

            // Save email when form is submitted
            if (form) {
                form.addEventListener('submit', function() {
                    if (rememberCheckbox.checked) {
                        localStorage.setItem('rememberedEmail', emailInput.value);
                    } else {
                        localStorage.removeItem('rememberedEmail');
                    }
                });
            }

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Enter key on email field moves to password
                if (e.key === 'Enter' && e.target === emailField && passwordField) {
                    e.preventDefault();
                    passwordField.focus();
                }

                // Ctrl+Enter submits form
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    form.dispatchEvent(new Event('submit'));
                }
            });

            // Input animations
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    const wrapper = this.closest('.input-wrapper');
                    const icon = wrapper.querySelector('.input-icon');
                    if (icon) {
                        icon.style.color = '#667eea';
                        icon.style.transform = 'translateY(-50%) scale(1.1)';
                    }
                });

                input.addEventListener('blur', function() {
                    const wrapper = this.closest('.input-wrapper');
                    const icon = wrapper.querySelector('.input-icon');
                    if (icon && !this.value) {
                        icon.style.color = '#9ca3af';
                        icon.style.transform = 'translateY(-50%) scale(1)';
                    }
                });
            });

            // Page load animation
            setTimeout(() => {
                document.querySelector('.signin-wrapper').style.animation = 'slideInUp 0.6s ease-out';
            }, 100);

            // Add loading state for social buttons
            document.querySelectorAll('.social-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const originalText = this.innerHTML;
                    this.innerHTML =
                        '<span style="animation: spin 1s linear infinite;">⏳</span> Connecting...';
                    this.disabled = true;

                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 2000);
                });
            });
        });

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                closeForgotModal();
            }
        });

        // Escape key closes modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeForgotModal();
            }
        });

        // Add custom animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            .form-control:invalid:not(:placeholder-shown) {
                border-color: #ef4444;
                box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
            }

            .form-control:valid:not(:placeholder-shown) {
                border-color: #10b981;
            }

            .signin-wrapper {
                opacity: 0;
                animation: slideInUp 0.6s ease-out 0.1s forwards;
            }

            .floating-shape:hover {
                animation-duration: 3s;
                transform: scale(1.2);
            }

            .btn:active {
                transform: translateY(0) scale(0.98);
            }

            .social-btn:active {
                transform: translateY(0) scale(0.98);
            }

            .feature-highlight {
                transition: all 0.3s ease;
            }

            .feature-highlight:hover {
                transform: translateX(10px) scale(1.02);
                box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
            }

            .testimonial {
                transition: transform 0.3s ease;
            }

            .testimonial:hover {
                transform: translateY(-5px);
            }

            .input-wrapper {
                transition: all 0.3s ease;
            }

            .input-wrapper:hover .input-icon {
                color: #667eea;
                transform: translateY(-50%) scale(1.05);
            }

            .checkbox-wrapper:hover .checkmark {
                border-color: #667eea;
                transform: scale(1.05);
            }

            @media (prefers-reduced-motion: reduce) {
                * {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                }
            }
        `;
        // document.head.appendChild(style);
    </script>
@endpush

@section('content')
    <!-- Sign In Page -->
    <div class="signin-container">
        <!-- Background Animation -->
        <div class="bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
            <div class="floating-shape shape-5"></div>
        </div>

        <div class="signin-wrapper">
            <!-- Left Side - Welcome Back Section -->
            <div class="welcome-section">
                <div class="welcome-content">
                    <div class="logo-section">
                        <div class="logo-icon">🏫</div>
                        <h2>Welcome Back!</h2>
                        <p>Sign in to access your school management dashboard</p>
                    </div>

                    <div class="features-showcase">
                        <div class="feature-highlight">
                            <div class="feature-icon">📊</div>
                            <h4>Real-time Dashboard</h4>
                            <p>Monitor your school's performance with live analytics and insights</p>
                        </div>
                        <div class="feature-highlight">
                            <div class="feature-icon">🔒</div>
                            <h4>Secure Access</h4>
                            <p>Your data is protected with enterprise-grade security</p>
                        </div>
                        <div class="feature-highlight">
                            <div class="feature-icon">⚡</div>
                            <h4>Lightning Fast</h4>
                            <p>Optimized performance for smooth school management</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Sign In Form -->
            <div class="form-section">
                <div class="form-container">
                    <div class="form-header">
                        <div class="header-icon">🔐</div>
                        <h1>Sign In</h1>
                        <p>Enter your credentials to access your dashboard</p>
                    </div>

                    <form action="{{ route('school.login') }}" method="POST" id="signinForm">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="input-wrapper">
                                <span class="input-icon">📧</span>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter your email address" required value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-wrapper">
                                <span class="input-icon">🔒</span>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your password" required id="password">
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <span id="passwordToggleIcon">👁️</span>
                                </button>
                            </div>
                        </div>

                        <div class="form-options">
                            <a href="#" class="forgot-link" onclick="showForgotModal()">Forgot Password?</a>
                        </div>

                        <!-- Messages -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                <span class="alert-icon">✅</span>
                                {{ session('success') }}
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

                        <button type="submit" class="btn btn-primary" id="signinBtn">
                            <span class="btn-icon">🚀</span>
                            Sign In to Dashboard
                        </button>

                        {{-- <div class="social-signin">
                            <div class="divider">
                                <span>or continue with</span>
                            </div>
                            <div class="social-buttons">
                                <button type="button" class="social-btn google">
                                    <span class="social-icon">🇬</span>
                                    Google
                                </button>
                                <button type="button" class="social-btn microsoft">
                                    <span class="social-icon">Ⓜ️</span>
                                    Microsoft
                                </button>
                            </div>
                        </div> --}}
                    </form>

                    <div class="form-footer">
                        <p>Don't have an account?
                            <a href="{{ route('school-registorIndex') }}" class="signup-link">Create Account</a>
                        </p>
                        <div class="help-section">
                            <a href="#" class="help-link">
                                <span class="help-icon">🆘</span>
                                Need Help?
                            </a>
                            <a href="#" class="help-link">
                                <span class="help-icon">📞</span>
                                Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal" id="forgotModal">
        <div class="modal-overlay" onclick="closeForgotModal()"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3>🔑 Reset Password</h3>
                <button class="modal-close" onclick="closeForgotModal()">✕</button>
            </div>
            <div class="modal-body">
                <p>Enter your email address and we'll send you a link to reset your password.</p>
                <div class="form-group">
                    <label>Email Address</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input type="email" class="form-control" placeholder="Enter your email address" id="resetEmail">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeForgotModal()">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary" onclick="sendResetLink()">
                    <span class="btn-icon">📤</span>
                    Send Reset Link
                </button>
            </div>
        </div>
    </div>
@endsection
