<?php
$host = getenv('DB_HOST') ?: 'aws-0-ap-northeast-1.pooler.supabase.com';
$port = getenv('DB_PORT') ?: '5432';
$db = getenv('DB_NAME') ?: 'postgres';
$user = getenv('DB_USER') ?: 'postgres.sbvuvjbozukvhlaktwk';
$pass = getenv('DB_PASS') ?: 'JMnE@cj2PPKZq!PSBCK';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Paksa tampilkan error asli di web supaya ketahuan akar masalahnya
    die("<h3 style='color:red;'>GAGAL KONEKSI SUPABASE:</h3> " . $e->getMessage());
}