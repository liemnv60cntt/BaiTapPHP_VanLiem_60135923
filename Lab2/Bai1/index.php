<?php
    $n = rand(10,1000);
    echo '<h2 style="color: blue; margin-bottom: 0px;">Số được tạo: ' . $n . '</h2>';
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
    echo "<br>";
    echo "<h3 style='margin-bottom: 0px;'>a. Các số nguyên tố nhỏ hơn " . $n . " là: </h3><br>";
    for($i = 0; $i < $n; $i ++) {
        if (SoNguyenTo($i)) {
            echo "$i, ";
        }
    }
    //Số lượng chữ số của một số nguyên n bằng logarit cơ số 10 cộng với 1
    $dem = (int) log10($n) + 1;
    // $xx = strlen($n);
    echo '<br>';
    echo '<h3 style="margin-bottom: 0px;">b. Số '. $n . ' có ' . $dem . ' chữ số </h3>';
    //Tìm chữ số lớn nhất của n
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
    //Tìm số chữ số lớn nhất
    function DemSoLonNhat($n){
        $count = 0;
        $number = SoLonNhat($n);
        while($n>0){
            $temp = $n % 10;
            $n /= 10;
            if($temp == $number)
                $count++;
        }
        return $count;
        
    }
    $x = SoLonNhat($n);
    $y = DemSoLonNhat($n);
    echo '<br>';
    
    echo '<h3 style="margin-bottom: 0px;">c. Chữ số lớn nhất của ' . $n . ' là: ' . $x . '</h3>';
    echo '<br> (Số lượng chữ số lớn nhất là: ' . $y . ' )'; 


?>