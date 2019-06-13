<div class="container mt-5">
    <div class="text-center">
        <h4>Welcome, <?= $this->session->userdata('fullname'); ?></h4>
        <a href="user/upload" class="btn btn-warning">Upload bukti pembayaran</a>
        <a href="logout" class="btn btn-primary">Logout</a>
    </div>
    <!-- <img src="https://gdurl.com/6Sbt" height="200" width="200">
    <img src="https://gdurl.com/kUg7" height="200" width="200">
    <img src="https://gdurl.com/IoZ7" height="200" width="200">
    <img src="https://gdurl.com/6Sbt" height="200" width="200"> -->
    <div class="card w-75 mx-auto mt-3">
        <div class="card-body">
            <a class="btn btn-info" href="<?= base_url('user/edit'); ?>">Edit Profile</a>
            <h5 class="card-title text-center">User Data</h5>
            <div class="row">
                <div class="col-3">
                    <img src="<?= base_url('assets/img/' . $user['foto_diri']) ?>" alt="<?= $user['foto_diri'] ?>" style="width:200px;heigth:200px">
                </div>
                <div class="col-9">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td scope="col">Full name </td>
                                <td scope="col">= <?= $user['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <td>Username </td>
                                <td>= <?= $user['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>= <?= $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td>School / University </td>
                                <td>= <?= $user['asal']; ?></td>
                            </tr>
                            <tr>
                                <td>Identitiy Card </td>
                                <td>= <?= $user['foto_ktm']; ?></td>
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