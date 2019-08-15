<div class="halaman-user">
    <div class="container pt-5 pb-5">
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
                        <h3 class="text-center"><b>Selamat datang, </b>Muhammad Fakhri Imaduddin</h3>
                    </div>
                </div>
                <div class="row mx-1">
                    <div class="col-lg-12">
                        <div class="text-center mb-2">
                            <a class="btn btn-primary" href="<?= base_url('user/edit')?>">Edit profile</a>
                            <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-sembarang="paswd" data-func="Password">Change Password</a>
                        </div>
                        <?=$this->session->flashdata('message')?>
                    </div>
                </div>
                <div class="row mt-3 mb-3 mx-1">
                    <div class="col-lg-3"><b>Nama Lengkap</b></div>
                    <div class="col-lg-6"><?=$user['nama_lengkap']?></div>
                </div>
                <hr>
                <div class="row mt-3 mb-3 mx-1">
                    <div class="col-lg-3"><b>Username</b></div>
                    <div class="col-lg-6"><?=$user['username']?></div>
                </div>
                <hr>
                <div class="row mt-3 mb-3 mx-1">
                    <div class="col-lg-3"><b>Email</b></div>
                    <div class="col-lg-6"><?=$user['email']?></div>
                </div>
                <hr>
                <div class="row mt-3 mb-3 mx-1">
                    <div class="col-lg-3"><b>Asal Instansi</b></div>
                    <div class="col-lg-6"><?=$user['instansi']?></div>
                </div>
                <hr>
                <div class="row mt-3 mb-3 mx-1">
                    <div class="col-lg-3"><b>Role</b></div>
                    <div class="col-lg-6"><?=$user['role']?></div>
                </div>
                <hr>
                <div class="row mt-3 mb-3 mx-1">
                    <div class="col-lg-3"><b>No telp</b></div>
                    <div class="col-lg-6"><?=$user['no_telepon']?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Box -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formModal">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label labelModals" id="rowOne"></label>
                        <div class="col-sm-10 inputModals">
                            <input type="text" class="form-control" id="inputOne" name="inputOne" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label labelModals" id="rowTwo"></label>
                        <div class="col-sm-10 inputModals">
                            <input type="text" class="form-control" id="inputTwo" name="inputTwo" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label labelModals" id="rowThree"></label>
                        <div class="col-sm-10 inputModals">
                            <input type="email" class="form-control" id="inputThree" name="inputThree" value="" required>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>