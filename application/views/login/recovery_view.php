<div class="container mt-5 text-center">
    <div class="card" style="width: 50%;margin:auto">
        <div class="card-body">
            <h5 class="card-title">Account Recovery</h5>
            <?= $this->session->flashdata('message'); ?>
            Fill in your username or email address and we'll send you an email.
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username / Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="input">
                    <small class="form-text text-danger"><?= form_error('input'); ?></small>
                </div>
                <button type="submit" class="btn btn-primary">Recover account</button>
            </form>
        </div>
    </div>
</div> 