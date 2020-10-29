<?php 
	$notif = $_COOKIE['notif'];

	//Notifikasi: 101 = 'Data berhasil disimpan!' | 102 = 'Data telah diupdate!' | 103 = 'Data telah dihapus!'
	if ($notif == 100) { ?>
		<div class="notif bg-info">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Username tidak tersedia!
			</div>
		</div>
	<?php }elseif ($notif == 101) { ?>
		<div class="notif bg-info">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Data berhasil disimpan!
			</div>
		</div>
	<?php }elseif ($notif == 102) { ?>
		<div class="notif bg-info">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Data telah diupdate!
			</div>
		</div>
	<?php }elseif ($notif == 103) { ?>
		<div class="notif bg-danger">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Data berhasil dihapus!
			</div>
		</div>
	<?php }elseif ($notif == 411) { ?>
		<div class="notif bg-danger">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Username atau password salah!
			</div>
		</div>
	<?php }elseif ($notif == 105) { ?>
		<div class="notif bg-info">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Tidak dapat menghapus sesi yang aktif!
			</div>
		</div>
	<?php } ?>