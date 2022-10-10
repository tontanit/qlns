<?php
$title  = "Sửa Thông Tin CB, ĐV";
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');

?>

<div>
    <?php

    //Khai báo biến ban đầu tránh gây lỗi
    $hoten = $ngaysinh = $gioitinh = $dantoc = $quequan = $ngayvaodang = $hocham = $chuyenmon = $llct = $chucvu = $phongban = $ghichu = '';

    //Kiểm tra khi ngưởi dùng Submit form
    if (isset($_POST['btn_them'])) {
        //Lấy dữ liệu trên Form lưu vào biến
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

        //Truy vấn dữ liệu
        $sql = " INSERT INTO `canbo`(`hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `quequan`, `ngayvaodang`, `hoc_ham`, `chuyenmon`, `llct`, `id_cv`, `id_pb`, `ghichu`) VALUES ('$hoten','$ngaysinh','$gioitinh','$dantoc','$quequan','$ngayvaodang','$hocham','$chuyenmon','$llct','$id_cv','$id_pb','$ghichu') 
        ";
        Excute($sql);
        header('location: ./');
        die();
    }

    ?>

    <!-- //CHEN TABLE -->

    <h3 class="table-title">
        THÊM CÁN BỘ, ĐẢNG VIÊN VÀO DANH SÁCH QUẢN LÝ
    </h3>
    <form action="" method="post">
        <table style="width: 50%;" class="table-second">
            <tbody>
                <tr>
                    <td> <label>Họ và tên:</label></td>
                    <td><input name="hoten" value="" type="text" class="form-control" id="usr"></td>

                    <td> <label>Ngày sinh:</label></td>
                    <td><input type="date" name="ngaysinh" value="" class="form-control" id="birthday"></td>

                </tr>
                <tr>
                    <td><label for="">Giới tính</label></td>
                    <td><input name="gioitinh" value="0" type="radio"> <label>Nam</label>
                        <input name="gioitinh" value="1" type="radio"><label>Nữ</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Dân tộc</label></td>
                    <td> <input name="dantoc" value="" type="text" class="form-control" id="usr">
                    </td>
                    <td> <label>Quê quán</label> </td>
                    <td> <input name="quequan" value="" type="text" class="form-control" id="usr">
                    </td>
                </tr>
                <tr>

                    <td> <label>Ngày vào Đảng:</label></td>
                    <td> <input type="date" name="ngayvaodang" value="" class="form-control">
                    </td>

                </tr>
                <tr>
                    <td> <label>Học hàm</label></td>
                    <td> <input name="hocham" value="" type="text" class="form-control" id="usr">
                    </td>
                    <td><label>Trình độ</label></td>
                    <td> <input name="chuyenmon" value="" type="text" class="form-control" id="usr">
                    </td>
                </tr>
                <tr>
                    <td> <label>Lý luận chính trị</label>
                    <td> <input name="llct" value="" type="text" class="form-control" id="usr">
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
                            $sql = "SELECT * FROM chucvu order by chuc_vu ASC";
                            $kq = ExcuteResult($sql);
                            foreach ($kq as $list) {
                            ?>
                                <!-- Tạo Thuộc tính selected cho option xác định tùy chọn được chọn mặc định -->
                                <Option value="<?= $list['id'] ?>"><?php echo $list['chuc_vu'] ?></Option>
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
                                <Option value="<?= $list['id'] ?>"><?php echo $list['phong_ban'] ?></Option>
                            <?php } ?>
                        </select></td>

                </tr>
                <tr>
                    <td colspan="4"><label>Ghi chú</label>
                        <textarea name="ghichu" id="" value="" class="ghichu"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;"> <button class="btn btn-success" name="btn_them" style="margin-bottom: 20px;">Thêm</button></td>
                </tr>
            </tbody>
        </table>
    </form>

    <?php
    require_once('../frontend/footer.php');
    ?>