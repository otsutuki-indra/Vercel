<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Email and Password are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HellCrop - Sign In</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #0a0a0a, #1a2a1f);
            color: #e0e0e0;
            min-height: 100vh;
            overflow: hidden;
        }

        .bg-animation {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: -1;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            background: rgba(0, 255, 100, 0.08);
            border-radius: 50%;
            animation: float 25s infinite linear;
            box-shadow: 0 0 30px rgba(0, 255, 100, 0.2);
        }

        .bubble1 { width: 300px; height: 300px; top: -100px; left: 10%; animation-duration: 30s; }
        .bubble2 { width: 200px; height: 200px; bottom: -50px; right: 15%; animation-duration: 22s; animation-delay: -10s; }
        .bubble3 { width: 150px; height: 150px; top: 30%; left: 70%; animation-duration: 28s; animation-delay: -15s; }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(-1200px) rotate(360deg); }
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: rgba(15, 23, 18, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 255, 100, 0.2);
            border-radius: 20px;
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
            transition: all 0.4s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 80px rgba(0, 255, 100, 0.15);
        }

        .logo {
            font-size: 42px;
            font-weight: 800;
            background: linear-gradient(90deg, #00ff88, #00cc66);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #aaa;
            font-size: 18px;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ccc;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 16px 20px;
            background: #111;
            border: 1px solid #333;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            transition: all 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #00ff88;
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.2);
        }

        .btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(90deg, #00ff88, #00cc66);
            color: #000;
            font-weight: 700;
            font-size: 17px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 255, 136, 0.4);
        }

        .switch {
            text-align: center;
            margin-top: 25px;
            color: #aaa;
        }

        .switch a {
            color: #00ff88;
            text-decoration: none;
            font-weight: 600;
        }

        .error {
            color: #ff5555;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #666;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <div class="bubble bubble1"></div>
        <div class="bubble bubble2"></div>
        <div class="bubble bubble3"></div>
    </div>

    <div class="container">
        <div class="card">
            <div class="logo-box">
                <div class="logo">HellCrop.</div>
                <div class="subtitle">Sign In</div>
            </div>

            <?php if (!empty($error)): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="example@domain.com" required>
                </div>
               
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
               
                <button type="submit" class="btn">Login</button>
            </form>
           
            <div class="switch">
                Don't have an account? 
                <a href="signup.php">Sign Up</a>
            </div>
        </div>
    </div>

    <footer class="footer">
        <span>© 2026 HellCrop. All rights reserved.</span>
    </footer>
</body>
</html>
