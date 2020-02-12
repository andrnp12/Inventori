<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Tambah Barang Masuk</h4>
    <form class="form-horizontal" method="post" action="<?= base_url('barang/tambahBarangMasuk');?>">
    <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal Masuk :</label>
                    <div class="col-xs-9">
                        <input value="<?= set_value('tanggal_masuk', date('Y-m-d')); ?>" name="tanggal" type="text" class="form-control date" readonly>
                    </div>
                </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="barang">Nama Barang:</label>
            <div class="col-xs-9">
            <select class="form-control" name="id_barang_stok" placeholder="Pilih Barang" required="">
            <option value="" selected disabled>Pilih Barang--</option>
                <?php foreach ($barang as $s) : ?>
                <option <?= set_select( $s['id_barang']) ?> value="<?= $s['id_barang'] ?>"><?= $s['nama'] ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="supplier">Nama Supplier:</label>
            <div class="col-xs-9">
            <select class="form-control" name="supplier_id" placeholder="" required="">
            <option value="" selected disabled>Pilih Supplier--</option>
                <?php foreach ($supplier as $s) : ?>
                <option <?= set_select( $s['id_supplier']) ?> value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Jumlah Barang:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="kondisi">Kondisi Barang:</label>
            <div class="col-xs-9">    
            <select class="form-control" name="kondisi" placeholder="" required="">
                <option>Baik</option>
                <option>Kurang Baik</option>
                <option>Tidak Layak Pakai</option>
            </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-xs-3" for="kategori">Kategori:</label>
            <select class="form-control" name="kategori" placeholder="" required="">
                <option>Sekali Pakai</option>
                <option>Habis Pakai Simpan</option>
            </select>
        </div>
       
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-success" value="Simpan"  >
            </div>
        </div>
    </form>
</div>
      </div>
      <!-- End of Main Content -->