-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 01, 2022 lúc 08:42 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlmh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `id` int(11) NOT NULL,
  `tengv` varchar(50) NOT NULL,
  `sdt` text NOT NULL,
  `diachi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`id`, `tengv`, `sdt`, `diachi`) VALUES
(2, 'Đoàn Trình Dục', '0123456789', 'ĐăkLăk'),
(3, 'Phạm Công Danh', '0123456987', 'Đồng Nai'),
(7, 'Nguyễn Phúc Lộc', '0384731507', 'Đồng Nai'),
(9, 'Đặng Thành Hảo', '0332114567', 'Đồng Nai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `malop` int(11) NOT NULL,
  `tenlop` varchar(50) NOT NULL,
  `mamh` varchar(10) NOT NULL,
  `idgv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`malop`, `tenlop`, `mamh`, `idgv`) VALUES
(2, 'CS03005 - 7 - 6711', 'CS03005', 7),
(3, 'CS03001 - 2 - 8217', 'CS03001', 2),
(4, 'CS09009 - 2 - 1728', 'CS09009', 2),
(5, 'CS03026 - 2 - 3369', 'CS03026', 2),
(6, 'GS19001 - 3 - 1206', 'GS19001', 3),
(9, 'CS09009 - 7 - 1070', 'CS09009', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` varchar(10) NOT NULL,
  `tenmh` varchar(50) NOT NULL,
  `stc` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamh`, `tenmh`, `stc`) VALUES
('CS03001', 'Kĩ Thuật Số', 3),
('CS03003', 'Kỹ Thuật Lập Trình', 3),
('CS03005', 'Toán Rời Rạc', 3),
('CS03016', 'Thực hành Lập Trình Hướng Đối Tượng', 1),
('CS03026', 'Mã Hóa Ứng Dụng', 3),
('CS03045', 'Kiểm Thử Phần Mềm', 3),
('CS09009', 'Mạng Máy Tính', 3),
('CS09011', 'Quản Trị Mạng', 3),
('CS30001', 'Tin học đại cương', 3),
('GS19001', 'Tiếng Anh 1', 3),
('GS79009', 'Tư Tưởng Hồ Chí Minh', 2),
('GS99001', 'Giáo Dục Thể Chất 1', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`malop`),
  ADD KEY `mamh` (`mamh`),
  ADD KEY `idgv` (`idgv`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `malop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`mamh`) REFERENCES `monhoc` (`mamh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`idgv`) REFERENCES `giangvien` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
