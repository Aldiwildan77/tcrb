<div class="halaman-user" style="height: calc(100vh - 100px)">
    <div class="container pt-5">
        <div class="login-card card mx-auto">
            <div class="card-body">
                <h5 class="card-title"><strong>Login</strong></h5>
                <?= $this->session->flashdata('message'); ?>
                <form action="login" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="input" placeholder="Enter username">
                        <small class="form-text text-danger"><?= form_error('input'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" minlength="6" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary col-12 mb-2">Login</button>
                    <div class="form-group">
                        <div class="row">
                            <div class="login-footer-left col-md-6">
                                <small>Dont have account? <a href="register">Register here</a></small><br>
                            </div>
                            <div class="login-footer-right col-md-6">
                                <small id="login-footer-right"><a href="recovery">Forget your password?</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
