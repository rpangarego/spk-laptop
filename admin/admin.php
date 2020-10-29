<div class="mt-3 mb-4">
	<span class="h3">Admin</span>
	<a href="index?m=admin_tambah" class="btn btn-primary float-right">Tambah Admin</a>	
</div>

<?php include 'notifikasi.php'; ?>

<div class="container m-0 p-0">
	<table class="table mb-0">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Username</th>
	      <!-- <th scope="col">Password</th> -->
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_admin WHERE id_admin LIKE '%$q%' 
        OR username LIKE '%$q%' ORDER BY id_admin"); //mencari data dalam kolom pencarian

        $hitung=$db->get_results("SELECT count(id_admin) AS hasil FROM tb_admin WHERE id_admin 
        LIKE '%$q%' OR username LIKE '%$q%' ORDER BY id_admin"); //hitung ada berapa data yg ditemukan oleh pencarian
		$hitung=json_decode(json_encode($hitung),true);
		$hasil=$hitung[0]["hasil"];?>

        <?php if ($hasil < 1):?>
	        <tr>
	        	<td colspan="4"><center>Tidak Ada Data</center></td>
	        </tr>
        <?php else: ?>
	        <?php foreach($rows as $row):?>
	        <tr>
	        	<!-- <th scope="col" class="align-middle"><?= ++$i ?></th> -->
	            <th class="align-middle"><?= ++$k; ?></th>
	            <td class="align-middle"><?=$row->nama?></td>
	            <td class="align-middle"><?=$row->username?></td>
	            <!-- <td class="align-middle"><?=($row->username==$_SESSION['login']) ? $row->password : '**********' ?></td> -->
	            <td class="nw">
	            	<?= ($row->username==$_SESSION['login']) ? '<a class="btn btn-sm btn-warning" href="?m=admin_edit&ID='.$row->id_admin.'">Edit</a> ' : '';?>
	                <!-- <a class="btn btn-sm btn-warning" href="?m=admin_edit&ID=<?=$row->id_admin?>">Edit</a> -->
	                <a class="btn btn-sm btn-danger" href="aksi?act=admin_hapus&ID=<?=$row->id_admin?>" onclick="return confirm('Hapus data?')">Hapus</a>
	            </td>
	        </tr>
	        <?php endforeach; ?>
		<?php endif; ?>
	  </tbody>
	</table>
</div>
