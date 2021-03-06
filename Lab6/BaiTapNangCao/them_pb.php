<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Thêm phòng ban</title>
</head>

<body>
    <?php
    include('includes/header.php');
    if(!isset($_SESSION['username']))
        echo("<script>location.href = 'index.php';</script>");
    require('connect.php');
    ?>
    <form action="" method="post" enctype="multipart/form-data" class="p-3">
        <table bgcolor="#f5f5f0" align="center" width="60%" border="0" class="mx-auto rounded shadow">
            <tr bgcolor="#ffd633">
                <td colspan="3" align="center">
                    <font color="#001a00">
                        <h2>THÊM PHÒNG BAN MỚI</h2>
                    </font>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td style="width: 150px;">Mã phòng ban: </td>
                <td><input type="text" class="form-control w-50 my-2" name="maPhong" size="20" value="<?php if (isset($_POST['maPhong'])) echo $_POST['maPhong']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Tên phòng ban: </td>
                <td><input type="text" class="form-control w-50 my-2" name="tenPhong" size="50" value="<?php if (isset($_POST['tenPhong'])) echo $_POST['tenPhong']; ?>" /></td>
            </tr>
            
            <tr>
                <td colspan="3" align="center"><input type="submit" name="them" size="10" value="Thêm mới" class="btn btn-primary my-2 shadow" /></td>
            </tr>
        </table>
    </form>
    <?php
    $ten_anh = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $errors = array(); //khởi tạo 1 mảng chứa lỗi
        //kiem tra ma loai nhan vien
        if (empty($_POST['maPhong'])) {
            $errors[] = "Bạn chưa nhập mã phòng ban";
        } else {
            $maPhong = trim($_POST['maPhong']);
        }
        //kiểm tra tên loai nhân viên
        if (empty($_POST['tenPhong'])) {
            $errors[] = "Bạn chưa nhập tên phòng ban";
        } else {
            $tenPhong = trim($_POST['tenPhong']);
        }

        if (empty($errors)) //neu khong co loi xay ra
        {
            $query = "INSERT INTO phongban VALUES ('$maPhong','$tenPhong')";
            $result = mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
                echo "<div align='center' style='font-size: 24px;font-weight:bold;margin:10px;'>Thêm mới thành công!</div>";
                $query = "Select *
                    from phongban
                    WHERE maPhong ='" . $maPhong . "'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;" class="mx-auto">
						<tr><td colspan="2" align="center">
                            <h3 class="p-3 shadow" style="border-radius:15px;background: linear-gradient(90deg, rgba(15,224,134,1) 0%, rgba(136,218,90,1) 30%, rgba(64,210,240,1) 100%);">'
                             . $row['maPhong'] . ' - ' . $row['tenPhong'] . '</h3>
                        </td></tr>';
                    echo '</td></tr></table>';
                    echo '<a href="phong.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang phòng ban</button></a>';
                }
            } else //neu khong them duoc
            {
                echo "<h1 class='text-center text-danger'>Có lỗi, không thể thêm được!</h1>";
                echo "<h6 class='text-center text-danger'>" . mysqli_error($dbc) . "<br/><br />Query: " . $query . "</h6>";
                echo '<a href="phong.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang phòng ban</button></a>';
            }
        } else { //neu co loi
            echo "<div class='text-center'>";
            echo "<h2>Có lỗi xảy ra:</h2><br/>";
            foreach ($errors as $msg) {
                echo "<div class='d-flex justify-content-center'>";
                echo "<h4 style='text-align: left; width:360px;'><i>- $msg <br/></i></h4>";
                echo "</div>";
            }
            echo "<h3 class='text-center text-danger'>Hãy thử lại.</h3>";
            echo "</div>";
            echo '<a href="phong.php"><button type="button" id="back-btn" class="btn btn-primary d-flex mx-auto shadow">
                            Quay lại trang phòng ban</button></a>';
        }
    }
    mysqli_close($dbc);
    include('includes/footer.html');
    ?>
</body>

</html>