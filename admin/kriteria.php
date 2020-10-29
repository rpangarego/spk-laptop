<div class="mt-3 mb-4">
	<span class="h3">Kriteria</span>
</div>

<?php include 'notifikasi.php'; ?>
<?php 
    if(isset($_GET['sm'])){
        $page = $_GET['sm'].".php";
        if (file_exists($page)) {
            $active = $_GET['sm'];
        }
    }else{
        $active = 'active';
    }
?>	

<ul class="nav nav-tabs mb-3">
<!--   <li class="nav-item">
    <a class="nav-link <?php if ($active=='layar') { echo 'active'; } ?>" 
       href="index?m=kriteria&sm=layar">Layar</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link <?php if ($active=='processor') { echo "active"; } ?>" 
       href="index?m=kriteria&sm=processor">Processor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($active=='memori') { echo "active"; } ?>" 
       href="index?m=kriteria&sm=memori">Memori</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($active=='penyimpanan') { echo "active"; } ?>" 
       href="index?m=kriteria&sm=penyimpanan">Penyimpanan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($active=='jenispenyimpanan') { echo "active"; } ?>" 
       href="index?m=kriteria&sm=jenispenyimpanan">Jenis Penyimpanan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($active=='kartugrafis') { echo "active"; } ?>" 
       href="index?m=kriteria&sm=kartugrafis">Kartu Grafis</a>
  </li>
</ul>

<?php 
    // require_once'../includes/functions.php';
    if(isset($_GET['sm'])){
        $page = $_GET['sm'].".php";

        if (file_exists($page)) {
            include $page;
            $active = $_GET['sm'];
        }else{
            echo "<div class='mt-3'>";
            echo "The file $page not exists";
            echo "</div>";
        }
    }else{
        include "layar.php";
    }
?>


