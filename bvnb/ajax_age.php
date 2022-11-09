<?php

require_once('../database/dbconfig.php');

$id = getGet('id');
$sql = "SELECT * FROM canbo where id=$id";
$kq = ExcuteResult($sql, true);
echo '<input class="form-control" disabled value=' . date("d-m-Y", strtotime($kq['ngaysinh'])) . '>';
