<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Thêm nhân viên</title>
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
                        <h2>THÊM NHÂN VIÊN MỚI</h2>
                    </font>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td style="width: 150px;">Mã nhân viên: </td>
                <td><input type="text" class="form-control w-50 my-2" name="maNV" size="20" value="<?php if (isset($_POST['maNV'])) echo $_POST['maNV']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Họ tên nhân viên: </td>
                <td><input type="text" class="form-control w-50 my-2" name="hoTen" size="50" value="<?php if (isset($_POST['hoTen'])) echo $_POST['hoTen']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Ngày sinh: </td>
                <td><input type="text" class="form-control w-50 my-2" name="ngaySinh" size="50" value="<?php if (isset($_POST['ngaySinh'])) echo $_POST['ngaySinh']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Giới tính: </td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioiTinh" id="inlineRadio1" value="nam" 
                                <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nam") echo 'checked' ?> checked>
                        <label class="form-check-label mt-1" for="inlineRadio1">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioiTinh" id="inlineRadio2" value="nu" 
                                <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nu") echo 'checked' ?>>
                        <label class="form-check-label mt-1" for="inlineRadio2">Nữ</label>
                    </div>
                    

                    
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Địa chỉ: </td>
                <td><input type="text" class="form-control w-50 my-2" name="diaChi" size="50" value="<?php if (isset($_POST['diaChi'])) echo $_POST['diaChi']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Ảnh nhân viên: </td>
                <td><input type="FILE" class="form-control w-50 my-2" name="anh" size="80" value="<?php if (isset($_POST['anh'])) echo $_POST['anh']; ?>" /></td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Loại nhân viên:</td>
                <td><select name="loai_nv" class="form-control w-50 my-2 form-select">
                        <?php
                        $query = "select * from loainv";
                        $result = mysqli_query($dbc, $query);
                        if (mysqli_num_rows($result) <> 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $maLoaiNV = $row['maLoaiNV'];
                                $tenLoaiNV = $row['tenLoaiNV'];
                                echo "<option value='$maLoaiNV' ";
                                if (isset($_REQUEST['loai_nv']) && ($_REQUEST['loai_nv'] == $maLoaiNV)) echo "selected='selected'";
                                echo ">$tenLoaiNV</option>";
                            }
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;"></td>
                <td>Phòng ban: </td>
                <td><select name="phong_ban" class="form-control w-50 my-2 form-select">
                        <?php
                        $query = "select * from phongban";
                        $result = mysqli_query($dbc, $query);
                        if (mysqli_num_rows($result) <> 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $maPhong = $row['maPhong'];
                                $tenPhong = $row['tenPhong'];
                                echo "<option value='" . $maPhong . "' ";
                                if (isset($_REQUEST['phong_ban']) && ($_REQUEST['phong_ban'] == $maPhong)) echo "selected='selected'";
                                echo ">" . $tenPhong . "</option>";
                            }
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </td>
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
        //kiem tra ma nhan vien
        if (empty($_POST['maNV'])) {
            $errors[] = "Bạn chưa nhập mã nhân viên";
        } else {
            $maNV = trim($_POST['maNV']);
        }
        //kiểm tra họ tên nhân viên
        if (empty($_POST['hoTen'])) {
            $errors[] = "Bạn chưa nhập họ tên";
        } else {
            $hoTen = trim($_POST['hoTen']);
        }
        //kiểm tra ngày sinh
        if (empty($_POST['ngaySinh'])) {
            $errors[] = "Bạn chưa nhập ngày sinh";
        } else {
            $ngaySinh = trim($_POST['ngaySinh']);
        }
        //Gioi tinh
        $gioiTinh = ($_POST['gioiTinh'] == 'nam') ? 1 : 0;
        //kiểm tra địa chỉ
        if (empty($_POST['diaChi'])) {
            $errors[] = "Bạn chưa nhập địa chỉ";
        } else {
            $diaChi = trim($_POST['diaChi']);
        }
        //kiểm tra hình ảnh nhân viên và thực hiện upload file
        if ($_FILES['anh']['name'] != "") {
            $anh = $_FILES['anh'];
            $ten_anh = $anh['name'];
            $type = $anh['type'];
            $size = $anh['size'];
            $tmp = $anh['tmp_name'];
            if (($type == 'image/jpeg' || ($type == 'image/png') || ($type == 'image/jpg') || ($type == 'image/bmp') || ($type == 'image/gif') && $size < 8000)) {
                move_uploaded_file($tmp, "Images/" . $ten_anh);
            }
        }
        //cap nhat ma loai nv va ma phong ban
        $maLoaiNV = $_POST['loai_nv'];
        $maPhong = $_POST['phong_ban'];


        if (empty($errors)) //neu khong co loi xay ra
        {
            $query = "INSERT INTO nhanvien VALUES ('$maNV','$hoTen','$ngaySinh',$gioiTinh,'$diaChi','$ten_anh','$maLoaiNV','$maPhong')";
            $result = mysqli_query($dbc, $query);
            if (mysqli_affected_rows($dbc) == 1) { //neu them thanh cong
                echo "<div align='center'>Thêm mới thành công!</div>";
                $query = "Select nhanvien.*, tenLoaiNV, tenPhong 
                    from nhanvien, loainv, phongban
                    WHERE nhanvien.maLoaiNV = loainv.maLoaiNV and nhanvien.maPhong = phongban.maPhong
					AND maNV ='" . $maNV . "'";
                $result = mysqli_query($dbc, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;" class="mx-auto">
						<tr bgcolor="#eeeeee"><td colspan="2" align="center"><h3>' . $row['hoTen'] . ' - ' . $row['tenLoaiNV'] . ' - ' . $row['tenPhong'] . '</h3></td></tr>';
                    echo '<tr><td><img src="Images/' . $row['anh'] . '" style="width: 350px; height:250px; margin:5px"/></td>';
                    echo '<td><i><b>Ngày sinh:</i></b><br />' . $row['ngaySinh'] . '<br />';
                    echo '<i><b>Giới tính:</b></i>' . $row['gioiTinh'] . '<br />';
                    echo '<i><b>Địa chỉ: </b></i>' . $row['diaChi']. '<br />';
                    
                    echo "<i><b>Tên file: </b></i>" . $_FILES['anh']['name']. '<br />';
                    echo "<i><b>Kiểu file: </b></i>" . $_FILES['anh']['type']. '<br />';
                    echo "<i><b>Kích thước file: </b></i>" . ($_FILES['anh']['size']/1024) . " Kb". '<br />';
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