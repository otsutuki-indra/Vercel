<?php 
include 'header.php'; 
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dash.php");
    } else {
        $error = "Invalid Username or Password";
    }
}
?>
<div class="card">
    <div class="logo-box">
        <div class="logo">HellCrop.</div>
        <div class="subtitle">Welcome Back</div>
    </div>
    <form method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <?php if(isset($error)) echo "<p style='color:red; text-align:center; margin-top:10px;'>$error</p>"; ?>
    <div class="switch">Don't have an account? <a href="reg.php">Sign Up</a></div>
</div>
<?php include 'footer.php'; ?>