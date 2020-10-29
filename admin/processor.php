<div class="card col-md-8 mb-3">
	<div class="card-body">
		<div class="d-flex justify-content-between mb-3">
			<h4>Processor</h4>
			<a href="index?m=processor_tambah" class="btn btn-primary">Tambah Processor</a>	
		</div>


		<table class="table table-hover mb-0">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Processor</th>
		      <th scope="col">Detail Processor</th>
		      <th scope="col">Value</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
	        $q = esc_field($_GET['q']);
	        $rows = $db->get_results("SELECT * FROM tb_processor WHERE id_processor LIKE '%$q%' 
	        OR processor LIKE '%$q%' OR detailProcessor LIKE '%$q%' 
	       	ORDER BY id_processor"); //mencari data dalam kolom pencarian

	        $hitung=$db->get_results("SELECT count(id_processor) AS hasil FROM tb_processor WHERE id_processor 
	        LIKE '%$q%' OR processor LIKE '%$q%' OR detailProcessor LIKE '%$q%' 
	       	ORDER BY id_processor"); //hitung ada berapa data yg ditemukan oleh pencarian
			$hitung=json_decode(json_encode($hitung),true);
			$hasil=$hitung[0]["hasil"];?>

	        <?php if ($hasil < 1):?>
		        <tr>
		        	<td colspan="5"><center>Tidak Ada Data</center></td>
		        </tr>
	        <?php else: ?>
		        <?php foreach($rows as $row):?>
		        <tr>
		        	<th scope="col" class="align-middle"><?= ++$i ?></th>
		            <!-- <td class="align-middle"><?=$row->id_processor?></td> -->
		            <td class="align-middle"><?=$row->processor?></td>
		            <td class="align-middle"><?=$row->detailProcessor?></td>
		            <td class="align-middle"><?=$row->value?></td>
		            <td class="nw">
		                <a class="btn btn-sm btn-warning" href="?m=processor_edit&ID=<?=$row->id_processor?>">Edit</a>
		                <a class="btn btn-sm btn-danger" href="aksi?act=processor_hapus&ID=<?=$row->id_processor?>" onclick="return confirm('Hapus data?')">Hapus</a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
			<?php endif; ?>
		  </tbody>
		</table>
	</div>
</div>