<?php
$title  = "Sửa Thông Tin CB, ĐV";
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');

?>

<div>
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
        $sql = " UPDATE `bvnb` SET `loai_kl`=' $loaikl',`so_vbkl`='$sovbkl',`noidung_kl`=' $noidungkl',`ghichu`=' $ghichu'
             WHERE id = $id_bvnb";
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
                    <td><input disabled name="hoten" value="<?= $result['hoten'] ?>" type="text" class="form-control" id="usr"></td>

                    <td> <label>Ngày sinh:</label></td>
                    <td><input disabled type="date" name="ngaysinh" value="<?= $result['ngaysinh'] ?>" class="form-control" id="birthday"></td>

                </tr>
                <tr>
                    <td><label>Kết luận</label></td>
                    <td> <input name="loaikl" value="<?= $result['loai_kl'] ?>" type="text" class="form-control" id="usr">
                    </td>
                    <td> <label>Số VBKL</label> </td>
                    <td> <input name="sovbkl" value="<?= $result['so_vbkl'] ?>" type="text" class="form-control" id="usr">
                    </td>
                </tr>
                <tr>
                    <td><label>Nội dung KL</label></td>
                    <td colspan="4"> <textarea name="noidungkl" class="ghichu" ?><?= $result['noidung_kl'] ?></textarea>
                    </td>

                </tr>

                <tr>
                    <td><label>Ghi chú</label></td>
                    <td colspan="4"> <textarea name="ghichu" id="" class="ghichu"><?= $result['ghichu'] ?></textarea>
                    </td>
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