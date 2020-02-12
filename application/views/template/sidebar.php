<ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center bg-primary text-white" href="<?= base_url('user/index');  ?>">
  <div class="sidebar-brand-icon ">
    <i class="fas fa-code"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SMARTfast</div>
</a>
<!-- Nav Item - Dashboard -->
<li class="nav-item" >
  <a class="nav-link" href="<?= base_url('user/index');  ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Master Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('barang/daftarBarang'); ?>">
    <i class="fas fa-fw fa-folder"></i>
    <span>Barang</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link pb-0" href="<?= base_url('supplier/index') ?>"  >
    <i class="fas fa-fw fa-users"></i>
    <span>Supplier</span>
  </a>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed " href="<?= base_url('peminjam/daftarPeminjam'); ?>">
    <i class="fas fa-fw fa-user-plus"></i>
      <span>Peminjam</span>
        </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Laporan
</div>

            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('barang/barangMasuk'); ?>">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Barang Masuk</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="<?= base_url('barang/barangKeluar') ?>" >
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Barang Keluar</span>
                </a>
            </li>



  <!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Admin
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="<?= base_url('user/user'); ?>" >
    <i class="fas fa-fw fa-cog"></i>
    <span>Admin Management</span>
  </a>
</li>


<div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
</ul>
<!-- End of Sidebar -->