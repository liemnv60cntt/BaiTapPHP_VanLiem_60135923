<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <title>QL Nhân viên</title>
</head>

<body>
    <?php
    include('includes/header.php');
    
    if(!isset($_SESSION['username']))
        echo("<script>location.href = 'index.php';</script>");
        
    // Ket noi CSDL
    require("connect.php");
    $rowsPerPage=4; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset =($_GET['page']-1)*$rowsPerPage; 
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
    $strSQL = "SELECT * FROM nhanvien LIMIT $offset, $rowsPerPage";
    $result = mysqli_query($dbc, $strSQL);


    // Chuan bi cau truy van & Thuc thi cau truy van
    // $strSQL = "SELECT * FROM nhanvien";
    // $result = mysqli_query($dbc, $strSQL);
    
    // Xu ly du lieu tra ve
    if (mysqli_num_rows($result) == 0) {
        echo "Chưa có dữ liệu";
    } else {
        echo "<h1 style='color: #0099ff; font-weight: bold;' align='center' class='rounded shadow'>THÔNG TIN NHÂN VIÊN</h1>
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
        $stt = $offset+1;
        $gioiTinh = '';
        while ($row = mysqli_fetch_array($result)) {
            $loaiNVSQL = "SELECT tenLoaiNV FROM `loainv` WHERE maLoaiNV = '$row[6]';";
            $loaiNV = mysqli_query($dbc, $loaiNVSQL);
            $kqLoaiNV = mysqli_fetch_row($loaiNV);
            $phongSQL = "SELECT tenPhong FROM `phongban` WHERE maPhong = '$row[7]';";
            $phong = mysqli_query($dbc, $phongSQL);
            $kqPhong = mysqli_fetch_row($phong);
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
                echo "<td>$kqLoaiNV[0]</td>";
                echo "<td>$kqPhong[0]</td>";
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
                echo "<td>$kqLoaiNV[0]</td>";
                echo "<td>$kqPhong[0]</td>";
                echo "<td><a href='sua_nv.php?maNV=".$row[0]."' class='btn btn-warning shadow'>&nbsp<i class='far fa-edit' style='font-size:24px'></i></a></td>";
                echo "<td><a href='xoa_nv.php?maNV=".$row[0]."' class='btn btn-danger shadow'>&nbsp<i class='far fa-trash-alt' style='font-size:24px'>&nbsp</i></a></td>";
                echo "</tr>";
            }
            $stt += 1;
        }
        echo '</table>';
        $re = mysqli_query($dbc, 'select * from nhanvien');
        //tổng số mẩu tin cần hiển thị
        $numRows = mysqli_num_rows($re); 
        //tổng số trang
        // $maxPage = floor($numRows/$rowsPerPage) + 1; 
        $maxPage = ceil($numRows/$rowsPerPage); 
        //Căn giữa
        echo "<div class='text-center mt-3'>";
        $trangdau = 1;
        if($_GET['page'] != 1){
            echo "<a class='btn btn-warning shadow' href=" .$_SERVER['PHP_SELF']."?page=".$trangdau.">
                <i class='fas fa-angle-double-left' style='font-size:24px'></i>
                </a> "; 
        }
        //gắn thêm nút Back
        if ($_GET['page'] > 1)
        { 
            echo "<a class='btn btn-dark shadow' href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">
                <i class='fas fa-angle-left' style='font-size:24px'></i>
                </a> "; 
        }
        //tạo link tương ứng tới các trang
        for ($i=1 ; $i<=$maxPage ; $i++)
        { if ($i == $_GET['page'])
        { echo '<b class="btn btn-primary shadow">'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        } 
        else
        echo "<a class='btn btn-secondary shadow text-white-50' href=" .$_SERVER['PHP_SELF']. "?page="
        .$i.">".$i."</a> ";
        }
        //gắn thêm nút Next
        if ($_GET['page'] < $maxPage)
        { 
            echo "<a class='btn btn-dark shadow' href = ". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">
                <i class='fas fa-angle-right' style='font-size:24px'></i>
                </a> "; 
        }
        if($_GET['page'] != $maxPage){
            echo "<a class='btn btn-warning shadow' href=" .$_SERVER['PHP_SELF']."?page=".$maxPage.">
                <i class='fas fa-angle-double-right' style='font-size:24px'></i>
                </a> "; 
        }
        
        echo "</div>";
        echo "<p align='center' class='text-success'>Tổng số trang là: ".$maxPage ."</p>";
    }
    //Dong ket noi
    mysqli_close($dbc);
    ?>

    <?php
    include('includes/footer.html');
    ?>
</body>

</html>