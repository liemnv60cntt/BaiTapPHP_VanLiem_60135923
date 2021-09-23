<!DOCTYPE html>
<html>
<head>
    <title>Bài 4</title>
    
</head>
<body>
    
    <?php
        $m = rand(2,5);
        $n = rand(2,5);
        echo "<h3 style='margin-bottom: 0px;'>Ma trận $m x $n :</h3>";
        //Hàm in ma trận
        function render($input, $deep) {
            if (is_array($input)) {
                $deep++;
                echo '<ul>';
                foreach ($input as $key => $value) {
                    render($value, $deep);
                }
                echo '</ul>';
            }else{
                    
                echo '<div style="width: 50px; height: 30px;display: inline-block">'.$input.'</div>';
            }
        }
        //Hàm tạo ma trận m x n
        function __construct()
        {
            GLOBAL $m, $n;
            $array = [];
            for ($i=0; $i < $m; $i++) { 
                for ($j=0; $j < $n; $j++) { 
                    $array[$i][$j] = rand(-100, 100);
                }
            }
            render($array, 0);  
        }
        __construct();
    ?>

</body>
</html>