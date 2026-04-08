<?php 
include 'header.php'; 
if (!isset($_SESSION['user_id'])) { header("Location: log.php"); exit; }
require 'config.php';

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<div class="card" style="text-align: center;">
    <div class="logo-box">
        <img src="images/<?php echo $user['profile_pic']; ?>" class="profile-img">
        <div class="logo" style="font-size: 1.5rem;"><?php echo $user['username']; ?></div>
        <div class="subtitle">System Operator</div>
    </div>
    
    <div style="background: rgba(255,255,255,0.03); padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
        <p style="font-size: 0.8rem; color: #555;">SERVER TIME</p>
        <h2 id="clock" style="color: #2a5f2a;">00:00:00</h2>
    </div>

    <a href="logout.php" class="btn" style="background: transparent; border: 1px solid #444;">Logout System</a>
</div>

<script>
    setInterval(() => {
        document.getElementById('clock').innerText = new Date().toLocaleTimeString();
    }, 1000);
</script>
<?php include 'footer.php'; ?>