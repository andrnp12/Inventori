<div class="container-fluid">

          <!-- Page Heading -->
        <!-- /.container-fluid -->

<div class="bs-example">
    <h4>Tambah Supplier</h4>
    <form class="form-horizontal" method="post" action="<?= base_url('supplier/tambahSupplier');?>">
        <div class="form-group">
            <label class="control-label col-xs-3" for="supplier">Nama Supplier:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama_supplier" placeholder="Nama Supplier" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="jumlah">Nomor Hp:</label>
            <div class="col-xs-9">
                <input type="number" class="form-control" name="no_telp" placeholder="Nomor Hp" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="kondisi">Alamat:</label>
            <div class="col-xs-9">
                <textarea type="text" class="form-control" name="alamat" placeholder="Alamat" required=""></textarea>
            </div>
        </div>
        <div class="form-group">
       
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-success" value="Simpan"  >
            </div>
        </div>
    </form>
</div>
      </div>
      </div>
      </div>
      <!-- End of Main Content -->