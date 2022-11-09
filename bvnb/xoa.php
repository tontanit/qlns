<?php
include_once __DIR__ . '/../database/dbconfig.php';
if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $sql = "DELETE FROM bvnb WHERE id = '$id'";
                    Excute($sql);

                    //câu truy vấn xóa bản ghi có id=1
                    // $sql = "DELETE FROM bvnb WHERE id = '$id'";
                    //kiểm tra
                    // if (mysqli_query($conn, $sql))
                    //Thông báo nếu thành công
                    // echo 'Xóa thành công';
                    // else
                    //Hiện thông báo khi không thành công
                    // echo 'Không thành công. Lỗi' . mysqli_error($conn);
                    //ngắt kết nối
                    // mysqli_close($conn);
                }
                break;
        }
    }
}
