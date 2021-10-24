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
    <?php
    include('includes/header.php');
    if (!isset($_SESSION['username']))
        echo ("<script>location.href = 'index.php';</script>");
    require('connect.php');
    ?>
    <form action="" method="get">
        <table bgcolor="#00e673" align="center" class="my-2 rounded shadow" width="100%" border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse;padding:10x;height:100px;">
            <tr>
                <td align="center">
                    <font color="#ff3399">
                        <h3>TÌM KIẾM THÔNG TIN PHÒNG BAN</h3>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="center">

                    <select name="phong_ban">
                        <?php
                        $query_timkiem = "select * from phongban";    //Hiển thị tên các loại nhân viên
                        $result_timkiem = mysqli_query($dbc, $query_timkiem);
                        if (mysqli_num_rows($result_timkiem) <> 0) {
                            while ($row = mysqli_fetch_array($result_timkiem)) {
                                $maPhong = $row['maPhong'];
                                $tenPhong = $row['tenPhong'];
                                echo "<option value='$maPhong' ";
                                if (isset($_REQUEST['phong_ban']) && ($_REQUEST['phong_ban'] == $maPhong)) echo "selected='selected'";
                                echo ">$tenPhong</option>";
                            }
                        }
                        mysqli_free_result($result_timkiem);
                        ?>
                    </select>


                    <input type="submit" name="tim" value="Tìm kiếm">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (empty($_GET['phong_ban'])) echo "<p align='center'>Vui lòng nhập tên phòng ban cần tìm</p>";
        else {
            $phong_ban = $_GET['phong_ban'];
            $query = "Select * 
		      from phongban 
		      WHERE maPhong = '$phong_ban'";
            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) <> 0) {
                $rows = mysqli_num_rows($result);
                echo "<div align='center'><h2>Có $rows nhân viên thuộc phòng ban trên được tìm thấy.</h2></div>";
                echo "
                    <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
                            style='border-collapse: collapse;' class='mx-auto shadow'>
                        <tr style='background-color: #2eb8b8; height: 40px;' align='center'>
                            <td class='text-center'><b>STT</b></td>
                            <td><b>Mã phòng ban</b></td>
                            <td><b>Tên phòng ban</b></td>
                            <td style='width:70px;'><b>Sửa</b></td>
                            <td style='width:70px;'><b>Xóa</b></td>
                        </tr>";
                $stt = 1;
                while ($row = mysqli_fetch_array($result)) {

                    if ($stt % 2 != 0) {
                        echo "<tr class='text-center'>";
                        echo "<td style='height:50px; font-weight: bold;'>$stt</td>";
                        echo "<td style='height:50px;'>$row[0]</td>";
                        echo "<td style='height:50px;'>$row[1]</td>";
                        echo "<td><a href='sua_pb.php?maPhong=" . $row[0] . "' class='btn btn-warning shadow'>&nbsp<i class='far fa-edit' style='font-size:24px'></i></a></td>";
                        echo "<td><a href='xoa_pb.php?maPhong=" . $row[0] . "' class='btn btn-danger shadow'>&nbsp<i class='far fa-trash-alt' style='font-size:24px'></i>&nbsp</a></td>";
                        echo "</tr>";
                    } else {
                        echo "<tr class='text-center' style='background-color: #d7d7c1;'>";
                        echo "<td style='height:50px; font-weight: bold;'>$stt</td>";
                        echo "<td style='height:50px;'>$row[0]</td>";
                        echo "<td style='height:50px;'>$row[1]</td>";
                        echo "<td><a href='sua_pb.php?maPhong=" . $row[0] . "' class='btn btn-warning shadow'>&nbsp<i class='far fa-edit' style='font-size:24px'></i></a></td>";
                        echo "<td><a href='xoa_pb.php?maPhong=" . $row[0] . "' class='btn btn-danger shadow'>&nbsp<i class='far fa-trash-alt' style='font-size:24px'></i>&nbsp</a></td>";
                        echo "</tr>";
                    }
                    $stt += 1;
                }
                echo '</table>';
            } else echo "<div style='text-align:center;'><h2>Không tìm thấy nhân viên này.</h2></div>";
            //Dong ket noi
            mysqli_close($dbc);
        }
    }
    include('includes/footer.html');
    ?>
</body>

</html>