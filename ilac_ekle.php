<?php
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
$ilacAd = isset($_POST['ilac_ad']) ? $_POST['ilac_ad'] : '';
$etkenMadde = isset($_POST['etken_madde']) ? $_POST['etken_madde'] : '';
$stokMiktari = isset($_POST['stok']) ? $_POST['stok'] : '';
$fiyat = isset($_POST['fiyat']) ? $_POST['fiyat'] : '';
$receteTuru = isset($_POST['recete_turu']) ? $_POST['recete_turu'] : '';

// İlaç ekleme işlemini yap
$query = "INSERT INTO ilaclar (ilac_ad, etken_madde, ilac_stok, ilac_fiyat, recete_turu)
          VALUES ('$ilacAd', '$etkenMadde', '$stokMiktari', '$fiyat', '$receteTuru')";

if ($conn->query($query) === TRUE) {
    echo "<p>İlaç başarıyla eklendi.</p>";
} else {
    echo "<p>İlaç eklenirken bir hata oluştu: " . $conn->error . "</p>";
}

// Bağlantıyı kapat
$conn->close();
?>
