<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "127.0.0.1";
$username = "admin";
$password = "30536580";
$dbname = "eczane_db";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// POST verilerini al
$tcKimlikNo = isset($_POST['tc_kimlik_no']) ? $_POST['tc_kimlik_no'] : '';
$hastaAd = isset($_POST['hasta_ad']) ? $_POST['hasta_ad'] : '';
$hastaSoyad = isset($_POST['hasta_soyad']) ? $_POST['hasta_soyad'] : '';
$hastaTelefon = isset($_POST['hasta_telefon']) ? $_POST['hasta_telefon'] : '';
$hastaAdres = isset($_POST['hasta_adres']) ? $_POST['hasta_adres'] : '';
$saglikSigortasiTuru = isset($_POST['saglik_sigortasi_turu']) ? $_POST['saglik_sigortasi_turu'] : '';

// Hasta ekleme işlemini yap
$query = "INSERT INTO hastalar (tc_kimlik_no, hasta_ad, hasta_soyad, hasta_telefon, hasta_adres, saglik_sigortasi_turu)
          VALUES ('$tcKimlikNo', '$hastaAd', '$hastaSoyad', '$hastaTelefon', '$hastaAdres', '$saglikSigortasiTuru')";

if ($conn->query($query) === TRUE) {
    echo "<p>Hasta başarıyla eklendi.</p>";
} else {
    echo "<p>Hasta eklenirken bir hata oluştu: " . $conn->error . "</p>";
}

// Bağlantıyı kapat
$conn->close();
?>