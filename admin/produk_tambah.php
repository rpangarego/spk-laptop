<div class="mt-3 mb-4">
  <span class="h3">Tambah Produk</span>
</div>

<div class="col-md-10">
  <?php if($_POST) include 'aksi.php'?>
  <form method="POST" enctype="multipart/form-data"> 
  <div class="mb-3">
  <h5 class="font-weight-light">Informasi Produk</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" autofocus required autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="tipe">Tipe</label>
        <input type="text" class="form-control" id="tipe" name="tipe" required autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="harga">Harga</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="harga">Rp</span>
          </div>
          <input type="text" class="form-control" aria-describedby="harga" name="harga" required autocomplete="off">
        </div>
      </div>
    </div>
  </div>

    <div class="mb-3">
  <h5 class="font-weight-light">Processor</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="processor">Processor</label>
        <select id="processor" class="custom-select" name="processor" required>
            <option hidden value=""></option>
            <?=getProcessorOption($_POST['id_processor'])?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="seri_processor">Seri Processor</label>
        <input type="text" class="form-control" id="seri_processor" name="seri_processor" required autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="kec_processor">Kecepatan Processor</label>
        <div class="input-group">
          <input type="text" class="form-control" id="kec_processor" name="kec_processor" required autocomplete="off">
          <div class="input-group-append">
      <span class="input-group-text">GHz</span>
      </div>
    </div>
      </div>
    </div>
  </div>

  <div class="mb-3">
  <h5 class="font-weight-light">Memori</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="memori">Kapasitas Memori</label>
        <select id="memori" class="custom-select" name="memori" required>
            <option hidden value=""></option>
            <?=getMemoriOption($_POST['id_memori'])?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="tipe_memori">Tipe Memori</label>
        <select name="tipe_memori" id="tipe_memori" class="custom-select">
          <option value="DDR3">DDR3</option>
          <option value="DDR3L">DDR3L</option>
          <option value="DDR4">DDR4</option>
        </select>
      </div>
    </div>
  </div>

    <div class="mb-3">
  <h5 class="font-weight-light">Penyimpanan</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="penyimpanan">Kapasitas Penyimpanan</label>
        <select id="penyimpanan" class="custom-select" name="penyimpanan" required>
            <option hidden value=""></option>
            <?=getPenyimpananOption($_POST['id_penyimpanan'])?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="jenispenyimpanan">Jenis Penyimpanan</label>
        <select id="jenispenyimpanan" class="custom-select" name="jenispenyimpanan" required>
            <option hidden value=""></option>
            <?=getJenisPenyimpananOption($_POST['id_penyimpanan'])?>
        </select>
      </div>
    </div>
  </div>

    <div class="mb-3">
  <h5 class="font-weight-light">Kartu Grafis</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="kartugrafis">Kartu Grafis</label>
        <select id="kartugrafis" class="custom-select" name="kartugrafis" required>
            <option hidden value=""></option>
            <?=getKartuGrafisOption($_POST['id_kartugrafis'])?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="seri_kartugrafis">Seri Kartu Grafis</label>
        <input type="text" class="form-control" id="seri_kartugrafis" name="seri_kartugrafis" required autocomplete="off">
      </div>
    </div>
  </div>

    <div class="mb-3">
  <h5 class="font-weight-light">Layar</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="layar">Ukuran Layar</label>
        <div class="input-group">
          <select name="layar" id="layar" class="custom-select">
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="15.6">15.6</option>
          <option value="17">17</option>
        </select>
          <div class="input-group-append">
            <span class="input-group-text">Inch</span>
          </div>
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="resolusi">Resolusi Layar</label>
        <input type="text" class="form-control" id="resolusi" name="resolusi" autocomplete="off">
      </div>
    </div>
  </div>
  
  <div class="mb-3">
  <h5 class="font-weight-light">Informasi Tambahan</h5><hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="sistem_operasi">Sistem Operasi</label>
        <input type="text" class="form-control" id="sistem_operasi" name="sistem_operasi" autofocus required autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="berat">Berat</label>
        <input type="text" class="form-control" id="berat" name="berat" autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="dimensi">Dimensi</label>
        <input type="text" class="form-control" id="dimensi" name="dimensi" autocomplete="off">
      </div>
    </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-4">
        <label for="baterai">Baterai</label>
        <input type="text" class="form-control" id="baterai" name="baterai" autocomplete="off">
      </div>
      <div class="form-group col-md-4">
        <label for="fotoProduk">Foto Produk</label>
        <div class="card card-body p-2">
          <input type="file" id="fotoProduk" name="fotoProduk">
        </div>
      </div>
    </div>

    <div class="form-group float-right mt-3">
        <a href="index?m=produk" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" class="btn btn-primary ml-1">Simpan Produk</button>  
    </div>
  </form>
</div>
