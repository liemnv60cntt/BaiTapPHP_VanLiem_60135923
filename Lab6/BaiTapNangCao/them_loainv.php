<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Thêm loại nhân viên</title>
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
                        <h2>THÊM LOẠI NHÂN VIÊN MỚI</h2>
                    </font>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td style="width: 150px;">Mã loại nhân viên: </td>
                <td><input type="text" class="form-control w-50 my-2" name="maLoaiNV" size="20" value="<?php if (isset($_POST['maLoaiNV'])) echo $_POST['maLoaiNV']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Tên loại nhân viên: </td>
                <td><input type="text" class="form-control w-50 my-2" name="tenLoaiNV" size="50" value="<?php if (isset($_POST['tenLoaiNV'])) echo $_POST['tenLoaiNV']; ?>" /></td>
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
        if (empty($_POST['maLoaiNV'])) {
            $errors[] = "Bạn chưa nhập mã loại nhân viên";
        } else {
            $maLoaiNV = trim($_POST['maLoaiNV']);
        }
        //kiểm tra tên loai nhân viên
        if (empty($_POST['tenLoaiNV'])) {
            $errors[] = "Bạn chưa nhập tên loại nhân viên";
        } else {
            $tenLoaiNV = trim($_POST['tenLoaiNV']);
        }

        if (empty($errors)) //neu khong co loi xay ra
        {
            $query = "INSERT INTO loainv VALUES ('$maLoaiNV','$tenLoaiNV')";
            $result = mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
                echo "<div align='center'>Thêm mới thành công!</div>";
                $query = "Select *
                    from loainv
                    WHERE maLoaiNV ='" . $maLoaiNV . "'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;" class="mx-auto">
						<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['maLoaiNV'] . ' - ' . $row['tenLoaiNV'] . '</h3></td></tr>';
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