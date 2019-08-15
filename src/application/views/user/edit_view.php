<div class="halaman-user">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-3 col-xs-12 user mb-5">
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/profile.png')?>" alt="profile" width="200px" height="200px">
                        </div>
                    </div>
                </div>
                <hr>
                <a class="tombol-user" href="">
                    <div class="row pt-2 pb-1 row-tbl-user">
                        <div class="col-lg-12">
                            <h5 class="text-center">Profile</h5>
                        </div>
                    </div>
                </a>
                <hr>
                <a class="tombol-user" href="">
                    <div class="row pt-2 pb-1 row-tbl-user">
                        <div class="col-lg-12">
                            <h5 class="text-center">Pendaftaran</h5>
                        </div>
                    </div>
                </a>
                <hr>
                <a class="tombol-user" href="">
                    <div class="row pt-2 pb-1 mb-3 row-tbl-user">
                        <div class="col-lg-12">
                            <h5 class="text-center">Pembayaran</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-8 offset-lg-1 user pt-5">
                <div class="row mb-3 mt-2">
                    <div class="col-lg-12">
                        <h3 class="text-center"><b>Edit Profile</b></h3>
                    </div>
                </div>
                <form action="<?=base_url('user/edit')?>" method="post">
                    <div class="form-group row mx-1">
                        <label for="fullname" class="col-sm-3 col-form-label"><b>Nama Lengkap</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Masukkan nama lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                            <small class="form-text text-danger"><?= form_error('fullname'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row mx-1">
                        <label for="email" class="col-sm-3 col-form-label"><b>Email address</b></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" value="<?= $user['email']; ?>" required>
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row mx-1">
                        <label for="instansi" class="col-sm-3 col-form-label"><b>Asal Instansi</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukkan instansi" value="<?= $user['instansi']; ?>" required>
                            <small class="form-text text-danger"><?= form_error('instansi'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row mx-1">
                        <label for="role" class="col-sm-3 col-form-label"><b>Sebagai</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="role" id="role" placeholder="Masukkan keterangan posisi anda" value="<?= $user['role']; ?>" required>
                            <small class="form-text text-danger"><?= form_error('role'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row mx-1">
                        <label for="telp" class="col-sm-3 col-form-label"><b>No Telepon</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan nomer telepon" value="<?= $user['no_telepon']; ?>" required>
                            <small class="form-text text-danger"><?= form_error('telp'); ?></small>
                        </div>
                    </div>
                    <div class="row mx-1">
                        <div class="col-12">
                            <button type="button" class="btn btn-light" onclick="history.back()">Kembali</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>