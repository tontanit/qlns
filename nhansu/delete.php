<?php
require_once('../database/dbconfig.php');
// if (!empty($_POST)) {
//     if (isset($_POST['action'])) {
//         $action = $_POST['action'];
//         switch ($action) {
//             case 'delete':
//                 if (isset($_POST['id'])) {
//                     $id = $_POST['id'];
//                     $sql = "DELETE FROM canbo WHERE id = '$id'";
//                     echo $sql;
//                     die();
//                     Excute($sql);
//                 }
//                 break;
//         }
//     }
// }
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM canbo WHERE id = '$id'";
    Excute($sql);
    echo 'Xóa thành công';
}
