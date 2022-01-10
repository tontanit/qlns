<?php
require_once('../database/dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>QUAN LY NHAN SU</title>
</head>

<body>
    <div class="grid-container">
        <div class="header">header</div>
        <div class="nav">
            <!-- Noi dung nav -->


            <!-- Noi dung nav -->
        </div>
        <div class="main">
            <div class="container">
                <h4>DANH SÁCH CÁN BỘ, CÔNG CHỨC THUỘC DIỆN BTV QUẢN LÝ</h4>

                <div class="row">
                    <div class="col-lg-6">
                        <a href="../nhansu/add.php"><button type=" button" class="btn btn-success" style="margin-bottom: 10px;">Thêm</button></a>
                    </div>
                    <div class="col-lg-6">
                        <form method="get">

                            <div class=" form-group">
                                <input type="text" class="form-control" name="search" placeholder="Searching..." id="search">
                                <input class="btn btn-primary mb-2" type="submit" value="Tìm kiếm">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Năm sinh</th>
                            <th>Dân tộc</th>
                            <th>Tôn giáo</th>
                            <th>Văn hoá</th>
                            <th>Trình độ</th>
                            <th>LLCT</th>
                            <th>Năm vào đảng</th>
                            <th>chức vụ</th>
                            <th>Action</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $search = '';
                        $search = getGet('search');
                        $sql = "SELECT * FROM nhansu
                                WHERE hoten REGEXP '$search' 
                                ORDER BY id DESC";
                        $result = ExcuteResult($sql);
                        $index = 1;
                        foreach ($result as $list) {
                        ?>
                            <tr>
                                <td><?php echo $index++ ?></td>
                                <td style="text-align: left;"><?php echo $list['hoten'] ?></td>
                                <td><?php echo $list['ngaysinh'] ?></td>
                                <td><?php echo $list['dantoc'] ?></td>
                                <td><?php echo $list['tongiao'] ?></td>
                                <td><?php echo $list['vanhoa'] ?></td>
                                <td><?php echo $list['trinhdo'] ?></td>
                                <td><?php echo $list['llct'] ?></td>
                                <td><?php echo $list['namvaodang'] ?></td>
                                <td style="width: 30px;"><?php echo $list['chucvu'] ?></td>
                                <td><a href="../nhansu/sua.php?id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a></td>
                                <td><button type="button" class="btn btn-danger" onclick=deleteItem(<?php echo $list['id'] ?>)>Xoá</button></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>




        </div>

    </div>

    <script type="text/javascript">
        function deleteItem(id) {
            var option = confirm('Ban có chắc muốn xóa danh mục này không?');
            if (!option) {
                return;
            }
            console.log(id)
            //ajax - lenh post
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload()
            })
        }
    </script>

</body>

</html>