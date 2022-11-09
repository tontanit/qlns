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
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="container border">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="text-center">DANH SÁCH QUẢN LÝ CÁN BỘ, ĐẢNG VIÊN</h2>
                    </div>
                    <div class="panel-body">
                        <?php
                        $id_canbo = getGet('id');

                        //1. Hien danh sach vao Input
                        $sql = "SELECT canbo.id, hoten,ngaysinh,gioitinh, dantoc,quequan,
                         ngayvaodang, hoc_ham,chuyenmon,llct, chucvu.id as id_chucvu, chuc_vu, phongban.id as id_phongban, phong_ban, ghichu
                FROM canbo	
                INNER JOIN chucvu ON canbo.id_cv = chucvu.id
                INNER JOIN phongban ON canbo.id_pb = phongban.id
                WHERE canbo.id = $id_canbo
         ";
                        $result = ExcuteResult($sql, true);

                        //2. Sửa thông tin
                        $hoten = $ngaysinh = $gioitinh = $dantoc = $quequan = $ngayvaodang = $hocham =
                            $chuyenmon = $llct = $chucvu = $phongban = '';

                        if (isset($_POST['btn_sua'])) {
                            $hoten = getPost('hoten');
                            $ngaysinh = getPost('ngaysinh');
                            $gioitinh = getPost('gioitinh');
                            settype($gioitinh, 'int');
                            $dantoc = getPost('dantoc');
                            $quequan = getPost('quequan');
                            $ngayvaodang = getPost('ngayvaodang');
                            $hocham = getPost('hocham');
                            $chuyenmon = getPost('chuyenmon');
                            $llct = getPost('llct');
                            $id_cv = getPost('chucvu');
                            $id_pb = getPost('phongban');
                            $ghichu = getPost('ghichu');

                            //Thay dấu `` thành '' thì sql mới chạy
                            $sql = " UPDATE `canbo` SET 
            hoten='$hoten',ngaysinh='$ngaysinh',gioitinh='$gioitinh',dantoc='$dantoc',quequan='$quequan',
            ngayvaodang='$ngayvaodang',hoc_ham='$hocham',chuyenmon='$chuyenmon',llct='$llct',id_cv='$id_cv',
            id_pb='$id_pb',ghichu='$ghichu'
             WHERE id = $id_canbo";
                            Excute($sql);
                            header('location: ./');
                            // echo $sql;
                            die();
                        }

                        ?>

                        <!-- //CHEN FORM -->

                        <form action="" method="post">
                            <div class="row form-group">
                                <div class="col">
                                    <label for="">Họ và tên</label>
                                    <input type="text" class="form-control" name="hoten" value="<?= $result['hoten'] ?>">
                                </div>
                                <div class="col">
                                    <label for="">Ngày sinh</label>
                                    <input type="date" class="form-control" name="ngaysinh" value="<?= $result['ngaysinh'] ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gioitinh" value="0" <?php echo ($result['gioitinh'] == 0 ? 'checked' : '') ?>>Nam
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gioitinh" value="1" <?php echo ($result['gioitinh'] == 1 ? 'checked' : '') ?>>Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label>Dân tộc</label>
                                    <input name="dantoc" value="<?= $result['dantoc'] ?>" type="text" class="form-control" id="usr">
                                </div>
                                <div class="col">
                                    <label>Quê quán</label>
                                    <input name="quequan" value="<?= $result['quequan'] ?>" type="text" class="form-control" id="usr">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label>Ngày vào Đảng:</label>
                                    <input type="date" name="ngayvaodang" value="<?= $result['ngayvaodang'] ?>" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Học hàm</label>
                                    <input name="hocham" value="<?= $result['hoc_ham'] ?>" type="text" class="form-control" id="usr">
                                </div>
                                <div class="col">
                                    <label>Trình độ</label>
                                    <input name="chuyenmon" value="<?= $result['chuyenmon'] ?>" type="text" class="form-control" id="usr">
                                </div>
                                <div class="col">
                                    <label>Lý luận chính trị</label>
                                    <input name="llct" value="<?= $result['llct'] ?>" type="text" class="form-control" id="usr">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label>Chức vụ</label>
                                    <select name="chucvu" class="form-control">
                                        <?php
                                        $sql = "SELECT * FROM chucvu";
                                        $kq = ExcuteResult($sql);
                                        foreach ($kq as $list) {
                                        ?>
                                            <!-- Tạo Thuộc tính selected cho option xác định tùy chọn được chọn mặc định -->
                                            <Option <?php
                                                    $id_cv = $result['id_chucvu'];
                                                    $select = ($id_cv == $list['id']) ? 'selected="selected"' : '';
                                                    echo $select;
                                                    ?> value="<?= $list['id'] ?>"><?php echo $list['chuc_vu'] ?></Option>
                                        <?php } ?>
                                    </select>
                                    <a href="../chucvu/sua.php?btn_them=">+</a>
                                </div>
                                <div class="col">
                                    <label>Phòng ban</label>
                                    <select name="phongban" class="form-control">
                                        <?php
                                        $sql = "SELECT * FROM phongban order by phong_ban ASC";
                                        $kq = ExcuteResult($sql);
                                        foreach ($kq as $list) {
                                        ?>
                                            <!-- Tạo Thuộc tính selected cho option xác định tùy chọn được chọn mặc định -->
                                            <Option <?php
                                                    $id_pb = $result['id_phongban'];
                                                    $select = ($id_pb == $list['id']) ? 'selected="selected"' : '';
                                                    echo $select;
                                                    ?> value="<?= $list['id'] ?>"><?php echo $list['phong_ban'] ?></Option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <label>Ghi chú</label>
                                    <textarea name="ghichu" class="form-control" value=""><?= $result['ghichu'] ?></textarea>
                                </div>
                            </div>

                            <button class="btn btn-success" name="btn_sua" class="form-control">Sửa</button>

                    </div>

                    </form>
                </div>

            </div>

        </div>
        <div class="col-md-2"></div>
    </div>


    <!-- Nhúng nội dung file footer.php -->
    <?php include_once __DIR__ . '/../frontend/layouts/partials/footer.php' ?>


    <!-- Nhúng file quản lý JS cho layout Frontend -->
    <?php
    include_once __DIR__ . '/../frontend/layouts/scripts.php'
    ?>
    <!-- File Javascript sử dụng riêng cho trang này -->

</body>

</html>