-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 08:18 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr`
--

-- --------------------------------------------------------

--
-- Table structure for table `congnhan`
--

CREATE TABLE `congnhan` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nam` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `congnhan`
--

INSERT INTO `congnhan` (`id`, `ten`, `nam`, `cmnd`, `doi`, `ngay`) VALUES
(18, 'PHẠM MINH ĐẢNG', '1983', '173248064', 'MÌNH ĐIỀU', '10-04-2018'),
(19, 'LÊ TÁ SƠN', '1996', '038096004099', 'MÌNH ĐIỀU', '10-04-2018'),
(20, 'LÊ TÁ THỦY', '1994', '038094005664', 'MÌNH ĐIỀU', '10-04-2018'),
(21, 'LÊ TÁ GIÁP', '1970', '171392463', 'MÌNH ĐIỀU', '12-04-2018'),
(22, 'ĐOÀN VĂN GIỎI', '1992', '371579082', 'BAN THI CÔNG', '12-04-2018'),
(23, 'CHÂU HUYỀN TRANG', '1993', '370380556', 'BAN THI CÔNG', '12-04-2018'),
(24, 'NGUYỄN THỊ BÉ SÁU', '1976', '385663621', 'CÔNG NHẬT DIỄM', '12-04-2018'),
(25, 'ĐỖ THỊ MỸ NƯƠNG', '1998', '385820813', 'CÔNG NHẬT DIỄM', '12-04-2018'),
(26, 'PHẠM MINH ĐẢNG', '1983', '173248064', 'MÌNH ĐIỀU', '13-04-2018'),
(27, 'LÊ TÁ SƠN', '1996', '38096004099', 'MÌNH ĐIỀU', '13-04-2018'),
(28, 'LÊ TÁ THỦY', '1994', '38094005664', 'MÌNH ĐIỀU', '13-04-2018'),
(29, 'ĐINH THỊ HOÀNG', '1983', '72183003147', 'MÌNH ĐIỀU', '13-04-2018'),
(30, 'LÊ TÁ GIÁP', '1970', '171392463', 'MÌNH ĐIỀU', '13-04-2018'),
(31, 'NGÔ ĐÌNH SƠN', '1994', '215400797', 'VẠN THÀNH AN', '13-04-2018'),
(32, 'NGUYỄN QUỐC HÀO', '1998', '215451023', 'VẠN THÀNH AN', '13-04-2018'),
(33, 'MAI HƯNG KIỆM', '1991', '172044323', 'PCCC 2-9', '13-04-2018'),
(34, 'TRẦN VĂN PHONG', '1990', '5', 'PHẠM MẠNH HÙNG', '13-04-2018'),
(35, 'NGUYỄN VĂN QUÝ', '1989', '334361370', 'PHẠM MẠNH HÙNG', '13-04-2018'),
(36, 'NGUYỄN VĂN CÁC', '1982', '271533850', 'PHẠM VĂN SƠN', '13-04-2018'),
(37, 'NGUYỄN VĂN CẦN', '1974', '361622155', 'CAO TÚ', '13-04-2018'),
(38, 'LÂM THÚY ÁI', '1990', '363578884', 'CAO TÚ', '13-04-2018'),
(39, 'NGUYỄN THỊ HIẾU', '1996', '381917561', 'CÔNG NHẬT DIỄM', '13-04-2018'),
(40, 'VÕ THỊ TOÀN', '1966', '300923594', 'CÔNG NHẬT DIỄM', '13-04-2018'),
(41, 'NGUYỄN VĂN SƠN', '1963', '300038378', 'CÔNG NHẬT DIỄM', '13-04-2018'),
(42, 'PHẠM MINH CHÁNH', '1969', '320633762', 'ĐÀM QUANG TIẾN', '13-04-2018'),
(43, 'LÊ THANH LIÊM', '1966', '9', 'ĐÀM QUANG TIẾN', '13-04-2018'),
(44, 'VÕ VĂN HIẾN', '1998', '241658394', 'HOÀNG ĐỨC DƯƠNG', '13-04-2018'),
(45, 'CAO XUÂN THỊNH', '1996', '362473667', 'CAO TÚ', '14-04-2018'),
(46, 'NGUYỄN VĂN CẦN', '1974', '361622155', 'CAO TÚ', '14-04-2018'),
(47, 'LÂM THÚY ÁI', '1990', '363578884', 'CAO TÚ', '14-04-2018'),
(48, 'TRẦN VĂN MẾM', '1985', '362566159', 'CAO TÚ', '14-04-2018'),
(49, 'VỎ THỊ THANH NGA', '1969', '361225012', 'CAO TÚ', '14-04-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `congnhan`
--
ALTER TABLE `congnhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congnhan`
--
ALTER TABLE `congnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
