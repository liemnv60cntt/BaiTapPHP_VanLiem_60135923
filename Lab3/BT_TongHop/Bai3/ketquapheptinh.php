<html>

<head>
    <title>Trang kết quả</title>
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
            width: 360px;
            background-color: #80bfff;
            left: 50%;
            top: 15%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        table {
            margin-left: 10px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        body {
            background-color: #F8F8FF;
        }
        #_chon {
            color: #DC143C;
        }
        td {
            font-weight: bold;
            font-size: 20px;
        }
        a:hover {
            color: #FF4500;
        }
        a {
            text-decoration: none;
        }
        a:active {
            color: #FFA500;
        }
    </style>
</head>

<body>
    <?php
    $mes = '';
    if (isset($_POST['txtMot']))
        $txtMot = trim($_POST['txtMot']);
    if (isset($_POST['txtHai']))
        $txtHai = trim($_POST['txtHai']);
    if (isset($_POST['radPT']))
        $radPT = trim($_POST['radPT']);

    if (is_numeric($txtMot) && is_numeric($txtHai)) {
        switch ($radPT) {
            case 'Cộng':
                $ketqua = $txtMot + $txtHai;
                break;
            case 'Trừ':
                $ketqua = $txtMot - $txtHai;
                break;
            case 'Nhân':
                $ketqua = $txtMot * $txtHai;
                break;
            case 'Chia':
                $ketqua = $txtMot / $txtHai;
                break;
        }
    } else {
        $mes = "Vui lòng nhập vào số!";
        $ketqua = "";
    }
    ?>
    <form name="myform">
        <table>
            <tr>
                <th colspan="2" id="title">
                    <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
                </th>
            </tr>
            <tr>
                <td id="_chon">Phép tính:</td>
                <td><?php echo $radPT ?></td>
            </tr>
            <tr>
                <td>Số 1:</td>
                <td>
                    <input type="text" name="txtMot" size=20 value="<?php echo $txtMot; ?>" />
                </td>
            </tr>
            <tr>
                <td>Số 2:</td>
                <td>
                    <input type="text" name="txtHai" size=20 value="<?php echo $txtHai; ?>" />
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td>
                    <input type="text" name="tinh" size=20 value="<?php echo $ketqua ?>" readonly id="kq" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
                    echo "<h3 style='color:#8B0000;margin-bottom:0px;'>$mes</h3>";
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>

</body>

</html>