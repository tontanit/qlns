<?php
$title  = "Sửa Thông Tin CB, ĐV";
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
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

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$title</title>
        </head>
        <!-- <form action="" method="post">
            <div style="width: 80%; margin:auto">
                <div>
                    <label>Họ và tên:</label>
                    <input name="hoten" value="<?= $result['hoten'] ?>" type="text" class="form-control" id="usr">
                </div>

                <div>
                    <label>Ngày sinh:</label>
                    <input type="date" name="ngaysinh" value="<?= $result['ngaysinh'] ?>" class="form-control" id="birthday">
                </div>
                <div>
                    <input name="gioitinh" value="0" type="radio" <?php
                                                                    echo ($result['gioitinh'] == 0 ? 'checked' : '') ?>> <label>Nam</label>
                    <input name="gioitinh" value="1" type="radio" <?php
                                                                    echo ($result['gioitinh'] == 1 ? 'checked' : '') ?>><label>Nữ</label>

                </div>
                <div>
                    <label>Dân tộc</label>
                    <input name="dantoc" value="<?= $result['dantoc'] ?>" type="text" class="form-control" id="usr">
                </div>
                <div>
                    <label>Quyee quán</label>
                    <input name="quequan" value="<?= $result['quequan'] ?>" type="text" class="form-control" id="usr">
                </div>
                <div>
                    <label>Ngày vào Đảng:</label>
                    <input type="date" name="ngayvaodang" value="<?= $result['ngayvaodang'] ?>" class="form-control" id="birthday" style="width: 30%;">
                </div>
                <div>
                    <label>Học hàm</label>
                    <input name="hocham" value="<?= $result['hoc_ham'] ?>" type="text" class="form-control" id="usr">
                </div>
                <div>
                    <label>Trình độ</label>
                    <input name="chuyenmon" value="<?= $result['chuyenmon'] ?>" type="text" class="form-control" id="usr">
                </div>
                <div>
                    <label>Lý luận chính trị</label>
                    <input name="llct" value="<?= $result['llct'] ?>" type="text" class="form-control" id="usr">
                </div>

                <div>
         Lấy danh sach Chức vụ đổ vào Select
        <label>Chức vụ</label>
        <select name="chucvu" id="">
            <?php
            $sql = "SELECT * FROM chucvu";
            $kq = ExcuteResult($sql);
            foreach ($kq as $list) {
            ?>
               Tạo Thuộc tính selected cho option xác định tùy chọn được chọn mặc định
                <Option <?php
                        $id_cv = $result['id_chucvu'];
                        $select = ($id_cv == $list['id']) ? 'selected="selected"' : '';
                        echo $select;
                        ?> value="<?= $list['id'] ?>"><?php echo $list['chuc_vu'] ?></Option>
            <?php } ?>
        </select>

    </div>
    <div>
        <!-- Lấy danh sach Phòng ban đổ vào Select -->
        <label>Phong ban</label>
        <select name="phongban" id="">
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

    <div>
        <label>Ghi chú</label>
        <textarea name="ghichu" id="" value="<?= $result['ghichu'] ?>" cols="115" rows="5"></textarea>

    </div>
    <button class="btn btn-success" name="btn_sua" style="margin-bottom: 20px;">Sửa</button>
    </div>
    </form> -->
    </div>

    <!-- //CHEN TABLE -->
    <div class="table-content-second">
        <div class="table-content-lsct">
            <h3 class="table-title">
                SỬA THÔNG TIN CÁN BỘ, ĐẢNG VIÊN
            </h3>
            <table style="width: 50%;" class="table-second">
                <!-- <thead>

                    <th>Không có vấn đề về LSCT</th>
                    <th>Không vi phạm</th>
                    <th>Có vấn đề nhưng không vi phạm</th>
                    <th>Phức tạp</th>
                    <th>Vi phạm</th>
                </thead> -->
                <tbody>
                    <tr>
                        <td> <label>Họ và tên:</label></td>
                        <td><input name="hoten" value="<?= $result['hoten'] ?>" type="text" class="form-control" id="usr"></td>

                        <td> <label>Ngày sinh:</label></td>
                        <td><input type="date" name="ngaysinh" value="<?= $result['ngaysinh'] ?>" class="form-control" id="birthday"></td>

                    </tr>
                    <tr>
                        <td><label for="">Giới tính</label></td>
                        <td><input name="gioitinh" value="0" type="radio" <?php
                                                                            echo ($result['gioitinh'] == 0 ? 'checked' : '') ?>> <label>Nam</label>
                            <input name="gioitinh" value="1" type="radio" <?php
                                                                            echo ($result['gioitinh'] == 1 ? 'checked' : '') ?>><label>Nữ</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Dân tộc</label></td>
                        <td> <input name="dantoc" value="<?= $result['dantoc'] ?>" type="text" class="form-control" id="usr">
                        </td>
                        <td> <label>Quê quán</label> </td>
                        <td> <input name="quequan" value="<?= $result['quequan'] ?>" type="text" class="form-control" id="usr">
                        </td>
                    </tr>
                    <tr>

                        <td> <label>Ngày vào Đảng:</label></td>
                        <td> <input type="date" name="ngayvaodang" value="<?= $result['ngayvaodang'] ?>" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td> <label>Học hàm</label></td>
                        <td> <input name="hocham" value="<?= $result['hoc_ham'] ?>" type="text" class="form-control" id="usr">
                        </td>
                        <td><label>Trình độ</label></td>
                        <td> <input name="chuyenmon" value="<?= $result['chuyenmon'] ?>" type="text" class="form-control" id="usr">
                        </td>
                    </tr>
                    <tr>
                        <td> <label>Lý luận chính trị</label>
                        <td> <input name="llct" value="<?= $result['llct'] ?>" type="text" class="form-control" id="usr">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Chức vụ</label>
                        </td>
                        <td>
                            <select name="chucvu" id="">
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
                        </td>

                        <td> <label>Phòng ban</label>
                        </td>
                        <td><select name="phongban" id="">
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
                            </select></td>

                    </tr>
                    <tr>
                        <td colspan="4"><label>Ghi chú</label>
                            <textarea name="ghichu" id="" value="<?= $result['ghichu'] ?>" cols="115" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"> <button class="btn btn-success" name="btn_sua" style="margin-bottom: 20px;">Sửa</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>