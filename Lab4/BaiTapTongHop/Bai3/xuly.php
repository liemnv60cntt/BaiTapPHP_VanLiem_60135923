<?php
$ketqua = '';
$g = '';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$arr = array();

function xoSo($giai)
{
    global $arr;
    switch ($giai) {
        case 8:
            $g = rand(0, 9) . rand(0, 9);
            $arr[] = $g;
            return $g;
            break;
        case 7:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9);
            $arr[] = $g;
            return $g;
            break;
        case 6 or 5:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $arr[] = $g;
            return $g;
            break;
        case 4 or 3 or 2 or 1:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $arr[] = $g;
            return $g;
            break;
        case 0:
            $g = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $arr[] = $g;
            return $g;
            break;
    }
}

// for($i=0; $i<=8; $i++){
//     $arr[$i] = xoSo($i);
// }
if (isset($_REQUEST['veSo'])) {
    $q = $_REQUEST['veSo'];
    // if (isset($_POST['tim'])) {
    //     foreach($arr as $v){
    //         if(strpos($veSo, $v))
    //             $ketqua = $v;
    //         else 
    //             $ketqua = "Không tìm thấy";
    //     }
    // }
} else {
    $veSo = '';
}
// Array with names
$a = array(
    "08" => "Giải 8",
    "260" => "Giải 7",
    "6691" => "Giải 6",
    "3673" => "Giải 6",
    "9403" => "Giải 6",
    "4971" => "Giải 5",
    "4423" => "Giải 4",
    "9287" => "Giải 4",
    "4853" => "Giải 4",
    "3049" => "Giải 4",
    "3393" => "Giải 4",
    "9722" => "Giải 4",
    "2548" => "Giải 4",
    "0040" => "Giải 3",
    "6865" => "Giải 3",
    "9654" => "Giải 2",
    "7541" => "Giải 1",
    "296397" => "Giải đặc biệt",
);

// get the q parameter from URL
$q = $_REQUEST['q'];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    foreach ($a as $key=>$value) {
        if ($q == $key) {
            if ($hint === "") {
                $hint = $value;
            } else {
                $hint .= ", $value";
            }
        }
    }
    
}
// echo $ketqua === "" ? "Không tìm thấy" : $ketqua;
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Không tìm thấy" : $hint;
?>