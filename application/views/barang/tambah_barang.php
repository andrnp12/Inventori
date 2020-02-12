<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Tambah Stok Barang</h4>
    <form class="form-horizontal" method="post" action="<?= base_url('barang/tambahBarang');?>">
        <div class="form-group">
            <label class="control-label col-xs-3" for="nama">Nama Barang:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama" placeholder="Nama Barang" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Jumlah Barang:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" required="">
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
                <input type="submit" class="btn btn-success" value="Simpan"  >
            </div>
        </div>
    </form>
</div>
      </div>
      </div>
      <!-- End of Main Content -->