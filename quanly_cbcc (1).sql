-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2022 lúc 02:59 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_cbcc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvnb`
--

CREATE TABLE `bvnb` (
  `id` int(3) UNSIGNED NOT NULL,
  `loai_kl` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Không vi pham; vi pham',
  `so_vbkl` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung_kl` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cb` int(3) UNSIGNED NOT NULL,
  `ghichu` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvnb`
--

INSERT INTO `bvnb` (`id`, `loai_kl`, `so_vbkl`, `noidung_kl`, `id_cb`, `ghichu`) VALUES
(1, '  Không vi phạm', '1770-TB/HU', '   Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí sử dụng', 6, '  '),
(2, '  Có vấn đề chính trị nhưng kh', '02-KL/HU', '  Đang xem xét kết luận theo Quy định 58', 43, '  '),
(8, '  Không có vấn đề chính trị', ' 1674-TB/HU', '   Căn cứ, trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dụng', 23, '  '),
(9, '    Không vi phạm', ' 1669-TB/HU', '     Căn cứ trình độ, năng lực chuyên môn, để bố trí sử dụng', 9, '    '),
(10, ' Không có vấn đề chính trị', ' 1687-TB/HU', '  Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 31, ' '),
(13, '  Không có vấn đề chính trị', ' 1689-TB/HU, Ngày .../.../....', '   Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 29, '  '),
(17, 'Có vấn đề chính trị nhưng khôn', ' KL 12-KL/HU, ngày 10/57/2022', ' Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 14, ''),
(19, 'Chưa kết luận', ' ', ' Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 12, ''),
(20, 'Không có vấn đề chính trị', ' 1766-TB/HU, ngày 10/6/2020', ' Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 1, ''),
(21, ' Không vi phạm', ' ', '  Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 7, ' '),
(22, 'Không có vấn đề chính trị', ' xxxx-TB/HU, ngày dd/mm/yyy', ' Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung', 39, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbo`
--

CREATE TABLE `canbo` (
  `id` int(3) UNSIGNED NOT NULL,
  `hoten` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` int(1) DEFAULT NULL COMMENT '#0: Nam; #1: Nữ',
  `dantoc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quequan` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayvaodang` date DEFAULT NULL,
  `hoc_ham` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `chuyenmon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `llct` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `id_cv` int(2) UNSIGNED NOT NULL,
  `id_pb` int(2) UNSIGNED NOT NULL,
  `ghichu` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table luu tru thong tin cán bộ, công chức';

--
-- Đang đổ dữ liệu cho bảng `canbo`
--

INSERT INTO `canbo` (`id`, `hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `quequan`, `ngayvaodang`, `hoc_ham`, `chuyenmon`, `llct`, `id_cv`, `id_pb`, `ghichu`) VALUES
(1, 'Đậu Thị Tân', '1985-12-01', 0, 'Kinh', 'Nghệ An', '1985-12-01', '', 'ĐHSP GD chính trị', 'TC', 53, 7, ''),
(2, 'Nguyễn Thị Thanh Thúy', '1979-07-01', 0, 'Kinh', 'Ninh Thuận', '1979-07-01', '', 'ĐHHành chính', 'CC', 44, 10, ''),
(3, 'Nguyễn Thụy Thùy Trang', '1985-03-01', 0, 'Kinh', 'Ninh Thuận', '1985-03-01', '', 'ĐHQTKD', 'TC', 6, 15, ''),
(4, 'Phan Thị Thuý Hà', '1977-02-01', 0, 'Kinh', 'Quảng Ngãi', '1977-02-01', '', 'ĐHQTKD', 'TC', 48, 7, ''),
(5, 'Taing Thị Nga', '1984-02-01', 0, 'Raglai', 'Ninh Thuận', '1984-02-01', '', 'ĐH Báo chí', 'TC', 44, 1, ''),
(6, 'Bùi Anh Thư ', '1983-11-01', 1, 'Kinh', 'Ninh Thuận', '1983-11-01', '', 'ĐHTC-NH', 'CC', 9, 21, ''),
(7, 'Võ Thị Mỹ Hòa', '1988-01-01', 0, 'Kinh', 'Ninh Thuận', '1988-01-01', '', 'ĐHXã hội học', 'TC', 53, 19, ''),
(9, 'Phạm Thị Xuân Nữ', '1984-02-01', 0, 'Kinh', 'Ninh Thuận', '1984-02-01', '', 'ĐH Kinh tếXD&QLDA', 'CC', 43, 3, ''),
(10, 'Mai Thị Hồng Hoa', '1972-10-01', 0, 'Kinh', 'Ninh Thuận', '1972-10-01', '', 'ĐHSư phạm', 'TC', 43, 24, ''),
(11, 'Lê Vương', '1977-04-01', 0, 'Kinh', 'Ninh Thuận', '1977-04-01', '', 'ĐHQTKD', 'CC', 9, 28, ''),
(12, 'Hà Trúc Phương', '1970-09-01', 0, 'Kinh', 'Bình Định', '1970-09-01', '', 'ĐHLuật', 'TC', 48, 29, ''),
(13, 'Nguyễn Thành Định', '1972-05-01', 0, 'Kinh', 'Ninh Thuận', '1972-05-01', NULL, 'Bác sĩ CK I;\nĐg học B.sĩ\nCK II', 'CC', 1, 1, ''),
(14, 'Lê Thành Thoại', '1972-04-01', 0, 'Kinh', 'Ninh Thuận', '1972-04-01', NULL, 'Bác sĩ Ch. khoa I', 'TC', 1, 1, ''),
(15, 'Trần Thị Kim Phượng', '1988-12-01', 0, 'Kinh', 'Ninh Thuận', '1988-12-01', NULL, 'Đại học\nHành chính', 'TC', 1, 1, ''),
(16, 'Trần Minh Hùng', '1982-05-01', 0, 'Kinh', 'Ninh Thuận', '1982-05-01', NULL, 'ĐH\nXDĐ-CQNN', 'CC', 1, 1, ''),
(17, 'Phan Thị Kim Thoa', '1983-07-01', 0, 'Kinh', 'Ninh Thuận', '1983-07-01', NULL, 'ĐH Luật', 'TC', 1, 1, ''),
(18, 'Võ Ngọc Phương', '1985-07-01', 0, 'Kinh', 'Ninh Thuận', '1985-07-01', NULL, 'ĐH Luật', 'TC', 1, 1, ''),
(19, 'Nguyễn Hữu Trí', '1987-04-01', 0, 'Kinh', 'Ninh Thuận', '1987-04-01', NULL, 'Đại học QTKD', 'TC', 1, 1, ''),
(20, 'Mai Duy Bàng', '1981-03-01', 0, 'Kinh', 'Thanh Hóa', '1981-03-01', '', 'Đại học QTKD', 'TC', 3, 50, ''),
(21, 'Trần Thị Bạch Như', '1983-11-01', 0, 'Kinh', 'Bình Thuận', '1983-11-01', NULL, 'ĐH Kế toán', 'TC', 1, 1, ''),
(22, 'Mấu Thị Hiền', '1982-04-01', 0, 'Raglai', 'Ninh Thuận', '1982-04-01', NULL, 'ĐH\nHành chính', 'TC', 1, 1, ''),
(23, 'Katơr Thị Biệt', '1982-04-01', 0, 'Raglai', 'Ninh Thuận', '1982-04-01', '', 'ĐH Hành Chính', 'TC', 45, 39, ''),
(24, 'Nguyễn Văn Tiển', '1981-03-01', 0, 'Kinh', 'Bình Định', '1981-03-01', NULL, 'ĐH Kinh tế', 'TC', 1, 1, ''),
(25, 'Phạm Thái Sơn', '1972-07-01', 0, 'Kinh', 'Ninh Thuận', '1972-07-01', NULL, 'ĐH Thú y', 'CC', 1, 1, ''),
(28, 'Patâu Axá Ngoan', '1983-07-01', 0, 'Raglai', 'Ninh Thuận', '1983-07-01', NULL, 'ĐH\nXDĐ-CQNN', 'TC', 1, 1, ''),
(29, 'Chamaléa Xoa', '1985-06-01', 0, 'Raglai', 'Ninh Thuận', '1985-06-01', '', 'ĐHXDĐ-CQNN', 'Không', 6, 49, ''),
(31, 'Chamaléa Biên', '1980-11-01', 0, 'Raglai', 'Phước Kháng, Thuận Bắc, Ninh Thuận', '1980-11-01', '', 'ĐH Luật kinh tế', 'TC', 55, 44, ''),
(33, 'Phạm Cao Thuận', '1988-04-01', 0, 'Kinh', 'Ninh Thuận', '1988-04-01', 'Ths', 'ĐH QTKD; Ths kinh tế', 'CC', 5, 14, ''),
(34, 'Phạm Xuân Tăng', '1986-04-01', 0, 'Kinh', 'Quảng Bình', '1986-04-01', NULL, 'Đại học\nKH Lịch sử', 'CC', 1, 1, ''),
(35, 'Nguyễn Đăng Quang', '1989-09-01', 0, 'Kinh', 'Ninh Thuận', '1989-09-01', '', 'ĐH Đ.tử-VT;ĐH Luật', 'TC', 3, 7, ''),
(37, 'Lê Văn Huynh', '1981-08-01', 0, 'Kinh', 'Thái Bình', '1981-08-01', 'Ths', 'ĐHQTKD; Ths kinh tế', 'TC', 48, 13, ''),
(38, 'Trương Thị Kim Chi', '1986-01-01', 0, 'Kinh', 'Quảng Bình', '1986-01-01', NULL, 'Đại học\nSP Lịch sử', 'TC', 1, 1, ''),
(39, 'Lê Duy Khoa', '1988-12-01', 0, 'Kinh', 'Ninh Thuận', '1988-12-01', '', 'ĐH QT kinh doanh', 'TC', 43, 4, ''),
(40, 'Trần Đức Vương', '1981-08-01', 0, 'Kinh', 'Ninh Thuận', '1981-08-01', NULL, 'ĐH Cảnh sát', 'TC', 1, 1, ''),
(41, 'Trần Xuân Tình', '1983-04-01', 0, 'Kinh', 'Ninh Thuận', '1983-04-01', 'Ths', 'ĐH XDDD; Ths QLXD', 'TC', 1, 1, ''),
(42, 'Huỳnh Quốc Việt', '1980-06-01', 0, 'Kinh', 'Ninh Thuận', '1980-06-01', NULL, 'ĐH Kinh tế', 'TC', 1, 1, ''),
(43, 'Lê Thanh Hùng', '1974-05-01', 0, 'Kinh', 'Ninh thuận', '1974-05-01', '', 'ĐH Xây dựng đảng', 'CC', 43, 25, ''),
(44, 'Phạm Văn Dưỡng', '1979-01-01', 0, 'Kinh', 'Nam Định', '1979-01-01', '', 'ĐH XDĐ-CQNN', 'TC', 1, 1, ''),
(45, 'Nguyễn Công Minh Tường', '1978-04-01', 0, 'Kinh', 'Ninh Thuận', '1978-04-01', '', 'Đại Học Luật', 'TC', 3, 14, ''),
(46, 'Trịnh Thị Bích Ngọc', '1984-10-01', 1, 'Kinh', 'Ninh Thuận', '1984-10-01', '', 'ĐH t.chính ngân hàng', 'TC', 6, 48, ''),
(47, 'Mang Sạch', '1986-06-01', 0, 'Raglai', 'Ninh Thuận', '1986-06-01', '', 'ĐH Luật', 'TC', 3, 1, ''),
(48, 'Lượng Thanh Nhứt', '1970-05-01', 0, 'Chăm', 'Ninh Thuận', '1970-05-01', '', 'ĐH Luật', 'TC', 1, 1, ''),
(49, 'Trần Thị Vinh', '1987-10-01', 1, 'Kinh', 'Ninh Thuận', '1987-10-01', '', 'ĐH Kế toán; ĐH Luật', 'TC', 6, 5, ''),
(50, 'Phạm Thị Ánh Tuyết', '1983-09-01', 1, 'Kinh', 'Thuận Bắc, Ninh Thuận', '1983-09-01', '', 'ĐH lưu trữ và QTVP', 'TC', 6, 5, ''),
(51, 'Trịnh Thị Thúy Lài', '1987-04-01', 1, 'Kinh', 'Thanh Hóa', '1987-04-01', '', 'ĐH sư phạm Chính trị', 'TC', 6, 10, ''),
(52, 'Lê Thị Hồng Thúy', '1989-06-01', 1, 'Kinh', 'Hà Tĩnh', '1989-06-01', 'Ths', 'Th.s QTKD', 'TC', 6, 21, ''),
(53, 'Trần Nguyên Vũ Bão', '1988-06-01', 1, 'Kinh', 'Ninh Thuận', '1988-06-01', 'Ths', 'Th.s Kinh tế', 'TC', 3, 19, ''),
(54, 'Phạm Thị Tiểu Phụng', '1987-06-01', 1, 'Kinh', 'Ninh Thuận', '2022-06-19', 'Ths', 'Th.s Tài chính - NH', '', 3, 7, ''),
(55, 'Phạm Thị Thiên Lý', '1990-06-01', 1, 'Kinh', 'Ninh Thuận', '1990-06-01', '', 'ĐH Quản lý môi trường', '', 6, 22, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(2) UNSIGNED NOT NULL,
  `chuc_vu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `chuc_vu`) VALUES
(1, 'Bí thư'),
(3, 'Phó Bí thư'),
(5, 'Chủ tịch'),
(6, 'Phó Chủ tịch UBND'),
(9, 'Trưởng phong'),
(43, 'Phó Trưởng phòng'),
(44, 'Trưởng ban'),
(45, 'Phó Trưởng ban'),
(46, 'Giám đốc'),
(47, 'Phó Giám đốc'),
(48, 'Chuyên viên'),
(49, 'Cán sự'),
(50, 'Viên chức'),
(51, 'Cán bộ, công chức'),
(52, 'Chánh Văn phòng'),
(53, 'Phó Chánh Văn phòng'),
(54, 'Ủy viên UBKT HU'),
(55, 'Phó Bí thư'),
(56, 'Phó Chủ tịch HĐND');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `id` int(2) UNSIGNED NOT NULL,
  `phong_ban` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`id`, `phong_ban`) VALUES
(1, 'Phong Tư pháp'),
(2, 'Phong Lao đông - TBXH'),
(3, 'Thanh tra huyện'),
(4, 'Phòng Nội vụ'),
(5, 'Ban Tổ chúc HU'),
(6, 'Ban Tuyên giáo HU'),
(7, 'Văn phòng HU'),
(10, 'Ban Dân vận HU'),
(11, 'Ủy ban Kiểm tra HU'),
(12, 'TT Chính trị'),
(13, 'Uỷ ban Mặt trận TQVN huyện'),
(14, 'Huyện đoàn'),
(15, 'Hội LH Phụ nữ'),
(16, 'Hội Nông dân'),
(17, 'Hội CCB'),
(18, 'LĐLĐ'),
(19, 'Văn phòng HĐND và UBND huyện'),
(21, 'Phòng Tài chính - Kế hoạch'),
(22, 'Phòng Tài nguyên và Môi trường'),
(23, 'Phòng Nông nghiệp và PTNT'),
(24, 'Phòng Giáo dục và Đào tạo'),
(25, 'Phòng Văn hóa và Thông tin'),
(26, 'Phòng Kinh tế và Hạ tầng'),
(27, 'Phòng Tư pháp'),
(28, 'Phòng Lao động Thương binh và Xã hội'),
(29, 'Trung tâm Văn hóa - Thể thao và Truyền thanh '),
(30, 'Ban quản lý dự án đầu tư xây dựng huyện'),
(31, 'Trung tâm GDNN - GDTX huyện'),
(32, 'Trung tâm Phát triển quỹ đất huyện'),
(37, 'Ban Pháp chế HĐND huyện'),
(38, 'Ban Dân tộc HĐND huyện'),
(39, 'Ban Kinh tế - xã hội HĐND huyện'),
(44, 'xã Phước Kháng'),
(46, 'xã Phước Chiến'),
(47, 'xã Bắc Sơn'),
(48, 'xã Bắc Phong'),
(49, 'xã Lợi Hải'),
(50, 'xã Công Hải');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyhoach`
--

CREATE TABLE `quyhoach` (
  `id` int(3) UNSIGNED NOT NULL,
  `id_cv` int(2) UNSIGNED NOT NULL,
  `id_pb` int(2) UNSIGNED NOT NULL,
  `id_cb` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bvnb`
--
ALTER TABLE `bvnb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cb` (`id_cb`),
  ADD KEY `FK_bvnb_canbo` (`id_cb`);

--
-- Chỉ mục cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_canbo_chuc_vu` (`id_cv`),
  ADD KEY `FK_canbo_phong_ban` (`id_pb`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyhoach`
--
ALTER TABLE `quyhoach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_quy_hoach_chuc_vu` (`id_cv`),
  ADD KEY `FK_quy_hoach_phong_ban` (`id_pb`),
  ADD KEY `FK_quy_hoach_canbo` (`id_cb`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bvnb`
--
ALTER TABLE `bvnb`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `canbo`
--
ALTER TABLE `canbo`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `quyhoach`
--
ALTER TABLE `quyhoach`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bvnb`
--
ALTER TABLE `bvnb`
  ADD CONSTRAINT `FK_bvnb_canbo` FOREIGN KEY (`id_cb`) REFERENCES `canbo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD CONSTRAINT `FK_canbo_chuc_vu` FOREIGN KEY (`id_cv`) REFERENCES `chucvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_canbo_phong_ban` FOREIGN KEY (`id_pb`) REFERENCES `phongban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `quyhoach`
--
ALTER TABLE `quyhoach`
  ADD CONSTRAINT `FK_quy_hoach_canbo` FOREIGN KEY (`id_cb`) REFERENCES `canbo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_quy_hoach_chuc_vu` FOREIGN KEY (`id_cv`) REFERENCES `chucvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_quy_hoach_phong_ban` FOREIGN KEY (`id_pb`) REFERENCES `phongban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
