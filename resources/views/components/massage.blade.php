<!-- Enhanced Messages Section with Animations - Laravel Session Compatible -->
@if (session('success') || session('error') || session('warning') || session('info') || $errors->any())
    <div class="alerts-container">
        @if (session('success'))
            <div class="alert alert-success animate-in" id="success-alert">
                <div class="alert-content">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon success-icon">✅</span>
                        <div class="ripple-effect success-ripple"></div>
                    </div>
                    <div class="alert-text">
                        <div class="alert-title">Success!</div>
                        <div class="alert-message">{{ session('success') }}</div>
                    </div>
                </div>
                <button class="alert-close" onclick="dismissAlert('success-alert')">
                    <span class="close-icon">✕</span>
                </button>
                <div class="alert-progress">
                    <div class="progress-bar success-progress"></div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error animate-in" id="error-alert">
                <div class="alert-content">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon error-icon">❌</span>
                        <div class="ripple-effect error-ripple"></div>
                    </div>
                    <div class="alert-text">
                        <div class="alert-title">Error!</div>
                        <div class="alert-message">{{ session('error') }}</div>
                    </div>
                </div>
                <button class="alert-close" onclick="dismissAlert('error-alert')">
                    <span class="close-icon">✕</span>
                </button>
                <div class="alert-progress">
                    <div class="progress-bar error-progress"></div>
                </div>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning animate-in" id="warning-alert">
                <div class="alert-content">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon warning-icon">⚠️</span>
                        <div class="ripple-effect warning-ripple"></div>
                    </div>
                    <div class="alert-text">
                        <div class="alert-title">Warning!</div>
                        <div class="alert-message">{{ session('warning') }}</div>
                    </div>
                </div>
                <button class="alert-close" onclick="dismissAlert('warning-alert')">
                    <span class="close-icon">✕</span>
                </button>
                <div class="alert-progress">
                    <div class="progress-bar warning-progress"></div>
                </div>
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info animate-in" id="info-alert">
                <div class="alert-content">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon info-icon">ℹ️</span>
                        <div class="ripple-effect info-ripple"></div>
                    </div>
                    <div class="alert-text">
                        <div class="alert-title">Information</div>
                        <div class="alert-message">{{ session('info') }}</div>
                    </div>
                </div>
                <button class="alert-close" onclick="dismissAlert('info-alert')">
                    <span class="close-icon">✕</span>
                </button>
                <div class="alert-progress">
                    <div class="progress-bar info-progress"></div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-validation animate-in" id="validation-alert">
                <div class="alert-content">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon validation-icon">🚫</span>
                        <div class="ripple-effect validation-ripple"></div>
                    </div>
                    <div class="alert-text">
                        <div class="alert-title">Validation Errors</div>
                        <div class="alert-message">
                            @if ($errors->count() == 1)
                                {{ $errors->first() }}
                            @else
                                <div class="error-list">
                                    <div class="error-summary">{{ $errors->count() }} errors found:</div>
                                    <ul class="error-items">
                                        @foreach ($errors->all() as $index => $error)
                                            <li class="error-item" style="animation-delay: {{ $index * 0.1 }}s">
                                                <span class="error-bullet">•</span>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <button class="alert-close" onclick="dismissAlert('validation-alert')">
                    <span class="close-icon">✕</span>
                </button>
                <div class="alert-progress">
                    <div class="progress-bar validation-progress"></div>
                </div>
            </div>
        @endif
    </div>
@endif

