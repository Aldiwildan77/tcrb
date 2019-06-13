<div class="container mt-5 text-center">

    <div class="card w-50 mx-auto">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <?= $this->session->flashdata('message'); ?>
            <form action="login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username / Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="input" placeholder="Enter username">
                    <small class="form-text text-danger"><?= form_error('input'); ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div>
                    <small>Dont have account? <a href="register">Register here</a></small><br>
                    <small>Forget your password? <a href="recovery">Click here</a></small>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

</div> 