
<?php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT') ?: '5432';
$db = getenv('DB_NAME') ?: 'postgres';
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Gagal menghubungkan aplikasi ke database. Silakan periksa konfigurasi database.");
}
