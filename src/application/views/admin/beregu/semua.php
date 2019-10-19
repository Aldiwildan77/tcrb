<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->

  <title>Admin</title>
</head>

<body>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="text-center">Beregu</h3>
        <a href="<?= base_url('admin/home') ?>" class="btn btn-primary btn-sm mb-1">Kembali</a>
        <?= $this->session->flashdata('message') ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="example1">
            <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Nama regu</th>
                <th>Instansi</th>
                <th>Kategori</th>
                <th>Pemain</th>
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
                  <td><?= $regu[$count]['nama_regu'] ?></td>
                  <td><?= $regu[$count]['instansi'] ?></td>
                  <td><?= $regu[$count]['nama_kategori'] ?></td>
                  <td><a style="cursor: pointer" class="badge badge-warning pemainBtn" data-reguNama="<?= $regu[$count]['nama_regu'] ?>" data-reguid="<?= $regu[$count++]['id'] ?>">Detail pemain</a></td>
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
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><a href="<?= base_url("admin/validasi/regu/" . $user[$i]['user_id']) ?>" class="badge badge-primary" onclick="return confirm('Yakin?')">Validasi</a></td>
                  <?php else : ?>
                    <td rowspan="<?= $user[$i]['jumlah'] ?>"><a class="badge badge-success text-white">Tervalidasi</a></td>
                  <?php endif; ?>
                </tr>
                <?php for ($j = 1; $j < $user[$i]['jumlah']; $j++) : ?>
                  <tr>
                    <td><?= $regu[$count]['nama_regu'] ?></td>
                    <td><?= $regu[$count]['instansi'] ?></td>
                    <td><?= $regu[$count]['nama_kategori'] ?></td>
                    <td><a style="cursor: pointer" class="badge badge-warning pemainBtn" data-reguNama="<?= $regu[$count]['nama_regu'] ?>" data-reguid="<?= $regu[$count++]['id'] ?>">Detail pemain</a></td>
                  </tr>
                <?php endfor; ?>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
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

  <div class="modal fade" id="pemainModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h3>Regu : <span id="modalNamaRegu"></span></h3>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <th>No</th>
                <th>Nama Pemain</th>
                <th>NIM</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Foto Diri</th>
                <th>Foto Kartu Pelajar</th>
                <th>Alergi</th>
              </thead>
              <tbody id="modalBodyTable">
              </tbody>
            </table>
          </div>
          <div class="table-responsive mt-2" id="official">

          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <?= $this->session->flashdata('message') ?>
  <script>
    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');
    });
  </script>

  <script type="text/JavaScript">
    $('.pemainBtn').on('click', function(){
      let url = "<?= base_url('players/foto/'); ?>";
      let reguId = $(this).data('reguid')
      let pemain = <?= json_encode($pemain); ?>;
      let official = <?= json_encode($official); ?>;
      let namaRegu = $(this).data('regunama')
      let renderPemain = ''
      let no = 1
      $('#modalNamaRegu').html(namaRegu)
      for (let i = 0; i < pemain.length; i++) {
        if(pemain[i]['regu_id'] == reguId){
          renderPemain +=
          `<tr>
            <td>${no++}</td>
            <td>${pemain[i]['nama']}</td>
            <td>${pemain[i]['nim']}</td>
            <td>${pemain[i]['jenis_kelamin']}</td>
            <td>${pemain[i]['jurusan']}</td>
            <td><img src="${url}${pemain[i]['foto_diri']}" width="100px" heigth="100px"></td>
            <td><img src="${url}${pemain[i]['foto_kartu_pelajar']}" width="100px" heigth="100px"></td>
            <td>${pemain[i]['alergi']}</td>
          </tr>`
        }
      }
      let renderOfficial = ''
      for (let i = 0; i < official.length; i++) {
        if(official[i]['regu_id'] == reguId){
          renderOfficial +=
          `<tr>
            <td>${i + 1}</td>
            <td>${official[i]['nama_official']}</td>
            <td>${official[i]['jenis_kelamin']}</td>
            <td>${official[i]['sebagai']}</td>
            <td>${official[i]['alergi']}</td>
            <td>${official[i]['nama_kategori']}</td>
          </tr>`
        }
      }
      if(renderOfficial != null){
        let head = `<table class="table table-bordered"><thead>
          <th>No</th>
          <th>Nama Official</th>
          <th>Jenis Kelamin</th>
          <th>Sebagai</th>
          <th>Alergi</th>
          <th>Kategori</th>
        </thead><tbody>`;
        head += renderOfficial
        renderOfficial = head
        renderOfficial += `</tbody></table>`
      }
      $('#modalBodyTable').html(renderPemain)
      $('#official').html(renderOfficial)
      $('#pemainModal').modal('show')
    })
  </script>
</body>

</html>