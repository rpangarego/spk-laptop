<?php
	if ($_COOKIE['banding']=='') {
		notification("202");
		redirect_js('index?m=produk');
	}
	$array_banding = explode(',', $_COOKIE['banding']); //tangkap idproduk yg akan dibandingkan dari cookie['banding']
	$jlhBanding = count($array_banding); // ambil data dari db tb_produk berdasarkan id produk

	$produkIDs = [];
	for ($i=0; $i < $jlhBanding ; $i++) { 
		$produkID = 'produk.id_produk = '.$array_banding[$i];
		if ($i == ($jlhBanding-1) ) {
			array_push($produkIDs, $produkID);
		}else{
			array_push($produkIDs, $produkID.' OR ');
		}
	}

	$rows = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, processor.detailProcessor, processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, ram.memori, produk.tipe_memori, ram.value, produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value, produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk FROM tb_produk produk JOIN tb_processor processor USING (id_processor) JOIN tb_memori ram USING (id_memori) JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan) JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan) JOIN tb_kartugrafis kgrafis USING (id_kartugrafis) WHERE ".join($produkIDs)); 
	echo "<pre>";
	// var_dump($rows);
	echo "</pre>";
 ?>
<div class="container mt-3">
	<div class="row justify-content-between">
		<div class="h3">Bandingkan Produk (<?= $jlhBanding; ?>)</div>    
		<a href="index?m=aksi&act=banding_reset" class="btn btn-outline-primary">Reset Produk</a>
	</div>
		<br>
		<table class="table table-bordered">
		  <thead>
		    <tr>
		    	<th scope="col"></th>
		    	<?php foreach ($rows as $row): ?>
					<td><center><img src="img/fotoProduk/<?= $row->foto_produk; ?>" alt="[no image]" style="max-width:150px; height:60px; margin-left: 10px;"><br><strong><?= $row->brand.' '.$row->tipe_brand; ?></strong></center>
					</td>
				<?php endforeach ?>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
		  		<th scope="col">Brand</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->brand; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Tipe</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->tipe_brand; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Harga</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= 'Rp '.$row->harga; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Processor</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->detailProcessor.' '.$row->seri_processor.' ('.$row->kecepatan_processor.' GHz)' ; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Memori</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->memori.' '.$row->tipe_memori; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Penyimpanan</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->penyimpanan.' '.$row->jenispenyimpanan; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Kartu Grafis</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->kartugrafis.' '.$row->seri_kartugrafis; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Layar</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->layar.'inch ('.$row->resolusi.')'; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Sistem Operasi</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->sistem_operasi; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Berat</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= $row->berat.' kg'; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Dimensi</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= ($_row->dimensi=='') ? '-' : $row->dimensi; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Baterai</th>
				<?php foreach ($rows as $row): ?>
					<td><center><?= ($row->baterai=='') ? '-' : $row->baterai; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  </tbody>

		</table>

</div>
