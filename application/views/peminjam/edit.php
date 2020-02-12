<div class="container-fluid">

    <!-- Page Heading -->
    <!-- /.container-fluid -->

    <div class="bs-example">
        <h4>Edit Peminjam</h4>
        <?php
        foreach ($peminjam as $brg) :
        ?>

            <form class="form-horizontal" method="post" action="<?= base_url('peminjam/updatePeminjam'); ?>">
                <input type="text" class="form-control" name="id" value="<?= $brg['id']; ?>" hidden required="">
                <div class="form-group">
                    <label class="control-label col-xs-3" for="nama">Nama Peminjam:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="nama_peminjam" value="<?= $brg['nama_peminjam']; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-xs-3" for="barang">Nama Barang:</label>
                  <div class="col-xs-9">
                   <select class="form-control" name="id_barang_pinjam" placeholder="Pilih Barang" required="">
                    <?php foreach ($barang as $s) : ?>
                     <option <?= set_select( $s['id_barang']) ?> value="<?= $s['id_barang'] ?>"><?= $s['nama'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="kondisi">Jumlah:</label>
                    <div class="col-xs-9">
                        <input type="number" class="form-control" name="jumlah" value="<?= $brg['jumlah_pinjam']; ?>" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal Pinjam :</label>
                    <div class="col-xs-9">
                        <input value=" <?= $brg['tgl_pinjam'];  ?>" name="tgl_pinjam" type="text" class="form-control date" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal Kembali :</label>
                    <div class="col-xs-9">
                        <input value=" <?= $brg['tgl_kembali'];  ?>" name="tgl_kembali" type="text" class="form-control date" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>
<!-- End of Main Content -->