<style>
    /* Alerts Container */
    .alerts-container {
        position: fixed;
        top: 90px;
        right: 20px;
        z-index: 9999;
        max-width: 400px;
        width: 100%;
        pointer-events: none;
    }

    /* Alert Base Styles */
    .alert {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        margin-bottom: 15px;
        overflow: hidden;
        position: relative;
        pointer-events: auto;
        border-left: 5px solid;
        backdrop-filter: blur(10px);
        min-height: 80px;
        display: flex;
        flex-direction: column;
    }

    .alert-success {
        border-left-color: #10b981;
        background: linear-gradient(135deg, rgba(236, 253, 245, 0.95), rgba(209, 250, 229, 0.95));
    }

    .alert-error {
        border-left-color: #ef4444;
        background: linear-gradient(135deg, rgba(254, 242, 242, 0.95), rgba(254, 226, 226, 0.95));
    }

    .alert-warning {
        border-left-color: #f59e0b;
        background: linear-gradient(135deg, rgba(255, 251, 235, 0.95), rgba(254, 243, 199, 0.95));
    }

    .alert-info {
        border-left-color: #3b82f6;
        background: linear-gradient(135deg, rgba(239, 246, 255, 0.95), rgba(219, 234, 254, 0.95));
    }

    .alert-validation {
        border-left-color: #dc2626;
        background: linear-gradient(135deg, rgba(254, 242, 242, 0.95), rgba(254, 226, 226, 0.95));
    }

    /* Alert Content */
    .alert-content {
        display: flex;
        align-items: flex-start;
        padding: 20px;
        gap: 15px;
        flex: 1;
    }

    .alert-icon-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .alert-icon {
        font-size: 1.5rem;
        z-index: 2;
        position: relative;
    }

    .success-icon {
        animation: successBounce 0.6s ease-out;
    }

    .error-icon {
        animation: errorShake 0.6s ease-out;
    }

    .warning-icon {
        animation: warningPulse 0.8s ease-out;
    }

    .info-icon {
        animation: infoBounce 0.7s ease-out;
    }

    .validation-icon {
        animation: validationShake 0.8s ease-out;
    }

    /* Ripple Effect */
    .ripple-effect {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        opacity: 0.3;
        animation: ripple 0.8s ease-out;
    }

    .success-ripple {
        background: #10b981;
    }

    .error-ripple {
        background: #ef4444;
    }

    .warning-ripple {
        background: #f59e0b;
    }

    .info-ripple {
        background: #3b82f6;
    }

    .validation-ripple {
        background: #dc2626;
    }

    /* Alert Text */
    .alert-text {
        flex: 1;
        min-width: 0;
    }

    .alert-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 5px;
        color: #1f2937;
    }

    .alert-message {
        color: #4b5563;
        line-height: 1.5;
        font-size: 0.95rem;
    }

    /* Error List Styles */
    .error-list {
        max-height: 200px;
        overflow-y: auto;
    }

    .error-summary {
        font-weight: 600;
        margin-bottom: 8px;
        color: #92400e;
    }

    .error-items {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .error-item {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        padding: 4px 0;
        opacity: 0;
        animation: slideInError 0.4s ease-out forwards;
    }

    .error-bullet {
        color: #f59e0b;
        font-weight: bold;
        margin-top: 2px;
    }

    /* Close Button */
    .alert-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        border-radius: 50%;
        transition: all 0.3s ease;
        color: #6b7280;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert-close:hover {
        background: rgba(0, 0, 0, 0.1);
        color: #374151;
        transform: scale(1.1);
    }

    .close-icon {
        font-size: 0.9rem;
        font-weight: bold;
    }

    /* Progress Bar */
    .alert-progress {
        height: 3px;
        background: rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        width: 100%;
        transform: translateX(-100%);
        animation: progressBar 5s linear forwards;
    }

    .success-progress {
        background: linear-gradient(90deg, #10b981, #059669);
    }

    .error-progress {
        background: linear-gradient(90deg, #ef4444, #dc2626);
    }

    .warning-progress {
        background: linear-gradient(90deg, #f59e0b, #d97706);
    }

    .info-progress {
        background: linear-gradient(90deg, #3b82f6, #2563eb);
    }

    .validation-progress {
        background: linear-gradient(90deg, #dc2626, #b91c1c);
    }

    /* Animations */
    @keyframes progressBar {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0);
        }
    }

    @keyframes ripple {
        0% {
            width: 20px;
            height: 20px;
            opacity: 0.8;
        }

        100% {
            width: 60px;
            height: 60px;
            opacity: 0;
        }
    }

    @keyframes successBounce {
        0% {
            transform: scale(0.3) rotate(-10deg);
            opacity: 0;
        }

        50% {
            transform: scale(1.2) rotate(5deg);
        }

        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    @keyframes errorShake {

        0%,
        100% {
            transform: translateX(0) scale(1);
        }

        25% {
            transform: translateX(-5px) scale(1.1);
        }

        75% {
            transform: translateX(5px) scale(1.1);
        }
    }

    @keyframes warningPulse {
        0% {
            transform: scale(0.8);
            opacity: 0.5;
        }

        50% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes infoBounce {
        0% {
            transform: scale(0.4) rotate(-15deg);
            opacity: 0;
        }

        50% {
            transform: scale(1.15) rotate(8deg);
        }

        100% {
            transform: scale(1) rotate(0deg);
            opacity: 1;
        }
    }

    @keyframes validationShake {

        0%,
        100% {
            transform: translateX(0) scale(1) rotate(0deg);
        }

        20% {
            transform: translateX(-8px) scale(1.1) rotate(-3deg);
        }

        40% {
            transform: translateX(8px) scale(1.1) rotate(3deg);
        }

        60% {
            transform: translateX(-5px) scale(1.05) rotate(-2deg);
        }

        80% {
            transform: translateX(5px) scale(1.05) rotate(2deg);
        }
    }

    @keyframes slideInError {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Alert Entry Animation */
    .animate-in {
        animation: slideInRight 0.5s ease-out;
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

    /* Alert Exit Animation */
    .animate-out {
        animation: slideOutRight 0.3s ease-in forwards;
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
            max-height: 200px;
            margin-bottom: 15px;
        }

        to {
            transform: translateX(100%);
            opacity: 0;
            max-height: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }
    }

    /* Hover Effects */
    .alert:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .alert:hover .progress-bar {
        animation-play-state: paused;
    }

    /* Mobile Responsive */
    @media screen and (max-width: 768px) {
        .alerts-container {
            top: 80px;
            right: 15px;
            left: 15px;
            max-width: none;
        }

        .alert-content {
            padding: 15px;
            gap: 12px;
        }

        .alert-icon-wrapper {
            width: 35px;
            height: 35px;
        }

        .alert-icon {
            font-size: 1.3rem;
        }

        .alert-title {
            font-size: 1rem;
        }

        .alert-message {
            font-size: 0.9rem;
        }

        .error-list {
            max-height: 150px;
        }
    }

    @media screen and (max-width: 480px) {
        .alerts-container {
            top: 70px;
            right: 10px;
            left: 10px;
        }

        .alert-content {
            padding: 12px;
            gap: 10px;
        }

        .alert-icon-wrapper {
            width: 30px;
            height: 30px;
        }

        .alert-icon {
            font-size: 1.1rem;
        }

        .alert-close {
            top: 10px;
            right: 10px;
            width: 25px;
            height: 25px;
        }

        .close-icon {
            font-size: 0.8rem;
        }
    }

    /* Custom Scrollbar for Error List */
    .error-list::-webkit-scrollbar {
        width: 4px;
    }

    .error-list::-webkit-scrollbar-track {
        background: transparent;
    }

    .error-list::-webkit-scrollbar-thumb {
        background: rgba(245, 158, 11, 0.3);
        border-radius: 2px;
    }

    .error-list::-webkit-scrollbar-thumb:hover {
        background: rgba(245, 158, 11, 0.5);
    }

    /* Sound Effect Simulation */
    .alert-success .alert-icon-wrapper::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.3) 0%, transparent 70%);
        animation: soundWave 0.8s ease-out;
    }

    .alert-error .alert-icon-wrapper::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(239, 68, 68, 0.3) 0%, transparent 70%);
        animation: soundWave 0.8s ease-out;
    }

    .alert-warning .alert-icon-wrapper::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, transparent 70%);
        animation: soundWave 0.8s ease-out;
    }

    .alert-info .alert-icon-wrapper::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%);
        animation: soundWave 0.8s ease-out;
    }

    .alert-validation .alert-icon-wrapper::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.3) 0%, transparent 70%);
        animation: soundWave 0.8s ease-out;
    }

    @keyframes soundWave {
        0% {
            transform: scale(0);
            opacity: 0.8;
        }

        100% {
            transform: scale(2);
            opacity: 0;
        }
    }
