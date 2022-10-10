<?php
$title  = '';
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');
// require_once('../frontend/nav.php');

?>

<!-- Noi dung web -->


<div class="table-content-first">
    <h3 class="table-title">
        DANH SÁCH QUẢN LÝ CB,ĐV
    </h3>

    <!-- Form tìm kiếm -->
    <div>
        <table style="width:100%; margin-bottom: 5px;">
            <td>
                <form action="" method="get">
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
                    <th>Họ và tên</th>
                    <th>Năm sinh</th>
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

                </tr>
            </thead>
            <tbody>

                <div>
                    <?php
                    //Thuật toán phân trang
                    // tìm: start: lấy từ record thứ start
                    //      limit: bắt đầu từ start và lấy tiếp limit records.

                    if (getGet('btn_search') && getGet('search') == '') {
                        header('location:./');
                    } else {
                        $trang = getGet('trang') ? getGet('trang') : 1;
                        $limit = 10;
                        $start = ($trang - 1) * $limit;

                        $key = getGet('search');
                        $sql = "SELECT canbo.id, hoten,ngaysinh,gioitinh, dantoc,quequan,
                                ngayvaodang, hoc_ham,chuyenmon,llct, chuc_vu, phong_ban
                                FROM canbo	
                                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                                INNER JOIN phongban ON canbo.id_pb = phongban.id
                                where hoten like '%$key%' or dantoc like '%$key%' or quequan like '%$key%'  or chuyenmon like '%$key%' or hoc_ham like '%$key%' or llct like '%$key%' or chuc_vu like '%$key%' or phong_ban like '%$key%'
                                limit $start, $limit
                                ";
                    }
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
                            <td><a href="../nhansu/sua.php?id=<?php echo $list['id'] ?>">
                                    <button type="button" class="btn btn-warning">Sửa</button></a>
                                <button type="button" class="btn btn-danger" onclick=deleteItem(<?php echo $list['id'] ?>)>Xoá</button>
                            </td>

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

    <div class="pagination">
        <?php
        // Hiện phân trang
        $sql = "SELECT canbo.id, hoten,ngaysinh,gioitinh, dantoc,quequan,
        ngayvaodang, hoc_ham,chuyenmon,llct, chuc_vu, phong_ban
        FROM canbo	
        INNER JOIN chucvu ON canbo.id_cv = chucvu.id
        INNER JOIN phongban ON canbo.id_pb = phongban.id
        where hoten like '%$key%' or dantoc like '%$key%' or quequan like '%$key%'  or chuyenmon like '%$key%' or llct like '%$key%' or chuc_vu like '%$key%' or phong_ban like '%$key%'   ";
        $qr = mysqli_query($conn, $sql);
        $tong_record = mysqli_num_rows($qr);
        $tongsotrang = ceil($tong_record / $limit);

        for ($i = 1; $i <= $tongsotrang; $i++) {
            if ($tongsotrang > 1) {

                if ($trang == $i) {
                    echo '<a style="background-color: #56aaff;">' . $i . '</a>';
                } else {
                    echo '<a href="xuly_search.php?trang=' . $i . '&search=' . $key . '&btn_search=' . getGet('btn_search') . '">' . $i . '</a>';
                }
            }
        }
        ?>
    </div>
    <div>
        <!-- Hiện tổng số Record hiện có -->
        <?php
        echo 'Tổng số: ' . $tong_record;
        ?>
    </div>
</div>
<!-- End Noi dung web -->

<?php
require_once('../frontend/footer.php');
?>