<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->

  <title>Admin</title>
</head>

<body>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="text-center">Perorangan</h3>
        <a href="<?= base_url('admin/home') ?>" class="btn btn-primary btn-sm mb-1">Kembali</a>
        <?= $this->session->flashdata('message') ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="example1">
            <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Nama pemain</th>
                <th>NIM</th>
                <th>Jenis kelamin</th>
                <th>Instansi</th>
                <th>Jurusan</th>
                <th>Foto diri</th>
                <th>Foto kartu pelajar</th>
                <th>Kategori</th>
                <th>Biaya</th>
                <th>Bukti bayar</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < sizeof($user); $i++) : ?>
                <tr>
                  <th rowspan="<?= $user[$i]['jumlah'] ?>"><?= $i + 1 ?></th>
                  <td rowspan="<?= $user[$i]['jumlah'] ?>"><?= $user[$i]['username'] ?></td>
                  <td><?= $pemain[$count]['nama_pemain'] ?></td>
                  <td><?= $pemain[$count]['nim'] ?></td>
                  <td><?= $pemain[$count]['jenis_kelamin'] ?></td>
                  <td><?= $pemain[$count]['instansi'] ?></td>
                  <td><?= $pemain[$count]['jurusan'] ?></td>
                  <td><a class="pop" style="cursor: pointer"><img src="<?= base_url('players/foto/' . $pemain[$count]['foto_diri']) ?>" alt="" width="100px" height="100px"></a></td>
                  <td><a class="pop" style="cursor: pointer"><img src="<?= base_url('players/foto/' . $pemain[$count]['foto_kartu_pelajar']) ?>" alt="" width="100px" height="100px"></a></td>
                  <td><?= $pemain[$count++]['nama_kategori'] ?></td>
                  <td rowspan="<?= $user[$i]['jumlah'] ?>"><?= $user[$i]['total'] ?></td>
                  <td rowspan="<?= $user[$i]['jumlah'] ?>"><a class="pop" style="cursor: pointer"><img src="<?= base_url('bukti-bayar/' . $user[$i]['bukti_bayar']) ?>" alt="" width="100px" height="100px"></a></td>
                  <?php if ($user[$i]['status_bayar'] == 0) : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><b>Belum bayar</b></td>
                  <?php elseif ($user[$i]['status_bayar'] == 1) : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><b>Belum divalidasi</b></td>
                  <?php else : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><b>Sudah divalidasi</b></td>
                  <?php endif; ?>
                  <?php if ($user[$i]['status_bayar'] == 0) : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><a class="badge badge-info text-white">Belum bayar</a></td>
                  <?php elseif ($user[$i]['status_bayar'] == 1) : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><a href="<?= base_url("admin/validasi/orang/" . $user[$i]['user_id']) ?>" class="badge badge-primary" onclick="return confirm('Yakin?')">Validasi</a></td>
                  <?php else : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><a class="badge badge-success text-white">Tervalidasi</a></td>
                  <?php endif; ?>
                </tr>
                <?php for ($j = 1; $j < $user[$i]['jumlah']; $j++) : ?>
                  <tr>
                    <td><?= $pemain[$count]['nama_pemain'] ?></td>
                    <td><?= $pemain[$count]['nim'] ?></td>
                    <td><?= $pemain[$count]['jenis_kelamin'] ?></td>
                    <td><?= $pemain[$count]['instansi'] ?></td>
                    <td><?= $pemain[$count]['jurusan'] ?></td>
                    <td><a class="pop" style="cursor: pointer"><img src="<?= base_url('players/foto/' . $pemain[$count]['foto_diri']) ?>" alt="" width="100px" height="100px"></a></td>
                  <td><a class="pop" style="cursor: pointer"><img src="<?= base_url('players/foto/' . $pemain[$count]['foto_kartu_pelajar']) ?>" alt="" width="100px" height="100px"></a></td>
                    <td><?= $pemain[$count++]['nama_kategori'] ?></td>
                  </tr>
                <?php endfor; ?>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                class="sr-only">Close</span></button>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <?= $this->session->flashdata('message') ?>
  <script>
    $('.pop').on('click', function() {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
  });</script>
</body>

</html>
