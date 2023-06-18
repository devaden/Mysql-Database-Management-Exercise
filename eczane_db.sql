-- Veritabanı Oluşturma
CREATE DATABASE eczane_db;

-- Veritabanını Kullanma
USE eczane_db;

-- Hastalar Tablosu
CREATE TABLE hastalar (
  tc_kimlik_no VARCHAR(11) PRIMARY KEY,
  hasta_ad VARCHAR(50) NOT NULL,
  hasta_soyad VARCHAR(50) NOT NULL,
  hasta_telefon VARCHAR(15) NOT NULL,
  hasta_adres TEXT,
  saglik_sigortasi_turu VARCHAR(50) NOT NULL
);

-- İlaçlar Tablosu
CREATE TABLE ilaclar (
  ilac_id INT AUTO_INCREMENT PRIMARY KEY,
  ilac_ad VARCHAR(50) NOT NULL,
  etken_madde VARCHAR(100) NOT NULL,
  ilac_stok INT NOT NULL,
  ilac_fiyat DECIMAL(10, 2) NOT NULL,
  recete_turu ENUM('kırmızı reçete', 'sarı reçete', 'yeşil reçete') NOT NULL
);

-- Reçeteler Tablosu
CREATE TABLE receteler (
  recete_id INT AUTO_INCREMENT PRIMARY KEY,
  hasta_id VARCHAR(11) NOT NULL,
  recete_ucret DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (hasta_id) REFERENCES hastalar(tc_kimlik_no)
);


CREATE TABLE recete_ilac (
  recete_id INT NOT NULL,
  ilac_id INT NOT NULL,
  PRIMARY KEY (recete_id, ilac_id),
  FOREIGN KEY (recete_id) REFERENCES receteler(recete_id),
  FOREIGN KEY (ilac_id) REFERENCES ilaclar(ilac_id)
);


INSERT INTO hastalar (tc_kimlik_no, hasta_ad, hasta_soyad, hasta_telefon, hasta_adres, saglik_sigortasi_turu)
VALUES
  ('12345678901', 'Ahmet', 'Yılmaz', '5551112233', 'İstanbul', 'SSK'),
  ('98765432109', 'Ayşe', 'Demir', '5552223344', 'Ankara', 'Özel Sigorta'),
  ('45678901234', 'Mehmet', 'Kara', '5553334455', 'İzmir', 'SSK'),
  ('56789012345', 'Fatma', 'Ak', '5554445566', 'Bursa', 'Emekli Sandığı'),
  ('78901234567', 'Ali', 'Yıldız', '5555556677', 'Adana', 'Özel Sigorta'),
  ('89012345678', 'Selin', 'Koç', '5556667788', 'Antalya', 'SSK'),
  ('90123456789', 'Ayhan', 'Çelik', '5557778899', 'Eskişehir', 'SSK'),
  ('01234567890', 'Seda', 'Gül', '5558889900', 'Diyarbakır', 'Özel Sigorta'),
  ('23456789012', 'Hakan', 'Demir', '5559990011', 'Trabzon', 'Emekli Sandığı'),
  ('34567890123', 'Gamze', 'Yılmaz', '5550001122', 'Konya', 'SSK');
  
  
  INSERT INTO ilaclar (ilac_ad, etken_madde, ilac_stok, ilac_fiyat, recete_turu)
VALUES
  ('Parol', 'Parasetamol', 100, 10.50, 'kırmızı reçete'),
  ('Aspirin', 'Aspirin', 50, 20.25, 'sarı reçete'),
  ('Augmentin', 'Amoksisilin-Klavulanik Asit', 200, 5.75, 'yeşil reçete'),
  ('Nurofen', 'İbuprofen', 80, 15.00, 'kırmızı reçete'),
  ('Ventolin', 'Salbutamol', 120, 8.50, 'sarı reçete'),
  ('Prozac', 'Fluoksetin', 30, 12.75, 'yeşil reçete'),
  ('Lisinopril', 'Lisinopril', 150, 9.00, 'kırmızı reçete'),
  ('Lipitor', 'Atorvastatin', 70, 18.25, 'sarı reçete'),
  ('Metformin', 'Metformin', 90, 7.50, 'yeşil reçete'),
  ('Voltaren', 'Diklofenak', 110, 11.50, 'kırmızı reçete');
  
  INSERT INTO receteler (hasta_id, recete_ucret)
VALUES
  ('12345678901', 15.00),
  ('98765432109', 25.50),
  ('45678901234', 10.25),
  ('56789012345', 20.75),
  ('78901234567', 12.50),
  ('89012345678', 8.75),
  ('90123456789', 18.00),
  ('01234567890', 9.25),
  ('23456789012', 14.50),
  ('34567890123', 11.75);
  
  INSERT INTO recete_ilac (recete_id, ilac_id)
VALUES
  (1, 1), -- Reçete 1'e İlaç 1 eklendi
  (1, 2), -- Reçete 1'e İlaç 2 eklendi
  (2, 3), -- Reçete 2'ye İlaç 3 eklendi
  (2, 4), -- Reçete 2'ye İlaç 4 eklendi
  (3, 5), -- Reçete 3'e İlaç 5 eklendi
  (3, 6), -- Reçete 3'e İlaç 6 eklendi
  (4, 7), -- Reçete 4'e İlaç 7 eklendi
  (4, 8), -- Reçete 4'e İlaç 8 eklendi
  (5, 9), -- Reçete 5'e İlaç 9 eklendi
  (5, 10);-- Reçete 5'e İlaç 10 eklendi