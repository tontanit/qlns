<?php
$title  = "Sửa thông tin Bvnb";
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');

?>

<div>
    <?php
    $id_canbo = getGet('id');

    //1. Hien danh sach vao Input
    $sql = "SELECT canbo.id, canbo.hoten, canbo.ngaysinh, chucvu.id AS id_chucvu, 
    chucvu.chuc_vu, phongban.id AS id_phongban,phongban.phong_ban, 
    bvnb.loai_kl, bvnb.so_vbkl, bvnb.noidung_kl
    FROM canbo INNER JOIN bvnb ON canbo.id = bvnb.id_cb
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
        $id_cv = getPost('chucvu');
        $id_pb = getPost('phongban');
        $loai_kl = getPost('loai_kl');
        $so_vbkl = getPost('so_vbkl');
        $noidung_kl = getPost('noidung_kl');

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

    <!-- //CHEN TABLE -->

    <h3 class="table-title">
        SỬA THÔNG TIN CÁN BỘ, ĐẢNG VIÊN
    </h3>
    <form action="" method="post">
        <table style="width: 50%;" class="table-second">
            <tbody>
                <tr>
                    <td> <label>Họ và tên:</label></td>
                    <td><input name="hoten" value="<?= $result['hoten'] ?>" type="text" class="form-control" id="usr"></td>

                    <td> <label>Ngày sinh:</label></td>
                    <td><input type="date" name="ngaysinh" value="<?= $result['ngaysinh'] ?>" class="form-control" id="birthday"></td>

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
                    <td colspan="4" style="text-align: center;"> <button class="btn btn-success" name="btn_sua" style="margin-bottom: 20px;">Sửa</button></td>
                </tr>
            </tbody>
        </table>
    </form>

    <?php
    require_once('../frontend/footer.php');
    ?>