-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2017 lúc 02:43 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore_ttcm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `citys`
--

CREATE TABLE `citys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `citys`
--

INSERT INTO `citys` (`id`, `name`) VALUES
(1, 'Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Đà Nẵng'),
(4, 'An Giang'),
(5, 'Bà Rịa - Vũng Tàu'),
(6, 'Bắc Giang'),
(7, 'Bắc Kạn'),
(8, 'Bạc Liêu'),
(9, 'Bắc Ninh'),
(10, 'Bến Tre'),
(11, 'Bình Dương'),
(12, 'Bình Phước'),
(13, 'Bình Thuận'),
(14, 'Bình Định'),
(15, 'Cà Mau'),
(16, 'Cần Thơ'),
(17, 'Cao Bằng'),
(18, 'Gia Lai'),
(19, 'Hà Giang'),
(20, 'Hà Nam'),
(21, 'Hà Tĩnh'),
(22, 'Hải Dương'),
(23, 'Hải Phòng'),
(24, 'Hậu Giang'),
(25, 'Hoà Bình'),
(26, 'Hưng Yên'),
(27, 'Khánh Hòa'),
(28, 'Kiên Giang'),
(29, 'Kon Tum'),
(30, 'Lai Châu'),
(31, 'Lâm Đồng'),
(32, 'Lạng Sơn'),
(33, 'Lào Cai'),
(34, 'Long An'),
(35, 'Nam Định'),
(36, 'Nghệ An'),
(37, 'Ninh Bình'),
(38, 'Ninh Thuận'),
(39, 'Phú Thọ'),
(40, 'Phú Yên'),
(41, 'Quảng Bình'),
(42, 'Quảng Nam'),
(43, 'Quảng Ngãi'),
(44, 'Quảng Ninh'),
(45, 'Quảng Trị'),
(46, 'Sóc Trăng'),
(47, 'Sơn La'),
(48, 'Tây Ninh'),
(49, 'Thái Bình'),
(50, 'Thái Nguyên'),
(51, 'Thanh Hóa'),
(52, 'Thừa Thiên Huế'),
(53, 'Tiền Giang'),
(54, 'Trà Vinh'),
(55, 'Tuyên Quang'),
(56, 'Vĩnh Long'),
(57, 'Vĩnh Phúc'),
(58, 'Yên Bái'),
(59, 'Đắk Lắk'),
(60, 'Đắk Nông'),
(61, 'Điện Biên'),
(62, 'Đồng Nai'),
(63, 'Đồng Tháp');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
