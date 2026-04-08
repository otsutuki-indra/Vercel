<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HellCorp</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background: #f4f4f4; }
        nav { background: #333; padding: 10px; border-radius: 5px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; }
        .container { background: white; padding: 20px; margin-top: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <?php session_start(); if(isset($_SESSION['user_id'])): ?>
            <a href="dash.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="log.php">Login</a>
            <a href="reg.php">Register</a>
        <?php endif; ?>
    </nav>
    <div class="container">