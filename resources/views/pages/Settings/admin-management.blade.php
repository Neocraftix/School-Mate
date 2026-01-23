@extends('layouts.app')

@section('title', 'School Mate | Admin Management')

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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            padding: 20;
            z-index: 2;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .header h1 {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .header p {
            color: #6b7280;
            font-size: 1.1rem;
        }

        .settings-grid {
            display: grid;
            grid-template-columns: 2fr 3fr;
            gap: 30px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
        }

        .card-header h2 {
            font-size: 1.8rem;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon {
            font-size: 1.5rem;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .admin-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .admin-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border: 2px solid rgba(102, 126, 234, 0.1);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .admin-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .admin-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .admin-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .admin-details {
            flex: 1;
        }

        .admin-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
        }

        .admin-email {
            color: #6b7280;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .admin-role {
            display: inline-block;
            padding: 6px 14px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .admin-actions {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 24px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            padding: 30px;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 1.8rem;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .modal-close {
            width: 40px;
            height: 40px;
            border: none;
            background: #f3f4f6;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            color: #6b7280;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: #e5e7eb;
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #374151;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
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

        select.form-control {
            cursor: pointer;
        }

        .modal-footer {
            padding: 20px 30px;
            border-top: 2px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            background: #f8fafc;
            border-radius: 0 0 24px 24px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        @media (max-width: 1024px) {
            .settings-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .card {
                padding: 20px;
            }

            .admin-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        let admins = [];

        function renderAdmins() {
            const adminList = document.getElementById('adminList');
            const totalAdmins = document.getElementById('totalAdmins');

            totalAdmins.textContent = admins.length;

            if (admins.length === 0) {
                adminList.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">👥</div>
                        <h3>No Admins Yet</h3>
                        <p>Click "Add Admin" to create your first administrator</p>
                    </div>
                `;
                return;
            }


        }

        function openAddModal() {
            document.getElementById('addAdminModal').classList.add('show');
            document.getElementById('addAdminForm').reset();
        }

        function closeAddModal() {
            document.getElementById('addAdminModal').classList.remove('show');
        }

        function addAdmin(event) {
            event.preventDefault();

            const name = document.getElementById('adminName').value;
            const email = document.getElementById('adminEmail').value;
            const password = document.getElementById('adminPassword').value;
            const role = document.getElementById('adminRole').value;

            const newAdmin = {
                name,
                email,
                password,
                role,
                createdAt: new Date().toISOString()
            };

            admins.push(newAdmin);
            renderAdmins();
            closeAddModal();

            alert(`✅ Admin "${name}" added successfully!`);
        }

        function editAdmin(index) {
            const admin = admins[index];
            const newName = prompt('Enter new name:', admin.name);
            if (newName && newName.trim()) {
                admins[index].name = newName.trim();
                renderAdmins();
                alert('✅ Admin updated successfully!');
            }
        }

        function deleteAdmin(index) {
            const admin = admins[index];
            if (confirm(`Are you sure you want to delete admin "${admin.name}"?`)) {
                admins.splice(index, 1);
                renderAdmins();
                alert('✅ Admin deleted successfully!');
            }
        }

        // Add some demo admins
        admins = [{
                name: 'John Anderson',
                email: 'john@lms.com',
                password: '******',
                role: 'Super Admin',
                createdAt: new Date().toISOString()
            },
            {
                name: 'Sarah Williams',
                email: 'sarah@lms.com',
                password: '******',
                role: 'Admin',
                createdAt: new Date().toISOString()
            },
            {
                name: 'Mike Johnson',
                email: 'mike@lms.com',
                password: '******',
                role: 'Moderator',
                createdAt: new Date().toISOString()
            }
        ];

        renderAdmins();

        // Close modal when clicking outside
        document.getElementById('addAdminModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddModal();
            }
        });
    </script>
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')

        <div class="bg-animation">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>

        <div class="container">
            <div class="header">
                <h1>⚙️ Settings</h1>
                <p>Manage your LMS system settings and administrators</p>
            </div>

            <div class="settings-grid">
                <div class="card">
                    <div class="card-header">
                        <h2><span class="icon">👥</span> Admin Management</h2>
                        <button class="btn btn-primary" onclick="openAddModal()">
                            <span>➕</span> Add Admin
                        </button>
                    </div>
                    <div class="admin-list">
                        @foreach ($admins as $admin)
                            <div class="admin-card">
                                <div class="admin-info">
                                    <div class="admin-details">
                                        <div class="admin-name">{{ $admin->name }}</div>
                                        <div class="admin-email">{{ $admin->email }}</div>
                                        <div class="admin-role">{{ $admin->role->role_name }}</div>
                                    </div>
                                    <div class="admin-actions">
                                        {{-- <button class="btn btn-icon btn-secondary" title="Edit">✏️</button> --}}
                                        <form action="{{ route('admin.adminDelete', $admin->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-icon btn-danger" type="submit"
                                                title="Delete">🗑️</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2><span class="icon">📊</span> System Statistics</h2>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                        <div
                            style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1)); padding: 25px; border-radius: 16px; text-align: center;">
                            <div
                                style="font-size: 2.5rem; font-weight: 700; background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 10px;">
                                {{ count($admins) }}
                            </div>
                            <div style="color: #6b7280; font-weight: 600;">Total Admins</div>
                        </div>
                        <div
                            style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1)); padding: 25px; border-radius: 16px; text-align: center;">
                            <div
                                style="font-size: 2.5rem; font-weight: 700; background: linear-gradient(135deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 10px;">
                                {{ count($roles) }}</div>
                            <div style="color: #6b7280; font-weight: 600;">Admin Roles</div>
                        </div>
                    </div>
                    <div
                        style="margin-top: 30px; padding: 20px; background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05)); border-radius: 16px;">
                        <h3 style="color: #374151; margin-bottom: 15px; font-size: 1.2rem;">Available Roles</h3>
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            @foreach ($roles as $role)
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div style="flex: 1;">
                                        <div style="font-weight: 600; color: #374151;">{{ $role->role_name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="addAdminModal" class="modal">
            <div class="modal-content">
                <form action="{{ route('admin.createAdmin') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h3><span>➕</span> Add New Admin</h3>
                        <button class="modal-close" onclick="closeAddModal()">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>👤 Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter admin name"
                                required>
                        </div>
                        <div class="form-group">
                            <label>📧 Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="admin@example.com"
                                required>
                        </div>
                        <div class="form-group">
                            <label>🔒 Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter secure password"
                                required minlength="6">
                        </div>
                        <div class="form-group">
                            <label>🎭 Admin Role</label>
                            <select class="form-control" name="role_id" required>
                                <option value="">Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" onclick="closeAddModal()">Cancel</button>
                        <button class="btn btn-primary" type="submit">
                            <span>✓</span> Add Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
