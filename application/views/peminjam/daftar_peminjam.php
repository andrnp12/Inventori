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
                    Data Peminjam
                </h6>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('peminjam/tambahPeminjam') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Peminjam
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
          </tr>
	  </thead>
	  <tbody>
		  <?php $no=1; 
	   foreach ($peminjam as $b ) : ?>		  
			<tr>
				<th> <?= $no++ ?> </th>
				<td> <?= $b['nama_peminjam']; ?> </td>
				<td> <?= $b['nama']; ?> </td>
				<td> <?= $b['jumlah_pinjam']; ?> </td>
				<td> <?= $b['tgl_pinjam']; ?> </td>
        <td> <?= $b['tgl_kembali']; ?> </td>
        <td>
        <a href="<?php echo base_url('peminjam/editPeminjam/');
                            echo $b['id']; ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
        <a href="<?php echo base_url('peminjam/deletePeminjam/');
                            echo $b['id']; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
        </td>
			</tr>
		  <?php endforeach; ?>
		</tbody>
      </table>
    </div>
  </div>


</div>

</div>