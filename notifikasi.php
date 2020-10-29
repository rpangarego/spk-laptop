<?php 
	$notif = $_COOKIE['notif'];

	if ($notif == 201) { ?>
		<div class="notif bg-danger">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Produk yang dapat dibandingkan maksimal 5 produk!
			</div>
		</div>
	<?php }elseif ($notif == 202) { ?>
		<div class="notif bg-warning">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Pilih produk terlebih dahulu!
			</div>
		</div>
	<?php }elseif ($notif == 203) { ?>
		<div class="notif bg-warning">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Masukkan Bobot Kriteria Pemilihan Laptop!
			</div>
		</div>
	<?php }elseif ($notif == 204) { ?>
		<div class="notif bg-info">
			<div class="notif-close">&times;</div>
			<div class="notif-body">
				Produk yang dipilih sudah ada!
			</div>
		</div>
	<?php } ?>