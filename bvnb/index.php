<?php
$title  = '';
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');
// require_once('../frontend/nav.php');

?>
<section class="home-section">
    <!-- Noi dung web -->

    <div class="table-content">
        <div class="table-content-first">
            <h3 class="table-title">
                DANH SÁCH BẢO VỆ CHÍNH TRỊ NỘI BỘ
            </h3>
            <table class="table-customers">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th style="width:18%">Họ và tên</th>
                        <th style="width:9%">Năm sinh</th>
                        <th>chức vụ</th>
                        <th>Loại Kết Luận</th>
                        <th>Số KL</th>
                        <th>Nội dung Kết luận</th>
                        <th>Đơn vị CT</th>
                        <th>Action</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    <div>
                        <?php
                        $sql = "SELECT canbo.id, canbo.hoten, canbo.ngaysinh, chucvu.chuc_vu, phongban.phong_ban, 
                        bvnb.loai_kl, bvnb.so_vbkl, bvnb.noidung_kl
                        FROM canbo INNER JOIN bvnb ON canbo.id = bvnb.id_cb
                        INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                        INNER JOIN phongban ON canbo.id_pb = phongban.id
                                ";

                        $result = ExcuteResult($sql);
                        // print_r($result);
                        // die();
                        $index = 1;
                        foreach ($result as $list) {
                        ?>
                            <tr>
                                <td><?php echo $index++ ?></td>
                                <td style="text-align: left;"><?php echo $list['hoten'] ?></td>
                                <td><?php echo $list['ngaysinh'] ?></td>
                                <td><?php echo $list['chuc_vu'] ?></td>
                                <td><?php echo $list['phong_ban'] ?></td>
                                <td><?php echo $list['loai_kl'] ?></td>
                                <td><?php echo $list['so_vbkl'] ?></td>
                                <td><?php echo $list['noidung_kl'] ?></td>
                                <td><a href="../bvnb/sua.php?id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a></td>
                                <td><button type="button" class="btn btn-danger" onclick=deleteItem(<?php echo $list['id'] ?>)>Xoá</button></td>

                            </tr>
                        <?php } ?>
                </tbody>
            </table>
            <script type="text/javascript">
                function deleteItem(id) {
                    var option = confirm('Ban có chắc muốn xóa danh mục này không?');
                    if (!option) {
                        return;
                    }
                    console.log(id)
                    //ajax - lenh post
                    $.post('ajax.php', {
                        'id': id,
                        'action': 'delete'
                    }, function(data) {
                        location.reload()
                    })
                }
            </script>
        </div>

    </div>

    <div>


    </div>
    <!-- End Noi dung web -->
</section>


<?php
require_once('../frontend/footer.php');
?>