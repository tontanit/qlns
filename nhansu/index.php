<?php
include_once __DIR__ . '/../database/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="doc truyen tranh online, đọc truyện tranh online" />
    <meta name="description" content="Web đọc truyện tranh online lớn nhất được cập nhật liên tục mỗi ngày - Cùng tham gia đọc truyện và thảo luận với hơn 10 triệu thành viên" />
    <title>Quản Lý Nhân Sự</title>
    <!-- Nhúng file quản lý CSS cho layout Frontend -->
    <?php
    include_once __DIR__ . '/../frontend/layouts/styles.php'
    ?>
    <style>
        /* div {
            border: 1px solid red;
        } */
    </style>
</head>

<body>

    <!-- Nhúng file header.php -->
    <?php include_once __DIR__ . '/../frontend/layouts/partials/header.php' ?>

    <!-- Content -->
    <div class="container-fluid">
        <h3 class="text-center">DANH SÁCH QUẢN LÝ CÁN BỘ, ĐẢNG VIÊN</h3>
        <a href="them.php"><button type="button" class="btn btn-primary">Thêm</button></a>
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Năm sinh</th>
                    <th>Giới tính</th>
                    <th>Dân tộc</th>
                    <th>Quê quán</th>
                    <th>Ngày vào đảng</th>
                    <th>Học hàm</th>
                    <th>Chuyên môn</th>
                    <th>LLCT</th>
                    <th>Chức vụ</th>
                    <th>Đơn vị CT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- TẠO PHÂN TRANG -->
                <div>
                    <?php
                    // PHẦN XỬ LÝ PHP
                    // Phần này xử lý truy vấn CSDL và thuật toán phân trang, phần này khá quan trọng bởi nó tính toán các thông số phân trang và khởi tạo các biến sử dụng cho các phần còn lại.
                    // BƯỚC 1: TÌM TỔNG SỐ RECORDS

                    $sql = "SELECT count(id) as total FROM canbo";
                    $result = ExcuteResult($sql, true);
                    $total_records = $result['total'];
                    // BƯỚC 2: TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 10;
                    // BƯỚC 3: TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($total_records / $limit);

                    // Giới hạn current_page trong khoảng 1 đến total_page
                    if ($current_page > $total_page) {
                        $current_page = $total_page;
                    } else if ($current_page < 1) {
                        $current_page = 1;
                    }
                    // Tìm Start
                    $start = ($current_page - 1) * $limit;
                    // BƯỚC 4: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                    $sql = "SELECT canbo.id, hoten,ngaysinh,gioitinh, dantoc,quequan,
                                        ngayvaodang, hoc_ham,chuyenmon,llct, chuc_vu, phong_ban
                                FROM canbo	
                                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                                INNER JOIN phongban ON canbo.id_pb = phongban.id
                                ORDER BY id DESC
                                Limit $start, $limit ";

                    $result = ExcuteResult($sql);
                    $index = 1;
                    foreach ($result as $list) {
                    ?>
                        <tr>
                            <td><?php echo $index++ ?></td>
                            <td style="text-align: left;"><?php echo $list['hoten'] ?></td>
                            <td><?php echo date("d-m-Y", strtotime($list['ngaysinh']))
                                ?></td>
                            <td><?php echo $list['gioitinh'] == 0 ? 'Nam' : 'Nữ' ?></td>
                            <td><?php echo $list['dantoc'] ?></td>
                            <td><?php echo $list['quequan'] ?></td>
                            <td><?php echo date("d-m-Y", strtotime($list['ngayvaodang']));
                                ?></td>
                            <td><?php echo $list['hoc_ham'] ?></td>
                            <td><?php echo $list['chuyenmon'] ?></td>
                            <td><?php echo $list['llct'] ?></td>
                            <td><?php echo $list['chuc_vu'] ?></td>
                            <td><?php echo $list['phong_ban'] ?></td>
                            <td><a href="../nhansu/sua.php?id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                                <button type="button" class="btn btn-danger" onclick=deleteItem(<?php echo $list['id'] ?>)>Xoá</button>
                            </td>

                        </tr>
                    <?php } ?>
                </div>
            </tbody>
        </table>
    </div>
    <div>
        <nav aria-label=" Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                // BƯỚC 5: HIỂN THỊ PHÂN TRANG
                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '
                <li class="page-item">
                <a class="page-link" href="index.php?page=' . ($current_page - 1) . '">Prev</a>
                </li>';
                }
                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<li class="page-item active"><a class="page-link" >' . $i . '<span class="sr-only">(current)</span></a> </li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>  ';
                    }
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page + 1) . '">Next</a> </li> ';
                }
                ?>
            </ul>
        </nav>

    </div>
    <div>
        <!-- Hiện tổng số Record hiện có -->
        <?php
        echo 'Tổng số: ' . $total_records;
        ?>
    </div>


    <!-- End Content -->

    <!-- Nhúng nội dung file footer.php -->
    <?php include_once __DIR__ . '/../frontend/layouts/partials/footer.php' ?>


    <!-- Nhúng file quản lý JS cho layout Frontend -->
    <?php
    include_once __DIR__ . '/../frontend/layouts/scripts.php'
    ?>
    <!-- File Javascript sử dụng riêng cho trang này -->
    <!-- script xoa -->
    <script type="text/javascript">
        function deleteItem(id) {
            var option = confirm('Ban có chắc muốn xóa không?');
            if (!option) {
                return;
            }
            console.log(id)
            // ajax - lenh post
            $.post('xoa.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload();
            })
        }
    </script>
</body>

</html>