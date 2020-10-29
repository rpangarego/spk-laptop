<div class="container mt-3 mb-4">
  <div class="row justify-content-between">
    <div class="h3">Produk</div>

    <?php include 'notifikasi.php'; ?>
    
    <div class="row justify-content-end mr-1">
    <div class="search mr-3 mb-2">
      <form>
        <div class="input-group">
        <input type="hidden" name="m" value="produk"/>
        <input type="text" class="form-control" placeholder="Pencarian" aria-label="pencarian" aria-describedby="pencarian" autocomplete="off" value="<?=$_GET['keyword']?>" name='keyword'>
          <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="pencarian" name="submit">Cari</button>
        </div>
        </div>
        </form>
    </div>
      <div>
        <a href="index?m=produk_tambah" class="btn btn-primary mr-3">Tambah Produk</a>
      </div>
    </div>
  </div>
</div>

<div class="mb-3">
    <?php
    // $keyword = esc_field($_GET['keyword']);
    $rows = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, processor.detailProcessor, processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, ram.memori, produk.tipe_memori, ram.value, produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value, produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk FROM tb_produk produk JOIN tb_processor processor USING (id_processor) JOIN tb_memori ram USING (id_memori) JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan) JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan) JOIN tb_kartugrafis kgrafis USING (id_kartugrafis) ORDER BY id_produk ASC");
    ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Brand</th>
          <th scope="col">Tipe</th>
          <th scope="col">Harga</th>
          <th scope="col">Processor</th>

          <th scope="col">Kec Processor</th>
          <th scope="col">Memori</th>
          <th scope="col">Penyimpanan</th>
          <th scope="col">Kartu Grafis</th>
          <th scope="col">Layar</th>

          <th scope="col">Resolusi</th>
          <th scope="col">Sistem Operasi</th>
          <th scope="col">Berat</th>
          <th scope="col">Dimensi</th>
          <th scope="col">Baterai</th>
          <th scope="col">Foto Produk</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $data): ?>
          <tr>
          <th scope="row"><?= $data->id_produk; ?></th>
          <td scope="col"><?= $data->brand; ?></td>
          <td scope="col"><?= $data->tipe_brand; ?></td>
          <td scope="col"><?= $data->harga; ?></td>
          <td scope="col"><?= $data->detailProcessor.' '.$data->seri_processor; ?></td>

          <td scope="col"><?= $data->kecepatan_processor; ?></td>
          <td scope="col"><?= $data->memori.' '.$data->tipe_memori; ?></td>
          <td scope="col"><?= $data->penyimpanan.' '.$data->jenispenyimpanan; ?></td>
          <td scope="col"><?= $data->kartugrafis.' '.$data->seri_kartugrafis.' ('.$data->vram.')'; ?></td>
          <td scope="col"><?= $data->layar; ?></td>

          <td scope="col"><?php echo $data->resolusi !== '' ? $data->resolusi : " - ";?></td>
          <td scope="col"><?= $data->sistem_operasi; ?></td>
          <td scope="col"><?php echo $data->berat !== '' ? $data->berat : " - ";?></td>
          <td scope="col"><?php echo $data->dimensi !== '' ? $data->dimensi : " - ";?></td>
          <td scope="col"><?php echo $data->baterai !== '' ? $data->baterai : " - ";?></td>

          <td scope="col"><?php echo $data->foto_produk !== '' ? $data->foto_produk : " - ";?></td>
        </tr>
        <?php endforeach ?>
        
      </tbody>
    </table>

   

</div>