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
    <!-- <style>
        div {
            border: 1px solid red;
        }
    </style> -->
</head>

<body>
    <!-- Nhúng file header.php -->
    <?php include_once __DIR__ . '/../frontend/layouts/partials/header.php' ?>

    <!-- ################# Content ################### -->
    <div class="container">

        <?php
        $id_canbo = getGet('id');
        //1. Hien danh sach vao Input
        $sql = "SELECT canbo.id, canbo.hoten, canbo.ngaysinh, chucvu.chuc_vu, phongban.phong_ban, 
          bvnb.id as id_bvnb, bvnb.loai_kl, bvnb.so_vbkl, bvnb.noidung_kl, bvnb.ghichu
          FROM canbo  INNER JOIN bvnb ON canbo.id = bvnb.id_cb
                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                INNER JOIN phongban ON canbo.id_pb = phongban.id
                WHERE canbo.id = $id_canbo
         ";
        $result = ExcuteResult($sql, true);

        //2. Sửa thông tin

        if (isset($_POST['btn_sua'])) {

            $loaikl = getPost('loaikl');
            $sovbkl = getPost('sovbkl');
            $noidungkl = getPost('noidungkl');
            $loaikl = getPost('loaikl');
            $ghichu = getPost('ghichu');

            //Thay dấu `` thành '' thì sql mới chạy
            $id_bvnb = $result['id_bvnb'];
            $sql = " UPDATE `bvnb` SET `loai_kl`='$loaikl',`so_vbkl`='$sovbkl',`noidung_kl`='$noidungkl',`ghichu`='$ghichu' WHERE id = $id_bvnb ";
            Excute($sql);
            header('location: ./');
            // echo $sql;
            die();
        }

        ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel-heading">
                    <h3 class="text-center">SỬA THÔNG TIN KẾT LUẬN TCCT</h3>
                </div>
                <!-- form -->
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Họ và tên:</label>
                            <input disabled name="hoten" value="<?= $result['hoten'] ?>" type="text" class="form-control" id="usr">
                        </div>
                        <div class="col form-group">
                            <label>Ngày sinh:</label>
                            <input disabled type="date" name="ngaysinh" value="<?= $result['ngaysinh'] ?>" class="form-control" id="birthday">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Kết luận</label>
                            <input name="loaikl" value="<?= $result['loai_kl'] ?>" type="text" class="form-control" id="usr">
                        </div>

                        <div class="col form-group">
                            <label>Số VBKL</label>
                            <input name="sovbkl" value="<?= $result['so_vbkl'] ?>" type="text" class="form-control" id="usr">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Nội dung KL</label>
                            <textarea name="noidungkl" class="form-control" ?><?= $result['noidung_kl'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Ghi chú</label>
                            <textarea name="ghichu" id="" class="form-control"><?= $result['ghichu'] ?></textarea>
                        </div>
                    </div>

                    <button class="btn btn-success" name="btn_sua" style="margin-bottom: 20px;">Sửa</button>
                </form>

            </div>
            <div class="col-md-2"></div>
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
    </div>
</body>

</html>