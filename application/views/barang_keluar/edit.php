<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Edit Barang Keluar</h4>
    <?php
        foreach ($barang_keluar as $brg) :
    ?>

    <form class="form-horizontal" method="post" action="<?= base_url('barang/updateBarangKeluar');?>">
    <input type="text" class="form-control" name="id_barang_keluar" value="<?= $brg['id_barang_keluar']; ?>" hidden required="">
    <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal keluar :</label>
                    <div class="col-xs-9">
                        <input value=" <?= $brg['tanggal'];  ?>" name="tanggal" type="text" class="form-control date" readonly>
                    </div>
                </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="barang">Nama Barang:</label>
            <div class="col-xs-9">
            <select class="form-control" name="id_barang_kel" placeholder="Pilih Barang" required="">
                <?php foreach ($barang as $s) : ?>
                <option <?= set_select( $s['id_barang']) ?> value="<?= $s['id_barang']; ?>"><?= $s['nama']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Jumlah Barang:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" value=" <?= $brg['jumlah']; ?> " required="">
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-success" value="Simpan"  >
            </div>
        </div>
    </form>
    <?php endforeach; ?>
</div>
      </div>
      <!-- End of Main Content -->