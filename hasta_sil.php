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
$tcSil = isset($_POST['tc_sil']) ? $_POST['tc_sil'] : '';

// Hasta silme işlemini yap
$query = "DELETE FROM hastalar WHERE tc_kimlik_no = '$tcSil'";

if ($conn->query($query) === TRUE) {
    echo "<p>Hasta başarıyla silindi.</p>";
} else {
    echo "<p>Hasta silinirken bir hata oluştu: " . $conn->error . "</p>";
}

// Bağlantıyı kapat
$conn->close();
?>
