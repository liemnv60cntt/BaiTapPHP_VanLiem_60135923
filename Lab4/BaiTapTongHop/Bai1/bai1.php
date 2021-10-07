<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bài 1</title>
    <style>
        label{
            font-weight: bold;
            font-size: 18px;
        }
        textarea{
            border: 2px solid #483D8B;
            font-size: 16px;
            background-color: #ADD8E6;
            border-radius: 8px;
            padding: 8px;
        }
        form{
            left: 50%;
            top: 25%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
        input{
            border: 1px solid #808080;
        }
    </style>
</head>

<body>
    <?php
    $mes = '';
    $ketqua = "";
    $x = 123;
    if (isset($_POST['n'])) {
        if (is_numeric($_POST['n']))
            if($_POST['n']>0)
                $n = $_POST['n'];
            else{
                $mes = "Lỗi: Số phải lớn hơn 0\n\n";
                $n = 0;
                $x = '';
            }   
        else {
            $mes = "Lỗi: Vui lòng nhập số!!!\n\n";
            $n = 0;
            $x = '';
        }
    }
    else{
        $n = 0;
        $x = '';
    }
    function hienThiMang($n, &$arr, &$ketqua)
    {
        //Tạo mảng có n phần tử, các phần tử có giá trị [-200,200]
        for ($i = 0; $i < $n; $i++) {
            $x = rand(-200, 200);
            $arr[$i] = $x;
        }
        //In ra mảng vừa tạo
        $ketqua = "a) Mảng được tạo là: " . implode(" ", $arr) . "&#13;&#10;";
    }
    function sxTangDan(&$arr, &$ketqua)
    {
        //Sắp xếp tăng dần
        asort($arr);
        $sapxep = "\nb) Sắp xếp tăng dần : " . implode(" -> ", $arr) . "\n";
        $ketqua .= $sapxep;
    }
    function themSo($offset, $x, &$arr, &$ketqua)
    {
        //Thêm 1 số vào mảng
        array_splice($arr, $offset, 0, $x);
        $vitri = $offset + 1;
        $themso = "\nc) Mảng sau khi thêm số $x vào vị trí $vitri: " . implode(" ", $arr) . "\n";
        $ketqua .= $themso;
    }
    function sapXep($offset, $n, $x, &$arr, &$ketqua)
    {
        // Sắp xếp
        $arr1 = array();
        for ($i = 0; $i < $offset; $i++) {
            $arr1[$i] = $arr[$i];
        }
        asort($arr1);

        $arr2 = array();
        for ($i = $n; $i > $offset; $i--) {
            $arr2[$i] = $arr[$i];
        }
        arsort($arr2);

        array_push($arr1, $x);
        $arr = $arr1 + $arr2;
        $sx = "\nd) Mảng sau sắp xếp: " . implode(" ", $arr);
        $ketqua .= $sx;
    }
    if (isset($_POST['hthi'])) {
        $arr = array();
        hienThiMang($n, $arr, $ketqua);
        sxTangDan($arr, $ketqua);
        $offset = rand(0, $n);
        
        themSo($offset, $x, $arr, $ketqua);
        sapXep($offset, $n, $x, $arr, $ketqua);
    }
    ?>
    <form action="" method="post">
        <label>Nhập n: </label> 
        <input type="text" name="n" value="<?php echo $n ?>" />
        <input type="submit" name="hthi" value="Hiển thị" /><br><br>
        <label>Kết quả: </label>
        <br><br>
        <textarea cols="80" rows="15" name="ketqua"><?php echo $mes . $ketqua ?></textarea>
    </form>
</body>

</html>