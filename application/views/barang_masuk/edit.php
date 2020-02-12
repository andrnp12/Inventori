<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Edit Barang Masuk</h4>
    <?php
        foreach ($barang_masuk as $brg) :
    ?>

    <form class="form-horizontal" method="post" action="<?= base_url('barang/updateBarangMasuk');?>">
    <input type="text" class="form-control" name="id_barang_masuk" value="<?= $brg['id_barang_masuk']; ?>" hidden required="">
    <div class="form-group">
                    <label class="control-label col-xs-3" for="tgl_pinjam">Tanggal Masuk :</label>
                    <div class="col-xs-9">
                        <input value=" <?= $brg['tanggal'];  ?>" name="tanggal" type="text" class="form-control date" readonly>
                    </div>
                </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="barang">Nama Barang:</label>
            <div class="col-xs-9">
            <select class="form-control" name="id_barang_stok" placeholder="Pilih Barang" required="">
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
                <?php foreach ($supplier as $su) : ?>
                <option <?= set_select( $su['id_supplier']) ?> value="<?= $su['id_supplier'] ?>"><?= $su['nama_supplier'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Jumlah Barang:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" value="<?= $brg['jumlah']; ?>" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="kondisi">Kondisi Barang:</label>
            <div class="col-xs-9">    
            <select class="form-control" name="kondisi"  required="">
                <option>Baik</option>
                <option>Kurang Baik</option>
                <option>Tidak Layak Pakai</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="kategori">Kategori:</label>
            <select class="form-control" name="kategori"  required="">
                <option>Sekali Pakai</option>
                <option>Habis Simpan</option>
            </select>
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