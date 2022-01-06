<div class="main">
    <div class="container">
        <h4 class="ds">DANH SÁCH CÁN BỘ, CÔNG CHỨC THUỘC DIỆN BTV QUẢN LÝ</h4>
        <button type="button" class="btn btn-success"><a href="./nhansu/add.php">Thêm</a></button>
        <table class="table table-hover">
            <thead>
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

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM nhansu";
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

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>




</div>

</div>

</body>

</html>