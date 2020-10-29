<div class="card col-md-8 mb-3">
	<div class="card-body">
		<div class="d-flex justify-content-between mb-3">
			<h4>Kartu Grafis</h4>
			<a href="index?m=kartugrafis_tambah" class="btn btn-primary">Tambah Kartu Grafis</a>	
		</div>


		<table class="table table-hover mb-0">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Kartu Grafis</th>
		      <th scope="col">VRAM</th>
		      <th scope="col">Value</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
	        $rows = $db->get_results("SELECT * FROM tb_kartugrafis ORDER BY id_kartugrafis");

	        $hitung=$db->get_results("SELECT count(id_kartugrafis) AS hasil FROM tb_kartugrafis ORDER BY id_kartugrafis"); //hitung ada berapa data yg ditemukan oleh pencarian
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
		            <td class="align-middle"><?=$row->kartugrafis?></td>
		            <td class="align-middle"><?=$row->vram?></td>
		            <td class="align-middle"><?=$row->value?></td>
		            <td class="nw">
		                <a class="btn btn-sm btn-warning" href="?m=kartugrafis_edit&ID=<?=$row->id_kartugrafis?>">Edit</a>
		                <a class="btn btn-sm btn-danger" href="aksi?act=kartugrafis_hapus&ID=<?=$row->id_kartugrafis?>" onclick="return confirm('Hapus data?')">Hapus</a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
			<?php endif; ?>
		  </tbody>
		</table>
	</div>
</div>