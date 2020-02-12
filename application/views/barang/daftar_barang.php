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
                    Data Stok Barang
                </h6>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('barang/tambahBarang') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Barang
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Aksi</th>
          </tr>
	  </thead>
	  <tbody>
	  <?php 
	  $no=1; 
	  foreach ($barang as $b ) : ?>		  
			<tr>
				<th> <?= $no++; ?> </th>
				<td> <?= $b['nama']; ?> </td>
        <td> <?= $b['jumlah_barang']; ?> </td>
        <td> <?= $b['satuan']; ?> </td>
        <td>
                  <a href="<?php echo base_url('barang/edit/');
                            echo $b['id_barang']; ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url('barang/delete/');
                            echo $b['id_barang']; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                </td>
			</tr>
		  <?php endforeach; ?>
		</tbody>
      </table>
    </div>
</div>

</div>
