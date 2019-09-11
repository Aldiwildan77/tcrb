<div class="col-lg-8 offset-lg-1 user pt-5">
  <div class="row">
    <div class="col-12">
      <!-- Beregu -->
      <h4 class="text-center mt-2 mb-2">FORM PENDAFTARAN BEREGU</h4>
      <form action="<?= base_url('user/pendaftaran-proses-regu') ?>" method="post" enctype="multipart/form-data" id="formBeregu">
        <div class="row mb-3">
          <div class="col-12">
            <div class="row no-gutters justify-content-center">
              <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
                <button type="button" class="btn btn-sm btn-warning text-white btn-block" data-toggle="modal" data-target="#modalBeregu">Lihat harga</button>
              </div>
              <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
                <button class="btn btn-sm btn-success btn-block">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <nav>
          <ul class="nav nav-tabs" id="reguTab" role="tablist">
            <?php $j = 0 ?>
            <?php $k = 0 ?>
            <?php for ($i = 0; $i < sizeof($regu); $i++) : ?>
              <li class="nav-item">
                <a class="nav-link regu" id="regu1" data-toggle="tab" href="#regu<?= $i + 1 ?>" data-regu="1" role="tab" aria-controls="regu1" aria-selected="true">Regu <?= $i + 1 ?></a>
              </li>
            <?php endfor; ?>
          </ul>
        </nav>
        <div class="beregu">
          <div class="tab-content" id="reguTabContent">
            <?php for ($i = 0; $i < sizeof($regu); $i++) : ?>
              <div class="tab-pane fade" id="regu<?= $i + 1 ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                <h5 class="text-center mt-2">REGU <?= $i + 1 ?></h5>
                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label for="namaRegu1">Nama Regu</label>
                    <input type="text" class="form-control" id="namaRegu1" name="regu[]" aria-describedby="namaRegu" placeholder="Masukkan nama regu <?= $i + 1 ?>" value="<?= $regu[$i]['nama'] ?>" required>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="instansiRegu1">Asal instansi</label>
                    <input type="text" class="form-control" id="instansiRegu1" name="instansiRegu[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" value="<?= $regu[$i]['instansi'] ?>" required>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="kategoriRegu1">Kategori pertandingan</label>
                    <select id="kategoriRegu1" class="form-control" name="kategoriRegu[]" required>
                      <?php foreach ($kategoriRegu as $key => $value) : ?>
                        <?php if ($regu[$i]['kategori_id'] == $key) : ?>
                          <option value="<?= $key ?>" selected><?= $value ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <hr>
                <?php $a = $j + 4 ?>
                <?php for ($j; $j < $a; $j++) : ?>
                  <?php if ($j == 0 || $j % 4 == 0) : ?>
                    <h6><b>Pemain <?= $j % 4 + 1 ?> (Captain regu)</b></h6>
                  <?php else : ?>
                    <h6><b>Pemain <?= $j % 4 + 1 ?></b></h6>
                  <?php endif; ?>
                  <div class="form-row">
                    <div class="form-group col-lg-6">
                      <?php if ($j == 0 || $j % 4 == 0) : ?>
                        <label for="pemain<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Nama Pemain <?= $j % 4 + 1 ?> (sebagai captain regu)</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
                      <?php else : ?>
                        <label for="pemain<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Nama Pemain <?= $j % 4 + 1 ?></label>
                      <?php endif; ?>
                      <input type="text" class="form-control" id="pemain<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" name="pemain<?= $j % 4 + 1 ?>[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain <?= $j % 4 + 1 ?>" value="<?= $pemain[$j]['nama'] ?>">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="jenisKelamin<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Jenis Kelamin</label>
                      <select id="jenisKelamin<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" class="form-control" name="jenisKelamin<?= $j % 4 + 1 ?>[]" required>
                        <?php foreach ($jenis_kelamin as $key => $value) : ?>
                          <?php if ($regu[$j]['jenis_kelamin'] == $key) : ?>
                            <option value="<?= $key ?>" selected><?= $value ?></option>
                          <?php else : ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-4">
                      <label for="nim<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">NIM/NIS</label>
                      <input type="text" class="form-control" id="nim<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" name="nim<?= $j % 4 + 1 ?>[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required value="<?= $pemain[$j]['nim'] ?>">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="fakultas<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
                      <input type="text" class="form-control" id="fakultas<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" name="fakultas<?= $j % 4 + 1 ?>[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required value="<?= $pemain[$j]['jurusan'] ?>">
                    </div>
                    <div class="form-group col-lg-4">
                      <label for="alergi<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
                      <input type="text" class="form-control" id="alergi<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" name="alergi<?= $j % 4 + 1 ?>[]" aria-describedby="nim" placeholder="Masukkan alergi makanan" value="<?= $pemain[$j]['alergi'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6">
                      <label for="foto_diri<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
                      <input type="file" class="form-control-file" id="foto_diri<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" name="foto_diri<?= $j % 4 + 1 ?>[]" accept="image/*" required>
                      <img src="<?= base_url('players/foto/') . $pemain[$j]['foto_diri'] ?>" class="mt-2" alt="foto <?= $pemain[$j]['nama'] ?>" width="200">
                    </div>
                    <div class="form-group col-lg-6">
                      <label for="foto_kartu<?= $j % 4 + 1 ?>_<?= $i + 1 ?>">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
                      <input type="file" class="form-control-file" id="foto_kartu<?= $j % 4 + 1 ?>_<?= $i + 1 ?>" name="foto_kartu<?= $j % 4 + 1 ?>[]" accept="image/*" required>
                      <img src="<?= base_url('players/foto/') . $pemain[$j]['foto_kartu_pelajar'] ?>" class="mt-2" alt="foto <?= $pemain[$j]['nama'] ?>" width="200">
                    </div>
                  </div>
                  <hr>
                <?php endfor; ?>
                <?php $j = $a ?>
                <h6><b>Official</b> (Kosongi jika tidak ada official)</h6>
                <?php $b = $k + 2 ?>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="official1_1">Nama Official</label>
                    <?php for ($l = $k; $l < $b; $l++) : ?>
                      <input type="text" class="form-control" id="official<?= $l % 2 + 1 ?>_<?= $i ?>" name="official<?= $l % 2 + 1 ?>[]" aria-describedby="namaOfficial" placeholder="Masukkan nama official <?= $l % 2 + 1 ?>" value="<?= $official[$l]['nama'] ?>">
                    <?php endfor; ?>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="jk_official1_1">Jenis Kelamin</label>
                    <?php for ($l = $k; $l < $b; $l++) : ?>
                      <select id="jk_official<?= $l % 2 + 1 ?>_<?= $i ?>" class="form-control" name="jk_official<?= $l % 2 + 1 ?>[]">
                        <?php if (empty($official[$l]['jenis_kelamin'])) : ?>
                          <option selected disabled>Tidak ada official</option>
                        <?php else : ?>
                          <?php foreach ($jenis_kelamin as $key => $value) : ?>
                            <?php if ($official[$l]['jenis_kelamin'] == $key) : ?>
                              <option value="<?= $key ?>" selected><?= $value ?></option>
                            <?php else : ?>
                              <option value="<?= $key ?>"><?= $value ?></option>
                            <?php endif; ?>
                          <?php endforeach ?>
                        <?php endif; ?>
                      </select>
                    <?php endfor; ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label for="sebagai1_1">Sebagai</label>
                    <?php for ($l = $k; $l < $b; $l++) : ?>
                      <input type="text" class="form-control" id="sebagai<?= $l % 2 + 1 ?>_<?= $i ?>" name="sebagai<?= $l % 2 + 1 ?>[]" aria-describedby="nim" placeholder="Masukkan kedudukan official <?= $l % 2 + 1 ?>" value="<?= $official[$l]['sebagai'] ?>">
                    <?php endfor; ?>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="alergi_official1_1">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
                    <?php for ($l = $k; $l < $b; $l++) : ?>
                      <input type="text" class="form-control" id="alergi_official<?= $l % 2 + 1 ?>_<?= $i ?>" name="alergi_official<?= $l % 2 + 1 ?>[]" aria-describedby="nim" placeholder="Masukkan alergi official <?= $l % 2 + 1 ?>" value="<?= $official[$l]['alergi'] ?>">
                    <?php endfor; ?>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="paket_official_<?= $l + 1 ?>">Pilih paket</label>
                    <select id="paket_official_<?= $l + 1 ?>" class="form-control" name="paket_official[]">
                      <?php if (empty($official[$k]['kategori_id'])) : ?>
                        <option selected disabled>Tidak ada official</option>
                      <?php else : ?>
                        <?php foreach ($kategoriOfficial as $key => $value) : ?>
                          <?php if ($official[$k]['kategori_id'] == $key) : ?>
                            <option value="<?= $key ?>" selected><?= $value ?></option>
                          <?php endif; ?>
                        <?php endforeach ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <hr>
              </div>
              <?php $k = $b ?>
            <?php endfor; ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- </div>
			</div> -->

