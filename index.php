<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popcorn.js"></script>

    <title>SAW - Pemilihan Laptop</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white" id="navbar">
    	<div class="container">
		  <a class="navbar-brand mr-4" href="index"><b>SAW</b></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

          <?php if (isset($_GET['m'])) { $aktif = $_GET['m']; }else{ $aktif = ''; } ?>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	  		<ul class="navbar-nav mr-auto">
		    </ul>
		    <div> <!-- class="d-flex justify-content-end" -->
		    	<ul class="navbar-nav">
			      <li class="nav-item <?php if (!$aktif=='produk' || !$aktif=='tentang') { echo "active"; } ?>">
			        <a class="nav-link mr-3" href="index">Beranda <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item <?php if ($aktif=='produk') { echo 'active'; } ?>">
			        <a class="nav-link mr-3" href="index?m=produk">Produk</a>
			      </li>
			      <li class="nav-item <?php if ($aktif=='tentang') { echo 'active'; } ?>">
			        <a class="nav-link mr-3" href="index?m=tentang">Tentang</a>
			      </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="admin/login">Login</a>
                  </li> -->
			    </ul>
			</div>
		  </div>
		</div>
	</nav>

	<div class="container">
		<?php 
            require_once'includes/functions.php';
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
		
		<hr class="mt-4">
		<div class="mx-auto text-center my-4">
	       Sistem Pendukung Keputusan Pemilihan Laptop Dengan Metode <i>Simple Additive Weighting</i> oleh <a href="http://rpangarego.netlify.app" target="_blank" ref="noopener noreferrer" class="font-weight-bold">Ronaldo Pangarego</a>

		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

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