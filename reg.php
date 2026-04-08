<?php 
include 'header.php'; 
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $target_dir = "images/";
    $image_name = time() . "_" . basename($_FILES["profile_pic"]["name"]);
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_dir . $image_name);

    $stmt = $pdo->prepare("INSERT INTO users (username, password, profile_pic) VALUES (?, ?, ?)");
    $stmt->execute([$user, $pass, $image_name]);
    header("Location: log.php");
}
?>
<div class="card">
    <div class="logo-box">
        <div class="logo">HellCrop.</div>
        <div class="subtitle">Join the Squad</div>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Choose a username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" name="profile_pic" style="border: none; padding: 0;" required>
        </div>
        <button type="submit" class="btn">Create Account</button>
    </form>
    <div class="switch">Already a member? <a href="log.php">Sign In</a></div>
</div>
<?php include 'footer.php'; ?>