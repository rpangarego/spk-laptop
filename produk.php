<?php include 'notifikasi.php'; 
	error_reporting(0);
	$array_banding = explode(',', $_COOKIE['banding']); //masukkan id produk kedalam array
	$jlhBanding = count($array_banding); // hitung jumlah id_produk
?>


<div class="container mt-3">
	<div class="row justify-content-between align-items-center">
	    <div class="col">
	    	<div class="row ">
				<div class="h3 ml-3">Produk</div>
				<div class="ml-3">
					<a href="index?m=saw_alternatif" class="btn btn-outline-primary">Bandingkan Produk <?= ($_COOKIE['banding'] ? '<span class="badge badge-light">'.$jlhBanding.'</span>' : '<span class="badge badge-light">0</span>') ; ?></span></a>
				</div>
			</div>
	    </div> 

		<div class="row search ">
			<div class="col-4 d-flex align-items-center mr-0 pr-0">
					<button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseFilterSort" aria-expanded="false" aria-controls="collapseFilterSort">
					Filter & Sort
					</button>
			</div>
			<div class="col">
				<form method="GET">
				    <div class="input-group">
				    	<input type="hidden" name="m" value="produk"/>
				    	<input type="text" class="form-control" placeholder="Pencarian" aria-label="pencarian" aria-describedby="pencarian" autocomplete="off" value="<?=$_GET['keyword']?>" name='keyword'>
				      	<div class="input-group-append">
				        <button class="btn btn-outline-secondary" type="submit">Cari</button>
				    	</div>
				    </div>
					</form>	
			</div>
			
			
		</div>
	</div>
</div>

	<!-- filter and sort features -->
<div class="mt-2 mb-4">
	<div class="collapse mt-3" id="collapseFilterSort">
	  <div class="card card-body border-top">
		<form action="index?m=produk"  method="GET" class="form-inline">
			<input type="text" name="m" value="produk" hidden>
			<div class="form-group mr-4">
				<label for="brand" class="mr-3">Brand</label>
				<select name="brand" id="brand" class="custom-select custom-select-sm">
					<?php 	
					if ($_GET['brand']) {
						if ($_GET['brand']=='semua') {
						echo "<option hidden value='semua'>Tampilkan semua</option>";
						}else{
						echo "<option hidden value='".$_GET['brand']."'>".$_GET['brand']."</option>";
						}
					}
					?>
					<option value="semua">Tampilkan semua</option>
					<?=getBrandOption($_POST['brand'])?>
				</select>
			</div>
			<div class="form-group mr-4">
				<label for="harga" class="mr-3">Range harga</label>
				<select name="harga" id="harga" class="custom-select custom-select-sm">
					<?php 	
					if ($_GET['harga']) {
						switch ($_GET['harga']) {
							case '<3jt':
								echo "<option hidden value='<3jt'>< 3.000.000</option>";
								break;
							case '3-5jt':
								echo "<option hidden value='3-5jt'>3.000.000 - 5.000.000</option>";
								break;
							case '5-10jt':
								echo "<option hidden value='5-10jt'>5.000.000 - 10.000.000</option>";
								break;
							case '>10jt':
								echo "<option hidden value='>10jt'>> 10.000.000</option>";
								break;
							default:
								echo "<option hidden hidden value='semua'>Tampilkan semua</option>";
								break;
						}
					}
					?>
					<option value="semua">Tampilkan semua</option>
					<option value="<3jt">< 3.000.000</option>
					<option value="3-5jt">3.000.000 - 5.000.000</option>
					<option value="5-10jt">5.000.000 - 10.000.000</option>
					<option value=">10jt">> 10.000.000</option>
				</select>
			</div>
			<div class="form-group mr-4">
				<label for="sortby" class="mr-3">Sort by</label>
				<select name="sortby" id="sortby" class="custom-select custom-select-sm">
					<?php 	
					if ($_GET['sortby']) {
						switch ($_GET['sortby']) {
							case 'brand':
								echo "<option hidden value='brand'>Brand</option>";
								break;
							case 'harga':
								echo "<option hidden value='harga'>Harga</option>";
								break;
							default:
								echo "<option hidden hidden value='baru'>Produk Terbaru</option>";
								break;
						}
					}
					?>
					<option value="baru">Produk terbaru</option>
					<option value="brand">Brand</option>
					<option value="harga">Harga</option>
				</select>
			</div>
			<div class="form-group mr-4">
				<label for="orderby" class="mr-3">Order by</label>
				<select name="orderby" id="orderby" class="custom-select custom-select-sm">
					<?php 	
					if ($_GET['orderby']) {
						if ($_GET['orderby']=='ASC') {
							echo "<option hidden value='ASC'>Ascending</option>";
						}else{
							echo "<option hidden value='DESC'>Descending</option>";
						}
					}
					?>
					<option value="ASC">Ascending</option>
					<option value="DESC">Descending</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	  </div>
	</div>
</div>

