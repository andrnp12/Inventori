<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Tambah Barang Keluar</h4>
    <form class="form-horizontal" method="post" action="<?= base_url('barang/tambahBarangKeluar');?>">
        <div class="form-group">
            <label class="control-label col-xs-3" for="tanggal">Tanggal Keluar:</label>
            <div class="col-xs-9">
            <input value="<?= set_value('tanggal_masuk', date('Y-m-d')); ?>" name="tanggal" type="text" class="form-control date" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="barang">Nama Barang:</label>
            <div class="col-xs-9">
            <select class="form-control" name="id_barang_kel" placeholder="Pilih Barang" required="">
            <option value="" selected disabled>Pilih Barang--</option>
                <?php foreach ($barang as $s) : ?>
                <option <?= set_select( $s['id_barang']) ?> value="<?= $s['id_barang'] ?>"><?= $s['nama'] ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Jumlah Barang Keluar:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" required="">
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-success" value="Simpan"  >
            </div>
        </div>
    </form>
</div>
      </div>
      </div>
      <!-- End of Main Content -->