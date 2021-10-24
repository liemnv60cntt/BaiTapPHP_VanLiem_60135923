<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Sửa</title>
</head>

<body>
    <?php
    include('includes/header.php');
    if(!isset($_SESSION['username']))
        echo("<script>location.href = 'index.php';</script>");
    require('connect.php');

    if ( (isset($_GET['maLoaiNV'])) ) { // From loainv.php
        $maLoaiNV = $_GET['maLoaiNV'];
    } elseif ( (isset($_POST['maLoaiNV']))) { // Form submission.
        $maLoaiNV = $_POST['maLoaiNV'];
    } else { // No valid ID, kill the script.
        echo '<p class="error">This page has been accessed in error.</p>';
        include ('includes/footer.html'); 
        exit();
    }
    //Lấy dữ liệu loại nhân viên theo mã loai NV
    $query_loainv = "SELECT tenLoaiNV FROM `loainv` WHERE maLoaiNV='$maLoaiNV';";
    $result_loainv = @mysqli_query($dbc, $query_loainv);
    $tenLoaiNV = '';

    if (mysqli_num_rows($result_loainv) == 1) {
        $row = mysqli_fetch_array ($result_loainv);
        $tenLoaiNV = $row['tenLoaiNV'];
    
    } else { // Not a valid user ID.
        echo '<p class="error">This page has been accessed in error.</p>';
    }
    mysqli_free_result($result_loainv);

    ?>
    <form action="" method="post" enctype="multipart/form-data" class="p-3">
        <table bgcolor="#f5f5f0" align="center" width="60%" border="0" class="mx-auto rounded shadow">
            <tr bgcolor="#ffd633">
                <td colspan="3" align="center">
                    <font color="#001a00">
                        <h2>SỬA THÔNG TIN LOẠI NHÂN VIÊN</h2>
                    </font>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td style="width: 150px;">Mã loại nhân viên: </td>
                <td><input type="text" class="form-control w-50 my-2" name="maLoaiNV" size="20" 
                    value="<?php if (isset($_POST['maLoaiNV'])) echo $_POST['maLoaiNV']; else echo $maLoaiNV;?>" readonly/></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Tên loại nhân viên: </td>
                <td><input type="text" class="form-control w-50 my-2" name="tenLoaiNV" size="50" 
                    value="<?php if (isset($_POST['tenLoaiNV'])) echo $_POST['tenLoaiNV']; else echo $tenLoaiNV;?>" /></td>
            </tr>

            <tr>
                <td colspan="3" align="center">
                    <input type="submit" name="sua" size="10" value="Lưu lại" class="btn btn-primary my-2 shadow" />
                    <a href="javascript:window.history.back(-1);" class="btn btn-secondary">Quay lại</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
    $ten_anh = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $errors = array(); //khởi tạo 1 mảng chứa lỗi
        
        //kiểm tra tên loại nv
        if (empty($_POST['tenLoaiNV'])) {
            $errors[] = "Bạn chưa nhập tên loại nhân viên";
        } else {
            $tenLoaiNV = trim($_POST['tenLoaiNV']);
        }

        if (empty($errors)) //neu khong co loi xay ra
        {
            $query = "UPDATE loainv SET
                tenLoaiNV = '$tenLoaiNV'
                WHERE maLoaiNV = '$maLoaiNV'";
            $result = mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
                echo "<h1 class='text-center text-danger'>Sửa thông tin thành công!</h1>";
                $query = "Select *
                    from loainv
                    WHERE maLoaiNV ='" . $maLoaiNV . "'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;" class="mx-auto">
						<tr><td colspan="2" align="center">
                        <h3 class="p-3 shadow" style="border-radius:15px;background: linear-gradient(90deg, rgba(15,224,134,1) 0%, rgba(136,218,90,1) 30%, rgba(64,210,240,1) 100%);">'
                         . $row['maLoaiNV'] . ' - ' . $row['tenLoaiNV'] . '</h3></td></tr>';
                    echo '</td></tr></table>';
                    echo '<a href="loainv.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto">
                            Quay lại trang loại nhân viên</button></a>';
                }
            } else //neu khong them duoc
            {
                echo "<h1 class='text-center text-danger'>Có lỗi, không thể sửa được!</h1>";
                echo "<h6 class='text-center text-danger'>" . mysqli_error($dbc) . "<br/><br />Query: " . $query . "</h6>";
                echo '<a href="loainv.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang loại nhân viên</button></a>';
            }
        } else { //neu co loi
            echo "<div class='text-center'>";
            echo "<h2>Có lỗi xảy ra:</h2><br/>";
            foreach ($errors as $msg) {
                echo "<div class='d-flex justify-content-center'>";
                echo "<h4 style='text-align: left; width:380px;'><i>- $msg <br/></i></h4>";
                echo "</div>";
            }
            echo "<h3 class='text-center text-danger'>Hãy thử lại.</h3>";
            echo "</div>";
            echo '<a href="loainv.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang loại nhân viên</button></a>';
        }
    }
    mysqli_close($dbc);
    include('includes/footer.html');
    ?>
</body>

</html>