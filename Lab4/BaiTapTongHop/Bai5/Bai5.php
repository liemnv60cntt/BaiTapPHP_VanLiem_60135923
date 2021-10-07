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
    //Mảng 2 chiều
    $mathangs = array(
        array("A001", "Sữa tắm Xmen", "Chai 50ml", 50),
        array("A002", "Dầu gội đầu Lifeboy", "Chai 50ml", 20),
        array("B001", "Dầu ăn Simply", "Chai 1 lít", 10),
        array("B002", "Đường cát", "Kg", 15),
        array("C001", "Chén sứ Minh Long", "Bộ 10 cái", 2),
        array("C002", "Tương ớt Chinsu", "Chai 250ml", 5)
    );
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
            $mathangs[] = array($maMH, $tenMH, $dVT, $soLuong);
        }
    }

    // echo "<table>";
    // echo "<tr>";
    // foreach ($title as $value) {
    //     echo "<th>" . $value . "</th>";
    // }
    // echo "</tr>";

    // foreach ($mathangs as $key => $value) {
    //     echo "<tr>";
    //     foreach ($value as $v) {

    //         echo "<td>$v</td>";
    //     }
    //     echo "</tr>";
    // }

    // echo "</table>";
    ?>
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
                    <input type="text" name="maMH" size=30 value="<?php echo $maMH ?>" required />
                </td>
            </tr>
            <tr>
                <td>Tên mặt hàng:</td>
                <td>
                    <input type="text" name="tenMH" size=30 value="<?php echo $tenMH ?>" required />
                </td>
            </tr>
            <tr>
                <td>Đơn vị tính:</td>
                <td>
                    <input type="text" name="dVT" size=30 value="<?php echo $dVT ?>" required />
                </td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td>
                    <input type="text" name="soLuong" size=30 value="<?php echo $soLuong ?>" required />
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
        foreach ($mathangs as $key => $value) {
            echo "<tr class='tr_2'>";
            foreach ($value as $v) {

                echo "<td class='td_2'>$v</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>