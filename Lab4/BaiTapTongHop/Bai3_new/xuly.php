<?php

$g = '';
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Hàm cho số ngẫu nhiên theo từng giải
function xoSo($giai)
{
    switch ($giai) {
        case 8:
            $g = rand(0, 9) . rand(0, 9);
            return $g;
            break;
        case 7:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9);
            return $g;
            break;
        case 6 or 5:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            return $g;
            break;
        case 4 or 3 or 2 or 1:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            return $g;
            break;
        case 0:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            return $g;
            break;
    }
}
$ketqua = "Không trúng giải nào!"; //In kết quả dò số
//Lấy số theo giải
$g8 = xoSo(8);
$g7 = xoSo(7);
$g6 = [];
for ($i = 0; $i < 3; $i++) {
    $g6[$i] = xoSo(6);
}
$g5 = xoSo(5);
$g4 = [];
for ($i = 0; $i < 7; $i++) {
    $g4[$i] = xoSo(4);
}
$g3 = [];
for ($i = 0; $i < 2; $i++) {
    $g3[$i] = xoSo(3);
}
$g2 = xoSo(2);
$g1 = xoSo(1);
$gdb = xoSo(0);

$veSo = isset($_POST['veSo']) ? $_POST['veSo'] : '';

if (isset($_POST['tim'])) {
    $g8 = isset($_POST['g8']) ? $_POST['g8'] : '';
    $g7 = isset($_POST['g7']) ? $_POST['g7'] : '';
    $g5 = isset($_POST['g5']) ? $_POST['g5'] : '';
    $g2 = isset($_POST['g2']) ? $_POST['g2'] : '';
    $g1 = isset($_POST['g1']) ? $_POST['g1'] : '';
    $gdb = isset($_POST['gdb']) ? $_POST['gdb'] : '';

    //Kiểm tra vé số nhập vào có trúng giải không
    if ($g8 == substr($veSo, 4, 2))
        $ketqua = "Giải 8 ";
    if ($g7 == substr($veSo, 3, 3))
        $ketqua = "Giải 7 ";
    if ($g6[0] == substr($veSo, 2, 4))
        $ketqua = "Giải 6 ";
    if ($g5 == substr($veSo, 2, 4))
        $ketqua = "Giải 5 ";
    if ($g2 == substr($veSo, 2, 4))
        $ketqua = "Giải 2 ";
    if ($g1 == substr($veSo, 2, 4))
        $ketqua = "Giải 1 ";
    if ($gdb == substr($veSo, 0, 6))
        $ketqua = "Giải đặc biệt ";

    for ($i = 0; $i < 3; $i++) {
        $g6[$i] = isset($_POST["g6_$i"]) ? $_POST["g6_$i"] : '';
        if ($g6[$i] == substr($veSo, 2, 4))
            $ketqua = "Giải 6 ";
    }
    for ($i = 0; $i < 7; $i++) {
        $g4[$i] = isset($_POST["g4_$i"]) ? $_POST["g4_$i"] : '';
        if ($g4[$i] == substr($veSo, 2, 4))
            $ketqua = "Giải 4 ";
    }
    for ($i = 0; $i < 2; $i++) {
        $g3[$i] = isset($_POST["g3_$i"]) ? $_POST["g3_$i"] : '';
        if ($g3[$i] == substr($veSo, 2, 4))
            $ketqua = "Giải 3 ";
    }
}
