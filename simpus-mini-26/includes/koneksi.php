<?php
$host = 'aws-0-ap-northeast-1.pooler.supabase.com';
$port = '5432';
$db   = 'postgres';
$user = 'postgres.sbvuvjjbozukvhlaktwk';
$pass = '@cj2PPKZq!PSBCk';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "<h2 style='color: green;'>Koneksi ke Supabase BERHASIL! </h2>";
} catch (\PDOException $e) {
    echo "<h2 style='color: red;'>Koneksi Gagal:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}