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
    include('includes/header.html');
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
                echo "<div align='center'>Thêm mới thành công!</div>";
                $query = "Select *
                    from phongban
                    WHERE maPhong ='" . $maPhong . "'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;" class="mx-auto">
						<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['maPhong'] . ' - ' . $row['tenPhong'] . '</h3></td></tr>';
                    echo '</td></tr></table>';
                }
            } else //neu khong them duoc
            {
                echo "<p>Có lỗi, không thể thêm được</p>";
                echo "<p>" . mysqli_error($dbc) . "<br/><br />Query: " . $query . "</p>";
            }
        } else { //neu co loi
            echo "<div class='text-center'>";
            echo "<h2>Có lỗi xảy ra:</h2><br/>";
            foreach ($errors as $msg) {
                echo "- $msg<br />";
            }
            echo "</p><p>Hãy thử lại.</p>";
            echo "</div>";
        }
    }
    mysqli_close($dbc);
    include('includes/footer.html');
    ?>
</body>

</html>