<?php
require_once('../database/dbconfig.php');

//Hien thi thong tin de sua
$id = '';
if ($_GET['id']) {
    $id = getGet('id');

    $sql = "SELECT * FROM nhansu
    WHERE id = '$id'";
    $result = ExcuteResult($sql, true);
}



$hoten =    $ngaysinh = $gioitinh = $dantoc = $tongiao = $vanhoa = getPost('vanhoa');
$trinhdo = $llct = $namvaodang = $chucvu = $noio = $ghichu = '';

if (isset($_POST['btn_sua'])) {
    $hoten = getPost('hoten');
    $ngaysinh = getPost('ngaysinh');
    $gioitinh = getPost('gioitinh');
    $dantoc = getPost('dantoc');
    $tongiao = getPost('tongiao');
    $vanhoa = getPost('vanhoa');
    $trinhdo = getPost('trinhdo');
    $llct = getPost('llct');
    $namvaodang = getPost('namvaodang');
    $chucvu = getPost('chucvu');
    $quequan = getPost('quequan');
    $noio = getPost('noio');
    $ghichu = getPost('ghichu');

    // Thay dấu `` thành '' thì sql mới chạy
    $sql = " UPDATE `nhansu` SET `hoten`='$hoten',`ngaysinh`='$ngaysinh',
`gioitinh`='$gioitinh',`dantoc`='$dantoc',`tongiao`='$tongiao',`vanhoa`='$vanhoa',
`trinhdo`='$trinhdo', `llct`='$llct',`namvaodang`='$namvaodang',`chucvu`='$chucvu',
`quequan`='$quequan',`noio`='$noio',`ghichu`='$ghichu' WHERE id = '$id'";
    // echo $sql;
    // die();
    Excute($sql);
    header('location: ./');
    die();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Form dang ky</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="background-color:#E6E6FA;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">SỬA THÔNG TIN CÁN BỘ, CÔNG CHỨC</h2>
            </div>
            <form action="" method="post">
                <div class="panel-body" style="width: 80%; margin:auto">
                    <div class="form-group">
                        <label for="usr">Họ và tên:</label>
                        <input required="true" name="hoten" value="<?= $result['hoten'] ?>" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Ngày sinh:</label>
                        <input type="date" name="ngaysinh" value="<?= $result['ngaysinh'] ?>" class="form-control" id="birthday" style="width: 30%;">
                    </div>
                    <div class="form-group">
                        <label for="usr">Giới tính</label>
                        <input required="true" name="gioitinh" value="<?= $result['gioitinh'] ?>" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Dân tộc</label>
                        <input required="true" name="dantoc" value="<?= $result['dantoc'] ?>" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Tôn giáo</label>
                        <input required="true" name="tongiao" value="<?= $result['tongiao'] ?>" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Văn hóa</label>
                        <input required="true" name="vanhoa" value="<?= $result['vanhoa'] ?>" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Trình độ</label>
                        <input required="true" name="trinhdo" value="<?= $result['trinhdo'] ?>" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Lý luận chính trị</label>
                        <input required="true" name="llct" value="<?= $result['llct'] ?>" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Năm vào đảng</label>
                        <input type="date" name="namvaodang" value="<?= $result['namvaodang'] ?>" class="form-control" id="birthday" style="width: 30%;">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Chức vụ</label>
                        <input type="text" name="chucvu" value="<?= $result['chucvu'] ?>" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Quê quán</label>
                        <input type="text" name="quequan" value="<?= $result['quequan'] ?>" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Nơi ở hiện nay</label>
                        <input type="text" name="noio" value="<?= $result['noio'] ?>" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ghi chú</label>
                        <textarea name="ghichu" id="" value="<?= $result['ghichu'] ?>" cols="115" rows="5"></textarea>

                    </div>
                    <button class="btn btn-success" name="btn_sua" style="margin-bottom: 20px;">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>