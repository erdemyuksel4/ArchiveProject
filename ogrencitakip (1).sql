-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Eki 2021, 17:03:17
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ogrencitakip`
--
CREATE DATABASE IF NOT EXISTS `ogrencitakip` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ogrencitakip`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `asidurumu`
--

DROP TABLE IF EXISTS `asidurumu`;
CREATE TABLE `asidurumu` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `asiAdi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `belirligunler`
--

DROP TABLE IF EXISTS `belirligunler`;
CREATE TABLE `belirligunler` (
  `id` int(11) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `baslangic` varchar(10) NOT NULL,
  `bitis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgibeceriler`
--

DROP TABLE IF EXISTS `bilgibeceriler`;
CREATE TABLE `bilgibeceriler` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `bilgiBeceri` varchar(250) NOT NULL,
  `seviye` varchar(20) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `devamsizlik`
--

DROP TABLE IF EXISTS `devamsizlik`;
CREATE TABLE `devamsizlik` (
  `id` int(11) NOT NULL,
  `ogrenciId` int(11) NOT NULL,
  `tarih` varchar(11) NOT NULL,
  `durum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ebeveynbilgileri`
--

DROP TABLE IF EXISTS `ebeveynbilgileri`;
CREATE TABLE `ebeveynbilgileri` (
  `id` int(11) NOT NULL,
  `ogrenciId` int(11) NOT NULL,
  `ebeveyn` varchar(4) NOT NULL,
  `dogumYeri` varchar(250) NOT NULL,
  `meslek` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitimdurumu`
--

DROP TABLE IF EXISTS `egitimdurumu`;
CREATE TABLE `egitimdurumu` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `duzey` varchar(100) NOT NULL,
  `kurumAdi` varchar(250) NOT NULL,
  `tezAdi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorevbolgeleri`
--

