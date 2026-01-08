@extends('layouts.app')

@section('title', 'School Mate | Admin Profile Management')

@push('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
            position: relative;
        }

        /* Professional subtle background pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0.05;
            z-index: 0;
        }

        /* Top navigation bar */
        .top-nav {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 100;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .nav-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .nav-logo h1 {
            color: #2d3748;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .logout-btn {
            background: white;
            color: #e53e3e;
            border: 2px solid #e53e3e;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #e53e3e;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(229, 62, 62, 0.3);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px;
            position: relative;
            z-index: 1;
        }

        .page-header {
            margin-bottom: 30px;
            animation: fadeIn 0.6s ease-out;
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

        .page-title {
            color: #2d3748;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #718096;
            font-size: 1rem;
        }

        .tabs {
            background: white;
            border-radius: 12px;
            padding: 8px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            display: flex;
            gap: 8px;
            animation: fadeIn 0.7s ease-out;
        }

        .tab {
            color: #718096;
            font-size: 1rem;
            font-weight: 500;
            padding: 12px 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
            background: transparent;
        }

        .tab:hover {
            background: #f7fafc;
            color: #4a5568;
        }

        .tab.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            animation: slideUp 0.6s ease-out;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-color: #cbd5e0;
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

        .profile-header {
            display: flex;
            align-items: center;
            gap: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid #f7fafc;
        }

        .avatar-container {
            position: relative;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3.5rem;
            font-weight: 700;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.25);
        }

        .status-badge {
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 28px;
            height: 28px;
            background: #48bb78;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .profile-info h2 {
            color: #2d3748;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .profile-info .role {
            color: #667eea;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 8px;
            display: inline-block;
            padding: 4px 12px;
            background: #edf2f7;
            border-radius: 6px;
        }

        .profile-info .location {
            color: #718096;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .section-header h3 {
            color: #2d3748;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .edit-btn {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn:hover {
            background: #667eea;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .info-item {
            animation: fadeInUp 0.6s ease-out;
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

        .info-item label {
            display: block;
            color: #718096;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item .value {
            color: #2d3748;
            font-size: 1.05rem;
            font-weight: 500;
            padding: 14px 16px;
            background: #f7fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .info-item .value.readonly {
            color: #a0aec0;
            background: #edf2f7;
            cursor: not-allowed;
        }

        input[type="text"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #667eea;
            border-radius: 8px;
            font-size: 1.05rem;
            font-weight: 500;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #2d3748;
            background: white;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #764ba2;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px solid #f7fafc;
        }

        .save-btn {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(72, 187, 120, 0.3);
        }

        .save-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.4);
        }

        .cancel-btn {
            background: white;
            color: #718096;
            border: 2px solid #e2e8f0;
            padding: 12px 32px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .cancel-btn:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
        }

        .success-message {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: none;
            animation: slideDown 0.5s ease-out;
            box-shadow: 0 4px 12px rgba(72, 187, 120, 0.3);
            font-weight: 500;
        }

        .success-message.show {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-badge {
            display: inline-block;
            padding: 4px 8px;
            background: #edf2f7;
            color: #718096;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 8px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .top-nav {
                padding: 0 20px;
            }

            .nav-content {
                height: 60px;
            }

            .nav-logo h1 {
                font-size: 1.1rem;
            }

            .logo-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

            .container {
                padding: 20px;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .tabs {
                flex-direction: column;
                gap: 4px;
            }

            .tab {
                text-align: center;
            }

            .card {
                padding: 24px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .avatar {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }

            .profile-info h2 {
                font-size: 1.5rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .save-btn,
            .cancel-btn,
            .logout-btn,
            .edit-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .card {
                padding: 20px;
            }

            .page-title {
                font-size: 1.3rem;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        let isEditMode = false;
        let originalData = {};

        function toggleEdit() {
            isEditMode = !isEditMode;
            const infoGrid = document.getElementById('infoGrid');
            const actionButtons = document.getElementById('actionButtons');
            const editBtn = document.getElementById('editBtn');

            if (isEditMode) {
                originalData = {
                    firstName: document.getElementById('firstName').textContent,
                    userEmail: document.getElementById('userEmail').textContent,
                    userRole: document.getElementById('userRole').textContent
                };

                infoGrid.innerHTML = `
                    <div class="info-item">
                        <label>First Name</label>
                        <input type="text" id="firstNameInput" name="userName" value="${originalData.firstName}" autofocus>
                    </div>

                    <div class="info-item">
                        <label>Email Address <span class="info-badge">READ ONLY</span></label>
                        <div class="value readonly">${originalData.userEmail}</div>
                    </div>

                    <div class="info-item">
                        <label>User Role <span class="info-badge">READ ONLY</span></label>
                        <div class="value readonly">${originalData.userRole}</div>
                    </div>
                `;

                actionButtons.style.display = 'flex';
                editBtn.style.display = 'none';

                // Focus on input
                setTimeout(() => {
                    document.getElementById('firstNameInput').focus();
                }, 100);
            }
        }


        function cancelEdit() {
            const infoGrid = document.getElementById('infoGrid');
            infoGrid.innerHTML = `
                    <div class="info-item">
                        <label>First Name</label>
                        <input type="text" id="firstNameInput" value="${originalData.firstName}" autofocus>
                    </div>

                    <div class="info-item">
                        <label>Email Address <span class="info-badge">READ ONLY</span></label>
                        <div class="value readonly">${originalData.userEmail}</div>
                    </div>

                    <div class="info-item">
                        <label>User Role <span class="info-badge">READ ONLY</span></label>
                        <div class="value readonly">${originalData.userRole}</div>
                    </div>
                `;
            document.getElementById('actionButtons').style.display = 'none';
            document.getElementById('editBtn').style.display = 'flex';
            isEditMode = false;
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endpush

@section('content')

    <body>
        {{-- Massage --}}
        @extends('components.massage')

        <div class="top-nav">
            <div class="nav-content">
                <div class="nav-logo" onclick="window.location.href='{{ url('/school-dashboard') }}'">
                    <span class="logo-icon">🏫</span>
                    <h1>Admin Dashboard</h1>
                </div>
                <form action="{{ route('logout') }}" method="get">
                    <button class="logout-btn" type="submit">
                        <span>🚪</span>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="page-header">
                <h1 class="page-title">My Profile</h1>
                <p class="page-subtitle">Manage your personal information and account settings</p>
            </div>

            <div class="tabs">
                <div class="tab active">Profile</div>
            </div>

            <div class="card">
                <div class="profile-header">
                    <div class="avatar-container">
                        @php
                            $words = explode(' ', trim($user->name));
                            $initials = '';

                            if (count($words) >= 2) {
                                $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                            } else {
                                $initials = strtoupper(substr($words[0], 0, 2));
                            }
                        @endphp
                        <div class="avatar"> {{ $initials }}</div>
                        <div class="status-badge"></div>
                    </div>
                    <div class="profile-info">
                        <h2 id="displayName">{{ $user->name }}</h2>
                        <div class="role">{{ $user->role->role_name }}</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="section-header">
                    <h3>
                        <span>👤</span>
                        Personal Information
                    </h3>
                    <button class="edit-btn" id="editBtn" onclick="toggleEdit()">
                        <span>✏️</span>
                        <span>Edit Name</span>
                    </button>
                </div>
                <form action="{{ route('school.adminProfileUpdate') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="info-grid" id="infoGrid">
                        <div class="info-item">
                            <label>First Name</label>
                            <div class="value" id="firstName">{{ $user->name }}</div>
                        </div>

                        <div class="info-item">
                            <label>Email Address <span class="info-badge">READ ONLY</span></label>
                            <div class="value readonly" id="userEmail">{{ $user->email }}</div>
                        </div>

                        <div class="info-item">
                            <label>User Role <span class="info-badge">READ ONLY</span></label>
                            <div class="value readonly" id="userRole">{{ $user->role->role_name }}</div>
                        </div>
                    </div>

                    <div class="action-buttons" id="actionButtons" style="display: none;">
                        <button class="save-btn" type="submit">
                            💾 Save Changes
                        </button>
                        <button class="cancel-btn" onclick="cancelEdit()">
                            ❌ Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
