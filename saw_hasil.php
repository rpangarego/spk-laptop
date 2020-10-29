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
 ?>

<?php 
	// ambil nilai bobot kriteria
	$bHarga = htmlspecialchars($_GET['bHarga']);
	$bProcessor = htmlspecialchars($_GET['bProcessor']);
	$bMemori = htmlspecialchars($_GET['bMemori']);
	$bPenyimpanan = htmlspecialchars($_GET['bPenyimpanan']);
	$bJenisPenyimpanan = htmlspecialchars($_GET['bJenisPenyimpanan']);
	$bKartuGrafis = htmlspecialchars($_GET['bKartuGrafis']);
	$bLayar = htmlspecialchars($_GET['bLayar']);

	// cek bobot kriteria, jika tidak ada maka kembalikan ke halaman saw
	if ($bHarga=='' || $bProcessor=='' || $bMemori=='' || $bPenyimpanan=='' || $bJenisPenyimpanan=='' || $bKartuGrafis=='' || $bLayar=='') {
		notification("203");
		redirect_js("index.php?m=saw_kriteria");
	}

	// Perhitungan SAW
		// mencari nilai min dan max
		$rows = $db->get_results("SELECT MIN(produk.harga) AS nHarga, round(MAX(tb_processor.value),2) AS nProcessor, round(MAX(tb_memori.value),2) AS nMemori, round(MAX(tb_penyimpanan.value),2) AS nPenyimpanan, round(MAX(tb_Jenispenyimpanan.value),2) AS nJenisPenyimpanan, round(MAX(tb_kartugrafis.value),2) AS nKartuGrafis, round(MAX(produk.layar),2) AS nLayar FROM tb_produk produk JOIN tb_processor USING(id_processor) JOIN tb_memori USING(id_memori) JOIN tb_penyimpanan USING(id_penyimpanan) JOIN tb_Jenispenyimpanan USING(id_jenispenyimpanan) JOIN tb_kartugrafis USING(id_kartugrafis) ORDER BY id_produk");

		$N = json_decode(json_encode($rows[0]), true);

		// set nilai kriteria
		$cHarga = $N['nHarga']; $cProcessor = $N['nProcessor']; $cMemori = $N['nMemori']; $cPenyimpanan = $N['nPenyimpanan']; $cJenisPenyimpanan = $N['nJenisPenyimpanan']; $cKartuGrafis = $N['nKartuGrafis']; $cLayar = $N['nLayar'];

		// hitung nilai normalisasi, nilai preferensi dan perankingan
		$ranking = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, tb_processor.detailProcessor, tb_processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, tb_memori.memori, produk.tipe_memori, tb_memori.value, produk.id_penyimpanan, tb_penyimpanan.penyimpanan, tb_penyimpanan.value, produk.id_jenispenyimpanan, tb_Jenispenyimpanan.jenispenyimpanan, tb_Jenispenyimpanan.value, produk.id_kartugrafis, tb_kartugrafis.kartugrafis, tb_kartugrafis.vram, tb_kartugrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk, (($cHarga/produk.harga)*$bHarga)+((tb_processor.value/$cProcessor)*$bProcessor)+((tb_memori.value/$cMemori)*$bMemori)+((tb_penyimpanan.value/$cPenyimpanan)*$bPenyimpanan)+((tb_Jenispenyimpanan.value/$cJenisPenyimpanan)*$bJenisPenyimpanan)+((tb_kartugrafis.value/$cKartuGrafis)*$bKartuGrafis)+((produk.layar/$cLayar)*$bLayar) AS nilaiPreferensi FROM tb_produk produk JOIN tb_processor USING(id_processor) JOIN tb_memori USING(id_memori) JOIN tb_penyimpanan USING(id_penyimpanan) JOIN tb_Jenispenyimpanan USING(id_jenispenyimpanan) JOIN tb_kartugrafis USING(id_kartugrafis) WHERE ".join($produkIDs)." ORDER BY `nilaiPreferensi` DESC");

	// simpan nilai bobot kriteria kedalam array $bobot
	$bobot = ['c1' => $bHarga, 'c2' => $bProcessor, 'c3' => $bMemori, 'c4' => $bPenyimpanan, 'c5' => $bJenisPenyimpanan, 'c6' => $bKartuGrafis, 'c7' => $bLayar];
	foreach ($bobot as $b) {
		$a += $b;
	}
	// konversi nilai masing-masing bobot ke persen (%)
	$pro1 = round(($bobot['c1']/$a)*100,2);
	$pro2 = round(($bobot['c2']/$a)*100,2);
	$pro3 = round(($bobot['c3']/$a)*100,2);
	$pro4 = round(($bobot['c4']/$a)*100,2);
	$pro5 = round(($bobot['c5']/$a)*100,2);
	$pro6 = round(($bobot['c6']/$a)*100,2);
	$pro7 = round(($bobot['c7']/$a)*100,2);
?>

<div class="container mt-3">
	<div class="row justify-content-between">
		<div class="h3">Hasil Perhitungan <i>Simple Additive Weighting</i></div>    
		<div>
			<a href="index?m=produk" class="btn btn-outline-secondary">Tambah Produk</a>
			<a href="index?m=aksi&act=banding_reset" class="btn btn-outline-secondary" onclick="return confirm('Reset produk?')">Reset Produk</a>
		</div>
	</div>
		<br>

	<div class="table-responsive">
		<table class="table table-bordered">
		  <thead>
		  	<tr>
		  		<th scope="col">Ranking</th>
		  		<?php foreach ($ranking as $rank): ?>
					<th><center><?= "#".++$j." (".round($rank->nilaiPreferensi,4).")"; ?></center></th>
				<?php endforeach ?>
		  	</tr>
		    <tr>
		    	<th scope="col" style="vertical-align: middle;">Laptop</th>
		    	<?php foreach ($ranking as $rank): ?>
					<td><center><img src="img/fotoProduk/<?= $rank->foto_produk; ?>" alt="[no image]" style="max-width:150px; height:60px; margin-left: 10px;"><br><strong><?= $rank->brand.' '.$rank->tipe_brand; ?></strong></center>
					</td>
				<?php endforeach ?>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
		  		<th scope="col">Brand</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->brand; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Tipe</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->tipe_brand; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Harga</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= 'Rp '.number_format($rank->harga,0,",","."); ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col" style="vertical-align: middle;">Processor</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->detailProcessor.' '.$rank->seri_processor.' ('.$rank->kecepatan_processor.' GHz)' ; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Memori</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->memori.' '.$rank->tipe_memori; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Penyimpanan</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->penyimpanan.' '.$rank->jenispenyimpanan; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col" style="vertical-align: middle;">Kartu Grafis</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->kartugrafis.' '.$rank->seri_kartugrafis; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Layar</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->layar.'inch ('.$rank->resolusi.')'; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Sistem Operasi</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->sistem_operasi; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Berat</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= $rank->berat.' kg'; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Dimensi</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= ($_rank->dimensi=='') ? '-' : $rank->dimensi; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  	<tr>
		  		<th scope="col">Baterai</th>
				<?php foreach ($ranking as $rank): ?>
					<td><center><?= ($rank->baterai=='') ? '-' : $rank->baterai; ?></center></td>
				<?php endforeach ?>
		  	</tr>
		  </tbody>

		</table>
	</div>

</div>
