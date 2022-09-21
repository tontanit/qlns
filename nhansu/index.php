<?php
$title  = '';
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');
// require_once('../frontend/nav.php');

?>

<!-- Noi dung web -->

<div class="table-content">
    <div class="table-content-first">
        <h3 class="table-title">
            DANH SÁCH QUẢN LÝ CB,ĐV
        </h3>

        <!-- Form tìm kiếm -->
        <div class="search-form">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Nhập từ khóa cần tìm" value="">
                <input type="submit" name="btn_search" value="Tìm">

            </form>
        </div>

        <div style="text-align: center; padding-top: 10px;"><a href="them.php"><button>Thêm</button></a></div>

        <table class="table-customers">
            <thead>

                <tr>
                    <th>STT</th>
                    <th style="width:18%">Họ và tên</th>
                    <th style="width:9%">Năm sinh</th>
                    <th>Giới tính</th>
                    <th>Dân tộc</th>
                    <th>Quê quán</th>
                    <th>Ngày vào đảng</th>
                    <th>học hàm</th>
                    <th>chuyên môn</th>
                    <th>LLCT</th>
                    <th>chức vụ</th>
                    <th>Đơn vị CT</th>
                    <th>Action</th>
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

                    //* HIỂN THỊ DANH SÁCH CÓ HÀM TÌM KIẾM

                    if (getGet('btn_search') && getGet('search') != '') {
                        //nhấn nút tìm kiếm và đã nhập từ khóa cần tìm (khác rỗng)
                        $key = getGet('search');

                        $sql = "SELECT canbo.id, hoten,ngaysinh,gioitinh, dantoc,quequan,
                        ngayvaodang, hoc_ham,chuyenmon,llct, chuc_vu, phong_ban
                                FROM canbo	
                                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                                INNER JOIN phongban ON canbo.id_pb = phongban.id
                                where hoten like '%$key%' or dantoc like '%$key%' or quequan like '%$key%'  or chuyenmon like '%$key%' or llct like '%$key%' or chuc_vu like '%$key%' or phong_ban like '%$key%'
                                Limit $start, $limit 
                                ";
                    } else {
                        $sql = "SELECT canbo.id, hoten,ngaysinh,gioitinh, dantoc,quequan,
                                        ngayvaodang, hoc_ham,chuyenmon,llct, chuc_vu, phong_ban
                                FROM canbo	
                                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                                INNER JOIN phongban ON canbo.id_pb = phongban.id
                                Limit $start, $limit ";
                    }

                    $result = ExcuteResult($sql);
                    $index = 1;
                    foreach ($result as $list) {
                    ?>
                        <tr>
                            <td><?php echo $index++ ?></td>
                            <td style="text-align: left;"><?php echo $list['hoten'] ?></td>
                            <td><?php echo $list['ngaysinh'] ?></td>
                            <td><?php echo $list['gioitinh'] == 0 ? 'Nam' : 'Nữ' ?></td>
                            <td><?php echo $list['dantoc'] ?></td>
                            <td><?php echo $list['quequan'] ?></td>
                            <td><?php echo $list['ngayvaodang'] ?></td>
                            <td><?php echo $list['hoc_ham'] ?></td>
                            <td><?php echo $list['chuyenmon'] ?></td>
                            <td><?php echo $list['llct'] ?></td>
                            <td><?php echo $list['chuc_vu'] ?></td>
                            <td><?php echo $list['phong_ban'] ?></td>
                            <td><a href="../nhansu/sua.php?id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a></td>
                            <td><button type="button" class="btn btn-danger" onclick=deleteItem(<?php echo $list['id'] ?>)>Xoá</button></td>

                        </tr>
                    <?php } ?>
                </div>
            </tbody>
        </table>
        <!-- sript xoa -->
        <!-- <script type="text/javascript">
                function deleteItem(id) {
                    var option = confirm('Ban có chắc muốn xóa danh mục này không?');
                    if (!option) {
                        return;
                    }
                    console.log(id)
                    // ajax - lenh post
                    $.post('delete.php', {
                        'id': id,
                        'action': 'delete'
                    }, function(data) {
                        location.reload()
                    })
                }
            </script> -->
        <script type="text/javascript">
            function deleteItem(id) {
                Option = confirm('Bạn có muốn xóa đối tượng này không')
                console.log(id)
                $.post('delete.php', {
                    'id': id
                }, function(data) {
                    alert(data)
                    location.reload()
                })
            }
        </script>
    </div>

</div>

<div>

    <div class="pagination">
        <?php
        // BƯỚC 5: HIỂN THỊ PHÂN TRANG
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="index.php?page=' . ($current_page - 1) . '">Prev</a>';
        }
        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<a>' . $i . '</a> ';
            } else {
                echo '<a href="index.php?page=' . $i . '">' . $i . '</a>  ';
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="index.php?page=' . ($current_page + 1) . '">Next</a>  ';
        }
        ?>
    </div>
</div>
<!-- End Noi dung web -->


<?php
require_once('../frontend/footer.php');
?>