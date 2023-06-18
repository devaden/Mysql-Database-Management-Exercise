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
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Eczane Yönetim Sistemi</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Eczane Yönetim Sistemi</h1>

  <div class="form-container">
    <h2>Hasta Sorgulama Formu</h2>
    <form action="hasta_sorgula.php" method="POST">
      <label for="tc">Hasta TC Kimlik No:</label>
      <input type="text" id="tc" name="tc" required>
      <input type="submit" value="Sorgula">
    </form>
  </div>

  <div class="form-container">
    <h2>Reçete Sorgulama Formu</h2>
    <form action="recete_sorgula.php" method="POST">
      <label for="recete">Reçete ID:</label>
      <input type="text" id="recete" name="recete" required>
      <input type="submit" value="Sorgula">
    </form>
  </div>

  <div class="form-container">
    <h2>Hasta Ekleme</h2>
    <form action="hasta_ekle.php" method="POST">
        <label for="tc_kimlik_no">Hasta TC Kimlik No:</label>
        <input type="text" id="tc_kimlik_no" name="tc_kimlik_no" required>
        <label for="hasta_ad">Hasta Adı:</label>
        <input type="text" id="hasta_ad" name="hasta_ad" required>
        <label for="hasta_soyad">Hasta Soyadı:</label>
        <input type="text" id="hasta_soyad" name="hasta_soyad" required>
        <label for="hasta_telefon">Hasta Telefon:</label>
        <input type="text" id="hasta_telefon" name="hasta_telefon" required>
        <label for="hasta_adres">Hasta Adres:</label>
        <input type="text" id="hasta_adres" name="hasta_adres">
        <label for="saglik_sigortasi_turu">Sağlık Sigortası Türü:</label>
        <input type="text" id="saglik_sigortasi_turu" name="saglik_sigortasi_turu" required>
        <input type="submit" value="Ekle">
    </form>
</div>


  <div class="form-container">
    <h2>Hasta Silme</h2>
    <form action="hasta_sil.php" method="POST">
      <label for="tc_sil">Hasta TC Kimlik No:</label>
      <input type="text" id="tc_sil" name="tc_sil" required>
      <input type="submit" value="Sil">
    </form>
  </div>

  <div class="form-container">
    <h2>İlaç Ekleme</h2>
    <form action="ilac_ekle.php" method="POST">
      <label for="ilac_ad">İlaç Adı:</label>
      <input type="text" id="ilac_ad" name="ilac_ad" required>
      <label for="etken_madde">Etken Madde:</label>
      <input type="text" id="etken_madde" name="etken_madde" required>
      <label for="stok">Stok Miktarı:</label>
      <input type="text" id="stok" name="stok" required>
      <label for="fiyat">Fiyat:</label>
      <input type="text" id="fiyat" name="fiyat" required>
      <label for="recete_turu">Reçete Türü:</label>
      <input type="text" id="recete_turu" name="recete_turu" required>
      <input type="submit" value="Ekle">
    </form>
  </div>
</body>
</html>
