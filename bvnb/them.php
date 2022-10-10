<?php
$title  = "Sửa Thông Tin CB, ĐV";
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');


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
    <link rel="stylesheet" href="../css/style.css">
    <title><?= $title ?></title>
    <!-- jQuery library -->
    <script src="../css/jquery-3.6.1.min.js"></script>
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
                    }

                });
            });

        });
    </script>
</head>

<body>
    <div>
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

        <!-- //CHEN TABLE -->

        <h3 class="table-title">
            ThÊM DANH SÁCH BẢO VỆ NỘI BỘ
        </h3>
        <form action="" method="post">
            <table style="width: 50%;" class="table-second">
                <tbody>
                    <tr>
                        <td> <label>Họ và tên:</label>

                        </td>
                        <td>
                            <select name="id_cb" id="id_cb">
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
                            <span id="thongbao"></span>
                        </td>

                        <td> <label>Ngày sinh:</label></td>
                        <td>
                            <div id="ngaysinh"><input disabled name="ngaysinh" value="" type="date"></div>
                        </td>

                    </tr>

                    <tr>
                        <td><label>Loại KL</label></td>
                        <td> <input name="loaikl" value="" type="text" class="form-control" id="usr">
                        </td>
                        <td> <label>Số VBKL</label> </td>
                        <td colspan="3"> <input name="sovbkl" value="" type="text" class="form-control" id="usr">
                        </td>
                    </tr>

                    <tr>
                        <td> <label>Nội dung KL</label></td>
                        <td colspan="4"> <textarea name="noidungkl" id="" class="ghichu">Căn cứ trình độ, năng lực chuyên môn và phẩm chất đạo đức để bố trí, sử dung</textarea>
                        </td>

                    </tr>
                    <td><label>Ghi chú</label></td>
                    <td colspan="3">
                        <textarea name="ghichu" id="" class="ghichu"></textarea>

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