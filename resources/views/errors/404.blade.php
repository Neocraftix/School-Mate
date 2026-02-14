<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | School LMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #2563eb;
            --text-main: #1e293b;
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
            overflow: hidden;
            color: var(--text-main);
        }

        .error-container {
            text-align: center;
            padding: 40px;
            max-width: 600px;
            width: 90%;
        }

        /* Animated 404 Text */
        .error-code {
            font-size: 150px;
            font-weight: 800;
            margin: 0;
            line-height: 1;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 10px 10px rgba(37, 99, 235, 0.2));
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .error-title {
            font-size: 24px;
            font-weight: 700;
            margin-top: 20px;
            color: #334155;
        }

        .error-message {
            font-size: 16px;
            color: #64748b;
            margin: 15px 0 30px;
            line-height: 1.6;
        }

        /* Illustration Icon Area */
        .icon-box {
            font-size: 60px;
            color: #cbd5e1;
            margin-bottom: -20px;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: white;
            color: var(--text-main);
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            background-color: #f1f5f9;
        }

        /* Background Elements */
        .shape {
            position: absolute;
            z-index: -1;
            opacity: 0.5;
        }
    </style>
</head>

<body>

    <i class="fas fa-book shape"
        style="top: 15%; left: 10%; font-size: 40px; color: #dbeafe; transform: rotate(-15deg);"></i>
    <i class="fas fa-graduation-cap shape"
        style="bottom: 20%; right: 10%; font-size: 50px; color: #ede9fe; transform: rotate(20deg);"></i>
    <i class="fas fa-pencil-alt shape"
        style="top: 20%; right: 15%; font-size: 30px; color: #fef3c7; transform: rotate(45deg);"></i>

    <div class="error-container">
        <div class="icon-box">
            <i class="fas fa-search"></i>
        </div>
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Oops! Page is Not Found</h2>
        <p class="error-message">
            The page you are looking for might have been moved, deleted, or
            maybe it's just skipping school today. Let's get you back to the main hall.
        </p>

        <div class="btn-group">
            <a href="#" class="btn btn-primary">
                <i class="fas fa-home"></i> Go to Dashboard
            </a>
            <a href="#" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
        </div>
    </div>

</body>

</html>
