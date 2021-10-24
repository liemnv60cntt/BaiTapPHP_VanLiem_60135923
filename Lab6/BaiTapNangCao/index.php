<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <title>Trang chủ</title>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>
    <h1 class="text-primary text-center" style="font-weight: bold;">Trang chủ Quản lý nhân viên</h1>
    <table class="table table-hover mx-auto w-25">
        <thead>
            <tr>
                <th>Đăng nhập để quản lý</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Quản lý cấp cao:</td>
                <td>nvliem</td>
                <td>12345678</td>
            </tr>
            <tr>
                <td>Quản lý cấp thấp:</td>
                <td>vbtoan</td>
                <td>123456</td>
            </tr>

        </tbody>
    </table>

    <img src="Images/bg_work.png" style="width: 1500px; height:auto; margin:10px;" />
    <?php
    include('includes/footer.html');
    ?>
</body>

</html>