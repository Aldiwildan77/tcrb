<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Pemain <?= $kategori ?></title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Pemain <?= $kategori ?></h1>
        <div class="alert alert-info mb-1" role="alert">
          Pemain yang ada di list ini adalah pemain yang pembayarannya telah divalidasi oleh admin
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Jenis_kelamin</th>
              <th scope="col">Instansi</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Kategori</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i=0; $i < sizeof($pemain); $i++):?>              
            <tr>
              <th scope="row"><?= $i + 1 ?></th>
              <td><?= $pemain[$i]['nama'] ?></td>
              <td><?= $pemain[$i]['nim'] ?></td>
              <td><?= $pemain[$i]['jenis_kelamin'] ?></td>
              <td><?= $pemain[$i]['instansi'] ?></td>
              <td><?= $pemain[$i]['jurusan'] ?></td>
              <td><?= $pemain[$i]['nama_kategori'] ?></td>
            </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>window.print()</script>
</body>

</html>