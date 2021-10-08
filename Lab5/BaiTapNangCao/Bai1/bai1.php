<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./style_bai1.css">
	<title>Bài 1</title>
</head>

<body>
	<?php

abstract class Hinh
	{
		protected $ten, $dodai;
		public function setTen($ten)
		{
			$this->ten = $ten;
		}
		public function getTen()
		{
			return $this->ten;
		}
		public function setDodai($doDai)
		{
			$this->dodai = $doDai;
		}
		public function getDodai()
		{
			return $this->dodai;
		}
		abstract public function tinh_CV();
		abstract public function tinh_DT();
	}
	class HinhTron extends Hinh
	{
		const PI = 3.14;
		function tinh_CV()
		{
			return round($this->dodai[0] * 2 * self::PI,2);
		}
		function tinh_DT()
		{
			return round(pow($this->dodai[0], 2) * self::PI,2);
		}
	}
	class HinhVuong extends Hinh
	{
		public function tinh_CV()
		{
			return round($this->dodai[0] * 4,2);
		}
		public function tinh_DT()
		{
			return round(pow($this->dodai[0], 2),2);
		}
	}
	class HinhTamGiacDeu extends Hinh{
		public function tinh_CV()
		{
			return round($this->dodai[0] * 3,2);
		}
		public function tinh_DT()
		{
			return round(pow($this->dodai[0], 2)*(sqrt(3)/4),2);
		}
	}
	class HinhTamGiacThuong extends Hinh{
		
		public function tinh_CV()
		{
			return round(array_sum($this->dodai),2);
		}
		public function tinh_DT()
		{
			$p = array_sum($this->dodai)/2;
			return round(sqrt($p*($p-$this->dodai[0])*($p-$this->dodai[1])*($p-$this->dodai[2])) ,2);
		}
	}
	class HinhChuNhat extends Hinh{
		
		public function tinh_CV()
		{
			return round(($this->dodai[0] + $this->dodai[1])*2 ,2);
		}
		public function tinh_DT()
		{
			return round($this->dodai[0] * $this->dodai[1] ,2);
		}
	}
	$str = NULL;
	$err = [];
	if (isset($_POST['tinh'])) {
		$hinh = $_POST['hinh'];
		$ten = trim($_POST['ten']);
		$doDai = trim($_POST['dodai']);
		$arr = explode(",",$doDai);
		$kiemTra = true; //Kiểm tra giá trị độ dài có <=0 hay không
		foreach($arr as $v){
			if($v <=0){
				$kiemTra = false;
				break;
			}
		}
		if($kiemTra == true){
			if ($hinh == 'hv') {
				if(count($arr) == 1){
					$hv = new HinhVuong();
					$hv->setTen($ten);
					$hv->setDodai($arr);
					$str = "Diện tích hình vuông " . $hv->getTen() . " là : " . $hv->tinh_DT() . " \n" .
						"Chu vi của hình vuông " . $hv->getTen() . " là : " . $hv->tinh_CV();
				}
				else{
					array_push($err, "Chỉ cần nhập 1 giá trị độ dài cho hình vuông");
				}
			}
			if ($hinh == 'ht') {
				if(count($arr) == 1){
					$ht = new HinhTron();
					$ht->setTen($ten);
					$ht->setDodai($arr);
					$str = "Diện tích của hình hình tròn " . $ht->getTen() . " là : " . $ht->tinh_DT() . " \n" .
					"Chu vi của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_CV();
				}
				else{
					array_push($err, "Chỉ cần nhập 1 giá trị độ dài cho hình tròn");
				}
			}
			if ($hinh == 'tgd') {
				if(count($arr) == 1){
					$tgd = new HinhTamGiacDeu();
					$tgd->setTen($ten);
					$tgd->setDodai($arr);
					$str = "Diện tích của hình tam giác đều " . $tgd->getTen() . " là : " . $tgd->tinh_DT() . " \n" .
						"Chu vi của hình tam giác đều " . $tgd->getTen() . " là : " . $tgd->tinh_CV();
					}
				else{
					array_push($err, "Chỉ cần nhập 1 giá trị độ dài cho hình tam giác đều");
				}
			}
			if ($hinh == 'tgt') {
				if(count($arr) == 3){
					if(($arr[0]+$arr[1])>$arr[2] && ($arr[0]+$arr[2])>$arr[1] && ($arr[2]+$arr[1])>$arr[0]){
						$tgt = new HinhTamGiacThuong();
						$tgt->setTen($ten);
						$tgt->setDodai($arr);
						$str = "Diện tích của hình tam giác thường " . $tgt->getTen() . " là : " . $tgt->tinh_DT() . " \n" .
							"Chu vi của hình tam giác thường " . $tgt->getTen() . " là : " . $tgt->tinh_CV();
					}
					else{
						array_push($err, "Giá trị 3 cạnh vừa nhập không phải 3 cạnh của tam giác");
					}
				}
				else{
					array_push($err, "Cần nhập 3 giá trị độ dài cho hình tam giác thường");
				}
			}
			if ($hinh == 'hcn') {
				if(count($arr) == 2){
					$hcn = new HinhChuNhat();
					$hcn->setTen($ten);
					$hcn->setDodai($arr);
					$str = "Diện tích của hình chữ nhật " . $hcn->getTen() . " là : " . $hcn->tinh_DT() . " \n" .
						"Chu vi của hình chữ nhật " . $hcn->getTen() . " là : " . $hcn->tinh_CV();
					}
				else{
					array_push($err, "Cần nhập 2 giá trị độ dài cho hình chữ nhật");
				}
			}
			
		}
		else{
			array_push($err, "Giá trị của cạnh phải lớn hơn 0");
		}
	}
	else{
		array_push($err, "Vui lòng chọn hình cần tính!");
	}
	?>
	<form action="" method="post">
		<fieldset>
			<legend>Tính chu vi và diện tích các hình đơn giản</legend>
			<table border='0'>
				<tr>
					<td>Chọn hình</td>
					<td>
						<input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked' ?> />Hình vuông
						<input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked' ?> />Hình tròn
						<input type="radio" name="hinh" value="tgd" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tgd") echo 'checked' ?> />Hình tam giác đều
						<input type="radio" name="hinh" value="tgt" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tgt") echo 'checked' ?> />Hình tam giác thường
						<input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") echo 'checked' ?> />Hình chữ nhật
					</td>
				</tr>
				<tr>
					<td>Nhập tên:</td>
					<td><input type="text" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten'];?>" required/></td>
				</tr>
				<tr>
					<td>Nhập độ dài:</td>
					<td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" pattern="[0-9,.]*" required/></td>
				</tr>
				<tr>
					<td>Kết quả:</td>
					<td><textarea name="ketqua" cols="70" rows="4" readonly><?php echo $str; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH" class="btn"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center" id="_err">
						<?php
						foreach($err as $v){
							echo $v . "\n";
						} 
						?>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>

</html>