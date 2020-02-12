<!-- Begin Page Content -->
<div class="container-fluid">

<?= $this->session->flashdata('pesan'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Profile Aktif | Smartfast Inventori
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('login/registrasi'); ?>" class="btn btn-sm btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span class="text">
                                Tambah Admin
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-2">     
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Username</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('username', $user['nama']); ?>" type="text" id="username" name="username" class="form-control" placeholder="Username" readonly>
                        <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Password</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('username', $user['password']); ?>" type="password" id="username" name="username" class="form-control" placeholder="Username" readonly>
                        <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



</div>
</div>