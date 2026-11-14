<?php
$host = 'db.sbvuvjbozukvhlaktwk.supabase.co';
$port = '5432';
$db = 'postgres';
$user = 'postgres';
$pass = 'JMnE@cj2PPKZq!PSBCK';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("<h3 style='color:red;'>GAGAL KONEKSI SUPABASE:</h3> " . $e->getMessage());
}