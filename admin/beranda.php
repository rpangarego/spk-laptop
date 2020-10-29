<h3 class="my-3">Beranda</h3>

<div class="jumbotron jumbotron-fluid bg-white">
  <div class="container">
    <h1 class="font-weight-normal">Sistem Pendukung Keputusan</h1>
    <h2 class="font-weight-light">Pemilihan Laptop Metode <i>Simple Additive Weighting</i> Berbasis Web</h2>
    <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
  </div>
</div>

<!-- <div class="notif">
	<div class="notif-close">&times;</div>
	<div class="notif-body">
		<b>Welcome Back Boss!</b>
		<br>
		Notification description here. Enjoy
	</div>
</div>
 -->

<div class="menu-title ml-4">Produk baru ditambahkan</div>
<?php 
	$rows = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, processor.detailProcessor, processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, ram.memori, produk.tipe_memori, ram.value, produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value, produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk FROM tb_produk produk JOIN tb_processor processor USING (id_processor) JOIN tb_memori ram USING (id_memori) JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan) JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan) JOIN tb_kartugrafis kgrafis USING (id_kartugrafis) ORDER BY id_produk DESC LIMIT 3"); //mencari data dalam kolom pencarian
?>

<div class="menu">
	<div class="d-flex justify-content-between">
		<a href="index?m=produk_tambah" class="add-menu pt-5">
			<center><img src="../img/logo/untitled-1.jpg ?>" alt="[no image]" style="max-width:210px; height:50px;" class="mt-3"></center>
			<div class="menu-title text-center mt-3" style="font-size: 20px;color: #aaa;">Tambah Produk</div>
		</a>

	<?php foreach ($rows as $row) : ?>
		<div class="produk-menu" data-toggle="modal" data-target="#detailProduk_<?=$row->id_produk?>">
			<center><img src="../img/fotoProduk/<?= $row->foto_produk; ?>" alt="[no image]" style="max-width:210px; height:120px;"></center>
			<div class="menu-title"><?= $row->brand.' '.$row->tipe_brand; ?></div>
			<div class="menu-desc"><?= 'Rp '.number_format($row->harga,0,",",".").' / '.$row->detailProcessor.' / '.$row->memori.' / '.$row->penyimpanan.' '.$row->tipePenyimpanan.' / '.$row->layar ?></div>
		</div>
		<!-- Modal -->
			<div class="modal fade bd-example-modal-lg" id="detailProduk_<?=$row->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailProduk" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="modalDetailProduk">Detail Produk</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="row mb-3">
			          <div class="col-md-6 mt-2">
			            <img src="../img/fotoProduk/<?=$row->foto_produk ?>" alt="[no image available]" width="100%">    
			          </div>  
			          <div class="col-md-6 mt-2">
			            <div class="h3"><?= $row->brand.' '.$row->tipe_brand;?></div>
			              <div style="font-size: 18px;">Deskripsi:</div>
			              <table class="ml-4" style="font-size: 18px;">
			                  <tr> <td width="150px">Harga</td> <td><?= 'Rp '.$row->harga ?></td> </tr>
			                  <tr> <td>Layar</td> <td><?= $row->layar ?></td> </tr>
			                  <tr> <td>Processor</td> <td><?= $row->detailProcessor ?></td> </tr>
			                  <tr> <td>Memori</td> <td><?= $row->memori ?></td> </tr>
			                  <tr> <td>Penyimpanan</td> <td><?= $row->penyimpanan.' '.$row->tipePenyimpanan?></td> </tr>
			              </table>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
	<?php endforeach; ?>
	</div>
</div>
