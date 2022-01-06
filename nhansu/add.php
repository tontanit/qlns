<?php
require_once('../database/dbconfig.php');

//
if (isset($_POST['dang_ky'])) {
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
    $sql = " INSERT INTO `nhansu`(`hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `tongiao`, `vanhoa`, `trinhdo`, 
    `llct`, `namvaodang`, `chucvu`, `quequan`, `noio`, `ghichu`) VALUES ('$hoten', '$ngaysinh', '$gioitinh', '$dantoc', '$tongiao', 
    '$vanhoa', '$trinhdo', '$llct', '$namvaodang', '$chucvu', '$quequan', '$noio', '$ghichu')
        ";
    Excute($sql);
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
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Registation Form - Input User's Detail Information</h2>
            </div>
            <form action="" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Họ và tên:</label>
                        <input required="true" name="hoten" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Ngày sinh:</label>
                        <input type="date" name="ngaysinh" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="usr">Giới tính</label>
                        <input required="true" name="gioitinh" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Dân tộc</label>
                        <input required="true" name="dantoc" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Tôn giáo</label>
                        <input required="true" name="tongiao" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Văn hóa</label>
                        <input required="true" name="vanhoa" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Trình độ</label>
                        <input required="true" name="trinhdo" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Lý luận chính trị</label>
                        <input required="true" name="llct" type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Năm vào đảng</label>
                        <input type="date" name="namvaodang" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Chức vụ</label>
                        <input type="text" name="chucvu" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Quê quán</label>
                        <input type="text" name="quequan" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Nơi ở hiện nay</label>
                        <input type="text" name="noio" class="form-control" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ghi chú</label>
                        <input type="text" name="ghichu" class="form-control" id="birthday">
                    </div>
                    <button class="btn btn-success" name="dang_ky">Nhập</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>