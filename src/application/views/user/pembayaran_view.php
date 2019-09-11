<div class="col-lg-8 offset-lg-1">
  <div class="col-lg-12 user pt-3">
    <div class="row mb-4">
      <div class="col-12">
        <h5 class="text-center">Untuk Pembayaran hanya bisa dilakukan dengan cara transfer ke BANK BNI Dengan keterangan No Rekening : "0796319021" a/n "Rahma Andita Desi Pramesti" kemudian upload bukti bayar ke website TCRB</h5>
      </div>
    </div>
  </div>
  <div class="user p-4">
    <?php if ($check != 'null') : ?>
      <div class="row table-responsive">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th>Nama</th>
              <td colspan="3"><?= $user['nama_lengkap'] ?></td>
              <th>Status</th>
              <?php if ($check == 'regu') : ?>
                <?php if ($regu[0]['status_bayar'] == 2) : ?>
                  <td><span class="badge badge-success">Lunas</span></td>
                <?php elseif ($regu[0]['status_bayar'] == 1) : ?>
                  <td><span class="badge badge-warning">Menunggu verifikasi admin</span></td>
                <?php elseif ($regu[0]['status_bayar'] == 0) : ?>
                  <td><span class="badge badge-warning">Belum bayar</span></td>
                <?php endif; ?>
              <?php elseif ($check == 'orang') : ?>
                <?php if ($status['status_bayar'] == 2) : ?>
                  <td><span class="badge badge-success">Lunas</span></td>
                <?php elseif ($status['status_bayar'] == 1) : ?>
                  <td><span class="badge badge-warning">Menunggu verifikasi admin</span></td>
                <?php elseif ($status['status_bayar'] == 0) : ?>
                  <td><span class="badge badge-warning">Belum bayar</span></td>
                <?php endif; ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th>Instansi</th>
              <td colspan="3"><?= $user['instansi'] ?></td>
              <th>Tanggal Pembayaran</th>
              <?php if ($check == 'regu') : ?>
              <td><?=$regu['updatedAt']?></td>
              
              <?php elseif ($check == 'orang') : ?>
              <td><?=$status['updatedAt']?></td>
              <?php endif; ?>
            </tr>
            <tr>
              <th>Telepon</th>
              <td><?= $user['no_telepon'] ?></td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

    <?php if ($check == 'orang') : ?>
      <!-- Tabel perorangan -->
      <div class="row mx-auto">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col" class="text-right">Harga(IDR)</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < sizeof($pemain); $i++) : ?>
                <tr>
                  <th scope="row"><?= $i + 1 ?></th>
                  <td><?= $pemain[$i]['nama_pemain'] ?></td>
                  <td><?= $pemain[$i]['nama_kategori'] ?></td>
                  <td class="text-right"><?= number_format($pemain[$i]['harga'], 0, ',', '.') ?></td>
                </tr>
              <?php endfor; ?>
              <tr>
                <td class="bg-light"> </td>
                <td class="bg-light"> </td>
                <td class="bg-light" style="text-align:right;">Total : </td>
                <td class="bg-dark text-white text-right"><?= number_format($totalHarga, 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <?php if ($status['status_bayar'] == 2) : ?>
            <div class="text-center">
              <button type="button" class="text-center btn btn-info btn-lg mt-2" style="border-radius:25px;">Cetak Struk</button>
            </div>
          <?php elseif ($status['status_bayar'] == 1) : ?>
            <h3 class="text-center">Pembayaran anda masih dalam proses review.</h3>
          <?php elseif ($status['status_bayar'] == 0) : ?>
            <form action="<?= base_url('user/pembayaran') ?>" method="post" enctype="multipart/form-data">
              <p>Upload bukti bayar</p>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="buktiBayar" name="buktiBayar">
                  <label class="custom-file-label" for="buktiBayar" aria-describedby="buktiBayar">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button type="submit" class="input-group-text">Upload</button>
                </div>
              </div>
              <small class="form-text text-danger"><?= form_error('buktiBayar'); ?></small>
            </form>
          <?php endif; ?>
        </div>
      </div>
    <?php elseif ($check == 'regu') : ?>
      <!-- Tabel beregu -->
      <div class="row mx-auto">
        <div class="table-responsive">
          <table class="table table-striped table-borderless table-sm">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Official</th>
                <th scope="col">Kategori Official</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($official)) : ?>
                <?php for ($i = 0; $i < sizeof($official); $i++) : ?>
                  <tr>
                    <th scope="row"><?= $i + 1 ?></th>
                    <td><?= $official[$i]['nama'] ?></td>
                    <td><?= $official[$i]['namaPaket'] ?></td>
                  </tr>
                <?php endfor; ?>
              <?php endif; ?>
            </tbody>
          </table>
          <table class="table table-striped table-borderless table-sm">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Regu</th>
                <th scope="col">Kategori Regu</th>
                <th scope="col">Nama Pemain</th>
                <th class="text-right" scope="col">Harga(IDR)</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < sizeof($regu); $i++) : ?>
                <tr>
                  <th rowspan="4" scope="row"><?= $i + 1 ?></th>
                  <td rowspan="4"><?= $regu[$i]['nama'] ?></td>
                  <td rowspan="4"><?= $regu[$i]['namaPaket'] ?></td>
                  <td><?= $pemain[$p]['nama'] ?></td>
                  <td class="text-right" rowspan="4"><?= number_format($regu[$i]['total'], 0, ',', '.') ?></td>
                </tr>
                <?php $temp = $p + 4; ?>
                <?php for ($j = $p + 1; $j < $temp; $j++) : ?>
                  <tr>
                    <td><?= $pemain[$j]['nama'] ?></td>
                  </tr>
                <?php endfor; ?>
                <?php $p = $p + 4; ?>
              <?php endfor; ?>
              <tr>
                <td class="bg-light"> </td>
                <td class="bg-light"> </td>
                <td class="bg-light"> </td>
                <td class="bg-light" style="text-align:right;">Total : </td>
                <td class="bg-dark text-white text-right"> <?= number_format($totalHarga['total'], 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <?php if ($regu[0]['status_bayar'] == 2) : ?>
            <div class="text-center">
              <button type="button" class="text-center btn btn-info btn-lg mt-2" style="border-radius:25px;">Cetak Struk</button>
            </div>
          <?php elseif ($regu[0]['status_bayar'] == 1) : ?>
            <h3 class="text-center">Pembayaran anda masih dalam proses review.</h3>
          <?php elseif ($regu[0]['status_bayar'] == 0) : ?>
            <form action="<?= base_url('user/pembayaran') ?>" method="post" enctype="multipart/form-data">
              <p>Upload bukti bayar</p>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="buktiBayar" name="buktiBayar">
                  <label class="custom-file-label" for="buktiBayar" aria-describedby="buktiBayar">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button type="submit" class="input-group-text">Upload</button>
                </div>
              </div>
              <small class="form-text text-danger"><?= form_error('buktiBayar'); ?></small>
            </form>
          <?php endif; ?>
        </div>
      </div>

    <?php elseif ($check == 'null') : ?>
      <div class="row">
        <div class="col-12">
          <h3 class="text-center">Data kosong. Anda belum melakukan pendaftaran.</h3>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
</div>
</div>
</div>
<?= $this->session->flashdata('message-user') ?>



<!-- untuk aside 3 div,   -->
</div>
</div>
</div>