<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Tambah Peminjam Barang</h4>
    <form class="form-horizontal" method="post" action="<?= base_url('peminjam/tambahPeminjam');?>">
        <div class="form-group">
            <label class="control-label col-xs-3" for="nama">Nama Peminjam:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama_peminjam" placeholder="Nama Peminjam" required="">
            </div>
        </div>
        <div class="form-group">
                    <label class="control-label col-xs-3" for="supplier">Nama Barang:</label>
                            <select name="id_barang_pinjam" id="id_barang_pinjam" class="custom-select">
                                <option value="" selected disabled>Pilih Barang--</option>
                                <?php foreach ($barang as $s) : ?>
                                    <option  <?= set_select( $s['id_barang']) ?> value="<?= $s['id_barang'] ?>"><?= $s['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Jumlah Barang:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" required="">
            </div>
        </div>
        <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal Pinjam :</label>
                    <div class="col-xs-9">
                        <input value="<?= set_value('tanggal_pinjam', date('Y-m-d')); ?>" name="tgl_pinjam" type="text" class="form-control date" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal Kembali :</label>
                    <div class="col-xs-9">
                        <input value="<?= set_value('tanggal_kembali', date('Y-m-d')); ?>" name="tgl_kembali" type="date" class="form-control date">
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
      <!-- End of Main Content -->