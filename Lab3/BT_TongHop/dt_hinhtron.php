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
            width: 300px;
            background-color: #80bfff;
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

        #container {
            left: 50%;
            top: 15%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div id="container">
        <form action="dt_hinhtron.php" name="myform" method="post">
            <table>
                <tr>
                    <th colspan="2" id="title">
                        <h3>DIỆN TÍCH HÌNH TRÒN</h3>
                    </th>
                </tr>
                <tr>
                    <td>Bán kính:</td>
                    <td>
                        <input type="text" name="txtBK" size=20 value="<?php if (isset($_POST['txtBK'])) echo $_POST['txtBK']; ?>" required />
                    </td>
                </tr>
                <?php
                $mes = '';
                if (isset($_POST['txtBK'])) {
                    if (is_numeric($_POST['txtBK'])) {
                        $_POST['tinh'] = pow($_POST['txtBK'], 2) * 3.14;
                    } else $mes = 'Vui lòng nhập số!';
                };
                ?>
                <tr>
                    <td>Diện tích:</td>
                    <td>
                        <input type="text" name="tinh" size=20 value="<?php if (isset($_POST['tinh'])) {
                                                                            echo $_POST['tinh'];
                                                                        }; ?>" readonly id="kq" />
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
    </div>


</body>

</html>