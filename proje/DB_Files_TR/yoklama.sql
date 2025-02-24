-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Ara 2023, 13:11:07
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yoklama`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odksdonem`
--

CREATE TABLE `odksdonem` (
  `Id` int(50) NOT NULL,
  `donemAdi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odksdonem`
--

INSERT INTO `odksdonem` (`Id`, `donemAdi`) VALUES
(1, 'Birinci'),
(2, 'İkinci'),
(3, 'Üçüncü');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odksdonemaralik`
--

CREATE TABLE `odksdonemaralik` (
  `Id` int(50) NOT NULL,
  `donemAralikAdi` varchar(50) NOT NULL,
  `donemId` int(50) NOT NULL,
  `aktiflik` varchar(10) NOT NULL,
  `kayitZamani` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odksdonemaralik`
--

INSERT INTO `odksdonemaralik` (`Id`, `donemAralikAdi`, `donemId`, `aktiflik`, `kayitZamani`) VALUES
(1, '2022/2023', 1, '1', '2023-10-31'),
(3, '2022/2023', 2, '0', '2023-12-18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odksogrenci`
--

CREATE TABLE `odksogrenci` (
  `Id` int(10) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `soyadi` varchar(255) NOT NULL,
  `digerAdi` varchar(255) NOT NULL,
  `ogrenciNo` varchar(255) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `sinifId` int(10) NOT NULL,
  `subeId` int(10) NOT NULL,
  `kayitZamani` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odksogrenci`
--

INSERT INTO `odksogrenci` (`Id`, `adi`, `soyadi`, `digerAdi`, `ogrenciNo`, `sifre`, `sinifId`, `subeId`, `kayitZamani`) VALUES
(100, 'Su', 'Yılmaz', 'none', 'AMS0000', '12345', 109, 1099, '2023-12-11'),
(101, 'Merve ', 'Akın', 'none', 'AMS0001', '12345', 109, 1099, '2023-12-11'),
(102, 'Kerem', 'Ergüner', 'none', 'AMS0002', '12345', 109, 1099, '2023-12-11'),
(200, 'Tuğberk', 'Çelik', 'none', 'AMS0003', '12345', 110, 11010, '2023-12-11'),
(201, 'Aysu', 'Demir', 'none', 'AMS0004', '12345', 110, 11010, '2023-12-11'),
(202, 'Ömer', 'Kılıç', 'none', 'AMS0005', '12345', 110, 11010, '2023-12-11'),
(203, 'Furkan', 'Akınlar', 'none', 'AMS0006', '12345', 110, 11010, '2023-12-11'),
(204, 'Hakan', 'Bostancı', 'Serhat', 'AMS0007', '12345', 110, 11010, '2023-12-11'),
(205, 'Melih', 'Yıldız', 'none', 'AMS0008', '12345', 110, 11010, '2023-12-11'),
(206, 'Sena', 'Çağlar', 'none', 'AMS0009', '12345', 110, 11010, '2023-12-11'),
(207, 'Emir', 'Sarraf', 'none', 'AMS0010', '12345', 110, 11010, '2023-12-11'),
(208, 'Melisa', 'Durmuş', 'none', 'AMS0011', '12345', 110, 11010, '2023-12-11'),
(300, 'Sıla', 'Gündoğdu', 'none', 'AMS0012', '12345', 111, 11111, '2023-12-11'),
(301, 'Gizem', 'Uygun', 'Su', 'AMS0013', '12345', 111, 11111, '2023-12-11'),
(302, 'Merve', 'Kuvvet', 'none', 'AMS0014', '12345', 111, 11111, '2023-12-11'),
(303, 'Fatma ', 'Aydın', 'none', 'AMS0015', '12345', 111, 11111, '2023-12-11'),
(304, 'Alperen', 'Yılgın', 'none', 'AMS0016', '12345', 111, 11111, '2023-12-11'),
(305, 'Eren ', 'Akfiliz', 'none', 'AMS0017', '12345', 111, 11111, '2023-12-11'),
(306, 'Alev', 'Uzay', 'none', 'AMS0018', '12345', 111, 11111, '2023-12-11'),
(307, 'Ozan', 'Yıldıray', 'none', 'AMS0019', '12345', 111, 11111, '2023-12-11'),
(308, 'Ahmet', 'Güneş', 'none', 'AMS0020', '12345', 111, 11111, '2023-12-11'),
(309, 'Faruk', 'Ataman', 'none', 'AMS0021', '12345', 111, 11111, '2023-12-11'),
(310, 'Osman', 'Küçük', 'none', 'AMS0022', '12345', 111, 11111, '2023-12-11'),
(311, 'Aylin', 'Güler', 'none', 'AMS0023', '12345', 111, 11111, '2023-12-11'),
(312, 'Damla', 'Saygın', 'none', 'AMS0024', '12345', 111, 11111, '2023-12-11'),
(313, 'Cansu', 'Atagül', 'Su', 'AMS0025', '12345', 111, 11111, '2023-12-11'),
(314, 'Simge', 'Kavak', 'none', 'AMS0026', '12345', 111, 11111, '2023-12-11'),
(400, 'Deren', 'Cengiz', 'none', 'AMS0027', '12345', 112, 11212, '2023-12-11'),
(401, 'Murat ', 'Erçökük', 'none', 'AMS0028', '12345', 112, 11212, '2023-12-11'),
(402, 'Vedat', 'Arıkan', 'none', 'AMS0029', '12345', 112, 11212, '2023-12-11'),
(403, 'Pınar', 'Demirtaş', 'none', 'AMS0030', '12345', 112, 11212, '2023-12-11'),
(404, 'Beyza', 'Kabuk', 'none', 'AMS0031', '12345', 112, 11212, '2023-12-11'),
(405, 'Kübra', 'Babuç', 'none', 'AMS0032', '12345', 112, 11212, '2023-12-11'),
(406, 'Kıvanç', 'Kıyak', 'none', 'AMS0033', '12345', 112, 11212, '2023-12-11'),
(407, 'Ali', 'Polat', 'none', 'AMS0034', '12345', 112, 11212, '2023-12-11'),
(408, 'Büşra', 'Çetin', 'none', 'AMS0035', '12345', 112, 11212, '2023-12-11'),
(500, 'Erhan', 'Göztepe', 'none', 'AMS0036', '12345', 113, 11313, '2023-12-11'),
(501, 'Emin', 'Karadeniz', 'none', 'AMS0037', '12345', 113, 11313, '2023-12-11'),
(502, 'Şeref', 'Hataylı', 'none', 'AMS0038', '12345', 113, 11313, '2023-12-11'),
(503, 'Cavit', 'Zeytinli', 'none', 'AMS0039', '12345', 113, 11313, '2023-12-11'),
(504, 'Miray', 'Atabey', 'none', 'AMS0040', '12345', 113, 11313, '2023-12-11'),
(505, 'Selin', 'Çakıroğlu', 'none', 'AMS0041', '12345', 113, 11313, '2023-12-11'),
(506, 'Nilda', 'Yazıcı', 'none', 'AMS0042', '12345', 113, 11313, '2023-12-11'),
(507, 'Aynur', 'Arıcı', 'none', 'AMS0043', '12345', 113, 11313, '2023-12-11'),
(508, 'Duru', 'Kurtoğlu', 'none', 'AMS0044', '12345', 113, 11313, '2023-12-11'),
(509, 'Batuhan', 'Berber', 'Ali', 'AMS0045', '12345', 113, 11313, '2023-12-11'),
(510, 'Selahattin', 'Koç', 'none', 'AMS0046', '12345', 113, 11313, '2023-12-11'),
(511, 'Özlem', 'Paşalı', 'none', 'AMS0047', '12345', 113, 11313, '2023-12-11'),
(512, 'Pelin', 'Güneş', 'none', 'AMS0048', '12345', 113, 11313, '2023-12-11'),
(600, 'Emircan', 'Kor', 'none', 'AMS0049', '12345', 114, 11414, '2023-12-11'),
(601, 'Mithat ', 'Böcek', 'none', 'AMS0050', '12345', 114, 11414, '2023-12-11'),
(602, 'Sezen', 'Bal', 'none', 'AMS0051', '12345', 114, 11414, '2023-12-11'),
(603, 'Yusuf', 'Karataş', 'none', 'AMS0052', '12345', 114, 11414, '2023-12-11'),
(604, 'Bilge', 'Sarı', 'none', 'AMS0053', '12345', 114, 11414, '2023-12-11'),
(605, 'Melek', 'Akça', 'none', 'AMS0054', '12345', 114, 11414, '2023-12-11'),
(606, 'Sedef', 'Aras', 'none', 'AMS0055', '12345', 114, 11414, '2023-12-11'),
(607, 'Erdem', 'Erdemli', 'none', 'AMS0056', '12345', 114, 11414, '2023-12-11'),
(608, 'Tarık', 'Gülsoy', 'none', 'AMS0057', '12345', 114, 11414, '2023-12-11'),
(609, 'Serhat', 'Özcan', 'none', 'AMS0058', '12345', 114, 11414, '2023-12-11'),
(610, 'Teoman', 'Güngör', 'none', 'AMS0059', '12345', 114, 11414, '2023-12-11'),
(700, 'Tuğba', 'Çakır', 'none', 'AMS0060', '12345', 115, 11515, '2023-12-11'),
(701, 'Buket', 'Dönmez', 'none', 'AMS0061', '12345', 115, 11515, '2023-12-11'),
(702, 'Sevgi', 'Soysal', 'none', 'AMS0062', '12345', 115, 11515, '2023-12-11'),
(703, 'İlber', 'Orta', 'none', 'AMS0063', '12345', 115, 11515, '2023-12-11'),
(704, 'Celal', 'Şen', 'none', 'AMS0064', '12345', 115, 11515, '2023-12-11'),
(705, 'Ceren', 'Taş', 'Nur', 'AMS0065', '12345', 115, 11515, '2023-12-11'),
(706, 'Gökhan', 'Öz', 'none', 'AMS0066', '12345', 115, 11515, '2023-12-11'),
(707, 'Senem', 'Alagöz', 'none', 'AMS0067', '12345', 115, 11515, '2023-12-11'),
(708, 'Zafer', 'Menderes', 'none', 'AMS0068', '12345', 115, 11515, '2023-12-11'),
(709, 'Kübra', 'Yıldırım', 'none', 'AMS0069', '12345', 115, 11515, '2023-12-11'),
(710, 'Buğra', 'Çalış', 'none', 'AMS0070', '12345', 115, 11515, '2023-12-11'),
(800, 'Yiğit', 'Akpınar', 'none', 'AMS0071', '12345', 116, 11616, '2023-12-11'),
(801, 'Hilal', 'Altın', 'none', 'AMS0072', '12345', 116, 11616, '2023-12-11'),
(802, 'Murat ', 'Açıkgöz', 'none', 'AMS0073', '12345', 116, 11616, ''),
(803, 'Merve', 'Dalkılıç', 'none', 'AMS0074', '12345', 116, 11616, '2023-12-11'),
(804, 'Uğur', 'Bozyaka', 'none', 'AMS0075', '12345', 116, 11616, '2023-12-11'),
(805, 'Asya', 'Arduç', 'none', 'AMS0076', '12345', 116, 11616, '2023-12-11'),
(806, 'Elçin', 'Özay', 'none', 'AMS0077', '12345', 116, 11616, '2023-12-11'),
(807, 'Sinan', 'Altan', 'none', 'AMS0078', '12345', 116, 11616, '2023-12-11'),
(808, 'Burak', 'Turan', 'none', 'AMS0079', '12345', 116, 11616, '2023-12-11'),
(809, 'Selçuk', 'Çelik', 'none', 'AMS0080', '12345', 116, 11616, '2023-12-11'),
(810, 'Hande', 'İz', 'none', 'AMS0081', '12345', 116, 11616, '2023-12-11'),
(900, 'Koray', 'Akıcı', 'none', 'AMS0082', '12345', 117, 11717, '2023-12-11'),
(901, 'Dilan', 'Ergüçlü', 'none', 'AMS0083', '12345', 117, 11717, '2023-12-11'),
(902, 'Alper', 'Aktaş', 'none', 'AMS0084', '12345', 117, 11717, '2023-12-11'),
(903, 'Tuğba', 'Küçük', 'none', 'AMS0085', '12345', 117, 11717, '2023-12-11'),
(904, 'Toprak', 'Çınar', 'none', 'AMS0086', '12345', 117, 11717, '2023-12-11'),
(905, 'Duygu', 'Özkan', 'none', 'AMS0087', '12345', 117, 11717, '2023-12-11'),
(906, 'Betül', 'Dokumacı', 'none', 'AMS0088', '12345', 117, 11717, '2023-12-11'),
(907, 'Şeyma', 'Korkmaz', 'none', 'AMS0089', '12345', 117, 11717, '2023-12-11'),
(908, 'Mert ', 'Göktaş', 'none', 'AMS0090', '12345', 117, 11717, '2023-12-11'),
(1000, 'Pınar', 'Ortaç', 'none', 'AMS0091', '12345', 118, 11818, '2023-12-11'),
(1001, 'Cenk', 'Semih', 'none', 'AMS0092', '12345', 118, 11818, '2023-12-11'),
(1002, 'Şükrü', 'Yıldız', 'Ahmet', 'AMS0093', '12345', 118, 11818, '2023-12-11'),
(1003, 'Demet', 'Tatlıöz', 'none', 'AMS0094', '12345', 118, 11818, '2023-12-11'),
(1004, 'Soner', 'Karaduman', 'none', 'AMS0095', '12345', 118, 11818, '2023-12-11'),
(1005, 'Gökalp', 'Taşkın', 'none', 'AMS0096', '12345', 118, 11818, '2023-12-11'),
(1006, 'Burcu', 'Sarıkabadayı', 'none', 'AMS0097', '12345', 118, 11818, '2023-12-11'),
(1007, 'Mahmut', 'Orhan', 'none', 'AMS0098', '12345', 118, 11818, '2023-12-11'),
(1008, 'Hande', 'Uluğ', 'none', 'AMS0099', '12345', 118, 11818, '2023-12-11'),
(1009, 'Ezgi', 'Salı', 'none', 'AMS0100', '12345', 118, 11818, '2023-12-11'),
(2000, 'Edis', 'Sezer', 'none', 'AMS0101', '12345', 119, 11919, '2023-12-11'),
(2001, 'Eda', 'Tilki', 'none', 'AMS0102', '12345', 119, 11919, '2023-12-11'),
(2002, 'Burak', 'Kuş', 'none', 'AMS0103', '12345', 119, 11919, '2023-12-11'),
(2003, 'Kurtuluş', 'Bulut', 'none', 'AMS0104', '12345', 119, 11919, '2023-12-11'),
(2004, 'Bihter', 'Doğulu', 'none', 'AMS0105', '12345', 119, 11919, '2023-12-11'),
(2005, 'Beren', 'Akalın', 'none', 'AMS0106', '12345', 119, 11919, '2023-12-11'),
(2006, 'Tan', 'Özer', 'none', 'AMS0107', '12345', 119, 11919, '2023-12-11'),
(2007, 'İrem', 'Peker', 'none', 'AMS0108', '12345', 119, 11919, '2023-12-11'),
(3000, 'Okan', 'Çiçek', 'none', 'AMS0109', '12345', 120, 12020, '2023-12-11'),
(3001, 'Şimal', 'Ayakçı', 'none', 'AMS0110', '12345', 120, 12020, '2023-12-11'),
(3002, 'Reyhan', 'Matiz', 'none', 'AMS0111', '12345', 120, 12020, '2023-12-11'),
(3003, 'Basel', 'Faylı', 'none', 'AMS0112', '12345', 120, 12020, '2023-12-11'),
(3004, 'Berkay', 'İzmirli', 'none', 'AMS0113', '12345', 120, 12020, '2023-12-11'),
(3005, 'Başak', 'Güzel', 'none', 'AMS0114', '12345', 120, 12020, '2023-12-11'),
(3006, 'Ekin', 'Yamaç', 'none', 'AMS0115', '12345', 120, 12020, '2023-12-11'),
(3007, 'Lara', 'Katmer', 'none', 'AMS0116', '12345', 120, 12020, '2023-12-11'),
(3008, 'İbrahim', 'Sezgin', 'none', 'AMS0117', '12345', 120, 12020, '2023-12-11'),
(3009, 'Banu', 'Boz', 'none', 'AMS0118', '12345', 120, 12020, '2023-12-11'),
(3010, 'Özgün', 'Gök', 'none', 'AMS0119', '12345', 120, 12020, '2023-12-11'),
(3011, 'Seray', 'Sandal', 'none', 'AMS0120', '12345', 120, 12020, '2023-12-11'),
(3012, 'Kaan', 'Baysal', 'none', 'AMS0121', '12345', 120, 12020, '2023-12-11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odksogretmen`
--

CREATE TABLE `odksogretmen` (
  `Id` int(10) NOT NULL,
  `adi` varchar(255) NOT NULL,
  `soyadi` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `telefonNo` varchar(50) NOT NULL,
  `sinifId` int(10) NOT NULL,
  `subeId` int(10) NOT NULL,
  `kayitZamani` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odksogretmen`
--

INSERT INTO `odksogretmen` (`Id`, `adi`, `soyadi`, `eposta`, `sifre`, `telefonNo`, `sinifId`, `subeId`, `kayitZamani`) VALUES
(50, 'Özge', 'Sabah', 'ozgesabah@mail.com', '98bcc3ae86b94653cd9cb91ddcfcc1c0', '05421365873', 109, 1099, '2022-10-31'),
(52, 'Elif', 'Kavrak', 'elifkavrak@mail.com', 'd663468bee1d47adb9fb4da304e14aa9', '05423156985', 110, 11010, '2022-11-01'),
(54, 'Uğur', 'Pekkan', 'ugurpekkan@mail.com', 'abc94bad0a18f0baf15ae28c799561dd', '05632198634', 111, 11111, '2022-10-07'),
(55, 'Ayşegül', 'Yaşar', 'aysegulyasar@mail.com', '4b993c2a130242261c3c1981735fc82d', '05432691356', 112, 11212, '2022-10-07'),
(56, 'Sedat', 'Kut', 'sedatkut@mail.com', '58945fd9945965325510bf2328b850fb', '05743812976', 113, 11313, '2023-07-09'),
(57, 'Hüseyin', 'Yener', 'huseyinyener@mail.com', '41d762e97712a754dd9aaf0a66abb0e2', '05498215236', 114, 11414, '2023-09-12'),
(58, 'Emir', 'Çolakoğlu', 'emircolakoglu@mail.com', 'e54e06aa388a4bcd4d6ad68692154bd5', '05418623752', 115, 11515, '2023-10-01'),
(60, 'Esra', 'Taşçı', 'esratasci@gmail.com', 'f48ca6674ab0bcf1674d1036c2132af7', '05123456789', 116, 11616, '2023-10-10'),
(61, 'Bilal', 'Özgüç', 'bilalozguc@mail.com', '301fa1a42a5ccf979972d5917ca91b5a', '05331256974', 117, 11717, '2023-10-15'),
(62, 'Salih', 'Gündeş', 'salihgundes@mail.com', 'db627761ce452817663d2833e01164ff', '05324564163', 118, 11818, '2023-10-23'),
(64, 'İdris', 'Kınay', 'idriskinay@mail.com', '5a5cd9b96202247c5cf1de4dbc4a680e', '05768645678', 119, 11919, '2023-11-18'),
(66, 'Nurhan', 'Aldinç', 'nurhanaldinc@mail.com', '177eaf3610097c985dbf570c97789a1e', '05521486537', 120, 12020, '2023-12-18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odkssinif`
--

CREATE TABLE `odkssinif` (
  `Id` int(10) NOT NULL,
  `sinifAdi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odkssinif`
--

INSERT INTO `odkssinif` (`Id`, `sinifAdi`) VALUES
(109, '9'),
(110, '10'),
(111, '11'),
(112, '12'),
(113, '12'),
(114, '12'),
(115, '12'),
(116, '12'),
(117, 'Mezun'),
(118, 'Mezun'),
(119, 'Mezun'),
(120, 'Mezun');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odkssube`
--

CREATE TABLE `odkssube` (
  `Id` int(50) NOT NULL,
  `sinifId` int(50) NOT NULL,
  `subeAdi` varchar(255) NOT NULL,
  `atamaDurum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odkssube`
--

INSERT INTO `odkssube` (`Id`, `sinifId`, `subeAdi`, `atamaDurum`) VALUES
(1099, 109, 'A', '1'),
(11010, 110, 'A', '1'),
(11111, 111, 'A', '1'),
(11212, 112, 'A', '1'),
(11313, 113, 'B', '1'),
(11414, 114, 'C', '1'),
(11515, 115, 'EA/A', '1'),
(11616, 116, 'EA/B', '1'),
(11717, 117, 'SAY/A', '1'),
(11818, 118, 'SAY/B', '1'),
(11919, 119, 'SAY/C', '1'),
(12020, 120, 'EA', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odksyoklama`
--

CREATE TABLE `odksyoklama` (
  `Id` int(10) NOT NULL,
  `ogrenciNo` varchar(255) NOT NULL,
  `sinifId` int(50) NOT NULL,
  `subeId` int(50) NOT NULL,
  `donemAralikId` int(50) NOT NULL,
  `durum` varchar(10) NOT NULL,
  `yoklamaTarih` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odksyoklama`
--

INSERT INTO `odksyoklama` (`Id`, `ogrenciNo`, `sinifId`, `subeId`, `donemAralikId`, `durum`, `yoklamaTarih`) VALUES
(222, 'AMS0000', 109, 1099, 1, '1', '2023-12-18'),
(223, 'AMS0001', 109, 1099, 1, '1', '2023-12-18'),
(224, 'AMS0002', 109, 1099, 1, '0', '2023-12-18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odksyonetici`
--

CREATE TABLE `odksyonetici` (
  `Id` int(10) NOT NULL,
  `adi` varchar(50) NOT NULL,
  `soyadi` varchar(50) NOT NULL,
  `eposta` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `odksyonetici`
--

INSERT INTO `odksyonetici` (`Id`, `adi`, `soyadi`, `eposta`, `sifre`) VALUES
(1, 'Ömer', 'Erdemli', 'omererdemli@mail.com', '09c98a1a0becfe7f63f428b87bf64a55');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `odksdonem`
--
ALTER TABLE `odksdonem`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `odksdonemaralik`
--
ALTER TABLE `odksdonemaralik`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `donemId` (`donemId`);

--
-- Tablo için indeksler `odksogrenci`
--
ALTER TABLE `odksogrenci`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sinifId` (`sinifId`,`subeId`),
  ADD KEY `subeId` (`subeId`);

--
-- Tablo için indeksler `odksogretmen`
--
ALTER TABLE `odksogretmen`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sinifId` (`sinifId`,`subeId`),
  ADD KEY `subeId` (`subeId`);

--
-- Tablo için indeksler `odkssinif`
--
ALTER TABLE `odkssinif`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `odkssube`
--
ALTER TABLE `odkssube`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sinifId` (`sinifId`);

--
-- Tablo için indeksler `odksyoklama`
--
ALTER TABLE `odksyoklama`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `sinifId` (`sinifId`,`subeId`,`donemAralikId`),
  ADD KEY `donemAralikId` (`donemAralikId`),
  ADD KEY `subeId` (`subeId`);

--
-- Tablo için indeksler `odksyonetici`
--
ALTER TABLE `odksyonetici`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `odksdonem`
--
ALTER TABLE `odksdonem`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `odksdonemaralik`
--
ALTER TABLE `odksdonemaralik`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `odksogrenci`
--
ALTER TABLE `odksogrenci`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3015;

--
-- Tablo için AUTO_INCREMENT değeri `odksogretmen`
--
ALTER TABLE `odksogretmen`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Tablo için AUTO_INCREMENT değeri `odkssinif`
--
ALTER TABLE `odkssinif`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Tablo için AUTO_INCREMENT değeri `odkssube`
--
ALTER TABLE `odkssube`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12023;

--
-- Tablo için AUTO_INCREMENT değeri `odksyoklama`
--
ALTER TABLE `odksyoklama`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- Tablo için AUTO_INCREMENT değeri `odksyonetici`
--
ALTER TABLE `odksyonetici`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `odksdonemaralik`
--
ALTER TABLE `odksdonemaralik`
  ADD CONSTRAINT `odksdonemaralik_ibfk_1` FOREIGN KEY (`donemId`) REFERENCES `odksdonem` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `odksogrenci`
--
ALTER TABLE `odksogrenci`
  ADD CONSTRAINT `odksogrenci_ibfk_1` FOREIGN KEY (`subeId`) REFERENCES `odkssube` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odksogrenci_ibfk_2` FOREIGN KEY (`sinifId`) REFERENCES `odkssinif` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `odksogretmen`
--
ALTER TABLE `odksogretmen`
  ADD CONSTRAINT `odksogretmen_ibfk_1` FOREIGN KEY (`sinifId`) REFERENCES `odkssinif` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odksogretmen_ibfk_2` FOREIGN KEY (`subeId`) REFERENCES `odkssube` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `odkssube`
--
ALTER TABLE `odkssube`
  ADD CONSTRAINT `odkssube_ibfk_1` FOREIGN KEY (`sinifId`) REFERENCES `odkssinif` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `odksyoklama`
--
ALTER TABLE `odksyoklama`
  ADD CONSTRAINT `odksyoklama_ibfk_1` FOREIGN KEY (`donemAralikId`) REFERENCES `odksdonemaralik` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odksyoklama_ibfk_2` FOREIGN KEY (`sinifId`) REFERENCES `odkssinif` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odksyoklama_ibfk_3` FOREIGN KEY (`subeId`) REFERENCES `odkssube` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
