<?php 
  session_start(); include '../includes/functions.php';

  if(!empty($_SESSION["login"])){
  header("location:index");
  }

  if (isset($_POST['login'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($password)) {
      $row = $db->get_row("SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
      if ($row) {
        $_SESSION['login']=$row->username;
        $_SESSION['id_login']=$row->id_admin;
        header("Location: index");
        exit;
      }
    }
    $error=true;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Login</title>
  </head>

  <body class="container col-md-3 mx-auto">
      <div class="d-flex justify-content-center my-3 pt-5">
        <div class="title">
          <h3><b>SAW - Login</b></h3>
        </div>
      </div>
    
      <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
          <p class="text-center m-0">Username atau password salah!</p>
        </div>
      <?php endif ?>

      <div>
        <form action="" method="POST">
          <div class="form-group">
            <input type="text" class="form-control text-center" id="username" name="username" size="30px" placeholder="Username" autocomplete="off" style="padding: 10px; height: 45px;">
          </div>
          <div class="form-group">
            <input type="password" class="form-control text-center" id="password" name="password" size="30px" placeholder="Password" autocomplete="off" style="padding: 10px; height: 45px;">
          </div>
          <div class="text-center">
            <button type="submit" name="login" class="btn btn-primary text-center w-100 " style="padding: 8px;">Log In</button>
          </div>
        </form>
      </div>

      <div class="text-center my-3">
        <a href="../index" data-toggle="modal" data-target=".bd-example-modal-sm">Kembali ke halaman utama</a>  
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
