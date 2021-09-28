<html>

<head>
    <title>Input/Ouput data</title>
    <style>
        h2{
            color: red;
        }
        #kq{
            background-color: pink;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="dientich.php" name="myform" method="post">
        <h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
        <table>
            <tr>
                <td>Chiều dài:</td>
                <td>
                    <input type="text" name="txtCD" size=20 value="<?php if (isset($_POST['txtCD'])) echo $_POST['txtCD']; ?>" required/>
                </td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td>
                    <input type="text" name="txtCR" size=20 value="<?php if (isset($_POST['txtCR'])) echo $_POST['txtCR']; ?>" required/>
                </td>
            </tr>
            <?php
                if (isset($_POST['txtCD']) && isset($_POST['txtCR'])) {
                    $_POST['tinh'] = $_POST['txtCD'] * $_POST['txtCR'];
                };
            ?>
            <tr>
                <td>Diện tích:</td>
                <td>
                    <input type="text" name="tinh" size=20 value="<?php if (isset($_POST['tinh'])) {echo $_POST['tinh'];};?>"  readonly id="kq"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" value="Tính">Tính</button>
                </td>
            </tr>
    </form>
    
</body>

</html>