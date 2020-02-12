<div class="container-fluid">

    <!-- Page Heading -->
    <!-- /.container-fluid -->

    <div class="bs-example">
        <h4>Edit Barang</h4>
        <?php
        foreach ($supplier as $brg) :
        ?>

            <form class="form-horizontal" method="post" action="<?= base_url('supplier/update'); ?>">
                <input type="text" class="form-control" name="id_supplier" value="<?= $brg['id_supplier']; ?>" hidden required="">
                <div class="form-group">
                    <label class="control-label col-xs-3" for="nama">Nama Supplier:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="nama_supplier" value="<?= $brg['nama_supplier']; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="jumlah">No Hp:</label>
                    <div class="col-xs-9">
                        <input type="telp" class="form-control" name="no_telp" value="<?= $brg['no_telp']; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="kondisi">Alamat:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="alamat" value="<?= $brg['alamat']; ?>" required="">
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
</div>
<!-- End of Main Content -->