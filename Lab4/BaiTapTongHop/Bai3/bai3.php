<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài 3</title>
    <link rel="stylesheet" type="text/css" href="./style_bai3.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "xuly.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <?php
    require("xuly.php");
    ?>
    <h1>
        Xổ số kiến thiết tỉnh Khánh Hòa ngày
        <?php
        echo date('d-m-Y');
        ?>
    </h1>
    
    <table>
        <tr>
            <td style="width: 400px;">Giải 8</td>
            <td class="_g8" colspan="4">
                <?php
                echo "<div>" . xoSo(8) . "</div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 7</td>
            <td class="_g" colspan="4">
                <?php
                echo "<div>" . xoSo(7) . "</div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 6</td>
            <?php
            for ($i = 0; $i < 3; $i++) {

                if ($i == 1) {
                    echo "<td class='_g' colspan='2'>" . xoSo(6) . "</td>";
                } else {
                    echo "<td class='_g'>" . xoSo(6) . "</td>";
                }
            }

            ?>
        </tr>
        <tr>
            <td>Giải 5</td>
            <td class="_g" colspan="4">
                <?php
                echo "<div>" . xoSo(5) . "</div>";
                ?>
            </td>
        </tr>
        <tr>
            <td rowspan="2">Giải 4</td>

            <?php
            for ($i = 0; $i < 4; $i++) {

                echo "<td class='_g'>" . xoSo(4) . "</td>";
            }
            ?>
        </tr>
        <tr style="background-color: white;">
            <?php
            for ($i = 0; $i < 3; $i++) {
                if ($i == 1)
                    echo "<td class='_g' colspan='2'>" . xoSo(4) . "</td>";
                else
                    echo "<td class='_g'>" . xoSo(4) . "</td>";
            }
            ?>
        </tr>
        <tr></tr>
        <tr>
            <td>Giải 3</td>
            <?php
            for ($i = 0; $i < 2; $i++) {

                echo "<td class='_g' colspan='2'>" . xoSo(3) . "</td>";
            }
            ?>
        </tr>
        <tr>
            <td>Giải 2</td>
            <td class="_g" colspan="4">
                <?php

                echo "<div>" . xoSo(2) . "</div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 1</td>
            <td class="_g" colspan="4">
                <?php

                echo "<div>" . xoSo(1) . "</div>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải đặc biệt</td>
            <td class="_g8" colspan="4">
                <?php

                echo "<div>" . xoSo(0) . "</div>";
                ?>
            </td>
        </tr>
    </table>
    <form action="" name="myform">
        <div id="find">
            <table id="tb2">
                <tr>
                    <td class="t1">Nhập vé số:</td>
                    <td>
                        <input type="text" name="veSo" id="veSo" onkeyup="showHint(this.value)" size=30 value="<?php ?>" required class="inp" />
                        <!-- <button type="submit" name="tim" class="btn">Tìm giải <i class='fas fa-search'></i></button><br> -->
                        <!-- <input type="submit" value="Tìm giải" name="tim"/> -->
                    </td>
                </tr>
                <tr>
                    <td class="t1">Trúng giải:</td>
                    <td><span id="txtHint"></span></td>
                </tr>
            </table>
        </div>

    </form>
    <div id="note1">
    <?php
    // function find($arr, &$ketqua)
    // {
    //     if (isset($_POST['veSo'])) {
    //         $veSo = $_POST['veSo'];
    //         if (isset($_POST['tim'])) {
    //             foreach ($arr as $v) {
    //                 if (strpos($veSo, $v))
    //                     $ketqua = $v;
    //                 else
    //                     $ketqua = "Không tìm thấy";
    //             }
    //         }
    //     } else {
    //         $veSo = '';
    //     }
    // }
    // echo $ketqua . "<br>";
    // print_r($arr);
    echo "Các giải cố định để tìm (bởi vì các giải sử dụng rand() chưa xử lý để tìm được):<br>";
    echo "<pre>";
    print_r($a);
    echo "</pre";
    ?>
    </div>
    
</body>

</html>