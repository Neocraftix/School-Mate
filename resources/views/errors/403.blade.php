@extends('layouts.app')

@section('title', 'School Mate | 403 - Access Denied')

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
            position: relative;
        }

        /* Animated Background Shapes */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .shape-1 {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }

        .shape-4 {
            width: 180px;
            height: 180px;
            bottom: 50%;
            right: 25%;
            animation-delay: 1s;
        }

        .shape-5 {
            width: 120px;
            height: 120px;
            top: 40%;
            left: 5%;
            animation-delay: 3s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
                opacity: 0.7;
            }

            25% {
                transform: translateY(-30px) translateX(20px) rotate(90deg);
                opacity: 1;
            }

            50% {
                transform: translateY(-50px) translateX(0px) rotate(180deg);
                opacity: 0.5;
            }

            75% {
                transform: translateY(-30px) translateX(-20px) rotate(270deg);
                opacity: 1;
            }
        }

        /* Particle System */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            opacity: 0;
            animation: particle-float 6s infinite;
        }

        @keyframes particle-float {
            0% {
                opacity: 0;
                transform: translateY(0) scale(0);
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(-100vh) scale(1);
            }
        }

        /* Main Container */
        .main-container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            padding: 60px 20px;
        }

        /* Error Container */
        .error-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .error-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 60px 40px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: slideIn 0.8s ease-out;
            margin-bottom: 40px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Lock Icon Animation */
        .lock-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 40px;
        }

        .lock-circle {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
            animation: pulse 2s ease-in-out infinite;
            position: relative;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 25px 80px rgba(102, 126, 234, 0.6);
            }
        }

        .lock-icon {
            font-size: 80px;
            color: white;
            animation: shake 3s ease-in-out infinite;
        }

        @keyframes shake {

            0%,
            90%,
            100% {
                transform: rotate(0deg);
            }

            92%,
            96% {
                transform: rotate(-15deg);
            }

            94%,
            98% {
                transform: rotate(15deg);
            }
        }

        /* Rotating Ring */
        .rotating-ring {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 3px dashed rgba(255, 255, 255, 0.5);
            border-radius: 50%;
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

        /* Error Code */
        .error-code {
            font-size: 120px;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            animation: glitch 3s infinite;
            letter-spacing: 5px;
        }

        @keyframes glitch {

            0%,
            90%,
            100% {
                transform: translate(0);
            }

            92% {
                transform: translate(-2px, 2px);
            }

            94% {
                transform: translate(2px, -2px);
            }

            96% {
                transform: translate(-2px, -2px);
            }

            98% {
                transform: translate(2px, 2px);
            }
        }

        /* Text Content */
        .error-title {
            font-size: 36px;
            color: #374151;
            margin-bottom: 20px;
            font-weight: 700;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .error-message {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 15px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        .error-submessage {
            font-size: 16px;
            color: #9ca3af;
            margin-bottom: 40px;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 0.8s both;
            margin-bottom: 50px;
        }

        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn span {
            position: relative;
            z-index: 1;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #f3f4f6;
            transform: translateY(-2px);
        }

        .btn-icon {
            font-size: 20px;
        }

        /* Info Section */
        .info-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out;
        }

        .section-title {
            font-size: 32px;
            color: #374151;
            margin-bottom: 40px;
            font-weight: 700;
            text-align: center;
        }

        .section-title-icon {
            font-size: 40px;
            margin-right: 15px;
            vertical-align: middle;
        }

        /* Info Cards */
        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .info-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
        }

        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
        }

        .info-icon {
            font-size: 48px;
            margin-bottom: 20px;
            display: block;
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

        .info-title {
            font-size: 20px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 12px;
        }

        .info-description {
            font-size: 15px;
            color: #6b7280;
            line-height: 1.6;
        }

        /* FAQ Section */
        .faq-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 40px;
            animation: fadeInUp 1.2s ease-out;
        }

        .faq-item {
            background: white;
            border-radius: 16px;
            margin-bottom: 20px;
            overflow: hidden;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: #667eea;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.2);
        }

        .faq-question {
            padding: 25px 30px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: #374151;
            font-size: 18px;
            user-select: none;
        }

        .faq-icon {
            font-size: 24px;
            transition: transform 0.3s ease;
            color: #667eea;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            padding: 0 30px;
            color: #6b7280;
            line-height: 1.8;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 0 30px 25px 30px;
        }

        /* Permissions List */
        .permissions-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 40px;
            animation: fadeInUp 1.4s ease-out;
        }

        .permissions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .permission-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            border-left: 5px solid #667eea;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .permission-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .permission-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .permission-icon {
            font-size: 36px;
            margin-right: 15px;
        }

        .permission-name {
            font-size: 20px;
            font-weight: 700;
            color: #374151;
        }

        .permission-description {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .permission-features {
            list-style: none;
            padding: 0;
        }

        .permission-features li {
            padding: 8px 0;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .permission-features li::before {
            content: '✓';
            color: #667eea;
            font-weight: bold;
            font-size: 18px;
        }

        /* Contact Section */
        .contact-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 40px;
            text-align: center;
            animation: fadeInUp 1.6s ease-out;
        }

        .contact-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-icon-large {
            font-size: 80px;
            margin-bottom: 30px;
            animation: pulse 2s ease-in-out infinite;
        }

        .contact-title {
            font-size: 32px;
            color: #374151;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .contact-description {
            font-size: 18px;
            color: #6b7280;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .contact-methods {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .contact-method {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            padding: 20px 30px;
            border-radius: 16px;
            border: 2px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            color: #374151;
            font-weight: 600;
        }

        .contact-method:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-color: transparent;
        }

        .contact-method-icon {
            font-size: 24px;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 40px 20px;
            color: white;
        }

        .footer-text {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .footer-links {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .footer-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            opacity: 0.9;
        }

        .footer-link:hover {
            opacity: 1;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {

            .error-card,
            .info-section,
            .faq-section,
            .permissions-section,
            .contact-section {
                padding: 40px 25px;
            }

            .error-code {
                font-size: 80px;
            }

            .error-title {
                font-size: 28px;
            }

            .error-message {
                font-size: 16px;
            }

            .lock-container {
                width: 140px;
                height: 140px;
            }

            .lock-circle {
                width: 140px;
                height: 140px;
            }

            .lock-icon {
                font-size: 60px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .info-cards,
            .permissions-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 26px;
            }

            .contact-methods {
                flex-direction: column;
            }

            .contact-method {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 60px;
            }

            .error-title {
                font-size: 24px;
            }

            .main-container {
                padding: 40px 15px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        // Create floating particles
        function createParticles() {
            const bgAnimation = document.querySelector('.bg-animation');
            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 6 + 's';
                particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
                bgAnimation.appendChild(particle);
            }
        }

        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s ease-out';
                ripple.style.pointerEvents = 'none';

                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // FAQ Accordion
        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');

                // Close all items
                document.querySelectorAll('.faq-item').forEach(i => {
                    i.classList.remove('active');
                });

                // Open clicked item if it wasn't active
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });

        // Smooth scroll to section
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }

        // Add scroll animations
        function handleScrollAnimation() {
            const elements = document.querySelectorAll(
                '.info-section, .faq-section, .permissions-section, .contact-section');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            elements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
        }

        // Initialize
        createParticles();
        handleScrollAnimation();

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endpush

