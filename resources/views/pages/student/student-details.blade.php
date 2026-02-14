@extends('layouts.app')

@section('title', 'School Mate | Student Details')

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

        /* Profile Header */
        .profile-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
            animation: slideIn 0.5s ease;
        }

        .profile-header-content {
            display: flex;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .profile-avatar-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            font-weight: bold;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            }

            50% {
                box-shadow: 0 8px 40px rgba(102, 126, 234, 0.4);
            }

            100% {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            }
        }

        .profile-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            color: white;
            font-size: 0.9rem;
        }

        .profile-status.online .status-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: blink 2s infinite;
        }

        .profile-status.offline .status-dot {
            width: 8px;
            height: 8px;
            background: #ff0000;
            border-radius: 50%;
            animation: blink 2s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .profile-info {
            flex: 1;
            color: white;
        }

        .student-name {
            font-size: 2.2rem;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .student-tagline {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 15px;
        }

        .student-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
        }

        .meta-icon {
            font-size: 1.1rem;
        }

        .profile-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
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
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Quick Stats */
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-item {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.6s ease;
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

        .stat-item:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.attendance {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        .stat-icon.grade {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .stat-icon.rank {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .stat-icon.achievements {
            background: linear-gradient(135deg, #ec4899, #be185d);
        }

        .stat-content {
            flex: 1;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #374151;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Tab Navigation */
        .tab-navigation {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow-x: auto;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .tab-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .tab-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .tab-icon {
            font-size: 1.1rem;
        }

        /* Tab Contents */
        .tab-contents {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            min-height: 500px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .tab-pane {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .tab-pane.active {
            display: block;
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

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
        }

        .info-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .info-card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
            color: #374151;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(102, 126, 234, 0.2);
        }

        .title-icon {
            font-size: 1.4rem;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .info-value {
            color: #374151;
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Academic Section */
        .academic-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .performance-card {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .section-title {
            font-size: 1.3rem;
            color: #374151;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Grades Table */
        .grades-table-container {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .grades-table {
            width: 100%;
            border-collapse: collapse;
        }

        .grades-table thead {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .grades-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
        }

        .grades-table td {
            padding: 15px;
            border-bottom: 1px solid #f3f4f6;
        }

        .grades-table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
        }

        .subject-name {
            font-weight: 600;
            color: #374151;
        }

        .average {
            font-weight: 600;
            color: #667eea;
        }

        .grade-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            color: white;
        }

        .grade-badge.grade-a {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .grade-badge.grade-b {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        .trend {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: bold;
        }

        .trend.up {
            color: #10b981;
            background: rgba(16, 185, 129, 0.1);
        }

        .trend.down {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
        }

        .trend.stable {
            color: #f59e0b;
            background: rgba(245, 158, 11, 0.1);
        }

        /* Chart Container */
        .chart-container {
            height: 300px;
            padding: 20px;
            background: white;
            border-radius: 12px;
        }

        /* Exam List */
        .exam-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .exam-item {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .exam-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .exam-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .exam-header h4 {
            color: #374151;
            margin: 0;
        }

        .exam-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .exam-badge.excellent {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .exam-details {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .detail-item {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Achievements Section */
        .achievements-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .achievements-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .achievement-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .achievement-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .achievement-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .achievement-card.gold {
            border-color: #fbbf24;
            background: linear-gradient(135deg, rgba(251, 191, 36, 0.05), rgba(255, 255, 255, 1));
        }

        .achievement-card.gold::before {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
        }

        .achievement-card.silver {
            border-color: #9ca3af;
            background: linear-gradient(135deg, rgba(156, 163, 175, 0.05), rgba(255, 255, 255, 1));
        }

        .achievement-card.silver::before {
            background: linear-gradient(135deg, #9ca3af, #6b7280);
        }

        .achievement-card.bronze {
            border-color: #d97706;
            background: linear-gradient(135deg, rgba(217, 119, 6, 0.05), rgba(255, 255, 255, 1));
        }

        .achievement-card.bronze::before {
            background: linear-gradient(135deg, #d97706, #b45309);
        }

        .achievement-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .achievement-content h4 {
            color: #374151;
            margin-bottom: 8px;
        }

        .achievement-content p {
            color: #6b7280;
            margin-bottom: 12px;
        }

        .achievement-date {
            color: #9ca3af;
            font-size: 0.85rem;
        }

        /* Activities */
        .activities-section {
            margin-top: 30px;
        }

        .activities-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-color: #667eea;
        }

        .activity-icon {
            font-size: 2rem;
        }

        .activity-details h4 {
            color: #374151;
            margin: 0 0 4px 0;
        }

        .activity-details p {
            color: #6b7280;
            margin: 0;
            font-size: 0.9rem;
        }

        /* Documents Section */
        .documents-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .documents-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .documents-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .document-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .document-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border-color: #667eea;
        }

        .document-icon {
            font-size: 2.5rem;
        }

        .document-info {
            flex: 1;
        }

        .document-info h4 {
            color: #374151;
            margin: 0 0 4px 0;
        }

        .document-info p {
            color: #6b7280;
            margin: 0;
            font-size: 0.85rem;
        }

        .document-actions {
            display: flex;
            gap: 8px;
        }

        .btn-icon-action {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .btn-icon-action.view {
            background: rgba(59, 130, 246, 0.1);
        }

        .btn-icon-action.view:hover {
            background: rgba(59, 130, 246, 0.2);
            transform: scale(1.1);
        }

        .btn-icon-action.download {
            background: rgba(16, 185, 129, 0.1);
        }

        .btn-icon-action.download:hover {
            background: rgba(16, 185, 129, 0.2);
            transform: scale(1.1);
        }

        /* Attendance Section */
        .attendance-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .attendance-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .attendance-summary {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .summary-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .summary-label {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .summary-value {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .summary-value.present {
            color: #10b981;
        }

        .summary-value.absent {
            color: #ef4444;
        }

        .summary-value.late {
            color: #f59e0b;
        }

        /* Calendar View */
        .calendar-view {
            background: white;
            border-radius: 15px;
            padding: 25px;
            border: 1px solid #e5e7eb;
        }

        .month-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .month-header h4 {
            color: #374151;
            margin: 0;
        }

        .month-nav {
            width: 35px;
            height: 35px;
            border: 1px solid #e5e7eb;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .month-nav:hover {
            background: #f3f4f6;
            border-color: #667eea;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .day-header {
            text-align: center;
            font-weight: 600;
            color: #6b7280;
            padding: 10px;
            font-size: 0.9rem;
        }

        .day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .day.present {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .day.absent {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .day.late {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }

        .day.weekend {
            background: #f3f4f6;
            color: #9ca3af;
        }

        .day:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Attendance Legend */
        .attendance-legend {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        .legend-color.present {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid #10b981;
        }

        .legend-color.absent {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid #ef4444;
        }

        .legend-color.late {
            background: rgba(245, 158, 11, 0.2);
            border: 1px solid #f59e0b;
        }

        .legend-color.holiday {
            background: #f3f4f6;
            border: 1px solid #d1d5db;
        }

        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .profile-header-content {
                flex-direction: column;
                text-align: center;
            }

            .profile-info {
                text-align: center;
            }

            .student-meta {
                justify-content: center;
            }

            .profile-actions {
                justify-content: center;
                width: 100%;
            }

            .quick-stats {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .tab-navigation {
                overflow-x: auto;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .grades-table {
                font-size: 0.85rem;
            }

            .achievements-grid {
                grid-template-columns: 1fr;
            }

            .activities-list {
                grid-template-columns: 1fr;
            }

            .documents-grid {
                grid-template-columns: 1fr;
            }

            .attendance-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media screen and (max-width: 480px) {
            .student-name {
                font-size: 1.8rem;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 2rem;
            }

            .tab-btn {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .calendar-grid {
                gap: 5px;
            }

            .day {
                font-size: 0.85rem;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        function printBasicInfo() {
            const content = document.getElementById('basic-info').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContent;

            location.reload(); // page eka normal widihata ganna
        }

        // Tab switching functionality
        function switchTab(tabId) {
            // Hide all tab panes
            const panes = document.querySelectorAll('.tab-pane');
            panes.forEach(pane => {
                pane.classList.remove('active');
            });

            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.tab-btn');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });

            // Show selected tab pane
            document.getElementById(tabId).classList.add('active');

            // Add active class to clicked tab
            event.target.classList.add('active');
        }

        // Add animation on scroll
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

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll(
                '.stat-item, .info-card, .achievement-card, .activity-item, .document-card');
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = `all 0.6s ease ${index * 0.1}s`;
                observer.observe(el);
            });

            // Sample chart initialization (you would need Chart.js for actual implementation)
            const chartCanvas = document.getElementById('performanceChart');
            if (chartCanvas) {
                // This is a placeholder - you would initialize your chart here
                console.log('Chart canvas ready for initialization');
            }
        });

        

        // Add achievement button functionality
        document.querySelector('.achievements-header .btn-primary')?.addEventListener('click', () => {
            alert('Add new achievement form would open here');
        });

        // Add document upload functionality
        document.querySelector('.documents-header .btn-primary')?.addEventListener('click', () => {
            alert('Document upload dialog would open here');
        });

        // Smooth hover effects for cards
        document.querySelectorAll('.achievement-card, .activity-item, .document-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            });
        });

        // Calendar navigation
        document.querySelectorAll('.month-nav').forEach(btn => {
            btn.addEventListener('click', function() {
                const direction = this.textContent.includes('◀') ? 'previous' : 'next';
                console.log(`Navigate to ${direction} month`);
                // Implement month navigation logic here
            });
        });

        // Day click handler for attendance calendar
        document.querySelectorAll('.day').forEach(day => {
            if (day.textContent) {
                day.addEventListener('click', function() {
                    const date = this.textContent;
                    const status = this.classList.contains('present') ? 'Present' :
                        this.classList.contains('absent') ? 'Absent' :
                        this.classList.contains('late') ? 'Late' : 'Weekend/Holiday';

                    if (status !== 'Weekend/Holiday' && date) {
                        alert(`Date: March ${date}, 2024\nStatus: ${status}`);
                    }
                });
            }
        });
    </script>
@endpush

@push('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
@endpush

@section('content')

    <body>
        <!-- Navigation Bar -->
        @include('components.navbar')

        {{-- Massage --}}
        @extends('components.massage')
        <!-- Student Details Page Content -->
        <div class="container">
            <!-- Student Profile Header -->
            <div class="profile-header">
                <div class="profile-header-content">
                    <div class="profile-avatar-section">
                        <div class="profile-avatar">
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

                        @if ($student->studentStatus->id == 1)
                            <div class="profile-status online">
                                <span class="status-dot"></span>
                                Active Student
                            </div>
                        @else
                            <div class="profile-status offline">
                                <span class="status-dot"></span>
                                {{ $student->studentStatus->student_status }} Student
                            </div>
                        @endif

                    </div>
                    <div class="profile-info">
                        <h1 class="student-name">{{ $student->child_name }}</h1>
                        <p class="student-tagline">Grade {{ $student->grade->grade }}</p>
                        <div class="student-meta">
                            <span class="meta-item">
                                <span class="meta-icon">🎓</span>
                                Admission No : {{ $student->admission_number }}
                            </span>
                            <span class="meta-item">
                                <span class="meta-icon">📅</span>
                                Joined : {{ $student->created_at->format('d F Y') }}
                            </span>
                            <span class="meta-item">
                                @php
                                    $dob = $student->date_of_birth;
                                    $age = null;

                                    if ($dob) {
                                        $birthDate = new DateTime($dob);
                                        $today = new DateTime();
                                        $age = $today->diff($birthDate)->y;
                                    }
                                @endphp
                                <span class="meta-icon">🎂</span>
                                Age : {{ $age ?? '-' }}
                            </span>
                        </div>
                    </div>
                    <div class="profile-actions">
                        {{-- <button class="btn btn-primary">
                        <span class="btn-icon">✏️</span>
                        Edit Profile
                    </button> --}}
                        <button class="btn btn-secondary" onclick="window.location='{{ route('students.studentReportPdf',$student->id) }}'">
                            <span class="btn-icon">📥</span>
                            Download Report
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            {{-- <div class="quick-stats">
            <div class="stat-item">
                <div class="stat-icon attendance">📊</div>
                <div class="stat-content">
                    <div class="stat-value">92%</div>
                    <div class="stat-label">Attendance</div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon grade">⭐</div>
                <div class="stat-content">
                    <div class="stat-value">A+</div>
                    <div class="stat-label">Average Grade</div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon rank">🏆</div>
                <div class="stat-content">
                    <div class="stat-value">3rd</div>
                    <div class="stat-label">Class Rank</div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon achievements">🎖️</div>
                <div class="stat-content">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Achievements</div>
                </div>
            </div>
        </div> --}}

            <!-- Tab Navigation -->
            <div class="tab-navigation">
                <button class="tab-btn active" onclick="switchTab('basic-info')">
                    <span class="tab-icon">👤</span>
                    Basic Information
                </button>
                {{-- <button class="tab-btn" onclick="switchTab('academic')">
                    <span class="tab-icon">📚</span>
                    Academic Performance
                </button>
                <button class="tab-btn" onclick="switchTab('achievements')">
                    <span class="tab-icon">🏅</span>
                    Achievements
                </button>
                <button class="tab-btn" onclick="switchTab('documents')">
                    <span class="tab-icon">📄</span>
                    Documents
                </button>
                <button class="tab-btn" onclick="switchTab('attendance')">
                    <span class="tab-icon">📅</span>
                    Attendance
                </button> --}}
            </div>

            <!-- Tab Contents -->
            <div class="tab-contents">
                <!-- Basic Information Tab -->
                <div id="basic-info" class="tab-pane active">
                    <div class="info-grid">
                        <div class="info-card personal">
                            <h3 class="info-card-title">
                                <span class="title-icon">👤</span>
                                Personal Information
                            </h3>
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-label">Admission Number:</span>
                                    <span class="info-value">{{ $student->admission_number }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Full Name:</span>
                                    <span class="info-value">{{ $student->child_name }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Full Name with Initials:</span>
                                    <span class="info-value">{{ $student->full_name_with_initials }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Date of Birth:</span>
                                    <span class="info-value">{{ $student->date_of_birth }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Gender:</span>
                                    <span class="info-value">{{ $student->gender->gender }}</span>
                                </div>
                                <div class="info-item col-12">
                                    <div class="card shadow-sm border-0 col-12">
                                        <div class="card-header bg-light fw-semibold">
                                            Sibling Details
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0 text-break text-wrap" style="white-space: pre-line;">
                                                {{ $student->sibling_details ?? 'No sibling details available.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="info-card contact">
                            <h3 class="info-card-title">
                                <span class="title-icon">📞</span>
                                Contact Information
                            </h3>
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-label">Address:</span>
                                    <span class="info-value">{{ $student->address }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Phone:</span>
                                    <span class="info-value">{{ $student->telephone_number }}</span>
                                </div>
                                {{-- <div class="info-item">
                                <span class="info-label">Email:</span>
                                <span class="info-value">kamal.h@student.school.lk</span>
                            </div> --}}
                                {{-- <div class="info-item">
                                <span class="info-label">Emergency Contact:</span>
                                <span class="info-value">071-9876543 (Mother)</span>
                            </div> --}}
                                <div class="info-item">
                                    <span class="info-label">Transport:</span>
                                    <span class="info-value">{{ $student->transport->transport_methord }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="info-card guardian">
                            <h3 class="info-card-title">
                                <span class="title-icon">👨‍👩‍👦</span>
                                Guardian Information
                            </h3>
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-label">Father's Name:</span>
                                    <span class="info-value">{{ $student->father_name }}</span>
                                </div>
                                {{-- <div class="info-item">
                                <span class="info-label">Father's Occupation:</span>
                                <span class="info-value">Engineer</span>
                            </div> --}}
                                <div class="info-item">
                                    <span class="info-label">Mother's Name:</span>
                                    <span class="info-value">{{ $student->mother_name }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Guardian’s Name:</span>
                                    <span class="info-value">{{ $student->guardian_name }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Guardian’s Address:</span>
                                    <span class="info-value">{{ $student->guardian_address }}</span>
                                </div>
                                {{-- <div class="info-item">
                                <span class="info-label">Mother's Occupation:</span>
                                <span class="info-value">Teacher</span>
                            </div> --}}
                                {{-- <div class="info-item">
                                <span class="info-label">Guardian Contact:</span>
                                <span class="info-value">071-9876543</span>
                            </div> --}}
                            </div>
                        </div>

                        <div class="info-card medical">
                            <h3 class="info-card-title">
                                <span class="title-icon">🏥</span>
                                Medical Information
                            </h3>
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-label">Blood Type:</span>
                                    <span class="info-value">{{ $student->bloodType->blood_type }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Medical Conditions:</span>
                                </div>
                                <div class="info-item col-12">
                                    <div class="card shadow-sm border-0 col-12">
                                        <div class="card-header bg-light fw-semibold">
                                            Sibling Details
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0 text-break text-wrap" style="white-space: pre-line;">
                                                {{ $student->special_medical_conditions ?? 'No special medical conditions.' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="info-item">
                                <span class="info-label">Medications:</span>
                                <span class="info-value">None</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Last Medical Check:</span>
                                <span class="info-value">January 2024</span>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Performance Tab -->
                <div id="academic" class="tab-pane">
                    <div class="academic-section">
                        <!-- Current Term Performance -->
                        <div class="performance-card">
                            <h3 class="section-title">📊 Current Term Performance</h3>
                            <div class="grades-table-container">
                                <table class="grades-table">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>1st Term</th>
                                            <th>2nd Term</th>
                                            <th>3rd Term</th>
                                            <th>Average</th>
                                            <th>Grade</th>
                                            <th>Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="subject-name">Mathematics</td>
                                            <td>92</td>
                                            <td>95</td>
                                            <td>94</td>
                                            <td class="average">93.7</td>
                                            <td><span class="grade-badge grade-a">A+</span></td>
                                            <td><span class="trend up">↑</span></td>
                                        </tr>
                                        <tr>
                                            <td class="subject-name">Science</td>
                                            <td>88</td>
                                            <td>90</td>
                                            <td>92</td>
                                            <td class="average">90.0</td>
                                            <td><span class="grade-badge grade-a">A+</span></td>
                                            <td><span class="trend up">↑</span></td>
                                        </tr>
                                        <tr>
                                            <td class="subject-name">English</td>
                                            <td>85</td>
                                            <td>87</td>
                                            <td>86</td>
                                            <td class="average">86.0</td>
                                            <td><span class="grade-badge grade-a">A</span></td>
                                            <td><span class="trend stable">→</span></td>
                                        </tr>
                                        <tr>
                                            <td class="subject-name">Sinhala</td>
                                            <td>82</td>
                                            <td>85</td>
                                            <td>88</td>
                                            <td class="average">85.0</td>
                                            <td><span class="grade-badge grade-a">A</span></td>
                                            <td><span class="trend up">↑</span></td>
                                        </tr>
                                        <tr>
                                            <td class="subject-name">History</td>
                                            <td>78</td>
                                            <td>75</td>
                                            <td>77</td>
                                            <td class="average">76.7</td>
                                            <td><span class="grade-badge grade-b">B+</span></td>
                                            <td><span class="trend down">↓</span></td>
                                        </tr>
                                        <tr>
                                            <td class="subject-name">ICT</td>
                                            <td>96</td>
                                            <td>98</td>
                                            <td>97</td>
                                            <td class="average">97.0</td>
                                            <td><span class="grade-badge grade-a">A+</span></td>
                                            <td><span class="trend up">↑</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Performance Chart -->
                        <div class="performance-card">
                            <h3 class="section-title">📈 Performance Trend</h3>
                            <div class="chart-container">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>

                        <!-- Exam History -->
                        <div class="performance-card">
                            <h3 class="section-title">📝 Recent Exam Results</h3>
                            <div class="exam-list">
                                <div class="exam-item">
                                    <div class="exam-header">
                                        <h4>Term Test - March 2024</h4>
                                        <span class="exam-badge excellent">Excellent</span>
                                    </div>
                                    <div class="exam-details">
                                        <span class="detail-item">Total Marks: 582/600</span>
                                        <span class="detail-item">Percentage: 97%</span>
                                        <span class="detail-item">Rank: 2nd in Class</span>
                                    </div>
                                </div>
                                <div class="exam-item">
                                    <div class="exam-header">
                                        <h4>Mid Year Examination - 2024</h4>
                                        <span class="exam-badge excellent">Excellent</span>
                                    </div>
                                    <div class="exam-details">
                                        <span class="detail-item">Total Marks: 870/900</span>
                                        <span class="detail-item">Percentage: 96.7%</span>
                                        <span class="detail-item">Rank: 3rd in Grade</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Achievements Tab -->
                <div id="achievements" class="tab-pane">
                    <div class="achievements-section">
                        <div class="achievements-header">
                            <h3 class="section-title">🏆 Student Achievements</h3>
                            <button class="btn btn-primary">
                                <span class="btn-icon">➕</span>
                                Add Achievement
                            </button>
                        </div>

                        <div class="achievements-grid">
                            <div class="achievement-card gold">
                                <div class="achievement-icon">🥇</div>
                                <div class="achievement-content">
                                    <h4>Mathematics Olympiad</h4>
                                    <p>National Level - Gold Medal</p>
                                    <span class="achievement-date">December 2023</span>
                                </div>
                            </div>

                            <div class="achievement-card silver">
                                <div class="achievement-icon">🥈</div>
                                <div class="achievement-content">
                                    <h4>Science Fair Project</h4>
                                    <p>Provincial Level - Second Place</p>
                                    <span class="achievement-date">November 2023</span>
                                </div>
                            </div>

                            <div class="achievement-card bronze">
                                <div class="achievement-icon">🥉</div>
                                <div class="achievement-content">
                                    <h4>Debate Competition</h4>
                                    <p>District Level - Third Place</p>
                                    <span class="achievement-date">October 2023</span>
                                </div>
                            </div>

                            <div class="achievement-card special">
                                <div class="achievement-icon">⭐</div>
                                <div class="achievement-content">
                                    <h4>Best Student Award</h4>
                                    <p>Grade 10 - Academic Excellence</p>
                                    <span class="achievement-date">December 2022</span>
                                </div>
                            </div>

                            <div class="achievement-card certificate">
                                <div class="achievement-icon">📜</div>
                                <div class="achievement-content">
                                    <h4>Perfect Attendance</h4>
                                    <p>Full Academic Year 2023</p>
                                    <span class="achievement-date">December 2023</span>
                                </div>
                            </div>

                            <div class="achievement-card sports">
                                <div class="achievement-icon">🏃</div>
                                <div class="achievement-content">
                                    <h4>Athletics Meet</h4>
                                    <p>100m Sprint - School Champion</p>
                                    <span class="achievement-date">September 2023</span>
                                </div>
                            </div>
                        </div>

                        <!-- Extra Curricular Activities -->
                        <div class="activities-section">
                            <h3 class="section-title">🎭 Extra-Curricular Activities</h3>
                            <div class="activities-list">
                                <div class="activity-item">
                                    <div class="activity-icon">🎨</div>
                                    <div class="activity-details">
                                        <h4>Art Club</h4>
                                        <p>Active Member - 2 years</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">🎵</div>
                                    <div class="activity-details">
                                        <h4>School Orchestra</h4>
                                        <p>Violin Player - 3 years</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">♟️</div>
                                    <div class="activity-details">
                                        <h4>Chess Club</h4>
                                        <p>Team Captain</p>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon">🤖</div>
                                    <div class="activity-details">
                                        <h4>Robotics Club</h4>
                                        <p>Lead Programmer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Tab -->
                <div id="documents" class="tab-pane">
                    <div class="documents-section">
                        <div class="documents-header">
                            <h3 class="section-title">📁 Student Documents</h3>
                            <button class="btn btn-primary">
                                <span class="btn-icon">📤</span>
                                Upload Document
                            </button>
                        </div>

                        <div class="documents-grid">
                            <div class="document-card">
                                <div class="document-icon">📄</div>
                                <div class="document-info">
                                    <h4>Birth Certificate</h4>
                                    <p>Uploaded: Jan 15, 2023</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon-action view">👁️</button>
                                    <button class="btn-icon-action download">📥</button>
                                </div>
                            </div>

                            <div class="document-card">
                                <div class="document-icon">🖼️</div>
                                <div class="document-info">
                                    <h4>Passport Photo</h4>
                                    <p>Uploaded: Jan 15, 2023</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon-action view">👁️</button>
                                    <button class="btn-icon-action download">📥</button>
                                </div>
                            </div>

                            <div class="document-card">
                                <div class="document-icon">📋</div>
                                <div class="document-info">
                                    <h4>Medical Certificate</h4>
                                    <p>Uploaded: Feb 20, 2024</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon-action view">👁️</button>
                                    <button class="btn-icon-action download">📥</button>
                                </div>
                            </div>

                            <div class="document-card">
                                <div class="document-icon">📑</div>
                                <div class="document-info">
                                    <h4>Transfer Certificate</h4>
                                    <p>Uploaded: Jan 10, 2023</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon-action view">👁️</button>
                                    <button class="btn-icon-action download">📥</button>
                                </div>
                            </div>

                            <div class="document-card">
                                <div class="document-icon">🎓</div>
                                <div class="document-info">
                                    <h4>Previous School Report</h4>
                                    <p>Uploaded: Jan 12, 2023</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon-action view">👁️</button>
                                    <button class="btn-icon-action download">📥</button>
                                </div>
                            </div>

                            <div class="document-card">
                                <div class="document-icon">💉</div>
                                <div class="document-info">
                                    <h4>Vaccination Card</h4>
                                    <p>Uploaded: Jan 15, 2023</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon-action view">👁️</button>
                                    <button class="btn-icon-action download">📥</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendance Tab -->
                <div id="attendance" class="tab-pane">
                    <div class="attendance-section">
                        <div class="attendance-header">
                            <h3 class="section-title">📅 Attendance Record</h3>
                            <div class="attendance-summary">
                                <div class="summary-item">
                                    <span class="summary-label">Total Days:</span>
                                    <span class="summary-value">200</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Present:</span>
                                    <span class="summary-value present">184</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Absent:</span>
                                    <span class="summary-value absent">10</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Late:</span>
                                    <span class="summary-value late">6</span>
                                </div>
                            </div>
                        </div>

                        <div class="calendar-view">
                            <!-- Calendar implementation would go here -->
                            <div class="month-header">
                                <button class="month-nav">◀</button>
                                <h4>March 2024</h4>
                                <button class="month-nav">▶</button>
                            </div>
                            <div class="calendar-grid">
                                <!-- Sample calendar days -->
                                <div class="day-header">Sun</div>
                                <div class="day-header">Mon</div>
                                <div class="day-header">Tue</div>
                                <div class="day-header">Wed</div>
                                <div class="day-header">Thu</div>
                                <div class="day-header">Fri</div>
                                <div class="day-header">Sat</div>

                                <!-- Sample dates with attendance status -->
                                <div class="day"></div>
                                <div class="day"></div>
                                <div class="day"></div>
                                <div class="day"></div>
                                <div class="day present">1</div>
                                <div class="day present">2</div>
                                <div class="day weekend">3</div>
                                <div class="day weekend">4</div>
                                <div class="day present">5</div>
                                <div class="day present">6</div>
                                <div class="day present">7</div>
                                <div class="day absent">8</div>
                                <div class="day present">9</div>
                                <div class="day weekend">10</div>
                            </div>
                        </div>

                        <div class="attendance-legend">
                            <div class="legend-item">
                                <span class="legend-color present"></span>
                                <span>Present</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color absent"></span>
                                <span>Absent</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color late"></span>
                                <span>Late</span>
                            </div>
                            <div class="legend-item">
                                <span class="legend-color holiday"></span>
                                <span>Holiday/Weekend</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
