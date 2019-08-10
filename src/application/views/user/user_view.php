<div class="container mt-5">
    <div class="text-center">
        <h4>Welcome, <?= $this->session->userdata('fullname'); ?></h4>
        <a href="user/upload" class="btn btn-warning">Upload bukti pembayaran</a>
        <a href="logout" class="btn">Logout</a>
    </div>
    <!-- <img src="https://gdurl.com/6Sbt" height="200" width="200">
    <img src="https://gdurl.com/kUg7" height="200" width="200">
    <img src="https://gdurl.com/IoZ7" height="200" width="200">
    <img src="https://gdurl.com/6Sbt" height="200" width="200"> -->
    <div class="card w-75 mx-auto mt-3">
        <div class="card-body">
            <div class="p-1">
                <a class="btn btn-info" href="<?= base_url('user/edit'); ?>">Edit Profile</a>
                <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-sembarang="paswd" data-func="Password">Change Password</a>
            </div>
            <h5 class="card-title text-center">User Data</h5>
            <?= $this->session->flashdata('message') ?>
            <div class="row">
                <div class="col-lg-9">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td scope="col">Username </td>
                                <td scope="col">= <?= $user['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Full name </td>
                                <td>= <?= $user['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>= <?= $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Asal instansi </td>
                                <td>= <?= $user['universitas']; ?></td>
                            </tr>
                            <tr>
                                <td>Sebagai </td>
                                <td>= <?= $user['role']; ?></td>
                            </tr>
                            <tr>
                                <td>No telepon</td>
                                <td>= <?= $user['no_telepon']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
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