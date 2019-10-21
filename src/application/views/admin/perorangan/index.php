<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Perorangan</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center mb-3">Perorangan</h3>
        <a href="<?= base_url('admin/home') ?>" class="btn btn-dark btn-sm mb-1">Kembali</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 33.33%" class="text-center">Belum bayar</th>
              <th style="width: 33.33%" class="text-center">Belum divalidasi</th>
              <th style="width: 33.33%" class="text-center">Sudah divalidasi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 33.33%" class="text-center"><?= $arrPerorangan[0][1] ?></td>
              <td style="width: 33.33%" class="text-center"><?= $arrPerorangan[1][1] ?></td>
              <td style="width: 33.33%" class="text-center"><?= $arrPerorangan[2][1] ?></td>
            </tr>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 50%" class="text-center">Rapid</th>
              <th style="width: 50%" class="text-center">Blitz</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 50%" class="text-center"><?= $rapid ?></td>
              <td style="width: 50%" class="text-center"><?= $blitz ?></td>
            </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-1">
        <a href="<?= base_url('admin/orang/semua') ?>" class="btn btn-primary btn-sm btn-block">Tampilkan semua</a>
      </div>
      <div class="col-lg-3 mb-1">
        <a href="<?= base_url('admin/orang/0') ?>" class="btn btn-primary btn-sm btn-block">Belum bayar</a>
      </div>
      <div class="col-lg-3 mb-1">
        <a href="<?= base_url('admin/orang/1') ?>" class="btn btn-primary btn-sm btn-block">Belum divalidasi</a>
      </div>
      <div class="col-lg-3 mb-1">
        <a href="<?= base_url('admin/orang/2') ?>" class="btn btn-primary btn-sm btn-block">Sudah divalidasi</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>