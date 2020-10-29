<?php
    $row = $db->get_row("SELECT * FROM tb_processor WHERE id_processor='$_GET[ID]'"); 
?>

<div class="mt-3 mb-4">
	<span class="h3">Edit Processor</span>
</div>

<div class="col-md-3">
	<?php if($_POST) include 'aksi.php'?>
	<form method="POST">
	    <div class="form-group">
	        <label for="processor">Processor</label>
	        <select id="processor" class="form-control" name="processor">
	        	<option hidden><?= $row->processor?></option>
		        <option value="Intel">Intel</option>
		        <option value="AMD">AMD</option>
	        </select>
	    </div>
	    <div class="form-group">
	        <label for="detailProcessor">Detail Processor</label>
	        <input type="text" class="form-control" id="detailProcessor" name="detailProcessor" value="<?=$row->detailProcessor?>" required autocomplete="off">
	    </div>
    	<div class="form-group">
	        <label for="value">Value</label>
	        <input type="text" class="form-control" id="value" name="value" value="<?=$row->value?>" required autocomplete="off">
      	</div>	
		
		<div class="form-group float-right mt-3">
	        <a href="index?m=kriteria&sm=processor" class="btn btn-outline-secondary">Batal</a>
	        <button type="submit" class="btn btn-primary ml-1" name="btnSimpan">Simpan</button>  
	    </div>
	    
	</form>
</div>