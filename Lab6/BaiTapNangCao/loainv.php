<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <!-- <title>QL Nhân viên</title> -->
</head>

<body>
    <?php
    include('includes/header.html');
    // Ket noi CSDL
    require("connect.php");
    // Chuan bi cau truy van & Thuc thi cau truy van
    $strSQL = "SELECT * FROM loainv";
    $result = mysqli_query($dbc, $strSQL);
    
    // Xu ly du lieu tra ve
    if (mysqli_num_rows($result) == 0) {
        echo "Chưa có dữ liệu";
    } else {
        echo "<h1 style='color: #0099ff; font-weight: bold;' align='center'>THÔNG TIN LOẠI NHÂN VIÊN</h1>
		  <table align='center' width='1000' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;' class='mx-auto shadow'>
		  	<tr style='background-color: #2eb8b8; height: 40px;' align='center'>
                <td><b>Mã loại nhân viên</b></td>
				<td><b>Tên loại nhân viên</b></td>
		  	</tr>";
        $stt = 1;
        while ($row = mysqli_fetch_array($result)) {

            if ($stt % 2 != 0) {
                echo "<tr>";
                echo "<td style='text-align: center; height:50px;'>$row[0]</td>";
                echo "<td style='text-align: center; height:50px;'>$row[1]</td>";
                echo "</tr>";
            } else {
                echo "<tr style='background-color: #d7d7c1;'>";
                echo "<td style='text-align: center; height:50px;'>$row[0]</td>";
                echo "<td style='text-align: center; height:50px;'>$row[1]</td>";
                echo "</tr>";
            }
            $stt += 1;
        }
        echo '</table>';
    }
    //Dong ket noi
    mysqli_close($dbc);



    ?>

    <?php
    include('includes/footer.html');
    ?>
</body>

</html>