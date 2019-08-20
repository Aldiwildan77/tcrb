<!-- <div class="halaman-user" style="height: calc(100vh - 100px)">
    <div class="container pt-5">
        <div class="login-card card mx-auto">
            <div class="card-body">
                <h5 class="card-title">Reset password</h5>
                <form action="<?= $hash ?>" method="post">
                    <input type="hidden" name="hash" value="<?= $hash ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your new password">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Repeat password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="passconf" placeholder="Re-enter your new Password">
                        <small class="form-text text-danger"><?= form_error('passconf'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> -->

<section class="log logres">
    <div class="container pt-5">
        <div class="row justify-content-center pb-5">
            <div class="login-card card col-11 col-lg-6">
                <div class="card-body">
                    <h5 class="card-title text-center py-4 text-white"><strong>Reset Password</strong></h5>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= $hash ?>" method="post">
                        <input type="hidden" name="hash" value="<?= $hash ?>">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <label for="username" class="sr-only">Username</label>
                                <label for="username">
                                    <i class="fa fa-user fa-lg icon px-2 py-2"></i>
                                </label>
                                <input class="form-control" id="username" placeholder="Username" name="username" type="text" value="<?= $username ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <label for="email" class="sr-only">Email</label>
                                <label for="email">
                                    <i class="fa fa-envelope fa-lg icon px-2 py-2"></i>
                                </label>
                                <input class="form-control" id="email" placeholder="email" name="email" type="email" value="<?= $email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <label for="password" class="sr-only">Password Baru</label>
                                <label for="password">
                                    <i class="fa fa-key fa-lg icon px-1 py-2"></i>
                                </label>
                                <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Password">
                                <small class="form-text text-danger"><?= form_error('password'); ?></small>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <label for="repassword" class="sr-only">Konfirmasi Password Baru</label>
                                <label for="repassword">
                                    <i class="fa fa-key fa-lg icon px-1 py-2"></i>
                                </label>
                                <input type="password" class="form-control" id="password" name="repassword" minlength="6" placeholder="Ketik ulang password">
                                <small class="form-text text-danger"><?= form_error('repassword'); ?></small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info col-12 mb-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>