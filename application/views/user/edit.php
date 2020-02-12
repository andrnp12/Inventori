<div class="container-fluid">

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Edit Profile
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('user/data'); ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php foreach ($profile as $brg) : ?>  
            <div class="card-body pb-2">
            <form class="form-horizontal" method="post" action="<?= base_url('user/userUpdate'); ?>">
                <input type="text" class="form-control" name="id" value="<?= $brg['id']; ?>" hidden required="">
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Username</label>
                    <div class="col-md-6">
                        <input value="<?=  $brg['nama']; ?>" type="text" name="nama" class="form-control" placeholder="Username" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Password</label>
                    <div class="col-md-6">
                        <input value="<?= $brg['password']; ?>" type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                </input>
            </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- End of Main Content -->