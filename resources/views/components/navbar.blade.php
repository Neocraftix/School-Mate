<!-- Navigation Bar -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo" onclick="window.location.href='{{ url('/home') }}'">
            <span class="logo-icon">🏫</span>
            <span class="logo-text">School Mate</span>
        </div>

        <div class="nav-menu" id="nav-menu">
            <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home*') ? 'active' : '' }}">
                <i class="nav-icon">🏠</i>
                Home
            </a>
            <a href="{{ url('/students') }}" class="nav-link {{ request()->is('students*') ? 'active' : '' }}">
                <i class="nav-icon">👨‍🎓</i>
                Students
            </a>
            <a href="{{ url('/teachers') }}" class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}">
                <i class="nav-icon">👩‍🏫</i>
                Teachers
            </a>
            <a href="{{ url('/inventory') }}" class="nav-link {{ request()->is('inventory*') ? 'active' : '' }}">
                <i class="nav-icon">📦</i>
                Inventory
            </a>
            <a href="{{ url('/reports') }}" class="nav-link {{ request()->is('reports*') ? 'active' : '' }}">
                <i class="nav-icon">📊</i>
                Reports
            </a>
            <a href="{{ url('/settings') }}" class="nav-link {{ request()->is('settings*') ? 'active' : '' }}">
                <i class="nav-icon">⚙️</i>
                Settings
            </a>
        </div>

        <div class="nav-toggle" id="nav-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="nav-profile">
            <div class="profile-dropdown">
                <div class="profile-btn">
                    <span class="profile-icon">👤</span>
                    <span class="profile-name">Admin</span>
                    <span class="dropdown-arrow">▼</span>
                </div>
                <div class="dropdown-content">
                    <a href="{{ url('/profile') }}">
                        <i class="dropdown-icon">👤</i>
                        Profile
                    </a>
                    <a href="{{ url('/settings') }}">
                        <i class="dropdown-icon">⚙️</i>
                        Settings
                    </a>
                    <a href="">
                        <i class="dropdown-icon">🚪</i>
                        Logout
                    </a>
                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Navigation Bar Styles */
    .navbar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding: 0;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        overflow: visible;
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 0 20px;
        height: 70px;
        gap: 40px;
    }

    .nav-logo {
        display: flex;
        align-items: center;
        font-weight: bold;
        font-size: 1.5rem;
        color: #333;
        text-decoration: none;
        gap: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .nav-logo:hover {
        transform: scale(1.05);
    }

    .logo-icon {
        font-size: 2rem;
    }

    .logo-text {
        white-space: nowrap;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        list-style: none;
        gap: 25px;
        flex: 1;
    }

    .nav-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #666;
        font-weight: 500;
        padding: 8px 14px;
        border-radius: 25px;
        transition: all 0.3s ease;
        gap: 6px;
        position: relative;
        font-size: 0.95rem;
    }

    .nav-link:hover {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
        transform: translateY(-1px);
    }

    .nav-link.active {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #667eea;
    }

    .nav-icon {
        font-size: 1rem;
    }

    .nav-profile {
        position: relative;
        margin-left: auto;
        z-index: 10000;
    }

    .profile-dropdown {
        position: relative;
    }

    .profile-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: rgba(102, 126, 234, 0.1);
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        color: #333;
        font-size: 1rem;
        height: auto;
    }

    .profile-btn:hover {
        background: rgba(102, 126, 234, 0.2);
        transform: translateY(-1px);
    }

    .dropdown-content {
        position: absolute;
        right: 0;
        top: 100%;
        margin-top: 10px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        min-width: 180px;
        z-index: 9999;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .profile-dropdown:hover .dropdown-content {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-content a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        text-decoration: none;
        color: #333;
        transition: background 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .dropdown-content a:first-child {
        border-radius: 12px 12px 0 0;
    }

    .dropdown-content a:last-child {
        border-radius: 0 0 12px 12px;
        border-bottom: none;
    }

    .dropdown-content a:hover {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
    }

    .nav-toggle {
        display: none;
        flex-direction: column;
        cursor: pointer;
        margin-left: auto;
    }

    .bar {
        width: 25px;
        height: 3px;
        background: #333;
        margin: 3px 0;
        transition: 0.3s;
        border-radius: 2px;
    }

    /* Mobile Responsive */
    @media screen and (max-width: 768px) {
        .nav-menu {
            position: fixed;
            left: -100%;
            top: 70px;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            width: 100%;
            height: calc(100vh - 70px);
            transition: 0.3s;
            gap: 0;
            padding: 20px 0;
            z-index: 999;
        }

        .nav-menu.active {
            left: 0;
        }

        .nav-link {
            padding: 15px 20px;
            width: 100%;
            justify-content: flex-start;
            border-radius: 0;
        }

        .nav-link.active::after {
            display: none;
        }

        .nav-toggle {
            display: flex;
        }

        .nav-toggle.active .bar:nth-child(2) {
            opacity: 0;
        }

        .nav-toggle.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .nav-toggle.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .nav-profile {
            display: none;
        }
    }

    @media screen and (max-width: 480px) {
        .nav-container {
            padding: 0 15px;
        }

        .logo-text {
            font-size: 1.2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');

        if (navToggle && navMenu) {
            navToggle.addEventListener('click', () => {
                navToggle.classList.toggle('active');
                navMenu.classList.toggle('active');
            });

            // Close mobile menu when clicking on links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    navToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!navToggle.contains(e.target) && !navMenu.contains(e.target)) {
                    navToggle.classList.remove('active');
                    navMenu.classList.remove('active');
                }
            });
        }

        // Add notification badge animation
        function addNotificationBadge(linkSelector, count) {
            const link = document.querySelector(linkSelector);
            if (link && count > 0) {
                const badge = document.createElement('span');
                badge.className = 'notification-badge';
                badge.textContent = count;
                badge.style.cssText = `
                    position: absolute;
                    top: -5px;
                    right: -5px;
                    background: #ef4444;
                    color: white;
                    border-radius: 50%;
                    width: 20px;
                    height: 20px;
                    font-size: 0.7rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-weight: bold;
                    animation: pulse 2s infinite;
                `;
                link.style.position = 'relative';
                link.appendChild(badge);
            }
        }

        // Example: Add notification badges (you can call these from your backend)
        // addNotificationBadge('.nav-link[href*="students"]', 5); // 5 new students
        // addNotificationBadge('.nav-link[href*="reports"]', 2); // 2 new reports

        // Add active page indicator with smooth animation
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href && (currentPath === href || currentPath.startsWith(href + '/'))) {
                link.classList.add('active');
            }
        });
    });

    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .notification-badge {
            animation: pulse 2s infinite;
        }

        .nav-link {
            position: relative;
            overflow: visible;
        }

        .nav-logo:hover .logo-icon {
            animation: bounce 0.6s ease;
        }

        @keyframes bounce {
            0%, 20%, 60%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            80% { transform: translateY(-5px); }
        }
    `;
    document.head.appendChild(style);
</script>

{{-- 
Usage Instructions:

1. Save this file as: resources/views/components/navbar.blade.php

2. In your master layout file (resources/views/frontend/layouts/master.blade.php), add:
   @include('components.navbar')

3. In your page files, just extend the master layout without including navbar:
   @extends('frontend.layouts.master')
   @section('content')
   <!-- Your page content here -->
   @endsection

4. For authentication, make sure you have:
   - Auth::check() and Auth::user() available
   - logout route defined in web.php

5. Features included:
   - Automatic active page detection
   - Mobile responsive
   - Authentication integration
   - Notification badges (optional)
   - Smooth animations
   - Clean code structure
--}}
