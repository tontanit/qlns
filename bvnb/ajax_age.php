<?php

require_once('../database/dbconfig.php');

$id = getGet('id');
$sql = "SELECT * FROM canbo where id=$id";
$kq = ExcuteResult($sql);
foreach ($kq as $list) {

    echo '<input disabled value=' . date("d-m-Y", strtotime($list['ngaysinh'])) . '>';
}