@section('content')

    <body>
        <!-- Animated Background -->
        <div class="bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
            <div class="floating-shape shape-5"></div>
        </div>

        <!-- Main Container -->
        <div class="main-container">
            <!-- Error Container -->
            <div class="error-container">
                <div class="error-card">
                    <!-- Lock Animation -->
                    <div class="lock-container">
                        <div class="lock-circle">
                            <div class="rotating-ring"></div>
                            <div class="lock-icon">🔒</div>
                        </div>
                    </div>

                    <!-- Error Code -->
                    <div class="error-code">403</div>

                    <!-- Error Messages -->
                    <h1 class="error-title">Access Denied</h1>
                    <p class="error-message">
                        Oops! You don't have permission to access this page.
                    </p>
                    <p class="error-submessage">
                        This area is restricted. Please contact your administrator if you believe this is a mistake.
                    </p>

                    <!-- Action Buttons -->
                    <div class="button-group">
                        <a href="/" class="btn btn-primary">
                            <span class="btn-icon">🏠</span>
                            <span>Go to Homepage</span>
                        </a>
                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <span class="btn-icon">←</span>
                            <span>Go Back</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Help Section -->
                {{-- <div class="info-section">
                    <h2 class="section-title">
                        <span class="section-title-icon">💡</span>
                        Quick Help
                    </h2>
                    <div class="info-cards">
                        <div class="info-card" onclick="scrollToSection('contact')">
                            <span class="info-icon">📧</span>
                            <div class="info-title">Contact Support</div>
                            <div class="info-description">Get immediate help from our support team available 24/7</div>
                        </div>
                        <div class="info-card" onclick="scrollToSection('faq')">
                            <span class="info-icon">❓</span>
                            <div class="info-title">FAQ</div>
                            <div class="info-description">Find answers to commonly asked questions about access</div>
                        </div>
                        <div class="info-card" onclick="scrollToSection('permissions')">
                            <span class="info-icon">🔐</span>
                            <div class="info-title">Permissions Guide</div>
                            <div class="info-description">Learn about different permission levels in our system</div>
                        </div>
                    </div>
                </div> --}}

                <!-- FAQ Section -->
                {{-- <div class="faq-section" id="faq">
                    <h2 class="section-title">
                        <span class="section-title-icon">❔</span>
                        Frequently Asked Questions
                    </h2>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Why am I seeing this error?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            You're seeing this 403 error because you don't have the necessary permissions to access this
                            page or resource. This could be because the page is restricted to certain user roles, your
                            account hasn't been granted access, or your session may have expired.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do I get access to this page?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            To gain access, you'll need to contact your system administrator or the person who manages user
                            permissions in your organization. They can review your account and grant the appropriate access
                            level if you need it for your work.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>What should I do if I need urgent access?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            If you need urgent access, use the contact support option below to reach out to our team.
                            Provide details about why you need access and which page you're trying to reach. Our support
                            team will work with your administrator to resolve the issue as quickly as possible.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Is this error caused by a technical issue?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            A 403 error is typically not a technical problem - it's a security feature working as intended.
                            However, if you believe you should have access and are seeing this error unexpectedly, it could
                            indicate a session issue. Try logging out and logging back in, or clearing your browser cache
                            and cookies.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <span>Can I request permanent access?</span>
                            <span class="faq-icon">▼</span>
                        </div>
                        <div class="faq-answer">
                            Yes! If you regularly need access to this resource for your role, you can submit a formal access
                            request through your organization's access management system or by contacting your IT
                            administrator. They will evaluate your request based on your role and responsibilities.
                        </div>
                    </div>
                </div> --}}


                <!-- Contact Section -->
                {{-- <div class="contact-section" id="contact">
                    <div class="contact-content">
                        <h2 class="contact-title">📞 Need Help?</h2>
                        <p class="contact-description">
                            Our support team is here to help you resolve access issues. Reach out to us through any of these
                            methods and we'll get back to you as soon as possible.
                        </p>
                        <div class="contact-methods">
                            <div class="contact-method">
                                <span class="contact-method-icon">📧</span>
                                <span>support@lms.com</span>
                            </div>
                            <div class="contact-method">
                                <span class="contact-method-icon">💬</span>
                                <span>Live Chat</span>
                            </div>
                            <div class="contact-method">
                                <span class="contact-method-icon">📱</span>
                                <span>+1 (555) 123-4567</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Footer -->
            {{-- <div class="footer">
                <p class="footer-text">© 2024 Learning Management System. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">Privacy Policy</a>
                    <a href="#" class="footer-link">Terms of Service</a>
                    <a href="#" class="footer-link">Help Center</a>
                    <a href="#" class="footer-link">Documentation</a>
                </div>
            </div> --}}
        </div>
    </body>
@endsection
