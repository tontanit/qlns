<?php
$title  = "Sửa Thông Tin CB, ĐV";
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');

if (isset($_GET['btn_them'])) {
    $id = '';
    if (isset($_POST['btn_sua'])) {
        $phongban = getPost('phongban');
        //Thay dấu `` thành '' thì sql mới chạy
        $sql = "INSERT INTO `phongban`(`phong_ban`) VALUES ('$phongban')";
        Excute($sql);
        header('location: ./');
        // echo $sql;
        die();
    }
} else {
    // 1. Hien danh sach vao Input
    $id = getGet('id');
    $sql = " SELECT * FROM phongban WHERE id = $id ";
    $result = ExcuteResult($sql, true);

    // 2. Nếu người dùng nhấn nút Sửa

    if (isset($_POST['btn_sua'])) {
        $phongban = getPost('phongban');

        //Thay dấu `` thành '' thì sql mới chạy
        $sql = " UPDATE `phongban` SET `phong_ban`='$phongban' WHERE id = '$id' ";
        Excute($sql);
        header('location: ./');
        // echo $sql;
        die();
    }
}

// // 1. Hien danh sach vao Input
// $id = getGet('id');
// $sql = " SELECT * FROM chucvu WHERE id = $id ";
// $result = ExcuteResult($sql, true);

// // 2. Nếu người dùng nhấn nút Sửa

// if (isset($_POST['btn_sua'])) {
//     $chucvu = getPost('chucvu');

//     //Thay dấu `` thành '' thì sql mới chạy
//     $sql = " UPDATE `chucvu` SET `chuc_vu`='$chucvu' WHERE id = '$id' ";
//     Excute($sql);
//     header('location: ./');
//     // echo $sql;
//     die();
// }

?>

<!-- //CHEN TABLE -->

<h3 class="table-title">
    THÊM/SỬA THÔNG TIN CHỨC VỤ
</h3>
<form action="" method="post">
    <table style="width: 50%;" class="table-second">
        <tbody>
            <tr>
                <td> <label>Chức vụ</label></td>
                <td> <input autofocus name="phongban" value="<?php
                                                                if ($id != '') {
                                                                    echo $result['phong_ban'];
                                                                } else echo '';
                                                                ?>" type="text" class="form-control" id="usr">
                </td>
            </tr>

            <tr>
                <td colspan="4" style="text-align: center;"> <button class="btn btn-success" name="btn_sua" style="margin-bottom: 20px;"><?php
                                                                                                                                            if ($id != '') {
                                                                                                                                                echo 'Sửa';
                                                                                                                                            } else echo 'Thêm';
                                                                                                                                            ?></button></td>
            </tr>

        </tbody>
    </table>
</form>

<?php
require_once('../frontend/footer.php');
?>