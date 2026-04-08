<?php
// config.php - Database Connection
$host = 'sql100.hstn.me';
$db   = 'mseet_41609007_hellcorp';
$user = 'mseet_41609007';
$pass = 'bdr2krafi2009';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>