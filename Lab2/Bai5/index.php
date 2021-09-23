<?php
    $n = rand(-100,100);
    echo '<h2 style="color: blue; margin-bottom: 0px;">Số được tạo: ' . $n . '</h2>';
    function SoNguyenTo($a) {
        // Số nguyên n < 2 không phải là số nguyên tố
        if ($a < 2) {
            return false;
        }
        // Kiểm tra số nguyên tố khi n >= 2
        $squareRoot = sqrt($a);
        for($i = 2; $i <= $squareRoot; $i ++) {
            if ($a % $i == 0) {
                return false;
            }
        }
        return true;
    }
    echo "<br>";
    $fp = @fopen('soNT.txt', "a+");//Mở file

    if (SoNguyenTo($n)) {
         echo "$n 'là' số nguyên tố";
         if(!$fp){
             echo "Mở file không thành công!";
         }
         else{
             $data = $n . "\n";
             fwrite($fp, $data);
             fclose($fp);//Đóng file
         }
    }else{
        echo "$n 'không phải' là số nguyên tố";
    }
    
    


?>