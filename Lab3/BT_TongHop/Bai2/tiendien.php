<html>

<head>
    <title>Input/Ouput data</title>
    <style>
        h1{
            color: red;
        }
        #kq{
            background-color: pink;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="tiendien.php" name="myform" method="post">
        <h1>THANH TOÁN TIỀN ĐIỆN</h1>
        <table>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="name" size=30 value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required/>
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="text" name="old" size=30 value="<?php if (isset($_POST['old'])) echo $_POST['old']; ?>" required/>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="text" name="new" size=30 value="<?php if (isset($_POST['new'])) echo $_POST['new']; ?>" required/>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text" name="cost" size=30 value="<?php if (isset($_POST['cost'])) echo $_POST['cost'];else{$_POST['cost'] = 20000;echo $_POST['cost'];} ?>" />
                    (VNĐ)
                </td>
            </tr>
            <?php
                if (isset($_POST['old']) && isset($_POST['new'])) {
                    $_POST['tinh'] = ($_POST['new'] - $_POST['old']) * $_POST['cost'];
                };
            ?>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input type="text" name="tinh" size=30 value="<?php if (isset($_POST['tinh'])) {echo $_POST['tinh'];};?>"  readonly id="kq"/>
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" value="Tinh">Tính</button>
                </td>
            </tr>
    </form>
    
</body>

</html>