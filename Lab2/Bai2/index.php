<?php
    $n= rand(1,10);
    echo '<h2 style="color: blue; margin-bottom: 0px;">Số được tạo: ' . $n . '</h2>';
    for($i=1; $i<=10; $i++){
        $x = $n * $i;
        echo $n . ' x ' . $i . ' = ' . $x;
        echo '<br>';
    }


?>