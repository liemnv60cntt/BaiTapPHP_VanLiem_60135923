<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Tìm kiếm</title>
</head>

<body>
    <?php include('includes/header.html'); ?>
    <form action="" method="get">
        <table bgcolor="#00e673" align="center" class="my-2 rounded shadow" width="100%" border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse;padding:10x;height:100px;">
            <tr>
                <td align="center">
                    <font color="#ff3399">
                        <h3>TÌM KIẾM THÔNG TIN NHÂN VIÊN</h3>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <div class="row w-75 mb-2" style="margin-left: 150px;font-weight:bold;">
                        <label class="col-2 mt-2">Tên nhân viên: </label>
                        <input type="text" class="form-control w-50 col-9 mx-2" name="tennv" size="30" value="<?php if (isset($_GET['tennv'])) echo $_GET['tennv']; ?>">
                        <input type="submit" name="tim" value="Tìm kiếm" class="btn btn-primary col-1">
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (empty($_GET['tennv'])) echo "<p align='center'>Vui lòng nhập tên nhân viên cần tìm</p>";
        else {
            $tennv = $_GET['tennv'];
            require('connect.php');
            $query = "Select nhanvien.*, tenLoaiNV, tenPhong 
		      from nhanvien, loainv, phongban 
		      WHERE nhanvien.maLoaiNV = loainv.maLoaiNV and nhanvien.maPhong = phongban.maPhong
					AND hoTen like '%$tennv%'";
            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) <> 0) {
                $rows = mysqli_num_rows($result);
                echo "<div align='center'><h2>Có $rows nhân viên được tìm thấy.</h2></div>";
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $gioiTinh = ($row['gioiTinh']==1) ? "Nam" : "Nữ";
                    echo '<table border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse; text-align: center; margin:10px; margin-left:500px; margin-bottom:15px;">
					<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' .
                        $row['hoTen'] . ' - ' . $row['tenLoaiNV'] . ' - ' . $row['tenPhong'] . '</h3></td></tr>';
                    echo '<tr><td width="200" align="center"><img src="Images/' . $row['anh'] . '" style="width: 350px; height:250px; margin:5px"/></td>';
                    echo '<td><i><b>Ngày sinh:</i></b>' . $row['ngaySinh'] . '<br />';
                    echo '<i><b>Giới tính:</b></i>' . $gioiTinh . '<br />';
                    echo '</td></tr></table>';
                }
            } else echo "<div style='text-align:center;'><h2>Không tìm thấy nhân viên này.</h2></div>";
            //Dong ket noi
            mysqli_close($dbc);
        }
    }
    
    include('includes/footer.html');
    ?>
</body>

</html>