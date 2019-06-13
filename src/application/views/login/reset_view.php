<div class="container mt-5 text-center">
    <div class="card" style="width: 50%;margin:auto">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div> 