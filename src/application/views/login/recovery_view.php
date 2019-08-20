<section class="rec logres">
    <div class="container pt-5">
        <div class="row justify-content-center pb-5">
            <div class="login-card card col-11 col-lg-6">
                <div class="card-body">
                    <h5 class="card-title text-white">Account Recovery</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <p class="card-text text-white">Fill in your username and we'll send you an email.</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" id="exampleInputEmail1" name="username">
                            <small class="form-text text-danger"><?= form_error('input'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-info col-12 mt-2">Recover account</button>
                        <div class="row mt-2">
                            <div class="col-12">
                                <a href="<?=base_url('login')?>" class="text-white">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>