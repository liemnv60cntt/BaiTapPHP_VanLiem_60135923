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
            width: 320px;
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
    </style>
</head>

<body>
    <?php
    $mes = '';
    if (isset($_POST['txtCD']))
        $txtCD = trim($_POST['txtCD']);
    else $txtCD = '';
    if (isset($_POST['txtCR']))
        $txtCR = trim($_POST['txtCR']);
    else $txtCR = '';
    if (isset($_POST['tinh'])){
        if (is_numeric($txtCD) && is_numeric($txtCR)) {
            if (($txtCD > 0) && ($txtCR > 0))
                $dientich = $txtCD * $txtCR;
            else{
                $mes = "Số phải lớn hơn 0!";
                $dientich = "";
            }
        } else {
            $mes = "Vui lòng nhập vào số!";
            $dientich = "";
        }
    }
    else $dientich = '';
    ?>
    <form action="dientich.php" name="myform" method="post">
        <table>
            <tr>
                <th colspan="2" id="title">
                    <h3>DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
                </th>
            </tr>
            <tr>
                <td>Chiều dài:</td>
                <td>
                    <input type="text" name="txtCD" size=20 value="<?php echo $txtCD; ?>" required />
                </td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td>
                    <input type="text" name="txtCR" size=20 value="<?php echo $txtCR; ?>" required />
                </td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="text" name="tinh" size=20 value="<?php echo $dientich ?>" readonly id="kq" />
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
                <td>
                    <?php
                    echo "<h3 style='color:#8B0000;margin-bottom:0px;'>$mes</h3>";
                    ?>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>