<?php
$title  = '';
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');
// require_once('../frontend/nav.php');

?>

<!-- Noi dung web -->

<div class="table-content">

    <h3 class="table-title">
        DANH SÁCH BẢO VỆ CHÍNH TRỊ NỘI BỘ
    </h3>

    <!-- Form tìm kiếm -->
    <div>
        <table style="width:100%; margin-bottom: 5px;">
            <td>
                <form action="xuly_search.php" method="get">
                    <input type="text" name="search" placeholder="Nhập từ khóa cần tìm" value="">
                    <input type="submit" name="btn_search" value="Tìm">

                </form>
            </td>
            <td style="text-align: right;"><a href="them.php"><button>Thêm</button></a></td>
        </table>
    </div>
    <div>
        <table class="table-customers">
            <thead>

                <tr>
                    <th>STT</th>
                    <th style="width:18%">Họ và tên</th>
                    <th style="width:9%">Năm sinh</th>
                    <th>chức vụ</th>
                    <th>Đơn vị CT</th>
                    <th>Kết luận</th>
                    <th>Số VBKL</th>
                    <th>Nội dung KL</th>
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

                    $sql = "SELECT count(id) as total FROM BVNB";
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
                    // BƯỚC 4: TRUY VẤN LẤY DANH SÁCH 
                    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                    $sql = "SELECT canbo.id, canbo.hoten, canbo.ngaysinh, chucvu.chuc_vu, phongban.phong_ban, 
                    bvnb.loai_kl, bvnb.so_vbkl, bvnb.noidung_kl
                    FROM canbo  INNER JOIN bvnb ON canbo.id = bvnb.id_cb
                                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                                INNER JOIN phongban ON canbo.id_pb = phongban.id
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
                            <td><?php echo $list['chuc_vu'] ?></td>
                            <td><?php echo $list['phong_ban'] ?></td>
                            <td><?php echo $list['loai_kl'] ?></td>
                            <td><?php echo $list['so_vbkl'] ?></td>
                            <td><?php echo $list['noidung_kl'] ?></td>

                            <td><a href="../bvnb/sua.php?id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a></td>
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
        </script>
    </div>

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
                echo '<a style="background-color: #56aaff;">' . $i . '</a> ';
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
    <div>
        <!-- Hiện tổng số Record hiện có -->
        <?php
        echo 'Tổng số: ' . $total_records;
        ?>
    </div>
</div>

<!-- End Noi dung web -->
<?php
require_once('../frontend/footer.php');
?>