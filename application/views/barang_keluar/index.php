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
                    Data Barang Keluar
                </h6>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('barang/tambahBarangKeluar') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Barang Keluar
                    </span>
                </a>
            </div>
        </div>
    </div>

      <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Keluar</th>
            <th>Nama Barang</th>
            <th>Jumlah Keluar</th>
            <th>Aksi</th>
          </tr>
	  </thead>
	  <tbody>
	  <?php 
	  $no=1; 
	  foreach ($barang as $b ) : ?>		  
			<tr>
				<th> <?= $no++; ?> </th>
				<td> <?= $b['tanggal_keluar']; ?> </td>
				<td> <?= $b['nama']; ?> </td>
        <td> <?= $b['jumlah_keluar']; ?> </td>
        <td>
        <a href="<?php echo base_url('barang/deleteBarangKeluar/');
        echo $b['id_barang_keluar']; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
        </td>
			</tr>
		  <?php endforeach; ?>
		</tbody>
      </table>
    </div>
  </div>

    </div>





