<?php
    $a = rand(1,5);
    $b = rand(10,100);
    echo "a= $a " . ", b=$b" ."<br>";
    define("so_a",$a);
    define("so_b",$b);
    switch (so_a){
        case 1:
            $cv = so_b * 4; 
            $dt = so_b * so_b;
            echo "Chu vi hình vuông cạnh " . so_b ." là: $cv <br>";
            echo "Diện tích hình vuông cạnh " . so_b ." là: $dt <br>";
            break;
        case 2:
            $cv = so_b * 2 * 3.14;
            $dt = so_b * so_b * 3.14;
            echo "Chu vi hình tròn bán kính " . so_b ." là: $cv <br>";
            echo "Diện tích hình tròn bán kính " . so_b ." là: $dt <br>";
            break;
        case 3:
            $cv = so_b * 3;
            $dt = pow(so_b,2) * (sqrt(3)/4);
            echo "Chu vi tam giác đều cạnh " . so_b ." là: $cv <br>";
            echo "Diện tích tam giác đều cạnh " . so_b ." là: $dt <br>";
            break;
        case 4:
            $cv = (so_a + so_b) * 2;
            $dt = so_a * so_b;
            echo "Chu vi hình CN cạnh là: $cv <br>";
            echo "Diện tích hình CN cạnh là: $dt <br>";
            break;
        
    }




?>