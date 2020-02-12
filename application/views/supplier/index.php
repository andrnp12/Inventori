<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->

<!-- /.container-fluid -->

<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
<div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h6 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Supplier
                </h6>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('supplier/tambahSupplier') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Supplier
                    </span>
                </a>
            </div>
        </div>
    </div>
      <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
	  </thead>
	  <tbody>
		  <?php $no=1; 
	   foreach ($supplier as $b ) : ?>		  
			<tr>
				<th> <?= $no++ ?> </th>
				<td> <?= $b['nama_supplier']; ?> </td>
				<td> <?= $b['no_telp']; ?> </td>
        <td> <?= $b['alamat']; ?> </td>
        <td>
        <a href="<?php echo base_url('supplier/edit/');
                            echo $b['id_supplier']; ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('supplier/hapus/');
                            echo $b['id_supplier']; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
        </td>
			</tr>
		  <?php endforeach; ?>
		</tbody>
      </table>
    </div>

</div>

</div>