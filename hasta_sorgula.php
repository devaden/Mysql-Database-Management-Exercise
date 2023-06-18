<?php
// Veritabanı bağlantısı için gerekli bilgileri içe aktar
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
$tc = $_POST['tc'];

// Sorguyu hazırla
$sql = "SELECT * FROM hastalar WHERE tc_kimlik_no = '$tc'";
$result = $conn->query($sql);

// Sonuçları kontrol et
if ($result->num_rows > 0) {
    // Sonuçları döngüyle oku ve görüntüle
    while ($row = $result->fetch_assoc()) {
        echo "TC Kimlik No: " . $row["tc_kimlik_no"] . "<br>";
        echo "Hasta Adı: " . $row["hasta_ad"] . "<br>";
        echo "Hasta Soyadı: " . $row["hasta_soyad"] . "<br>";
        echo "Hasta Telefon: " . $row["hasta_telefon"] . "<br>";
        echo "Hasta Adres: " . $row["hasta_adres"] . "<br>";
        echo "Sağlık Sigortası Türü: " . $row["saglik_sigortasi_turu"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Kayıt bulunamadı.";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
