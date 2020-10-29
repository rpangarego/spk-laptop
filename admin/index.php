<?php session_start(); 
    require_once'../includes/functions.php';
    if ($_SESSION['login'] == '') {
        redirect_js("login");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>[Admin] SAW - Pemilihan Laptop</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Font Awesome JS -->
    <script defer src="../js/solid.js"></script>
    <script defer src="../js/fontawesome.js"></script>
    <!-- <script src="https://kit.fontawesome.com/f2790127a6.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5><b>SAW</b> - Admin</h5>
            </div>
            <?php if (isset($_GET['m'])) { $aktif = $_GET['m']; }else{ $aktif = ''; } ?>
            <ul class="list-unstyled components">
                <p>Hello, <?= ucfirst($_SESSION["login"]); ?></p>
                <li><a href="index" 
                    class="<?php if (!$aktif=='kriteria' || !$aktif=='produk' || !$aktif=='admin') { echo "font-weight-bold"; } ?>">Beranda</a>
                </li>
                <li><a href="index?m=kriteria&sm=processor" 
                    class="<?php if ($aktif=='kriteria') { echo "font-weight-bold"; } ?>">Kriteria</a>
                </li>
                <li><a href="index?m=produk" 
                    class="<?php if ($aktif=='produk') { echo "font-weight-bold"; } ?>">Produk</a>
                </li>
                <li><a href="index?m=admin"
                    class="<?php if ($aktif=='admin') { echo "font-weight-bold"; } ?>">Data Admin</a>
                </li>
            </ul>
            <ul class="list-unstyled">
                <li><a href="logout" class="log-out">Log Out</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-white" id="sidebarCollapse" >
                <div class="container-fluid">
                    <button type="button "class="btn">
                        <i class="fa fa-align-left"></i>
                        <span> Menu</span>
                    </button>
                </div>
            </nav>

            <?php 
                if(isset($_GET['m'])){
                    $page = $_GET['m'].".php";

                    if (file_exists($page)) {
                        include $page;
                    }else{
                        echo "<div class='mt-3'>";
                        echo "The file $page not exists";
                        echo "</div>";
                    //     echo '<center><img src="img/404_error.png" 
                    //         width="60%"></center>';
                    }
                }else{
                    include "beranda.php";
                }
            ?>
        </div>
    </div>
    
    <!-- jQuery CDN - -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <!-- JS:Notification -->
    <script> 
        const notif = document.querySelector('.notif');
        if (notif.style.display= 'inline-block') {
            setTimeout(function(){
                notif.style.display = 'none';
            },3000);
        }
        const close = document.querySelectorAll('.notif-close');
        close[0].addEventListener('click', function(e) {
            e.target.parentElement.style.display = 'none';
        });
    </script>
</body>
</html>