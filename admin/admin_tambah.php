<div class="mt-3 mb-4">
	<span class="h3">Tambah Admin</span>
</div>

<div class="col-md-4">
	<?php if($_POST) include 'aksi.php'?>
	<form method="POST">
		<div class="form-group">
	        <label for="nama">Nama</label>
	        <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
      	</div>	
    	<div class="form-group">
	        <label for="username">Username</label>
	        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
      	</div>	
    	<div class="form-group">
	        <label for="password">Password</label>
	        <input type="text" class="form-control" id="password" name="password" required autocomplete="off">
      	</div>	
		
		<div class="form-group float-right mt-3">
	        <a href="index?m=admin" class="btn btn-outline-secondary">Batal</a>
	        <button type="submit" class="btn btn-primary ml-1" name="btnSimpan">Simpan</button>  
	    </div>
	</form>
</div>