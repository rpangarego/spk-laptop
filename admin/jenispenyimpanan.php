<div class="card col-md-8 mb-3">
	<div class="card-body">
		<div class="d-flex justify-content-between mb-3">
			<h4>Jenis Penyimpanan</h4>
			<a href="index?m=jenispenyimpanan_tambah" class="btn btn-primary">Tambah Jenis Penyimpanan</a>	
		</div>


		<table class="table table-hover mb-0">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Jenis Penyimpanan</th>
		      <th scope="col">Value</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
	        $rows = $db->get_results("SELECT * FROM tb_jenispenyimpanan ORDER BY id_jenispenyimpanan"); //mencari data dalam kolom pencarian

	        $hitung=$db->get_results("SELECT count(id_jenispenyimpanan) AS hasil FROM tb_jenispenyimpanan ORDER BY id_jenispenyimpanan"); //hitung ada berapa data yg ditemukan oleh pencarian
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
		            <!-- <td class="align-middle"><?=$row->id_jenispenyimpanan?></td> -->
		            <td class="align-middle"><?=$row->jenispenyimpanan?></td>
		            <td class="align-middle"><?=$row->value?></td>
		            <td class="nw">
		                <a class="btn btn-sm btn-warning" href="?m=jenispenyimpanan_edit&
		                ID=<?=$row->id_jenispenyimpanan?>">Edit</a>
		                <a class="btn btn-sm btn-danger" href="aksi?act=jenispenyimpanan_hapus&
		                ID=<?=$row->id_jenispenyimpanan?>" onclick="return confirm('Hapus data?')">Hapus</a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
			<?php endif; ?>
		  </tbody>
		</table>
	</div>
</div>