DROP TABLE IF EXISTS `gorevbolgeleri`;
CREATE TABLE `gorevbolgeleri` (
  `id` int(11) NOT NULL,
  `bolgeAdi` varchar(250) NOT NULL,
  `resimler` text NOT NULL,
  `genelBilgi` text NOT NULL,
  `ogrenciProfili` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorevyerleri`
--

DROP TABLE IF EXISTS `gorevyerleri`;
CREATE TABLE `gorevyerleri` (
  `id` int(11) NOT NULL,
  `yerAdi` varchar(250) NOT NULL,
  `bolgeId` int(11) NOT NULL,
  `aciklama` text NOT NULL,
  `resimler` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `yetkiId` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `kullaniciAdi` varchar(250) NOT NULL,
  `sifre` varchar(250) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `adSoyad` varchar(250) NOT NULL,
  `resim` int(11) NOT NULL,
  `onay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notbilgisi`
--

DROP TABLE IF EXISTS `notbilgisi`;
CREATE TABLE `notbilgisi` (
  `id` int(11) NOT NULL,
  `ogrenciId` int(11) NOT NULL,
  `donemId` int(11) NOT NULL,
  `donem` tinyint(1) NOT NULL,
  `dersAdi` varchar(250) NOT NULL,
  `ogrenciNot` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrencidersprogrami`
--

DROP TABLE IF EXISTS `ogrencidersprogrami`;
CREATE TABLE `ogrencidersprogrami` (
  `id` int(11) NOT NULL,
  `sinifId` int(11) NOT NULL,
  `dersZamani` varchar(50) NOT NULL,
  `saat` varchar(50) NOT NULL,
  `platform` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrencidonemleri`
--

DROP TABLE IF EXISTS `ogrencidonemleri`;
CREATE TABLE `ogrencidonemleri` (
  `id` int(11) NOT NULL,
  `ogrenciId` int(11) NOT NULL,
  `donem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

DROP TABLE IF EXISTS `ogrenciler`;
CREATE TABLE `ogrenciler` (
  `id` int(11) NOT NULL,
  `adSoyad` varchar(250) NOT NULL,
  `cinsiyet` varchar(25) NOT NULL,
  `dogumTarihi` varchar(25) NOT NULL,
  `dogumYeri` varchar(250) NOT NULL,
  `okulId` int(11) NOT NULL,
  `sinifId` int(11) NOT NULL,
  `ttkdKatilimFormu` text NOT NULL,
  `ebaId` varchar(50) NOT NULL,
  `devamDurumu` text NOT NULL,
  `Mezun` text NOT NULL,
  `katilimBelgesiNo` varchar(25) NOT NULL,
  `donemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretimdonemi`
--

DROP TABLE IF EXISTS `ogretimdonemi`;
CREATE TABLE `ogretimdonemi` (
  `id` int(11) NOT NULL,
  `baslangicYil` varchar(4) NOT NULL,
  `bitisYil` varchar(4) NOT NULL,
  `aktifDonem` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretimprogrami`
--

DROP TABLE IF EXISTS `ogretimprogrami`;
CREATE TABLE `ogretimprogrami` (
  `id` int(11) NOT NULL,
  `konu` varchar(250) NOT NULL,
  `sinifId` int(11) NOT NULL,
  `donemId` int(11) NOT NULL,
  `hafta` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretmenler`
--

DROP TABLE IF EXISTS `ogretmenler`;
CREATE TABLE `ogretmenler` (
  `id` int(11) NOT NULL,
  `bolgeId` int(11) NOT NULL,
  `yerId` int(11) NOT NULL,
  `okulId` int(11) NOT NULL,
  `adSoyad` varchar(250) NOT NULL,
  `tckn` varchar(11) NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dogumTarihi` varchar(50) NOT NULL,
  `dogumYeri` varchar(250) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `yurtDisiGorevBaslangic` varchar(25) NOT NULL,
  `gorevde` varchar(10) NOT NULL,
  `yolluk` varchar(10) NOT NULL,
  `genelBilgi` text NOT NULL,
  `gorevYaptigiOkullar` varchar(250) NOT NULL,
  `almanyaIkametgah` text NOT NULL,
  `turkiyeIkametgah` text NOT NULL,
  `olusturulmaTarihi` varchar(50) NOT NULL,
  `turkiyeEhliyeti` varchar(5) NOT NULL,
  `almanyaEhliyeti` varchar(5) NOT NULL,
  `kullaniciId` int(11) NOT NULL,
  `siniflar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `okullar`
--

DROP TABLE IF EXISTS `okullar`;
CREATE TABLE `okullar` (
  `id` int(11) NOT NULL,
  `bolgeId` int(11) NOT NULL,
  `yerId` int(11) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `tur` int(11) NOT NULL,
  `genelBilgi` text NOT NULL,
  `resimler` text NOT NULL,
  `adres` text NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `okulMuduru` varchar(250) NOT NULL,
  `okulSekreteri` varchar(250) NOT NULL,
  `okulVeliTemsilcisi` varchar(250) NOT NULL,
  `okulVeliTemsilcisiTelefon` varchar(20) NOT NULL,
  `okulVeliTemsilcisiEmail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `okulturleri`
--

DROP TABLE IF EXISTS `okulturleri`;
CREATE TABLE `okulturleri` (
  `id` int(11) NOT NULL,
  `turAdi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oncekiyurtdisigorevbilgisi`
--

DROP TABLE IF EXISTS `oncekiyurtdisigorevbilgisi`;
CREATE TABLE `oncekiyurtdisigorevbilgisi` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `ulke` varchar(250) NOT NULL,
  `yil` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projedeneyimi`
--

DROP TABLE IF EXISTS `projedeneyimi`;
CREATE TABLE `projedeneyimi` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `sure` varchar(20) NOT NULL,
  `butce` varchar(10) NOT NULL,
  `aciklama` text NOT NULL,
  `resimler` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

DROP TABLE IF EXISTS `resimler`;
CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `yol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sertifikavebelgebilgisi`
--

DROP TABLE IF EXISTS `sertifikavebelgebilgisi`;
CREATE TABLE `sertifikavebelgebilgisi` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `no` varchar(250) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `tarih` varchar(50) NOT NULL,
  `kurum` varchar(250) NOT NULL,
  `sure` varchar(250) NOT NULL,
  `aciklama` text NOT NULL,
  `resimler` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

DROP TABLE IF EXISTS `sinif`;
CREATE TABLE `sinif` (
  `id` int(11) NOT NULL,
  `okulId` int(11) NOT NULL,
  `donemId` int(11) NOT NULL,
  `sinifAdi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `toabbilgileri`
--

DROP TABLE IF EXISTS `toabbilgileri`;
CREATE TABLE `toabbilgileri` (
  `id` int(11) NOT NULL,
  `okulId` int(11) NOT NULL,
  `kendiYeri` varchar(25) NOT NULL,
  `telefon` varchar(25) NOT NULL,
  `adres` text NOT NULL,
  `binaOzellikleri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `toabovtgorevlileri`
--

DROP TABLE IF EXISTS `toabovtgorevlileri`;
CREATE TABLE `toabovtgorevlileri` (
  `id` int(11) NOT NULL,
  `okulId` int(11) NOT NULL,
  `adSoyad` varchar(250) NOT NULL,
  `meslek` varchar(250) NOT NULL,
  `gorev` varchar(250) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `adres` text NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `turkiyedegorevlioldugukurum`
--

DROP TABLE IF EXISTS `turkiyedegorevlioldugukurum`;
CREATE TABLE `turkiyedegorevlioldugukurum` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yabancidilbilgisi`
--

DROP TABLE IF EXISTS `yabancidilbilgisi`;
CREATE TABLE `yabancidilbilgisi` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `dil` varchar(250) NOT NULL,
  `seviye` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yakinbilgisi`
--

DROP TABLE IF EXISTS `yakinbilgisi`;
CREATE TABLE `yakinbilgisi` (
  `id` int(11) NOT NULL,
  `ogretmenId` int(11) NOT NULL,
  `derece` varchar(250) NOT NULL,
  `tckn` varchar(12) NOT NULL,
  `adSoyad` varchar(250) NOT NULL,
  `dogumTarihi` varchar(25) NOT NULL,
  `dogumYeri` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `asi` varchar(250) NOT NULL,
  `telefon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yarismaveodulbilgisi`
--

DROP TABLE IF EXISTS `yarismaveodulbilgisi`;
CREATE TABLE `yarismaveodulbilgisi` (
  `id` int(11) NOT NULL,
  `ogrenciId` int(11) NOT NULL,
  `yarismaAdi` varchar(250) NOT NULL,
  `tarih` varchar(20) NOT NULL,
  `kurum` varchar(250) NOT NULL,
  `odul` varchar(6) NOT NULL,
  `aciklama` text NOT NULL,
  `resimler` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yasaksayfalar`
--

DROP TABLE IF EXISTS `yasaksayfalar`;
CREATE TABLE `yasaksayfalar` (
  `id` int(11) NOT NULL,
  `sayfaAdi` varchar(250) NOT NULL,
  `sayfaYol` varchar(250) NOT NULL,
  `altSayfalar` tinyint(1) NOT NULL,
  `yetkiId` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkiler`
--

DROP TABLE IF EXISTS `yetkiler`;
CREATE TABLE `yetkiler` (
  `id` int(11) NOT NULL,
  `yetkiAdi` varchar(250) NOT NULL,
  `SuperAdmin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `asidurumu`
--
ALTER TABLE `asidurumu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `belirligunler`
--
ALTER TABLE `belirligunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bilgibeceriler`
--
ALTER TABLE `bilgibeceriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `devamsizlik`
--
ALTER TABLE `devamsizlik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ebeveynbilgileri`
--
ALTER TABLE `ebeveynbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `egitimdurumu`
--
ALTER TABLE `egitimdurumu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gorevbolgeleri`
--
ALTER TABLE `gorevbolgeleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gorevyerleri`
--
ALTER TABLE `gorevyerleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefon` (`telefon`);

--
-- Tablo için indeksler `notbilgisi`
--
ALTER TABLE `notbilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrencidersprogrami`
--
ALTER TABLE `ogrencidersprogrami`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrencidonemleri`
--
ALTER TABLE `ogrencidonemleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogretimdonemi`
--
ALTER TABLE `ogretimdonemi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogretimprogrami`
--
ALTER TABLE `ogretimprogrami`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogretmenler`
--
ALTER TABLE `ogretmenler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `okullar`
--
ALTER TABLE `okullar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `okulturleri`
--
ALTER TABLE `okulturleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oncekiyurtdisigorevbilgisi`
--
ALTER TABLE `oncekiyurtdisigorevbilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `projedeneyimi`
--
ALTER TABLE `projedeneyimi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sertifikavebelgebilgisi`
--
ALTER TABLE `sertifikavebelgebilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `toabbilgileri`
--
ALTER TABLE `toabbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `toabovtgorevlileri`
--
ALTER TABLE `toabovtgorevlileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `turkiyedegorevlioldugukurum`
--
ALTER TABLE `turkiyedegorevlioldugukurum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yabancidilbilgisi`
--
ALTER TABLE `yabancidilbilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yakinbilgisi`
--
ALTER TABLE `yakinbilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yarismaveodulbilgisi`
--
ALTER TABLE `yarismaveodulbilgisi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yasaksayfalar`
--
ALTER TABLE `yasaksayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yetkiler`
--
ALTER TABLE `yetkiler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `asidurumu`
--
ALTER TABLE `asidurumu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `belirligunler`
--
ALTER TABLE `belirligunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `bilgibeceriler`
--
ALTER TABLE `bilgibeceriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `devamsizlik`
--
ALTER TABLE `devamsizlik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ebeveynbilgileri`
--
ALTER TABLE `ebeveynbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `egitimdurumu`
--
ALTER TABLE `egitimdurumu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `gorevbolgeleri`
--
ALTER TABLE `gorevbolgeleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `gorevyerleri`
--
ALTER TABLE `gorevyerleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `notbilgisi`
--
ALTER TABLE `notbilgisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ogrencidersprogrami`
--
ALTER TABLE `ogrencidersprogrami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ogrencidonemleri`
--
ALTER TABLE `ogrencidonemleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ogretimdonemi`
--
ALTER TABLE `ogretimdonemi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ogretimprogrami`
--
ALTER TABLE `ogretimprogrami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ogretmenler`
--
ALTER TABLE `ogretmenler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `okullar`
--
ALTER TABLE `okullar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `okulturleri`
--
ALTER TABLE `okulturleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `oncekiyurtdisigorevbilgisi`
--
ALTER TABLE `oncekiyurtdisigorevbilgisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `projedeneyimi`
--
ALTER TABLE `projedeneyimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sertifikavebelgebilgisi`
--
ALTER TABLE `sertifikavebelgebilgisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `toabbilgileri`
--
ALTER TABLE `toabbilgileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `toabovtgorevlileri`
--
ALTER TABLE `toabovtgorevlileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `turkiyedegorevlioldugukurum`
--
ALTER TABLE `turkiyedegorevlioldugukurum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yabancidilbilgisi`
--
ALTER TABLE `yabancidilbilgisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yakinbilgisi`
--
ALTER TABLE `yakinbilgisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yarismaveodulbilgisi`
--
ALTER TABLE `yarismaveodulbilgisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yasaksayfalar`
--
ALTER TABLE `yasaksayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yetkiler`
--
ALTER TABLE `yetkiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
