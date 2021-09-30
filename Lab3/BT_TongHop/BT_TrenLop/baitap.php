<html>

<head>
    <title>Trang nhập liệu</title>
    <style>
        form {
            width: 500px;
            left: 50%;
            top: 25%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: #DCDCDC;
        }

        fieldset {
            border: 2px solid #4B0082;
        }

        #title {
            color: #4B0082;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
        $mes = '';
        $dem = 0;
        $so_lon_nhat = 0;
        function SoNguyenTo($n) {
            // Số nguyên n < 2 không phải là số nguyên tố
            if ($n < 2) {
                return false;
            }
            // Kiểm tra số nguyên tố khi n >= 2
            $squareRoot = sqrt($n);
            for($i = 2; $i <= $squareRoot; $i ++) {
                if ($n % $i == 0) {
                    return false;
                }
            }
            return true;
        }
        function SoLonNhat($n){
            //Lấy trị tuyệt đối của n
            $n = abs($n);
            $max = 0;
            while($n>0){
                $temp = $n % 10;
                $n /= 10;
                if($temp > $max){
                    $max = $temp;
                }
            }
            return $max;
        }
        $_kq = '';
        if (isset($_POST['_n'])){
            $_n = trim($_POST['_n']);
            if(is_numeric($_n)){
                if($_n >= 10 && $_n <= 1000){
                    for($i = 0; $i < $_n; $i ++) {
                        if (SoNguyenTo($i)) {
                            $_kq = $_kq . " " . $i;
                        }
                    }
                    $dem = strlen($_n);
                    $so_ky_tu = "b) Số ký tự của $_n là: $dem ";
                    $so_lon_nhat = "c) Số lớn nhất của $_n là: " . SoLonNhat($_n);
                }
                else {
                    $mes = "Số phải có giá trị trong khoản [10,1000]";
                    $so_ky_tu = '';
                    $so_lon_nhat = '';
                }
            }
            else{
                $mes = "Vui lòng nhập số";
                $so_ky_tu = '';
                $so_lon_nhat = '';
            } 
        }
        else $_n = '';
    ?>
    <form action="baitap.php" name="myform" method="post">
        <fieldset>
            <legend id="title">Nhập thông tin</legend>
            <table>
                <tr>
                    <td>Nhập n:</td>
                    <td>
                        <input type="text" name="_n" size=30 value="<?php echo $_n; ?>" required />
                    </td>
                </tr>
                
                <tr>
                    <td>Kết quả:</td>
                    <td>
                    <textarea name="_kq" rows="10" cols="50"><?php 
                        echo "a) $_kq \n";
                        echo $so_ky_tu ."\n";
                        echo $so_lon_nhat . "\n";
                     ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit">Gửi</button>&nbsp;
                    </td>
                </tr>
                <tr>
                <td></td>
                <td>
                    <?php
                    echo "<h3 style='color:#8B0000;margin-bottom:0px;'>$mes</h3>";
                    ?>
                </td>
            </tr>
            </table>
        </fieldset>
    </form>

</body>

</html>