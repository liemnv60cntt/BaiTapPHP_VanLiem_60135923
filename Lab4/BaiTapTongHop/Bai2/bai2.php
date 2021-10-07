<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài 2</title>
    <link rel="stylesheet" type="text/css" href="./style_form.css">

</head>

<body>
    <?php
    $tong = 0;
    if (isset($_POST['number'])) {
        $n = trim($_POST['number']);
        if (isset($_POST['sum'])) {
            $arr = explode(",", $n);
            $tong = array_sum($arr);
        }
    } else {
        $n = '';
    }
    ?>
    <form action="" name="myform" method="post">
        <table>
            <tr>
                <th colspan="3" id="title">
                    <h3>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h3>
                </th>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="number" size=30 value="<?php echo $n ?>" required />
                </td>
                <td class="note">&#10088;*&#10089;</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="sum" size=20 value="Tổng dãy số" required class="btn" />
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input type="text" name="kq" size=20 value="<?php echo $tong ?>" readonly id="kq" />
                </td>
                <td></td>
            </tr>
            <tr>
                <td class="note" id="r">&#10088;*&#10089;</td>
                <td colspan="2" class="mess">
                    Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
            
        </table>
    </form>

</body>

</html>