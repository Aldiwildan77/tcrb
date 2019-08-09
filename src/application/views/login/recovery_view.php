<div class="container">
    <div class="my-5" style="height: 50vh">
        <div class="login-card card mx-auto">
            <div class="card-body">
                <h5 class="card-title">Account Recovery</h5>
                <?= $this->session->flashdata('message'); ?>
                <p class="card-text ">Fill in your username and we'll send you an email.</p>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" id="exampleInputEmail1" name="input">
                        <small class="form-text text-danger"><?= form_error('input'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">Recover account</button>
                </form>
            </div>
        </div>
    </div>
</div>