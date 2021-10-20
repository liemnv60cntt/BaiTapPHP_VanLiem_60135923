<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài 5</title>
    <link rel="stylesheet" type="text/css" href="./style_bai5.css">

</head>

<body>
    <?php
    echo "<h1>Trang lưu SESSION</h1>";
    echo "<h3>Reload lại trang và trở lại trang trước để xóa dữ liệu trong SESSION</h3>";
    session_start();
    $_SESSION['mhs'] = array(
        array("A001", "Sữa tắm Xmen", "Chai 50ml", 50),
        array("A002", "Dầu gội đầu Lifeboy", "Chai 50ml", 20),
        array("B001", "Dầu ăn Simply", "Chai 1 lít", 10),
        array("B002", "Đường cát", "Kg", 15),
        array("C001", "Chén sứ Minh Long", "Bộ 10 cái", 2),
        array("C002", "Tương ớt Chinsu", "Chai 250ml", 5)
    );

    ?>
    <a href="bai5_2_01.php"><button class="btn">Chuyến đến trang mặt hàng</button></a>
</body>