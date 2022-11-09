<?php

require_once('../database/dbconfig.php');

$id_cb = getGet('id_cb');
$sql = "SELECT * FROM bvnb where id_cb='$id_cb'";
$result = mysqli_query($conn, $sql);
$sodong = mysqli_num_rows($result);
echo $sodong;
