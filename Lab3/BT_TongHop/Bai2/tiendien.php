<html>

<head>
    <title>Input/Ouput data</title>
    <style>
        #title {
            color: #cc0099;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #kq {
            background-color: #ffb3ff;
            font-weight: bold;
        }

        form {
            border: 2px solid #2F4F4F;
            border-radius: 20px;
            width: 600px;
            background-color: #80bfff;
            left: 50%;
            top: 15%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        table {
            margin-left: 100px;
            margin-bottom: 20px;
        }
        body {
            background-color: #F8F8FF;
        }
    </style>
</head>

<body>
    <?php
    $mes = '';
    if (isset($_POST['name']))
        $name = trim($_POST['name']);
    else $name = '';
    if (isset($_POST['old']))
        $old = trim($_POST['old']);
    else $old = '';
    if (isset($_POST['new']))
        $new = trim($_POST['new']);
    else $new = '';
    if (isset($_POST['cost']))
        $cost = trim($_POST['cost']);
    else $cost = 20000;
    if (isset($_POST['tinh'])) {
        if (is_numeric($old) && is_numeric($new) && is_numeric($cost)) {
            if (($old > 0) && ($new > 0) && ($cost > 0))
                if ($new > $old) {
                    $thanhtoan = ($new - $old) * $cost;
                } else {
                    $mes = "Chỉ số mới phải lớn hơn chỉ số cũ!";
                    $thanhtoan = "";
                }
            else {
                $mes = "Số phải lớn hơn 0!";
                $thanhtoan = "";
            }
        } else {
            $mes = "Vui lòng nhập vào số!";
            $thanhtoan = "";
        }
    } else $thanhtoan = '';
    ?>
    <form action="tiendien.php" name="myform" method="post">
        <table>
            <tr>
                <th colspan="2" id="title">
                    <h3>THANH TOÁN TIỀN ĐIỆN</h3>
                </th>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="name" size=30 value="<?php echo $name; ?>" required />
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="text" name="old" size=30 value="<?php echo $old; ?>" required />
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="text" name="new" size=30 value="<?php echo $new; ?>" required />
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text" name="cost" size=30 value="<?php echo $cost; ?>" />
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input type="text" name="tinh" size=30 value="<?php echo $thanhtoan; ?>" readonly id="kq" />
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Tính</button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo "<h3 style='color:#8B0000;margin-bottom:0px;'>$mes</h3>"; ?></td>
            </tr>
        </table>
    </form>

</body>

</html>