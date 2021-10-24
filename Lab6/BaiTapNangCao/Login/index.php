<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body style="background-image: url('assets/images/bg_2.png');">
  <?php
  $err = "";
  $username = '';
  $pwd = '';
  if (isset($_POST['login'])) {
   
    if($_POST['username'] == null){
      $err = "Vui lòng nhập username!";    
    }else{
      $username = $_POST['username'];
    
      if($_POST['pwd'] == null){
        $err = "Vui lòng nhập password!";
      }else{
        $pwd = $_POST['pwd'];
      }
    }
    if($username && $pwd){
      require("../connect.php");
      $sql="select * from users where username='".$username."' and password='".$pwd."'";
      $result = mysqli_query($dbc, $sql);
      if(mysqli_num_rows($result) == 0) 
        $err = "Username và password không đúng, vui lòng thử lại";
      else
      { 
        $row=mysqli_fetch_array($result); 
        session_start(); 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['level'] = $row['level']; 
        $_SESSION['isLogin'] = true; 
        header("Location: ../index.php");
      } 
    }
  }
  // echo $err;
  ?>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0 shadow">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/emloyee.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <!-- <img src="assets/images/login_logo.jpg" alt="logo" class="logo"> -->
              </div>
              <h1 class="login-card-description">Đăng nhập tài khoản</h1>
              <form action="" name="formlogin" method="post">
                <div class="form-group">
                  <label for="username" class="sr-only">Username</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo $username ?>">
                </div>
                <div class="form-group mb-4">
                  <label for="pwd" class="sr-only">Password</label>
                  <input type="password" name="pwd" id="pwd" class="form-control" placeholder="***********" value="<?php echo $pwd ?>">
                </div>
                <h6 class="text-danger text-center"><?php echo $err ?></h6>
                <input name="login" id="login" class="btn btn-block login-btn mb-4 shadow" type="submit" value="Đăng nhập">
              </form>
              <!-- <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav> -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>