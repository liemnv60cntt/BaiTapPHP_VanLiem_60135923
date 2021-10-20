<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài 5</title>
    <link rel="stylesheet" type="text/css" href="./style_bai5.css">

</head>

<body>
    <?php
    $title = array(
        "Mã mặt hàng",
        "Tên mặt hàng",
        "Đơn vị tính",
        "Số lượng"
    );
    session_start();
    //Kiểm tra dữ liệu nhập vào
    if (isset($_POST['maMH']))
        $maMH = $_POST['maMH'];
    else
        $maMH = '';
    if (isset($_POST['tenMH']))
        $tenMH = $_POST['tenMH'];
    else
        $tenMH = '';
    if (isset($_POST['dVT']))
        $dVT = $_POST['dVT'];
    else
        $dVT = '';
    if (isset($_POST['soLuong']))
        $soLuong = $_POST['soLuong'];
    else
        $soLuong = '';

    
    if (isset($_POST['them'])) {
        if (isset($maMH, $tenMH, $dVT, $soLuong)) {
            if (isset($_SESSION['mhs'])) {
                array_push($_SESSION['mhs'], array($maMH, $tenMH, $dVT, $soLuong));
            }
        }
    }
    ?>
    <a href="bai5_2_02.php"><button class="btn">Chuyến đến trang SESSION</button></a>
    <form action="" name="myform" method="post">
        <table>
            <tr>
                <th colspan="2" id="title">
                    <h3>THÊM MẶT HÀNG</h3>
                </th>
            </tr>
            <tr>
                <td>Mã mặt hàng:</td>
                <td>
                    <input type="text" name="maMH" size=30 value="<?php echo $maMH
                                                                    ?>" required />
                </td>
            </tr>
            <tr>
                <td>Tên mặt hàng:</td>
                <td>
                    <input type="text" name="tenMH" size=30 value="<?php echo $tenMH
                                                                    ?>" required />
                </td>
            </tr>
            <tr>
                <td>Đơn vị tính:</td>
                <td>
                    <input type="text" name="dVT" size=30 value="<?php echo $dVT
                                                                    ?>" required />
                </td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td>
                    <input type="text" name="soLuong" size=30 value="<?php echo $soLuong
                                                                        ?>" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="them" size=20 value="Thêm" class="btn" />
                    <input type="reset" size=20 value="Hủy" class="btn" />
                </td>
            </tr>
            <tr>
                <td colspan="2" class="mess">
                    Vui lòng nhập đầy đủ thông tin!
                </td>
            </tr>

        </table>
    </form>
    <table id="table_2">
        <tr class="tr_2">
            <th colspan="4" id="title">
                <h3>DANH SÁCH MẶT HÀNG</h3>
            </th>
        </tr>
        <tr class="tr_2">
            <?php
            foreach ($title as $value) {
                echo "<th class='th_2'>" . $value . "</th>";
            }
            ?>
        </tr>
        <?php
        foreach ($_SESSION['mhs'] as $key => $value) {
            echo "<tr class='tr_2'>";
            foreach ($value as $v) {

                echo "<td class='td_2'>$v</td>";
            }
            echo "</tr>";
        }
        // session_unset();
        // session_destroy();
        ?>
    </table>
    <!-- <form action="bai5_2_02.php" name="navi" id="form_02">
        <input type="submit" name="navi" size=20 value="Chuyến đến trang SESSION" class="btn" />
    </form> -->
    
</body>

</html>