</style>

<script>
    // Enhanced Alert System JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-dismiss alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');

        alerts.forEach((alert, index) => {
            // Stagger the appearance of multiple alerts
            setTimeout(() => {
                alert.style.animation = 'slideInRight 0.5s ease-out';
            }, index * 200);

            // Auto-dismiss after 5 seconds
            setTimeout(() => {
                if (alert.parentNode) {
                    dismissAlert(alert.id);
                }
            }, 5000 + (index * 200));
        });

        // Add click-to-dismiss functionality
        alerts.forEach(alert => {
            alert.addEventListener('click', function(e) {
                if (!e.target.closest('.alert-close')) {
                    // Pause the progress bar on click
                    const progressBar = this.querySelector('.progress-bar');
                    if (progressBar) {
                        progressBar.style.animationPlayState = 'paused';
                    }
                }
            });

            // Resume progress bar when mouse leaves
            alert.addEventListener('mouseleave', function() {
                const progressBar = this.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.animationPlayState = 'running';
                }
            });
        });

        // Add keyboard support (Escape to dismiss all)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                dismissAllAlerts();
            }
        });
    });

    // Dismiss specific alert
    function dismissAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.classList.add('animate-out');

            // Remove from DOM after animation
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.remove();

                    // Check if container is empty and remove it
                    const container = document.querySelector('.alerts-container');
                    if (container && !container.querySelector('.alert')) {
                        container.remove();
                    }
                }
            }, 300);
        }
    }

    // Dismiss all alerts
    function dismissAllAlerts() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach((alert, index) => {
            setTimeout(() => {
                dismissAlert(alert.id);
            }, index * 100);
        });
    }

    // Create dynamic alert function (for use with AJAX)
    function showAlert(type, title, message, duration = 10000) {
        const alertId = 'dynamic-alert-' + Date.now();
        const iconMap = {
            'success': '✅',
            'error': '❌',
            'warning': '⚠️',
            'info': 'ℹ️',
            'validation': '🚫'
        };

        const alertHTML = `
            <div class="alert alert-${type} animate-in" id="${alertId}">
                <div class="alert-content">
                    <div class="alert-icon-wrapper">
                        <span class="alert-icon ${type}-icon">${iconMap[type]}</span>
                        <div class="ripple-effect ${type}-ripple"></div>
                    </div>
                    <div class="alert-text">
                        <div class="alert-title">${title}</div>
                        <div class="alert-message">${message}</div>
                    </div>
                </div>
                <button class="alert-close" onclick="dismissAlert('${alertId}')">
                    <span class="close-icon">✕</span>
                </button>
                <div class="alert-progress">
                    <div class="progress-bar ${type}-progress"></div>
                </div>
            </div>
        `;

        // Create or get alerts container
        let container = document.querySelector('.alerts-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'alerts-container';
            document.body.appendChild(container);
        }

        // Add the new alert
        container.insertAdjacentHTML('beforeend', alertHTML);

        // Auto-dismiss
        setTimeout(() => {
            dismissAlert(alertId);
        }, duration);

        return alertId;
    }

    // Example usage:
    // showAlert('success', 'Success!', 'Student added successfully!');
    // showAlert('error', 'Error!', 'Failed to save student data.');
    // showAlert('warning', 'Warning!', 'Please check your input.');
</script>
