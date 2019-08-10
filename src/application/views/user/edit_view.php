<div class="container">
    <div class="card w-75 mx-auto mt-3">
        <div class="card-body">
            <form action="do-edit" method="post">
                <div class="form-group">
                    <label for="fullname">Full name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" value="<?= $user['nama_lengkap']; ?>" required>
                    <small class="form-text text-danger"><?= form_error('fullname'); ?></small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?= $user['email']; ?>" required>
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
                <div class="form-group">
                    <label for="univ">Universitas</label>
                    <input type="text" class="form-control" name="univ" id="univ" placeholder="Masukkan universitas" value="<?= $user['universitas']; ?>" required>
                    <small class="form-text text-danger"><?= form_error('univ'); ?></small>
                </div>
                <div class="form-group">
                    <label for="role">Sebagai</label>
                    <input type="text" class="form-control" name="role" id="role" placeholder="Masukkan keterangan posisi anda" value="<?= $user['role']; ?>" required>
                    <small class="form-text text-danger"><?= form_error('role'); ?></small>
                </div>
                <div class="form-group">
                    <label for="telp">No Telepon</label>
                    <input type="text" class="form-control" name="telp" id="telp" placeholder="Enter telephone number" value="<?= $user['no_telepon']; ?>" required>
                    <small class="form-text text-danger"><?= form_error('telp'); ?></small>
                </div>
                <button type="button" class="btn btn-light" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>