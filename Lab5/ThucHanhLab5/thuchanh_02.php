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
    $inp_x = '';
    $y = '';
    $inp_y = '';
    if (isset($_POST['hienThi'])) {
        $doiTuong = isset($_POST['doiTuong']) ? $_POST['doiTuong'] : '';
        $hoTen = isset($_POST['hoTen']) ? $_POST['hoTen'] : '';
        $gioiTinh = isset($_POST['gioiTinh']) ? $_POST['gioiTinh'] : '';
        $diaChi = isset($_POST['diaChi']) ? $_POST['diaChi'] : '';
        $trinhDo = isset($_POST['trinhDo']) ? $_POST['trinhDo'] : '';
        $lopHoc = isset($_POST['lopHoc']) ? $_POST['lopHoc'] : '';
        $nganhHoc = isset($_POST['nganhHoc']) ? $_POST['nganhHoc'] : '';
        if ($doiTuong == 'gv') {
            // $x = "Trình độ";
            $gv = new GiangVien($hoTen, $gioiTinh, $diaChi, $trinhDo);
            // $gv->setHoTen($hoTen);
            // $gv->setGioiTinh($gioiTinh);
            // $gv->setDiaChi($diaChi);
            // $gv->setTrinhDo($trinhDo);
            $str = "Thông tin giảng viên: <br>Họ tên: " . $gv->getHoTen() . "<br>" .
                "Giới tính: " . $gv->getGioiTinh() . "<br>" . "Địa chỉ: " . $gv->getDiaChi() . "<br>Trình độ: " . $gv->getTrinhDo()
                . "<br>Lương: " . $gv->tinhLuong($gv->getTrinhDo());
            $x = "Trình độ";
            // $inp_x = "<input type='text' name='trinhDo' value='$trinhDo' />";
            $check_td1 = ($trinhDo == "Cử nhân") ? "selected" : "";
            $check_td2 = ($trinhDo == "Thạc sĩ") ? "selected" : "";
            $check_td3 = ($trinhDo == "Tiến sĩ") ? "selected" : "";
            $inp_x = 
            "<select name='trinhDo'>
            <option value='Cử nhân' $check_td1>Cử nhân</option>
            <option value='Thạc sĩ' $check_td2>Thạc sĩ</option>
            <option value='Tiến sĩ' $check_td3>Tiến sĩ</option>
            </select>";
        }
        if ($doiTuong == 'sv') {
            // $x = "Lớp học";
            // $y = "Ngành học";
            $sv = new SinhVien();
            $sv->setHoTen($hoTen);
            $sv->setGioiTinh($gioiTinh);
            $sv->setDiaChi($diaChi);
            $sv->setLopHoc($lopHoc);
            $sv->setNganhHoc($nganhHoc);
            $str = "Thông tin sinh viên: <br>Họ tên: " . $sv->getHoTen() . "<br>" .
                "Giới tính: " . $sv->getGioiTinh() . "<br>" . "Địa chỉ: " . $sv->getDiaChi() .
                "<br>Lớp học: " . $sv->getLopHoc() . "<br> Ngành học: " . $sv->getNganhHoc() .
                "<br>Điểm thưởng: " . $sv->tinhDiemThuong($sv->getNganhHoc());
            $x = "Lớp học: ";
            $inp_x = "<input type='text' name='lopHoc' value='$lopHoc' />";
            $y = "Ngành học";
            $check_nh1 = ($nganhHoc == "CNTT") ? "selected" : "";
            $check_nh2 = ($nganhHoc == "Kinh tế") ? "selected" : "";
            $check_nh3 = ($nganhHoc == "Ngành khác") ? "selected" : "";
            $inp_y = 
            "<select name='nganhHoc'>
            <option value='CNTT' $check_nh1>CNTT</option>
            <option value='Kinh tế' $check_nh2>Kinh tế</option>
            <option value='Ngành khác' $check_nh3>Ngành khác</option>
            </select>";
        }
    }

    ?>
    <form action="" method="post">
        <fieldset>
            <legend>THÔNG TIN GIẢNG VIÊN, SINH VIÊN</legend>
            <table border='0'>
                <tr>
                    <td>Chọn đối tượng: </td>
                    <td>
                        <input type="radio" name="doiTuong" value="gv" onclick='giangVien()' 
                            <?php if (isset($_POST['doiTuong']) && ($_POST['doiTuong']) == "gv") echo 'checked' ?> />Giảng viên
                        <input type="radio" name="doiTuong" value="sv" onclick='sinhVien()' 
                            <?php if (isset($_POST['doiTuong']) && ($_POST['doiTuong']) == "sv") echo 'checked' ?> />Sinh viên
                        <!-- <input type="submit" name="chon" value="Chọn" class="btn" /> -->
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="_err">Cần click chọn đối tượng</td>
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
                    <td id="_t1"><?php echo $x ?> </td>
                    <td id="_t2"><?php echo $inp_x ?> </td>
                </tr>
                <tr>
                    <td id="_t3"><?php echo $y ?> </td>
                    <td id="_t4"><?php echo $inp_y ?> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="hienThi" value="Hiển thị thông tin" class="btn" /></td>
                </tr>

            </table>
            <?php
            echo $str;
            ?>
        </fieldset>
    </form>
    <script>
        function giangVien() {
            document.getElementById("_t1").innerHTML = "Trình độ: ";
            // document.getElementById("_t2").innerHTML ="<input type='text' name='trinhDo' value='' />";
            document.getElementById("_t2").innerHTML =
            "<select name='trinhDo'><option value='Cử nhân' selected>Cử nhân</option><option value='Thạc sĩ' >Thạc sĩ</option><option value='Tiến sĩ' >Tiến sĩ</option></select>";

            document.getElementById("_t3").innerHTML = "";
            document.getElementById("_t4").innerHTML = "";
        }
        function sinhVien() {
            document.getElementById("_t1").innerHTML = "Lớp học: ";
            document.getElementById("_t2").innerHTML ="<input type='text' name='lopHoc' value='' />";
            document.getElementById("_t3").innerHTML = "Ngành học";
            // document.getElementById("_t4").innerHTML = "<input type='text' name='nganhHoc' value='' />";
            document.getElementById("_t4").innerHTML =
            "<select name='nganhHoc'><option value='CNTT' selected>CNTT</option><option value='Kinh tế' >Kinh tế</option><option value='Ngành khác' >Ngành khác</option></select>";
        }
    </script>
</body>

</html>