<div class="modal fade" id="modalBeregu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Harga Kategori Beregu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col" class="text-right">Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Paket A Beregu Rapid
                  <ul>
                    <li>Pendaftaran</li>
                    <li>Penginapan</li>
                    <li>Makan Pagi (3x)</li>
                    <li>Makan Siang (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 1.600.000</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Paket B Beregu Rapid
                  <ul>
                    <li>Pendaftaran</li>
                    <li>Penginapan</li>
                    <li>Makan Pagi (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 1.445.000</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Paket C Beregu Rapid
                  <ul>
                    <li>Pendaftaran</li>
                    <li>Makan Siang (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 455.000</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Paket Blitz
                  <ul>
                    <li>Pendaftaran</li>
                  </ul>
                </td>
                <td class="text-right">Rp 120.000</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Paket A Perorangan/Official 2 orang
                  <ul>
                    <li>Penginapan</li>
                    <li>Makan Siang (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 710.000</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Paket B Perorangan/Official 1 orang
                  <ul>
                    <li>Penginapan</li>
                    <li>Makan Siang (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 355.000</td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Paket C Perorangan/Official 2 orang
                  <ul>
                    <li>Makan Siang (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 100.000</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Paket D Perorangan/Official 1 orang
                  <ul>
                    <li>Makan Siang (3x)</li>
                  </ul>
                </td>
                <td class="text-right">Rp 50.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>