@extends('layouts.app')

@section('title', 'School Mate | Dash Board')

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

        /* Container Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-content h1 {
            font-size: 3rem;
            color: white;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .header-content p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }

        .header-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        /* Navigation Cards Grid */
        .nav-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .nav-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .nav-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: all 0.3s ease;
        }

        .nav-card:hover::before {
            left: 0;
        }

        .nav-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            background: white;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .nav-card .icon {
            font-size: 3rem;
            margin-bottom: 0;
            transition: transform 0.3s ease;
        }

        .nav-card:hover .icon {
            transform: scale(1.1) rotate(5deg);
        }

        .card-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .nav-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .nav-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .card-count {
            color: #667eea;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .card-arrow {
            color: #667eea;
            font-size: 1.2rem;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .nav-card:hover .card-arrow {
            transform: translateX(5px);
        }

        /* Quick Actions Section */
        .quick-actions {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .quick-actions h2 {
            color: white;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.8rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .action-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px 25px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-btn.primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .action-btn.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .action-btn.secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .action-btn.secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        .btn-icon {
            font-size: 1.2rem;
        }

        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .header-content h1 {
                font-size: 2rem;
            }

            .header-stats {
                gap: 15px;
            }

            .nav-cards-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .nav-card {
                padding: 20px;
            }
        }

        @media screen and (max-width: 480px) {
            .header-content h1 {
                font-size: 1.8rem;
            }

            .nav-card {
                padding: 20px;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        // Add smooth scrolling and animation effects for cards
        document.querySelectorAll('.nav-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-8px) scale(1.02)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add loading animation for cards
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        document.querySelectorAll('.nav-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `all 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });

        // Quick action button functionality
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const btnText = this.textContent.trim();

                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);

                // Handle different actions
                switch (btnText) {
                    case 'Add New Student':
                        window.location.href = '{{ url('/students') }}';
                        break;
                    case 'View Reports':
                        window.location.href = '{{ url('/reports') }}';
                        break;
                    case 'Generate Lists':
                        alert('Generate Lists functionality coming soon!');
                        break;
                    case 'Search Records':
                        alert('Search Records functionality coming soon!');
                        break;
                }
            });
        });

        // Add card animation on page load
        window.addEventListener('load', () => {
            const cards = document.querySelectorAll('.nav-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
@endpush

@section('content')
    <!-- Navigation Bar -->
    @include('components.navbar')

    <!-- Home Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-content">
                <h1>{{ $user->school->school_name }}</h1>
                <p>Manage your school efficiently with our comprehensive system</p>
            </div>
            <div class="header-stats">
                <div class="stat-card">
                    <div class="stat-number">{{ $studentCount }}</div>
                    <div class="stat-label">Total Students</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $teacherCount }}</div>
                    <div class="stat-label">Teachers</div>
                </div>
            </div>
        </div>

        <!-- Navigation Cards -->
        <div class="nav-cards-grid">
            <div class="nav-card" onclick="window.location.href='{{ route('students.index') }}'">
                <div class="card-header">
                    <div class="icon">👨‍🎓</div>
                </div>
                <h3>Students</h3>
                <p>Manage student information, enrollment, and academic records</p>
                <div class="card-footer">
                    <span class="card-count">{{ $studentCount }} registered</span>
                    <span class="card-arrow">→</span>
                </div>
            </div>

            <div class="nav-card" onclick="window.location.href='{{ route('teachers.index') }}'">
                <div class="card-header">
                    <div class="icon">👩‍🏫</div>
                </div>
                <h3>Teachers</h3>
                <p>Handle teacher profiles, assignments, and class schedules</p>
                <div class="card-footer">
                    <span class="card-count">{{ $teacherCount }} active</span>
                    <span class="card-arrow">→</span>
                </div>
            </div>

            <div class="nav-card" onclick="window.location.href='{{ route('inventories.index') }}'">
                <div class="card-header">
                    <div class="icon">📦</div>
                </div>
                <h3>Inventory</h3>
                <p>Track school supplies, equipment, and resource management</p>
                <div class="card-footer">
                    <span class="card-count">{{ $inventoryCount }} items</span>
                    <span class="card-arrow">→</span>
                </div>
            </div>

            {{-- <div class="nav-card">
                <div class="card-header">
                    <div class="icon">🏢</div>
                    <div class="card-badge">Maintained</div>
                </div>
                <h3>School Facilities</h3>
                <p>Manage classrooms, laboratories, and building information</p>
                <div class="card-footer">
                    <span class="card-count">24 rooms</span>
                    <span class="card-arrow">→</span>
                </div>
            </div> --}}

            {{-- <div class="nav-card">
                <div class="card-header">
                    <div class="icon">🚌</div>
                    <div class="card-badge">Operational</div>
                </div>
                <h3>School Vehicles</h3>
                <p>Track and maintain school-owned transportation vehicles</p>
                <div class="card-footer">
                    <span class="card-count">8 vehicles</span>
                    <span class="card-arrow">→</span>
                </div>
            </div> --}}

            {{-- <div class="nav-card">
                <div class="card-header">
                    <div class="icon">🏞️</div>
                    <div class="card-badge">Registered</div>
                </div>
                <h3>Land Information</h3>
                <p>Manage school property, land details, and legal documents</p>
                <div class="card-footer">
                    <span class="card-count">5.2 acres</span>
                    <span class="card-arrow">→</span>
                </div>
            </div> --}}

            <div class="nav-card" onclick="window.location.href='{{ route('furniture.index') }}'">
                <div class="card-header">
                    <div class="icon">🪑</div>
                    {{-- <div class="card-badge">Catalogued</div> --}}
                </div>
                <h3>Furniture Inventory</h3>
                <p>Track desks, chairs, tables, and other furniture items</p>
                <div class="card-footer">
                    <span class="card-count">{{ $furnitureInventoryCount }} pieces</span>
                    <span class="card-arrow">→</span>
                </div>
            </div>

             <div class="nav-card">
                <div class="card-header">
                    <div class="icon">💵</div>
                    <div class="card-badge">Bata</div>
                </div>
                <h3>Budget Plan</h3>
                <p>Manage All Budget</p>
                {{-- <div class="card-footer">
                    <span class="card-count">pieces</span>
                    <span class="card-arrow">→</span>
                </div> --}}
            </div>

            {{-- <div class="nav-card">
                <div class="card-header">
                    <div class="icon">⚡</div>
                    <div class="card-badge">Connected</div>
                </div>
                <h3>Electricity Connection</h3>
                <p>Manage power connections, billing, and electrical accounts</p>
                <div class="card-footer">
                    <span class="card-count">3 connections</span>
                    <span class="card-arrow">→</span>
                </div>
            </div> --}}

            {{-- <div class="nav-card">
                <div class="card-header">
                    <div class="icon">📚</div>
                    <div class="card-badge">Available</div>
                </div>
                <h3>Additional Resources</h3>
                <p>Handle library books, educational materials, and resources</p>
                <div class="card-footer">
                    <span class="card-count">2,340 books</span>
                    <span class="card-arrow">→</span>
                </div>
            </div> --}}
        </div>

        <!-- Quick Actions Section -->
        {{-- <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="actions-grid">
                <button class="action-btn primary">
                    <span class="btn-icon">➕</span>
                    Add New Student
                </button>
                <button class="action-btn secondary">
                    <span class="btn-icon">📊</span>
                    View Reports
                </button>
                <button class="action-btn secondary">
                    <span class="btn-icon">📋</span>
                    Generate Lists
                </button>
                <button class="action-btn secondary">
                    <span class="btn-icon">🔍</span>
                    Search Records
                </button>
            </div>
        </div> --}}
    </div>
@endsection
