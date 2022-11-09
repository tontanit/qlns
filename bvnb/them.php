<?php
include_once __DIR__ . '/../database/dbconfig.php';

$sql = "SELECT id_cb FROM bvnb ";
$kq = ExcuteResult($sql);
foreach ($kq as $list) {
    $id_cb = $list['id_cb'];
}

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

</head>

<body>
    <!-- Nhúng file header.php -->
    <?php include_once __DIR__ . '/../frontend/layouts/partials/header.php' ?>

    <!-- ################# Content ################### -->

    <div class="container p-5 my-3 border">
        <?php

        //Khai báo biến ban đầu tránh gây lỗi
        $hoten = $ngaysinh = $gioitinh = $dantoc = $quequan = $ngayvaodang = $hocham = $chuyenmon = $llct = $chucvu = $phongban = $ghichu = '';

        //Kiểm tra khi ngưởi dùng Submit form
        if (isset($_POST['btn_them'])) {
            //Lấy dữ liệu trên Form lưu vào biến
            $loaikl = getPost('loaikl');
            $sovbkl = getPost('sovbkl');
            $noidungkl = getPost('noidungkl');
            $loaikl = getPost('loaikl');
            $id_cb = getPost('id_cb');
            $ghichu = getPost('ghichu');

            //Truy vấn dữ liệu
            $sql = " INSERT INTO `bvnb`(`loai_kl`, `so_vbkl`, `noidung_kl`, `id_cb`, `ghichu`) VALUES ('$loaikl',' $sovbkl',' $noidungkl','$id_cb','$ghichu') ";
            Excute($sql);
            header('location: ./');
            // echo $sql;
            die();
        }

        ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- FORM -->
                <div class="panel-heading">
                    <h3 class="text-center">DANH SÁCH QUẢN LÝ CÁN BỘ, ĐẢNG VIÊN</h3>
                </div>
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Họ và tên:</label>
                            <select name="id_cb" id="id_cb" class="form-control">
                                <option hidden>--Chọn tên CB, ĐV--</option>
                                <?php
                                // Truy vấn có sự loại trừ đã kết luận so với bảng bvnb
                                $sql = " SELECT id, hoten, ngaysinh
                                         FROM canbo 
                                         WHERE id NOT IN (SELECT bvnb.id_cb FROM bvnb)
                                         ORDER BY id ASC
                                 ";
                                $kq = ExcuteResult($sql);
                                foreach ($kq as $list) {
                                ?>
                                    <Option value="<?= $list['id'] ?>"><?php echo $list['hoten'] ?></Option>
                                <?php } ?>
                            </select>
                            <div id="thongbao" class="col"></div>
                        </div>
                        <div class="col form-group">
                            <label>Ngày sinh:</label>
                            <div id="ngaysinh"><input class="form-control" disabled name="ngaysinh" value="" type="date">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Mức KL</label>
                            <input name="loaikl" value="" type="text" class="form-control" id="usr">
                        </div>
                        <div class="col form-group">
                            <label>Số VBKL</label>
                            <input name="sovbkl" value="" type="text" class="form-control" id="usr">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group"><label>Nội dung KL</label>
                            <textarea name="noidungkl" id="" class="form-control">Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Ghi chú</label>
                            <textarea name="ghichu" id="" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success" name="btn_them" style="margin-bottom: 20px;">Thêm</button>
                    </div>

                </form>
            </div>
            <div class="col-md-2"></div>



        </div>

    </div>

    <!-- E############### End Content ################ -->

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
    <!-- JQUERY -->
    <script>
        $(document).ready(function() {
            $('#id_cb').change(function() {
                var id = $(this).val();
                $.get('ajax_age.php', {
                    id: id
                }, function(data) {
                    $('#ngaysinh').html(data);

                });

                //Kiểm tra sự trùng lập
                var id = $(this).val();
                $.get('kt_trunglap.php', {
                    id_cb: id
                }, function(data) {
                    if (data == 1) {
                        alert('TRƯỜNG HỢP NÀY ĐÃ ĐƯỢC KẾT LUẬN');
                        location.reload();

                    } else {
                        $('#thongbao').html('<b>CHƯA KẾT LUẬN</b>');
                        $('#thongbao').css('color', 'blue');
                        $('#thongbao').css('margin-top', '10px');
                    }

                });
            });

        });
    </script>
</body>

</html>