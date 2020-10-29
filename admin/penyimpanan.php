<div class="card col-md-8 mb-3">
	<div class="card-body">
		<div class="d-flex justify-content-between mb-3">
			<h4>Penyimpanan</h4>
			<a href="index?m=penyimpanan_tambah" class="btn btn-primary">Tambah Penyimpanan</a>	
		</div>


		<table class="table table-hover mb-0">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Penyimpanan</th>
		      <th scope="col">Value</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
	        $q = esc_field($_GET['q']);
	        $rows = $db->get_results("SELECT * FROM tb_penyimpanan WHERE id_penyimpanan LIKE '%$q%' 
	        OR penyimpanan LIKE '%$q%' ORDER BY id_penyimpanan"); //mencari data dalam kolom pencarian

	        $hitung=$db->get_results("SELECT count(id_penyimpanan) AS hasil FROM tb_penyimpanan WHERE id_penyimpanan 
	        LIKE '%$q%' OR penyimpanan LIKE '%$q%' ORDER BY id_penyimpanan"); //hitung ada berapa data yg ditemukan oleh pencarian
			$hitung=json_decode(json_encode($hitung),true);
			$hasil=$hitung[0]["hasil"];?>

	        <?php if ($hasil < 1):?>
		        <tr>
		        	<td colspan="4"><center>Tidak Ada Data</center></td>
		        </tr>
	        <?php else: ?>
		        <?php foreach($rows as $row):?>
		        <tr>
		        	<th scope="col" class="align-middle"><?= ++$i ?></th>
		            <!-- <td class="align-middle"><?=$row->id_penyimpanan?></td> -->
		            <td class="align-middle"><?=$row->penyimpanan?></td>
		            <td class="align-middle"><?=$row->value?></td>
		            <td class="nw">
		                <a class="btn btn-sm btn-warning" href="?m=penyimpanan_edit&ID=<?=$row->id_penyimpanan?>">Edit</a>
		                <a class="btn btn-sm btn-danger" href="aksi?act=penyimpanan_hapus&ID=<?=$row->id_penyimpanan?>" onclick="return confirm('Hapus data?')">Hapus</a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
			<?php endif; ?>
		  </tbody>
		</table>
	</div>
</div>