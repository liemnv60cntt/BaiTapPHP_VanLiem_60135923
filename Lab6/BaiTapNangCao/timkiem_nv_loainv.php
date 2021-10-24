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
    if(!isset($_SESSION['username']))
        echo("<script>location.href = 'index.php';</script>");
    require('connect.php');
    ?>
    <form action="" method="get">
        <table bgcolor="#00e673" align="center" class="my-2 rounded shadow" width="100%" border="1" cellpadding="5" cellspacing="5" style="border-collapse: collapse;padding:10x;height:100px;">
            <tr>
                <td align="center">
                    <font color="#ff3399">
                        <h3>TÌM KIẾM NHÂN VIÊN THEO LOẠI NHÂN VIÊN</h3>
                    </font>
                </td>
            </tr>
            <tr>
                <td align="center">
                    
                    <select name="loai_nv">
                        <?php
                        $query_timkiem = "select * from loainv";    //Hiển thị tên các loại nhân viên
                        $result_timkiem = mysqli_query($dbc, $query_timkiem);
                        if (mysqli_num_rows($result_timkiem) <> 0) {
                            while ($row = mysqli_fetch_array($result_timkiem)) {
                                $maLoaiNV = $row['maLoaiNV'];
                                $tenLoaiNV = $row['tenLoaiNV'];
                                echo "<option value='$maLoaiNV' ";
                                if (isset($_REQUEST['loai_nv']) && ($_REQUEST['loai_nv'] == $maLoaiNV)) echo "selected='selected'";
                                echo ">$tenLoaiNV</option>";
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
        if (empty($_GET['loai_nv'])) echo "<p align='center'>Vui lòng nhập tên loại nhân viên cần tìm</p>";
        else {
            $loai_nv = $_GET['loai_nv'];
            $query = "Select nhanvien.*, tenLoaiNV, tenPhong 
		      from nhanvien, loainv, phongban 
		      WHERE nhanvien.maLoaiNV = loainv.maLoaiNV and nhanvien.maPhong = phongban.maPhong
					AND nhanvien.maLoaiNV = '$loai_nv'";
            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) <> 0) {
                $rows = mysqli_num_rows($result);
                echo "<div align='center'><h2>Có $rows nhân viên thuộc loại nhân viên trên được tìm thấy.</h2></div>";
                echo "
                  <table align='center' width='1400' border='1' cellpadding='2' cellspacing='2' 
                        style='border-collapse: collapse;' class='mx-auto shadow rounded'>
                      <tr style='background-color: #ffd633; height: 40px;' align='center'>
                        <td class='text-center'><b>STT</b></td>
                        <td><b>Ảnh nhân viên</b></td>
                        <td><b>Mã NV</b></td>
                        <td><b>Họ tên</b></td>
                        <td><b>Ngày sinh</b></td>
                        <td><b>Giới tính</b></td>
                        <td><b>Địa chỉ</b></td>
                        <td><b>Loại NV</b></td>
                        <td><b>Phòng ban</b></td>
                        <td><b>Sửa</b></td>
                        <td><b>Xóa</b></td>
                      </tr>";
                $stt = 1;
                $gioiTinh = '';
                while ($row = mysqli_fetch_array($result)) {
                    $gioiTinh = ($row[3]==1) ? "Nam" : "Nữ";
        
                    if ($stt % 2 != 0) {
                        echo "<tr class='text-center' style='font-weight:bold;'>";
                        echo "<td>$stt</td>";
                        echo "<td><img src='Images/$row[5]' alt='Ảnh' style='width: 200px; height:150px; margin:10px;border-radius:10px;' class='shadow'> </td>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$gioiTinh</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>".$row['tenLoaiNV']."</td>";
                        echo "<td>".$row['tenPhong']."</td>";
                        echo "<td><a href='sua_nv.php?maNV=".$row[0]."' class='btn btn-warning shadow'>&nbsp<i class='far fa-edit' style='font-size:24px'></i></a></td>";
                        echo "<td><a href='xoa_nv.php?maNV=".$row[0]."' class='btn btn-danger shadow'>&nbsp<i class='far fa-trash-alt' style='font-size:24px'></i>&nbsp</a></td>";
                        echo "</tr>";
                    } else {
                        echo "<tr style='background: linear-gradient(to left, #00e699 0%, #009999 100%);font-weight:bold;' class='text-center'>";
                        echo "<td style='font-weight:bold;'>$stt</td>";
                        echo "<td><img src='Images/$row[5]' alt='Ảnh' style='width: 200px; height:150px; margin:10px;border-radius:10px;' class='shadow'> </td>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$gioiTinh</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>".$row['tenLoaiNV']."</td>";
                        echo "<td>".$row['tenPhong']."</td>";
                        echo "<td><a href='sua_nv.php?maNV=".$row[0]."' class='btn btn-warning shadow'>&nbsp<i class='far fa-edit' style='font-size:24px'></i></a></td>";
                        echo "<td><a href='xoa_nv.php?maNV=".$row[0]."' class='btn btn-danger shadow'>&nbsp<i class='far fa-trash-alt' style='font-size:24px'>&nbsp</i></a></td>";
                        echo "</tr>";
                    }
                    $stt += 1;
                }
                echo '</table>';
            } else echo "<div style='text-align:center;'><h2>Không tìm thấy nhân viên thuộc loại nhân viên này.</h2></div>";
            //Dong ket noi
            mysqli_close($dbc);
        }
    }
    include('includes/footer.html');
    ?>
</body>

</html>