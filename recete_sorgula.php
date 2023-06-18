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
$receteID = $_POST['recete'];

// Reçete sorgulamasını yap
$query = "SELECT receteler.recete_id, hastalar.tc_kimlik_no, hastalar.hasta_ad, hastalar.hasta_soyad, hastalar.hasta_telefon, ilaclar.ilac_ad, receteler.recete_ucret
          FROM receteler
          INNER JOIN hastalar ON receteler.hasta_id = hastalar.tc_kimlik_no
          INNER JOIN recete_ilac ON receteler.recete_id = recete_ilac.recete_id
          INNER JOIN ilaclar ON recete_ilac.ilac_id = ilaclar.ilac_id
          WHERE receteler.recete_id = $receteID";

$result = $conn->query($query);

// Sonuçları göster
if ($result->num_rows > 0) {
    echo "<h1>Reçete Sonuçları</h1>";
    echo "<table>";
    echo "<tr><th>Reçete ID</th><th>TC Kimlik No</th><th>Hasta Adı</th><th>Hasta Soyadı</th><th>Hasta Telefon</th><th>İlaç Adı</th><th>Reçete Ücreti</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['recete_id']."</td>";
        echo "<td>".$row['tc_kimlik_no']."</td>";
        echo "<td>".$row['hasta_ad']."</td>";
        echo "<td>".$row['hasta_soyad']."</td>";
        echo "<td>".$row['hasta_telefon']."</td>";
        echo "<td>".$row['ilac_ad']."</td>";
        echo "<td>".$row['recete_ucret']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Belirtilen reçete ID'sine sahip bir sonuç bulunamadı.</p>";
}

// Bağlantıyı kapat
$conn->close();
?>
