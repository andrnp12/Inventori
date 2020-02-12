<body id="page-top">
  	<div id="wrapper">
  		<div id="content-wrapper" class="d-flex flex-column">
  			<div id="content">
  				<div class="container-fluid">
					  <!-- Page Heading -->
  					<div class="row">
  						<div class="col-xl-3 col-md-6 mb-4">
  							<div class="card border-left-primary shadow h-100 py-2">
  								<div class="card-body">
  									<div class="row no-gutters align-items-center">
  										<div class="col mr-2">
  											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Admin</div>
  											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nama; ?></div>
  										</div>
  										<div class="col-auto">
  											<i class="fas fa-users fa-2x text-gray-300"></i>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  						<div class="col-xl-3 col-md-6 mb-4">
  							<div class="card border-left-success shadow h-100 py-2">
  								<div class="card-body">
  									<div class="row no-gutters align-items-center">
  										<div class="col mr-2">
  											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Peminjam</div>
  											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $peminjam; ?></div>
  										</div>
  										<div class="col-auto">
  											<i class="fas fa-user-plus fa-2x text-gray-300"></i>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  						<div class="col-xl-3 col-md-6 mb-4">
  							<div class="card border-left-info shadow h-100 py-2">
  								<div class="card-body">
  									<div class="row no-gutters align-items-center">
  										<div class="col mr-2">
  											<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Supplier</div>
  											<div class="row no-gutters align-items-center">
  												<div class="col-auto">
  													<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $supplier; ?></div>
  												</div>
  											</div>
  										</div>
  										<div class="col-auto">
  											<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  						<div class="col-xl-3 col-md-6 mb-4">
  							<div class="card border-left-warning shadow h-100 py-2">
  								<div class="card-body">
  									<div class="row no-gutters align-items-center">
  										<div class="col mr-2">
  											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Stok Barang</div>
  											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stok; ?></div>
  										</div>
  										<div class="col-auto">
  											<i class="fas fa-folder fa-2x text-gray-300"></i>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>

  	<!-- Begin Page Content -->
  	<div class="container-fluid">

  		<!-- Page Heading -->

  		<!-- /.container-fluid -->
		  <div class="row">
		  <div class="col-md-4">
		  <div class="card shadow-sm border-bottom-success">
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Transaksi Terakhir Barang Masuk</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barsuk as $tbm) : ?>
                            <tr>
                                <td><strong><?= $tbm['tanggal_masuk']; ?></strong></td>
                                <td><?= $tbm['nama']; ?></td>
                                <td><span class="badge badge-success"><?= $tbm['jumlah_masuk']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
	<div class="col-md-4">
	<div class="card shadow-sm border-bottom-warning">
            <div class="card-header bg-warning py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Peminjaman Barang Terakhir </h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Peminjam</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barpin as $tbp) : ?>
                            <tr>
                                <td><strong><?= $tbp['nama_peminjam']; ?></strong></td>
                                <td><?= $tbp['nama']; ?></td>
                                <td><span class="badge badge-warning"><?= $tbp['jumlah_pinjam']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<div class="col-md-4">
	<div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Transaksi Terakhir Barang Keluar</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barkel as $tbk) : ?>
                            <tr>
                                <td><strong><?= $tbk['tanggal_keluar']; ?></strong></td>
                                <td><?= $tbk['nama']; ?></td>
                                <td><span class="badge badge-danger"><?= $tbk['jumlah_keluar']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>

		  </div>
	  </div>
	</div>
