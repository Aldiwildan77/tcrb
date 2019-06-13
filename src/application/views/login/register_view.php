<div class="container mt-5 text-center">

    <div class="card" style="width: 50%;margin:auto">
        <div class="card-body">
            <h5 class="card-title">Register</h5>
            <form action="register" method="post">
                <div class="form-group">
                    <label for="fullname">Full name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" value="<?= set_value('fullname'); ?>" required>
                    <small class="form-text text-danger"><?= form_error('fullname'); ?></small>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="<?= set_value('username'); ?>" required>
                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?= set_value('email'); ?>" required>
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                    <small class="form-text text-danger"><?= form_error('password'); ?></small>
                </div>
                <div class="form-group">
                    <label for="passconf">Password Confirmation</label>
                    <input type="password" class="form-control" name="passconf" id="passconf" placeholder="Enter password confirmation" required>
                    <small class="form-text text-danger"><?= form_error('passconf'); ?></small>
                </div>
                <div>
                    <small>Already have an account? <a href="login">Login here</a></small>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</div>