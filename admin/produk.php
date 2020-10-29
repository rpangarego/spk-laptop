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
    $keyword = esc_field($_GET['keyword']);
    $rows = $db->get_results("SELECT produk.id_produk, produk.brand, produk.tipe_brand, produk.harga, produk.id_processor, processor.detailProcessor, processor.value, produk.seri_processor, produk.kecepatan_processor, produk.id_memori, ram.memori, produk.tipe_memori, ram.value, produk.id_penyimpanan, spenyimpanan.penyimpanan, spenyimpanan.value, produk.id_jenispenyimpanan, jpenyimpanan.jenispenyimpanan, jpenyimpanan.value, produk.id_kartugrafis, kgrafis.kartugrafis, kgrafis.vram, kgrafis.value, produk.seri_kartugrafis, produk.layar, produk.resolusi, produk.sistem_operasi, produk.berat,produk.dimensi, produk.baterai, produk.foto_produk FROM tb_produk produk JOIN tb_processor processor USING (id_processor) JOIN tb_memori ram USING (id_memori) JOIN tb_penyimpanan spenyimpanan USING (id_penyimpanan) JOIN tb_jenispenyimpanan jpenyimpanan USING (id_jenispenyimpanan) JOIN tb_kartugrafis kgrafis USING (id_kartugrafis) WHERE produk.brand LIKE '%$keyword%' OR produk.tipe_brand LIKE '%$keyword%' ORDER BY id_produk DESC"); //mencari data dalam kolom pencarian

    $hitung=$db->get_results("SELECT count(id_produk) AS hasil FROM tb_produk WHERE brand LIKE '%$keyword%' OR tipe_brand LIKE '%$keyword%' ORDER BY id_produk"); //hitung ada berapa data yg ditemukan oleh pencarian
    $hitung=json_decode(json_encode($hitung),true);
    $hasil=$hitung[0]["hasil"];?>

    <?php if ($hasil < 1):?>
    <div class="card">
      <div class="card-body">
        <center><strong>Oops!</strong> Tidak ada produk </center> 
      </div>
    </div>
    <?php else: ?>
      <div class="container row">
      <?php foreach($rows as $row):?>
    <div class="produk mr-3 mb-4">
      <img src="../img/fotoProduk/<?= $row->foto_produk; ?>" alt="[no image available]" style="max-width:230px; height:140px;">
      <div class="produk-title"><?= $row->brand.' '.$row->tipe_brand;?></div>
      <div class="produk-deskripsi">
        <?= 'Rp '.number_format($row->harga,0,",",".").' / '.$row->detailProcessor.' / '.$row->memori.' / '.$row->penyimpanan.' '.$row->jenispenyimpanan.' / '.$row->layar.' inch' ?>
      </div>
      <button type="button" class="btn btn-outline-secondary detailProduk" data-toggle="modal" data-target="#detailProduk_<?=$row->id_produk?>">
        Detail
      </button>
      <div class="action mt-2">
        <a class="btn btn-sm btn-warning rounded-circle" href="?m=produk_edit&ID=<?=$row->id_produk?>"><span class="fa fa-edit"></span></a>
        <a class="btn btn-sm btn-danger rounded-circle" href="aksi?act=produk_hapus&ID=<?=$row->id_produk?>"  onclick="return confirm('Hapus data?')"><span class="fa fa-trash"></span></a>
      </div>

      <!-- Modal -->
      <div class="modal fade bd-example-modal-lg" id="detailProduk_<?=$row->id_produk?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailProduk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDetailProduk"><strong><?= $row->brand.' '.$row->tipe_brand;?></strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row mb-3">
                <div class="col-md-6 mt-2">
                  <img src="../img/fotoProduk/<?= $row->foto_produk; ?>" alt="[no image available]" class="w-100">    
                </div>  
                <div class="col-md-6 mt-2">
                  <h5>Informasi Produk</h5>
                    <table class="table" style="font-size: 17px;">
                      <tr><td width="150px">Brand </td> <td><?= $row->brand; ?></td></tr>
                      <tr><td>Tipe</td> <td><?= $row->tipe_brand; ?></td></tr>
                      <tr><td>Harga</td> <td><?= "Rp ".number_format($row->harga,0,",","."); ?></td></tr>
                      <tr><td>Processor</td> <td><?= $row->detailProcessor.' '.$row->seri_processor.' ('.$row->kecepatan_processor.' GHz)' ; ?></td></tr>
                      <tr><td>Memori</td> <td><?= $row->memori.' '.$row->tipe_memori; ?></td></tr>
                      <tr><td>Penyimpanan</td> <td><?= $row->penyimpanan.' '.$row->jenispenyimpanan; ?></td></tr>
                      <tr><td>Kartu Grafis</td> <td><?= $row->kartugrafis.' '.$row->seri_kartugrafis; ?></td></tr>
                      <tr><td>Layar</td><td><?= $row->layar.'inch ('.$row->resolusi.')'; ?></td></tr>
                      <tr><td>Sistem Operasi</td><td><?= $row->sistem_operasi; ?></td></tr>
                      <tr><td>Berat</td><td><?= $row->berat.' kg'; ?></td></tr>
                      <tr><td>Dimensi</td><td><?= $row->dimensi; ?></td></tr>
                      <tr><td>Baterai</td><td><?= $row->baterai; ?></td></tr>
                    </table>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
      <?php endforeach; ?>
  </div>
    <?php endif; ?>
</div>