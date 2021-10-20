<!DOCTYPE html>
<html lang="vi">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./includes/style.css">
</head>

<body>
  <?php
  // Ket noi CSDL
  require("connect.php");
  // Chuan bi cau truy van & Thuc thi cau truy van
  $_username = "SELECT username, password FROM users";
  $result1 = mysqli_query($dbc, $_username);
  // $_password = "SELECT password FROM users WHERE username='$_username'";
  // $result2 = mysqli_query($dbc, $_password);
  $arr_kq = [];
  if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
      // var_dump($row);
      // duyệt qua từng dòng và thêm vào mảng kết quả
      array_push($arr_kq, $row);
    }
  } else {
    echo 'Khong co du lieu';
  }
  // mysqli_close($connect);

  echo "<pre>";
  var_dump($arr_kq);
  echo "</pre>";
  //Kiểm tra Input
  $err = "";
  $username = (isset($_POST['username'])) ? $_POST['username'] : '';
  $pwd = (isset($_POST['pwd'])) ? $_POST['pwd'] : '';
  if(isset($_POST['login'])){
    if($username != null && $pwd != null){
      foreach($arr_kq as $key=>$value){
          if($username == $value['username'] && $pwd == $value['password']){
            // echo "Thành công";
            header("Location: index.php");
            // break;
          }
          else{
            $err = "Sai tài khoản hoặc mật khẩu";
            $action = "";
            // break;
          }
      }
    }
    else{
      $err = "Vui lòng nhập username và password!";
    }
  }
  // echo $err;

  

  ?>
  <div class="container p-2  mt-5 rounded">
    <h2>Đăng nhập</h2>
    <form action="" name="formlogin" method="post">
      <div class="mb-3 mt-3">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $username ?>">
      </div>
      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo $pwd ?>">
      </div>
      <h3 class="text-danger"><?php echo $err ?></h3>
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
  </div>

</body>

</html>