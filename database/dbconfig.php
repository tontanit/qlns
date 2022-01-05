<?php
define('host', 'localhost');
define('username', 'root');
define('password', '');
define('database', 'qlns');

$conn = mysqli_connect(host, username, password, database) or die('ket noi khong thanh cong');

function Excute($sql)
{
    //Ket noi CSDL
    $conn = mysqli_connect(host, username, password, database) or die('ket noi khong thanh cong');
    mysqli_set_charset($conn, 'utf-8');

    //Thuc hien cong truy van
    mysqli_query($conn, $sql);

    //Dong ket noi CSDL
    mysqli_close($conn);
}

function ExcuteResult($sql, $sqlSingle = false)
{

    //Ket noi CSDL
    $conn = mysqli_connect(host, username, password, database) or die('ket noi khong thanh cong');
    mysqli_set_charset($conn, 'utf-8');

    //Thuc hien Query
    $qr = mysqli_query($conn, $sql);

    $data = null;
    if ($sqlSingle) {
        $data = mysqli_fetch_array($qr, 1);
    } else {
        $data = [];
        while ($result = mysqli_fetch_array($qr, 1)) {
            $data[] = $result;
        }
    }

    return $data;
    //Dong ket noi 
    mysqli_close($conn);
}
