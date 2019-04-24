-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2019 lúc 01:40 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangdienmay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_phone` varchar(10) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_certificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `account_name`, `account_phone`, `account_email`, `account_certificate`) VALUES
('admin', 'admin', 'Tho', '1234567890', 'toiten@gmail.com', '02536254');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_phone` varchar(10) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_productName` varchar(255) NOT NULL,
  `bill_quantity` int(11) NOT NULL,
  `bill_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_delete`) VALUES
('1', 'Điện Thoại', 1),
('11', 'Máy Khoan', 0),
('12', 'Máy Khoan', 1),
('123', 'May may', 0),
('13', 'Bình thuỷ điện', 0),
('15', 'Máy Hàn', 0),
('18', 'Máy Hàn', 1),
('2', 'Máy giặt', 1),
('21', 'May Han', 0),
('2222', 'Máy phát điện', 0),
('3', 'Tủ lạnh', 1),
('3333', 'Máy Khoan', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` varchar(255) NOT NULL,
  `category_id` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_description` text CHARACTER SET utf32 NOT NULL,
  `product_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_code`, `product_image`, `product_price`, `product_description`, `product_delete`) VALUES
('1', '1', 'Nokia', '', 'https://cdn.tgdd.vn/Products/Images/42/109610/nokia-105-2017-300-300x300.jpg', 111, 'Khong', 0),
('10', '1', 'Hitachi', '1111z', 'abc', 1000, 'khong', 0),
('2', '2', 'Panasonic', '123', '12333', 1111, '123', 1),
('3', '1', 'Sam Sung', '1sma', 'https://cdn.tgdd.vn/Products/Images/42/109610/nokia-105-2017-300-300x300.jpg', 1000, 'Khong', 0),
('4', '1', 'Iphone', 'sml', 'https://cdn.tgdd.vn/Products/Images/42/109610/nokia-105-2017-300-300x300.jpg', 1000, 'Khong', 0),
('5', '1', 'Zenphone', 'abc', 'xyz', 111, 'khong', 0),
('6', '1', 'IX', 'sml1', 'aaaa hí', 1000, 'Khong', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_phone`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
