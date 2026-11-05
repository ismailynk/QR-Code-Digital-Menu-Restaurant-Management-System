-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 01 Mar 2023, 21:48:39
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cafe`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `cat_pic_name` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT 'CafeDB/img/custom-pics/icon-picture.jpg',
  `visible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `cat_pic_name`, `visible`) VALUES
(3, 'İçecekler', 'CafeDB/img/custom-pics/icon-picture.jpg	', 1),
(4, 'Aperatifler', 'CafeDB/img/custom-pics/icon-picture.jpg	', 1),
(22, 'Burgerler', 'CafeDB/uploaded_img/Category_imgs/burgerlu9167lu1431er8090.jpg', 1),
(25, 'Pizzalar', 'CafeDB/uploaded_img/Category_imgs/vegertableth7055fg5278.jpg', 1),
(26, 'son', 'CafeDB/uploaded_img/Category_imgs/cholateer1859.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `extras`
--

DROP TABLE IF EXISTS `extras`;
CREATE TABLE IF NOT EXISTS `extras` (
  `extra_id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_ad` varchar(250) COLLATE utf8mb4_turkish_ci DEFAULT 'Boş',
  `extra_fiyat` float DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `grup_id` int(11) NOT NULL,
  PRIMARY KEY (`extra_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `extras`
--

INSERT INTO `extras` (`extra_id`, `extra_ad`, `extra_fiyat`, `visible`, `grup_id`) VALUES
(2, 'asd', 1, 1, 2),
(3, '1', 1, 1, 2),
(4, '7777', 1, 1, 2),
(5, 'A', 1, 1, 2),
(6, 'q', 1, 1, 2),
(7, '1', 1, 1, 2),
(8, '2', 2, 1, 2),
(9, '3', 3, 1, 2),
(10, '130GR', 15, 1, 3),
(11, '100GR', 10, 1, 3),
(12, '80GR', 5, 1, 3),
(13, 'Cheddar Peyniri', 5, 1, 3),
(14, 'Domates', 2, 1, 3),
(15, 'Turşu', 2, 1, 3),
(16, 'şeker', 4, 1, 4),
(17, 'çay', 2, 1, 4),
(18, 'su', 1, 1, 4),
(19, 'zvzxcv', 4444, 1, 5),
(20, 'qwe', 22222, 1, 5),
(21, 'asd', 22, 1, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `extra_group`
--

DROP TABLE IF EXISTS `extra_group`;
CREATE TABLE IF NOT EXISTS `extra_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `grup_type` tinyint(1) NOT NULL DEFAULT '1',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `extra_group`
--

INSERT INTO `extra_group` (`group_id`, `grup_name`, `grup_type`, `visible`) VALUES
(2, 'asd', 1, 0),
(3, 'hamburger', 0, 1),
(4, 'new', 1, 1),
(6, 'newwwwwwwwwwwAAAAAAAAAAA', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `infos`
--

DROP TABLE IF EXISTS `infos`;
CREATE TABLE IF NOT EXISTS `infos` (
  `cafe_id` int(11) NOT NULL AUTO_INCREMENT,
  `cafe_name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `header_bg` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `header_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `headers_font` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `navbar_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `body_bg` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `menu_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `scrollmenu_button` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `scrollmenu_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_img_rad` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_detail_bg` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_detail_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_price_bg` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_price_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_button_bg` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_button_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `card_shadow` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `scrollmenu_button_shadow` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `footer_bg` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `footer_text` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `cafe_tel` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `cafe_email` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `cafe_slogan` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `cafe_days` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `cafe_hours` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`cafe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `infos`
--

INSERT INTO `infos` (`cafe_id`, `cafe_name`, `header_bg`, `header_text`, `headers_font`, `navbar_text`, `body_bg`, `menu_text`, `scrollmenu_button`, `scrollmenu_text`, `card_img_rad`, `card_detail_bg`, `card_detail_text`, `card_price_bg`, `card_price_text`, `card_button_bg`, `card_button_text`, `card_shadow`, `scrollmenu_button_shadow`, `footer_bg`, `footer_text`, `cafe_tel`, `cafe_email`, `cafe_slogan`, `cafe_days`, `cafe_hours`) VALUES
(1, 'Bycan', 'background: linear-gradient(145deg, #CEAF15 28%, #E0E00C 68%, #D8D8B9 100%);', 'color: #252B2F;', NULL, 'color: #252B2F;', NULL, NULL, 'background-color: #CEAF15;', 'color: #1A1D27;', 'border-radius: 100px;', 'background-color: #CEAF15;', 'color: #1A1D27;', 'background-color: #1A1D27;', 'color: #FFFFFF;', 'background-color: #FFFFFF;', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pazartesi-Cuma', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_price` float DEFAULT '0',
  `product_first_exp` varchar(1000) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `product_second_exp` varchar(1000) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `pic_name` varchar(200) COLLATE utf8mb4_turkish_ci DEFAULT 'CafeDB/img/custom-pics/icon-picture.jpg',
  `type` int(2) NOT NULL DEFAULT '0',
  `product_visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`),
  KEY `product_category` (`product_category`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`product_id`, `product_name`, `product_category`, `product_price`, `product_first_exp`, `product_second_exp`, `pic_name`, `type`, `product_visible`) VALUES
(1, 'BBQ Burger', 22, 65, '130 GRsdfsdf', 'Barbekü Soslu Muhteşem Lezzet', 'CafeDB/uploaded_img/Product_imgs/anatolialu9318cv4066.jpg', 0, 1),
(2, 'Anatloia Burger', 22, 40, '100 GR', 'fghfghfgh', 'CafeDB/uploaded_img/Product_imgs/anatolialu9318.jpg', 0, 1),
(4, 'Babil Burger', 22, 40, 'asdaaaaaaaa', NULL, 'CafeDB/uploaded_img/Product_imgs/babilfg5008.jpg', 0, 1),
(9, 'Rabon Çanta', 3, 120, 'Kullanılmış', 'Az kullanılmış, Düğmeleri ve fermuarları sağlam', 'CafeDB/uploaded_img/Product_imgs/aafg2563.jpg', 0, 1),
(11, 'Ayran', 3, 3, '', '', 'CafeDB/uploaded_img/Product_imgs/ayranth5424.jpg', 0, 1),
(12, 'Şalgam', 3, 2, '', '', 'CafeDB/uploaded_img/Product_imgs/salgamcv22.jpg', 0, 1),
(13, 'Kibrit Patates', 4, 15, '', '', 'CafeDB/uploaded_img/Product_imgs/chopser1131.jpg', 0, 1),
(14, 'Kızarmış Patates', 4, 13, '', '', 'CafeDB/uploaded_img/Product_imgs/frechfriescv8928.jpg', 1, 1),
(15, 'Soğan Halkası', 4, 10, '', '', 'CafeDB/uploaded_img/Product_imgs/onionringfg2940.jpg', 0, 1),
(22, 'Meyve Suyu', 3, 20, 'Karışık Meyve Suyu', 'Ferahlatıcı Lezzet', 'CafeDB/uploaded_img/Product_imgs/karisik-meyve-nektarith8127.jpg', 0, 1),
(23, 'hamburger', 22, 50, 'normal', 'sade', 'CafeDB/uploaded_img/Product_imgs/burgercv2244.jpg', 0, 1),
(31, 'BBQ Burger', 22, 80, 'BBQ', '130GR', 'CafeDB/uploaded_img/Product_imgs/burgerth3441fg6677.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `table_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_no` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `table_case` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`table_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tables`
--

INSERT INTO `tables` (`table_id`, `table_no`, `table_case`) VALUES
(1, '1', 0),
(2, '2', 0),
(3, '3', 0),
(4, 'Bahçe-1', 0),
(5, 'Bahçe-2', 0),
(6, 'Bahçe-3', 0),
(7, '4', 0),
(8, '5', 0),
(9, 'bahçe-3.masa', 0),
(10, 'bahçe-3.masa', 0),
(11, 'a', 0);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
