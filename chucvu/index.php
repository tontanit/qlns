<?php
$title  = '';
require_once('../database/dbconfig.php');
require_once('../frontend/header.php');

?>

<!-- Noi dung web -->

<div>

    <h3 class="table-title">
        DANH SACH CHỨC VỤ
    </h3>
    <div>
        <form action="sua.php" method="get">
            <table style=" width: 50%; margin:auto;">
                <tr>

                    <td style="text-align: right;"><button name="btn_them">Thêm</button></td>
                </tr>
            </table>
        </form>
    </div>
    <table style="width: 50%; margin:auto;" class="table-customers">
        <thead>

            <tr>
                <th>STT</th>
                <th>Chức vụ</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <div>
                <?php

                $sql = " SELECT * FROM chucvu ";
                $result = ExcuteResult($sql);
                $index = 1;
                foreach ($result as $list) {
                ?>
                    <tr>
                        <td><?php echo $index++ ?></td>
                        <td><?php echo $list['chuc_vu'] ?></td>

                        <td><a href="../chucvu/sua.php?id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-warning">Sửa</button></a>
                            <button type="button" class="btn btn-danger" onclick=deleteItem(<?php echo $list['id'] ?>)>Xoá</button>
                        </td>

                    </tr>
                <?php } ?>
            </div>
        </tbody>
    </table>

</div>
<!-- sript xoa -->
<!-- <script type="text/javascript">
                function deleteItem(id) {
                    var option = confirm('Ban có chắc muốn xóa danh mục này không?');
                    if (!option) {
                        return;
                    }
                    console.log(id)
                    // ajax - lenh post
                    $.post('delete.php', {
                        'id': id,
                        'action': 'delete'
                    }, function(data) {
                        location.reload()
                    })
                }
            </script> -->
<script type="text/javascript">
    function deleteItem(id) {
        Option = confirm('Bạn có muốn xóa đối tượng này không')
        console.log(id)
        $.post('delete.php', {
            'id': id
        }, function(data) {
            alert(data);
            location.reload();
        })
    }
</script>

</div>

<!-- End Noi dung web -->
<?php
require_once('../frontend/footer.php');
?>