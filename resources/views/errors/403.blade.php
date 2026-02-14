<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied | School-Mate</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --danger-color: #ef4444;
            --primary-color: #2563eb;
            --text-main: #0f172a;
            --bg-color: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: var(--text-main);
        }

        .error-wrapper {
            text-align: center;
            padding: 20px;
            max-width: 500px;
        }

        /* Lock Icon & Animation */
        .icon-container {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .main-lock {
            font-size: 100px;
            color: var(--danger-color);
            animation: lockShake 1s ease-in-out infinite;
        }

        @keyframes lockShake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-10deg);
            }

            75% {
                transform: rotate(10deg);
            }
        }

        .shield-icon {
            position: absolute;
            bottom: 0;
            right: -10px;
            font-size: 40px;
            color: #1e293b;
            background: var(--bg-color);
            border-radius: 50%;
            padding: 5px;
        }

        /* Text Styles */
        .error-code {
            font-size: 120px;
            font-weight: 900;
            margin: 0;
            line-height: 1;
            letter-spacing: -5px;
            color: #1e293b;
            opacity: 0.1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .error-content {
            position: relative;
            z-index: 1;
        }

        .error-title {
            font-size: 28px;
            font-weight: 800;
            margin: 10px 0;
            color: #1e293b;
        }

        .error-desc {
            font-size: 16px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        /* Action Buttons */
        .btn-container {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
        }

        .btn-home {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }

        .btn-home:hover {
            background-color: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(37, 99, 235, 0.3);
        }

        .btn-outline {
            border: 2px solid #e2e8f0;
            color: #475569;
        }

        .btn-outline:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
        }

        /* Warning Banner */
        .warning-tag {
            display: inline-block;
            background: #fee2e2;
            color: #ef4444;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="error-wrapper">
        <div class="error-content">
            <h1 class="error-code">403</h1>

            <div class="icon-container">
                <i class="fas fa-user-lock main-lock"></i>
                <i class="fas fa-shield-alt shield-icon"></i>
            </div>

            <br>
            <div class="warning-tag">Restricted Access</div>
            <h2 class="error-title">Halt! This area is off-limits</h2>
            <p class="error-desc">
                It seems you don't have the necessary permissions to enter this section.
                Please contact the school administrator if you think this is a mistake.
            </p>

            <div class="btn-container">
                <a href="#" class="btn btn-home">
                    <i class="fas fa-th-large"></i> Back to Dashboard
                </a>
                <a href="#" class="btn btn-outline" onclick="history.back()">
                    <i class="fas fa-arrow-left"></i> Go Back
                </a>
            </div>
        </div>
    </div>

</body>

</html>
