<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- <title>QL Nhân viên</title>	 -->
	<link rel="stylesheet" href="./includes/style.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<div id="header">
		<h1>Quản lý</h1>
		<h2 style="margin-top: 10px;">nhân viên</h2>
	</div>
	<!-- <div id="navigation">
		<ul>
			<li><a href="index.php">Trang chủ</a></li>
			<li><a href="nhanvien.php">Nhân viên</a></li>
			<li><a href="phong.php">Phòng ban</a></li>
			<li><a href="loainv.php">Loại NV</a></li>
			<li><a href="timkiem_nv.php">Tìm kiếm NV</a></li>
			<li><a href="timkiem_loainv.php">Tìm kiếm loại NV</a></li>
			<li><a href="timkiem_pb.php">Tìm kiếm PB</a></li>
			<li><a href="them_nv.php">Thêm NV</a></li>
			<li><a href="them_loainv.php">Thêm loại NV</a></li>
			<li><a href="them_pb.php">Thêm phòng ban</a></li>
		</ul>
	</div> -->
	<div style="width:1500px; font-weight:bold;font-size:18px;" class="mx-auto">
		<nav class="navbar navbar-expand-sm navbar-dark rounded" style="background: linear-gradient(to right, #006699 0%, #9966ff 100%);">
		  <div class="container">
			<a class="navbar-brand" href="index.php"><i class='fas fa-home' style='font-size:20px'></i>Trang chủ</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			  <ul class="navbar-nav me-auto">
				<li class="nav-item">
				  <a class="nav-link" href="nhanvien.php">Nhân viên</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="loainv.php">Loại nhân viên</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="phong.php">Phòng ban</a>
				</li>  
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Thêm</a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="them_nv.php">Thêm nhân viên</a></li>
					<li><a class="dropdown-item" href="them_loainv.php">Thêm loại nhân viên</a></li>
					<li><a class="dropdown-item" href="them_pb.php">Thêm phòng ban</a></li>
				  </ul>
				</li>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tìm kiếm</a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="timkiem_nv.php">Tìm kiếm nhân viên</a></li>
					<li><a class="dropdown-item" href="timkiem_nv_loainv.php">Tìm kiếm nhân viên theo loại</a></li>
					<li><a class="dropdown-item" href="timkiem_nv_pb.php">Tìm kiếm nhân viên theo phòng</a></li>
					<li><a class="dropdown-item" href="timkiem_loainv.php">Tìm kiếm loại nhân viên</a></li>
					<li><a class="dropdown-item" href="timkiem_phongban.php">Tìm kiếm phòng ban</a></li>
					<li><a class="dropdown-item" href="timkiem_nangcao.php">Tìm kiếm nâng cao</a></li>
				  </ul>
				</li>
			  </ul>
			  <form class="d-flex" action="" method="post">
				  	<?php
					session_start();
					if(isset($_SESSION['username'])){
						// echo '<h5 class="mt-1 text-white">Xin chào: '.$_SESSION["username"].'</h5>&nbsp;&nbsp;
						// <button type="submit" name="btn-logout" class="btn btn-primary shadow">Đăng xuất</button>';
							echo '<h5 class="mt-1 text-white">Xin chào: ' . $_SESSION["username"] . '</h5>&nbsp;&nbsp;
						<button type="button" class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#myModal"
						>Đăng xuất</button>';
							echo '<div class="modal fade" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">

											<div class="modal-header">
												<h4 class="modal-title">Thông báo</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											</div>

											<div class="modal-body">
												<h4>Bạn có chắc chắn muốn đăng xuất?</h4>
											</div>

											<div class="modal-footer">
												<button type="submit" name="btn-logout" class="btn btn-primary">Đăng xuất</button>
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
											</div>

										</div>
									</div>
								</div>';
					}
					else{
						echo '<h5 class="mt-1 text-white">Bạn chưa đăng nhập</h5>&nbsp;&nbsp;
						<button type="submit" name="btn-login" class="btn btn-primary shadow">Đăng nhập</button>';
					}
					?>

					<!-- <h5 class="mt-1 text-white">Bạn chưa đăng nhập</h5>&nbsp;&nbsp;
					<button type="button" class="btn btn-primary shadow">Đăng nhập</button> -->
			  </form>
			</div>
		  </div>
		</nav>
	</div>
	<?php
	if(isset($_POST['btn-login'])){
		// header("Location: ./Login/index.php");
		echo("<script>location.href = './Login/index.php';</script>");
	}
	if(isset($_POST['btn-logout'])){
		// remove all session variables
		session_unset();
		// destroy the session
		session_destroy();
		echo("<script>location.href = 'index.php';</script>");
	}
	?>
	<div id="content"><!-- Start of the page-specific content. -->
<!-- Script 9.1 - header.html -->