<div class="container p-0">
 	<?php
    $keyword = esc_field($_GET['keyword']);

    if ($_GET['brand']) {
    	$brand = ($_GET['brand']=='semua') ? '' : $_GET['brand'];
    	$sort = ($_GET['sortby']=='baru') ? 'id_produk' : $_GET['sortby'];
    	$order = htmlspecialchars($_GET['orderby']);

		switch ($_GET['harga']) {
			case '<3jt':
				$minharga = 0; $maxharga = 2999999;
				break;
			case '3-5jt':
				$minharga = 3000000; $maxharga = 5000000;
				break;
			case '5-10jt':
				$minharga = 5000000; $maxharga = 10000000;
				break;		
			case '>10jt':
				$minharga = 10000001; $maxharga = 999999999;
				break;
			default:
				$minharga = 0; $maxharga = 999999999;
				break;
		}

	//load data produk berdasarkan filter
	$rows = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, processor.detailProcessor, processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, ram.memori, produk.tipe_memori, ram.value, produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value, produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk FROM tb_produk produk JOIN tb_processor processor USING (id_processor) JOIN tb_memori ram USING (id_memori) JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan) JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan) JOIN tb_kartugrafis kgrafis USING (id_kartugrafis) WHERE produk.brand LIKE '%$brand%' AND produk.harga BETWEEN $minharga AND $maxharga ORDER BY $sort $order");
	}else{
	//mencari data dalam kolom pencarian
	$rows = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, processor.detailProcessor, processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, ram.memori, produk.tipe_memori, ram.value, produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value, produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk FROM tb_produk produk JOIN tb_processor processor USING (id_processor) JOIN tb_memori ram USING (id_memori) JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan) JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan) JOIN tb_kartugrafis kgrafis USING (id_kartugrafis) WHERE produk.brand LIKE '%$keyword%' OR produk.tipe_brand LIKE '%$keyword%' ORDER BY id_produk DESC"); 
	}
    ?>

<?php if (count($rows) < 1):?>
	<div class="card">
	  <div class="card-body">
	    <center><strong>Oops!</strong> Tidak ada produk </center>  
	  </div>
	</div>
<?php else: ?>
  <div class="container row pr-0 mx-auto">
  <?php foreach($rows as $row):?>
	<div class="produk mb-4 mr-3">
		<img src="img/fotoProduk/<?= $row->foto_produk; ?>" alt="[no image available]" style="max-width:230px; height:140px;">
		<div class="produk-title"><?= $row->brand.' '.$row->tipe_brand;?></div>
		<div class="produk-deskripsi">
        	<?= 'Rp '.number_format($row->harga,0,",",".").' / '.$row->detailProcessor.' / '.$row->memori.' / '.$row->penyimpanan.' '.$row->jenispenyimpanan.' / '.$row->layar.' inch' ?>
      	</div>
		<div class="buttonstyle">
			<button type="button" class="btn btn-outline-secondary detailProduk" data-toggle="modal" data-target="#detailProduk_<?=$row->id_produk?>">
			  Detail
			</button>
			<a href="aksi?act=banding&ID=<?=$row->id_produk?>" class="btn btn-outline-primary bandingkan" name="bandingkan">Bandingkan</a>
		</div>

	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="detailProduk_<?=$row->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailProduk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDetailProduk"><strong><?= $row->brand.' '.$row->tipe_brand;?></strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row mb-3">
                <div class="col-md-6 mt-2">
                  <img src="img/fotoProduk/<?=$row->foto_produk ?>" alt="[no image available]" class="w-100">    
                </div>  
                <div class="col-md-6 mt-2">
                  <h5>Informasi Produk</h5>
                    <table class="table" style="font-size: 17px;">
                      <tr><td width="150px">Brand </td> <td><?= $row->brand; ?></td></tr>
                      <tr><td>Tipe</td> <td><?= $row->tipe_brand; ?></td></tr>
                      <tr><td>Harga</td> <td><?= "Rp ".number_format($row->harga,0,",","."); ?></td></tr>
                      <tr><td>Processor</td> <td><?= $row->detailProcessor.' '.$row->seri_processor.' ('.$row->kecepatan_processor.' GHz)' ; ?></td></tr>
                      <tr><td>Memori</td> <td><?= $row->memori.' '.$row->tipe_memori; ?></td></tr>
                      <tr><td>Penyimpanan</td> <td><?= $row->penyimpanan.' '.$row->jenispenyimpanan; ?></td></tr>
                      <tr><td>Kartu Grafis</td> <td><?= $row->kartugrafis.' '.$row->seri_kartugrafis; ?></td></tr>
                      <tr><td>Layar</td><td><?= $row->layar.'inch ('.$row->resolusi.')'; ?></td></tr>
                      <tr><td>Sistem Operasi</td><td><?= $row->sistem_operasi; ?></td></tr>
                      <tr><td>Berat</td><td><?= $row->berat.' kg'; ?></td></tr>
                      <tr><td>Dimensi</td><td><?= $row->dimensi; ?></td></tr>
                      <tr><td>Baterai</td><td><?= $row->baterai; ?></td></tr>
                    </table>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
	</div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
</div>
