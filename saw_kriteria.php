<?php include 'notifikasi.php'; ?>
<div class="my-5">
	<div class="text-center h2">Tentukan Tingkat Kepentingan Bobot Kriteria Pemilihan Laptop</div>
</div>

<form>
<div class="row">
  <div class="form-group col-md-4">
  	<input type="text" hidden name="m" value="saw_hasil">
    <label for="bHarga">Harga</label>
    <select name="bHarga" id="bHarga" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="bProcessor">Processor</label>
    <select name="bProcessor" id="bProcessor" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="bMemori">Memori (RAM)</label>
    <select name="bMemori" id="bMemori" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="bPenyimpanan">Kapasitas Penyimpanan</label>
    <select name="bPenyimpanan" id="bPenyimpanan" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="bJenisPenyimpanan">Jenis Penyimpanan</label>
    <select name="bJenisPenyimpanan" id="bJenisPenyimpanan" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="bKartuGrafis">Kartu Grafis</label>
    <select name="bKartuGrafis" id="bKartuGrafis" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="bLayar">Ukuran Layar</label>
    <select name="bLayar" id="bLayar" class="custom-select" required>
      <option hidden value=""></option>
      <option value="1">Sangat Penting</option>
      <option value="0.75">Penting</option>
      <option value="0.5">Cukup Penting</option>
      <option value="0.25">Tidak Penting</option>
      <option value="0">Sangat Tidak Penting</option>
    </select>
  </div>
</div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

<br><br><br>