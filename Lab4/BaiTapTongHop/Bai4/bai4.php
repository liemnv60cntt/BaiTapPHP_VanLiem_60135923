<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài 4</title>
    <link rel="stylesheet" type="text/css" href="./style_bai4.css">

</head>

<body>
    <?php
    $ketqua='';
    $array = [];
    $array_new = [];
    $count = 0;
    if(isset($_POST['m'], $_POST['n'])){
        $m = trim($_POST['m']);
        $n = trim($_POST['n']);
    }
    else{
        $m = '';
        $n = '';
    }
    //Thay thế phần tử khác 0 thành 1
    function thayThe($m, $n, &$array, &$array_new){
        for ($i=0; $i < $m; $i++) {
            for ($j=0; $j < $n; $j++) { 
                if($array[$i][$j] != 0)
                    $array_new[$i][$j] = 1;
                else
                    $array_new[$i][$j] = 0;
            }
        }
        render($array_new, 0);
    }
    //Hàm đếm số phần tử có chữ số cuối lẻ
    function demLe($m, $n, $count, &$array){
        for ($i=0; $i < $m; $i++) {
            for ($j=0; $j < $n; $j++) { 
                if($array[$i][$j] %2 != 0)
                    $count++;
            }
        }
        return $count;
    }
    //Hàm tạo ma trận m x n
    function __matrix($m, $n, &$array)
    {
        for ($i=0; $i < $m; $i++) { 
            for ($j=0; $j < $n; $j++) { 
                $array[$i][$j] = rand(-200, 200);
            }
        }
        render($array, 0);

    }
    //Hàm in ma trận
    function render($input, $deep) {
        if (is_array($input)) {
            $deep++;
            echo '<ul style="margin-left: -40px;">';
            foreach ($input as $key => $value) {
                render($value, $deep);
            }
            echo '</ul>';
        }else{
            echo '<div style="width: 60px; height: 40px;display: inline-block;color:#DC143C;">'.$input.'</div>';
        }
    }
    ?>
    <form action="" name="myform" method="post">
        <table>
            <tr>
                <th colspan="3" id="title">
                    <h3>THAO TÁC TRÊN MA TRẬN</h3>
                </th>
            </tr>
            <tr>
                <td>Nhập m:</td>
                <td>
                    <input type="number" name="m" size=20 value="<?php echo $m ?>" required />
                </td>
            </tr>
            <tr>
                <td>Nhập n:</td>
                <td>
                    <input type="number" name="n" size=20 value="<?php echo $n ?>" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="inMT" size=20 value="In ma trận" required class="btn" />
                </td>
            </tr>
            <tr>
                <td>Ma trận <?php echo "$m x $n" ?>:</td>
                <td>
                    <?php
                        __matrix($m, $n, $array);
                    ?>
                </td>
            </tr>
            <tr>
                <td class="_t1">Số phần tử có chữ số cuối lẻ:</td>
                <td style="color:#8B008B;">
                    <?php
                        echo demLe($m, $n, $count, $array) . " số";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Ma trận sau thay thế phần tử 0 thành 1:</td>
                <td>
                    <?php
                        thayThe($m, $n, $array, $array_new)
                    ?>
                </td>
            </tr>
            
        </table>
    </form>

</body>

</html>