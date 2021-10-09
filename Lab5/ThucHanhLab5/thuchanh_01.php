<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./style1.css">
    <title>Bài TH</title>
</head>

<body>
    <?php

    abstract class Nguoi
    {
        protected $hoTen, $diaChi, $gioiTinh;
        public function setHoTen($hoTen)
        {
            $this->hoTen = $hoTen;
        }
        public function getHoTen()
        {
            return $this->hoTen;
        }
        public function setDiaChi($diaChi)
        {
            $this->diaChi = $diaChi;
        }
        public function getDiaChi()
        {
            return $this->diaChi;
        }
        public function setGioiTinh($gioiTinh)
        {
            $this->gioiTinh = $gioiTinh;
        }
        public function getGioiTinh()
        {
            return $this->gioiTinh;
        }
    }
    class SinhVien extends Nguoi
    {
        private $lopHoc, $nganhHoc;
        public function setLopHoc($lopHoc)
        {
            $this->lopHoc = $lopHoc;
        }
        public function getLopHoc()
        {
            return $this->lopHoc;
        }
        public function setNganhHoc($nganhHoc)
        {
            $this->nganhHoc = $nganhHoc;
        }
        public function getNganhHoc()
        {
            return $this->nganhHoc;
        }
        //Tính điểm thưởng
        public function tinhDiemThuong($nganhHoc)
        {
            switch ($nganhHoc) {
                case "CNTT":
                    return 1;
                    break;
                case "Kinh tế":
                    return 1.5;
                    break;
                default:
                    return 0;
                    break;
            }
        }
    }
    class GiangVien extends Nguoi
    {
        private $trinhDo;
        const luongCoBan = 1500000;
        public function setTrinhDo($trinhDo)
        {
            $this->trinhDo = $trinhDo;
        }
        public function getTrinhDo()
        {
            return $this->trinhDo;
        }
        public function __construct($hoTen, $gioiTinh, $diaChi, $trinhDo)
        {
            $this->hoTen = $hoTen;
            $this->gioiTinh = $gioiTinh;
            $this->diaChi = $diaChi;
            $this->trinhDo = $trinhDo;
        }
        //Tính điểm thưởng
        public function tinhLuong($trinhDo)
        {
            switch ($trinhDo) {
                case "Cử nhân":
                    return self::luongCoBan * 2.34;
                    break;
                case "Thạc sĩ":
                    return self::luongCoBan * 3.67;
                    break;
                case "Tiến sĩ":
                    return self::luongCoBan * 5.66;
                    break;
            }
        }
    }
    $str = NULL;
    $x = '';
    $y = '';
    if (isset($_POST['hienThi'])) {
        $doiTuong = isset($_POST['doiTuong']) ? $_POST['doiTuong'] : '';
        $hoTen = isset($_POST['hoTen']) ? $_POST['hoTen'] : '';
        $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : '';
        $diaChi = isset($_POST['diaChi']) ? $_POST['diaChi'] : '';
        $trinhDo = isset($_POST['trinhDo']) ? $_POST['trinhDo'] : '';
        $lopHoc = isset($_POST['lopHoc']) ? $_POST['lopHoc'] : '';
        $nganhHoc = isset($_POST['nganhHoc']) ? $_POST['nganhHoc'] : '';
        $chucVu = '';
        if ($doiTuong == 'gv') {
            // $x = "Trình độ";
            $gv = new GiangVien($hoTen, $gioiTinh, $diaChi, $trinhDo);
            $chucVu = "Giảng viên";
            // $gv->setHoTen($hoTen);
            // $gv->setGioiTinh($gioiTinh);
            // $gv->setDiaChi($diaChi);
            // $gv->setTrinhDo($trinhDo);
            $str = "Chức vụ: " . $chucVu . "<br>Họ tên: " . $gv->getHoTen() . "<br>" .
                "Giới tính: " . $gv->getGioiTinh() . "<br>" . "Địa chỉ: " . $gv->getDiaChi() . "<br>" . $gv->getTrinhDo()
                . "<br>Lương: " . $gv->tinhLuong($gv->getTrinhDo());
        }
        if ($doiTuong == 'sv') {
            // $x = "Lớp học";
            // $y = "Ngành học";
            $sv = new SinhVien();
            $chucVu = "Sinh viên";
            $sv->setHoTen($hoTen);
            $sv->setGioiTinh($gioiTinh);
            $sv->setDiaChi($diaChi);
            $sv->setLopHoc($lopHoc);
            $sv->setNganhHoc($nganhHoc);
            $str = "Chức vụ: " . $chucVu . "<br>Họ tên: " . $sv->getHoTen() . "<br>" . 
                "Giới tính: " . $sv->getGioiTinh() . "<br>" . "Địa chỉ: " . $sv->getDiaChi() . 
                "<br>Lớp học: ".$sv->getLopHoc()."<br> Ngành học: ".$sv->getNganhHoc().
                "<br>Điểm thưởng: ".$sv->tinhDiemThuong($sv->getNganhHoc());
        }
    }
    if(isset($_POST['chon'])){
        $doiTuong = isset($_POST['doiTuong']) ? $_POST['doiTuong'] : '';
        if ($doiTuong == 'gv'){
            $x = "Trình độ";
        }
        if ($doiTuong == 'sv'){
            $x = "Lớp học";
            $y = "Ngành học";
        }
    }


    ?>
    <form action="" method="post">
        <fieldset>
            <legend>THÔNG TIN GIẢNG VIÊN, SINH VIÊN</legend>
            <table border='0'>
                <tr>
                    <td>Chọn đối tượng</td>
                    <td>
                        <input type="radio" name="doiTuong" value="gv" <?php if (isset($_POST['doiTuong']) && ($_POST['doiTuong']) == "gv") echo 'checked' ?> />Giảng viên
                        <input type="radio" name="doiTuong" value="sv" <?php if (isset($_POST['doiTuong']) && ($_POST['doiTuong']) == "sv") echo 'checked' ?> />Sinh viên
                        <input type="submit" name="chon" value="Chọn" class="btn" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="_err">Click nút chọn sau khi nhập thông tin bên dưới</td>
                </tr>
                <tr>
                    <td>Họ tên:</td>
                    <td><input type="text" name="hoTen" value="<?php if (isset($_POST['hoTen'])) echo $_POST['hoTen']; ?>" required /></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td>
                        <input type="radio" name="gioiTinh" value="Nam" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "Nam") echo 'checked' ?> />Nam
                        <input type="radio" name="gioiTinh" value="Nữ" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "Nữ") echo 'checked' ?> />Nữ
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="diaChi" value="<?php if (isset($_POST['diaChi'])) echo $_POST['diaChi']; ?>" required /></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo $x
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($x == "Trình độ")
                            echo "<input type='text' name='trinhDo' value=''/>";
                        else if($x == "Lớp học")
                            echo "<input type='text' name='lopHoc' value=''/>";
                        else
                            echo "";
                        ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if ($y == "Ngành học")
                            echo $y;
                        else
                            echo "";
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($y == "Ngành học")
                            echo "<input type='text' name='nganhHoc' value=''/>";
                        else
                            echo "";
                        ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="hienThi" value="Hiển thị thông tin" class="btn" /></td>
                </tr>

            </table>
            <?php
            echo "Thông tin: <br>";
            echo $str;
            ?>
            <!-- <table border='0'>
                <tr>
                    <th colspan="2" align="center">Kết quả</th>
                </tr>
				<tr>
					<td>Đối tượng</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td>Họ tên:</td>
					<td>

                    </td>
				</tr>
				<tr>
					<td>Giới tính:</td>
					<td>
                        
                    </td>
				</tr>
                <tr>
					<td>Địa chỉ:</td>
					<td>

                    </td>
				</tr>
				
				
			</table> -->
        </fieldset>
    </form>

</body>

</html>