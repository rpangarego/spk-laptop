<div class="mt-3 mb-4">
	<span class="h3">Tambah Kartu Grafis</span>
</div>

<div class="col-md-3">
	<?php if($_POST) include 'aksi.php'?>
	<form method="POST">
    	<div class="form-group">
	        <label for="kartugrafis">Kartu Grafis</label>
	        <input type="text" class="form-control" id="kartugrafis" name="kartugrafis" required autocomplete="off" autofocus>
      	</div>	

      	<div class="form-group">
	        <label for="vram">VRAM</label>
	        <input type="text" class="form-control" id="vram" name="vram" required autocomplete="off" autofocus>
      	</div>	

    	<div class="form-group">
	        <label for="value">Value</label>
	        <input type="text" class="form-control" id="value" name="value" required autocomplete="off">
      	</div>	
		
		<div class="form-group float-right mt-3">
	        <a href="index?m=kriteria&sm=layar" class="btn btn-outline-secondary">Batal</a>
	        <button type="submit" class="btn btn-primary ml-1" name="btnSimpan">Simpan</button>  
	    </div>
	    
	</form>
</div>