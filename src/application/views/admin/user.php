<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <title>Admin</title>
</head>

<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="text-center">User</h3>
        <a href="<?= base_url('admin/home') ?>" class="btn btn-primary btn-sm mb-1">Kembali</a>
        <?= $this->session->flashdata('message') ?>
        <!-- <div class="table-responsive"> -->
          <table class="table table-striped table-bordered" id="example1" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Instansi</th>
                <th>Sebagai</th>
                <th>No Telepon</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < sizeof($user); $i++) : ?>
                <tr>
                  <td><?= $i + 1 ?></td>
                  <td><?= $user[$i]['username'] ?></td>
                  <td><?= $user[$i]['nama_lengkap'] ?></td>
                  <td><?= $user[$i]['email'] ?></td>
                  <td><?= $user[$i]['instansi'] ?></td>
                  <td><?= $user[$i]['role'] ?></td>
                  <td><?= $user[$i]['no_telepon'] ?></td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
        <!-- </div> -->
      </div>
    </div>
  </div>

  <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <img src="" class="imagepreview" style="width: 100%;">
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <?= $this->session->flashdata('message') ?>
  <script>
    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');
    });
    $(document).ready(function() {
      $('#example1').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'scrollX': true
      })
    })
  </script>
</body>

</html>
