<div class="container-fluid">

    <!-- Page Heading -->
    <!-- /.container-fluid -->

    <div class="bs-example">
        <h4>Edit Barang</h4>
        <?php
        foreach ($barang as $brg) :
        ?>

            <form class="form-horizontal" method="post" action="<?= base_url('barang/update'); ?>">
                <input type="text" class="form-control" name="id_barang" value="<?= $brg['id_barang']; ?>" hidden required="">
                <div class="form-group">
                    <label class="control-label col-xs-3" for="nama">Nama Barang:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="nama" value="<?= $brg['nama']; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="jumlah">Jumlah Barang:</label>
                    <div class="col-xs-9">
                        <input type="number" class="form-control" name="jumlah" value="<?= $brg['jumlah_barang']; ?>" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="satuan">Satuan:</label>
                    <div class="col-xs-9">
                    <select type="number" class="form-control" name="satuan" placeholder="" required="">
                    <option selected disabled>Select Satuan--</option>
                    <option>Unit</option>
                    <option>Pack</option>
                </select>
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