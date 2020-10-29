<?php
    $row = $db->get_row("SELECT * FROM tb_layar WHERE id_layar='$_GET[ID]'"); 
?>

<div class="mt-3 mb-4">
	<span class="h3">Edit Layar</span>
</div>

<div class="col-md-3">
	<?php if($_POST) include 'aksi.php'?>
	<form method="POST">
    	<div class="form-group">
	        <label for="layar">Layar</label>
	        <input type="text" class="form-control" id="layar" name="layar" required autocomplete="off" value="<?=$row->layar?>">
      	</div>	

    	<div class="form-group">
	        <label for="value">Value</label>
	        <input type="text" class="form-control" id="value" name="value" required autocomplete="off" value="<?=$row->value?>">
      	</div>	
		
		<div class="form-group float-right mt-3">
	        <a href="index?m=kriteria&sm=layar" class="btn btn-outline-secondary">Batal</a>
	        <button type="submit" class="btn btn-primary ml-1" name="btnSimpan">Simpan</button>  
	    </div>
	    
	</form>
</div>