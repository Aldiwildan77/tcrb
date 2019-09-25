<div class="col-lg-8 offset-lg-1 user pt-5">
			  <div class="row">
			    <div class="col-12">
			      <h3 class="text-center"><b>Pilih Kategori Pendaftaran</b></h3>
			    </div>
			  </div>
			  <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
			    <li class="nav-item col-6">
			      <a class="btn btn-outline-primary btn-block pilih-daftar text-center" id="pills-home-tab" data-toggle="pill" data-func="perorangan" href="" role="tab" aria-controls="pills-home" aria-selected="true">Perorangan</a>
			    </li>
			    <li class="nav-item col-6">
			      <a class="btn btn-outline-primary btn-block pilih-daftar text-center " id="pills-profile-tab" data-toggle="pill" data-func="beregu" href="" role="tab" aria-controls="pills-profile" aria-selected="false">Beregu</a>
			    </li>
			  </ul>
			  <div class="tab-content" id="pills-tabContent">
			    <div class="tab-pane fade" id="pills-perorangan" role="tabpanel" aria-labelledby="pills-home-tab">
			      <div class="row">
			        <div class="col-12">
			          <!-- Perorangan -->
			          <h4 class="text-center mt-2 mb-2">FORM PENDAFTARAN PERORANGAN</h4>
			          <form onsubmit="return confirm('Jumlah & Kategori pemain tidak dapat diganti setelah menekan tombol submit. Namun anda masih dapat mengganti identitas pemain')" action="<?= base_url('user/pendaftaran-proses-orang') ?>" method="post" enctype="multipart/form-data" id="formPerorangan">
			            <div class="row mb-3">
			              <div class="col-12">
			                <div class="row no-gutters justify-content-center">
			                  <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
			                    <button type="button" class="btn btn-sm btn-warning text-white btn-block" data-toggle="modal" data-target="#modalPerorangan">Lihat harga</button>
			                  </div>
			                  <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
			                    <button type="button" id="tambah-perorangan" class="btn btn-sm btn-info btn-block">Tambah pemain</button>
			                  </div>
			                  <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
			                    <button id="submit-form" class="btn btn-sm btn-success btn-block">Submit</button>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <hr>
			            <div class="perorangan">
			              <h5 class="font-weight-bold">Pemain 1</h5>
			              <div class="form-row">
			                <div class="form-group col-lg-6">
			                  <label for="pemain1">Nama Pemain</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
			                  <input type="text" class="form-control" id="pemain1" name="pemain[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain" required>
			                </div>
			                <div class="form-group col-lg-6">
			                  <label for="instansi1">Asal instansi</label>
			                  <input type="text" class="form-control" id="instansi1" name="instansi[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" required>
			                </div>
			              </div>
			              <div class="form-row">
			                <div class="form-group col-lg-4">
			                  <label for="jenisKelamin1">Jenis Kelamin</label>
			                  <select id="jenisKelamin1" class="form-control" name="jenisKelamin[]" required>
			                    <option selected disabled>Pilih salah satu</option>
			                    <option value="L">Laki-laki</option>
			                    <option value="P">Perempuan</option>
			                  </select>
			                </div>
			                <div class="form-group col-lg-4">
			                  <label for="nim1">NIM/NIS</label>
			                  <input type="text" class="form-control" id="nim1" name="nim[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
			                </div>
			                <div class="form-group col-lg-4">
			                  <label for="fakultas1">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
			                  <input type="text" class="form-control" id="fakultas1" name="fakultas[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
			                </div>
			              </div>
			              <div class="form-row">
			                <div class="form-group col-lg-6">
			                  <label for="foto_diri1">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                  <input type="file" class="form-control-file" id="foto_diri1" name="foto_diri[]" accept="image/*" required>
			                </div>
			                <div class="form-group col-lg-6">
			                  <label for="foto_kartu1">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                  <input type="file" class="form-control-file" id="foto_kartu1" name="foto_kartu[]" accept="image/*" required>
			                </div>
			              </div>
			              <div class="form-row">
			                <div class="form-group col-lg-6">
			                  <label for="kategori1">Kategori pertandingan</label>
			                  <select id="kategori1" class="form-control" name="kategori[]" required>
			                    <option selected disabled>Pilih salah satu</option>
			                    <option value="<?= $kategori[1]['id'] ?>"><?= $kategori[1]['nama'] ?></option>
			                    <option value="<?= $kategori[3]['id'] ?>"><?= $kategori[3]['nama'] ?></option>
			                    <option value="<?= $kategori[16]['id'] ?>"><?= $kategori[16]['nama'] ?></option>
			                    <option value="<?= $kategori[17]['id'] ?>"><?= $kategori[17]['nama'] ?></option>
			                    <option value="<?= $kategori[18]['id'] ?>"><?= $kategori[18]['nama'] ?></option>
			                    <option value="<?= $kategori[19]['id'] ?>"><?= $kategori[19]['nama'] ?></option>
			                  </select>
			                </div>
			              </div>
			              <hr>
			            </div>
			          </form>
			        </div>
			      </div>
			    </div>
			    <div class="tab-pane fade" id="pills-beregu" role="tabpanel" aria-labelledby="pills-profile-tab">
			      <div class="row">
			        <div class="col-12">
			          <!-- Beregu -->
			          <h4 class="text-center mt-2 mb-2">FORM PENDAFTARAN BEREGU</h4>
			          <form action="<?= base_url('user/pendaftaran-proses-regu') ?>" method="post" onsubmit="return confirm('Jumlah & Kategori regu, pemain dan official tidak dapat diganti setelah menekan tombol submit. Namun anda masih dapat mengganti identitas regu, pemain dan official ')" enctype="multipart/form-data" id="formBeregu">
			            <div class="row mb-3">
			              <div class="col-12">
			                <div class="row no-gutters justify-content-center">
			                  <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
			                    <button type="button" class="btn btn-sm btn-warning text-white btn-block" data-toggle="modal" data-target="#modalBeregu">Lihat harga</button>
			                  </div>
			                  <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
			                    <button type="button" id="tambah-regu" class="btn btn-sm btn-info btn-block">Tambah regu</button>
			                  </div>
			                  <div class="col col-auto col-lg col-md col-sm col-xs mx-1">
			                    <button class="btn btn-sm btn-success btn-block">Submit</button>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <nav>
			              <ul class="nav nav-tabs" id="reguTab" role="tablist">
			                <li class="nav-item">
			                  <a class="nav-link regu active" id="regu1" data-toggle="tab" href="#regu1" data-regu="1" role="tab" aria-controls="regu1" aria-selected="true">Regu 1</a>
			                </li>
			              </ul>
			            </nav>
			            <div class="beregu">
			              <div class="tab-content" id="reguTabContent">
			                <div class="tab-pane fade show active" id="regu1" role="tabpanel" aria-labelledby="nav-home-tab">
			                  <h5 class="text-center mt-2">REGU 1</h5>
			                  <div class="form-row">
			                    <div class="form-group col-lg-4">
			                      <label for="namaRegu1">Nama Regu</label>
			                      <input type="text" class="form-control" id="namaRegu1" name="regu[]" aria-describedby="namaRegu" placeholder="Masukkan nama regu 1" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="instansiRegu1">Asal instansi</label>
			                      <input type="text" class="form-control" id="instansiRegu1" name="instansiRegu[]" aria-describedby="instansi" placeholder="Masukkan asal instansi" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="kategoriRegu1">Kategori pertandingan</label>
			                      <select id="kategoriRegu1" class="form-control" name="kategoriRegu[]" required>
			                        <option selected disabled>Pilih salah satu</option>
			                        <?php for ($i = 4; $i < 8; $i++) : ?>
			                          <option value="<?= $kategori[$i]['id'] ?>"><?= $kategori[$i]['nama'] ?></option>
			                        <?php endfor; ?>
			                      </select>
			                    </div>
			                  </div>
			                  <hr>
			                  <h6><b>Pemain 1 (Captain regu)</b></h6>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="pemain1_1">Nama Pemain 1 (sebagai captain regu)</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
			                      <input type="text" class="form-control" id="pemain1_1" name="pemain1[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 1">
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="jenisKelamin1_1">Jenis Kelamin</label>
			                      <select id="jenisKelamin1_1" class="form-control" name="jenisKelamin1[]" required>
			                        <option selected disabled>Pilih salah satu</option>
			                        <option value="L">Laki-laki</option>
			                        <option value="P">Perempuan</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-4">
			                      <label for="nim1_1">NIM/NIS</label>
			                      <input type="text" class="form-control" id="nim1_1" name="nim1[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="fakultas1_1">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
			                      <input type="text" class="form-control" id="fakultas1_1" name="fakultas1[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="alergi1_1">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
			                      <input type="text" class="form-control" id="alergi1_1" name="alergi1[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="foto_diri1_1">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_diri1_1" name="foto_diri1[]" accept="image/*" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="foto_kartu1_1">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_kartu1_1" name="foto_kartu1[]" accept="image/*" required>
			                    </div>
			                  </div>
			                  <hr>
			                  <h6><b>Pemain 2</b></h6>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="pemain2_1">Nama Pemain 2</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
			                      <input type="text" class="form-control" id="pemain2_1" name="pemain2[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 2" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="jenisKelamin2_1">Jenis Kelamin</label>
			                      <select id="jenisKelamin2_1" class="form-control" name="jenisKelamin2[]" required>
			                        <option selected disabled>Pilih salah satu</option>
			                        <option value="L">Laki-laki</option>
			                        <option value="P">Perempuan</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-4">
			                      <label for="nim2_1">NIM/NIS</label>
			                      <input type="text" class="form-control" id="nim2_1" name="nim2[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="fakultas2_1">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
			                      <input type="text" class="form-control" id="fakultas2_1" name="fakultas2[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="alergi2_1">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
			                      <input type="text" class="form-control" id="alergi2_1" name="alergi2[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="foto_diri2_1">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_diri2_1" name="foto_diri2[]" accept="image/*" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="foto_kartu2_1">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_kartu2_1" name="foto_kartu2[]" accept="image/*" required>
			                    </div>
			                  </div>
			                  <hr>
			                  <h6><b>Pemain 3</b></h6>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="pemain3_1">Nama Pemain 3</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
			                      <input type="text" class="form-control" id="pemain3_1" name="pemain3[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 3" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="jenisKelamin3_1">Jenis Kelamin</label>
			                      <select id="jenisKelamin3_1" class="form-control" name="jenisKelamin3[]" required>
			                        <option selected disabled>Pilih salah satu</option>
			                        <option value="L">Laki-laki</option>
			                        <option value="P">Perempuan</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-4">
			                      <label for="nim3_1">NIM/NIS</label>
			                      <input type="text" class="form-control" id="nim3_1" name="nim3[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="fakultas3_1">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
			                      <input type="text" class="form-control" id="fakultas3_1" name="fakultas3[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="alergi3_1">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
			                      <input type="text" class="form-control" id="alergi3_1" name="alergi3[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="foto_diri3_1">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_diri3_1" name="foto_diri3[]" accept="image/*" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="foto_kartu3_1">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_kartu3_1" name="foto_kartu3[]" accept="image/*" required>
			                    </div>
			                  </div>
			                  <hr>
			                  <h6><b>Pemain 4</b></h6>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="pemain4_1">Nama Pemain 4</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Gelar diberi tanda kurung"></i>
			                      <input type="text" class="form-control" id="pemain4_1" name="pemain4[]" aria-describedby="namaPemain" placeholder="Masukkan nama pemain 4" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="jenisKelamin4_1">Jenis Kelamin</label>
			                      <select id="jenisKelamin4_1" class="form-control" name="jenisKelamin4[]" required>
			                        <option selected disabled>Pilih salah satu</option>
			                        <option value="L">Laki-laki</option>
			                        <option value="P">Perempuan</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-4">
			                      <label for="nim4_1">NIM/NIS</label>
			                      <input type="text" class="form-control" id="nim4_1" name="nim4[]" aria-describedby="nim" placeholder="Masukkan nim/nis" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="fakultas4_1">Fakultas</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Untuk Pelajar SMA diisi dengan jurusan yang diambil"></i>
			                      <input type="text" class="form-control" id="fakultas4_1" name="fakultas4[]" aria-describedby="fakultas" placeholder="Masukkan fakultas" required>
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="alergi4_1">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
			                      <input type="text" class="form-control" id="alergi4_1" name="alergi4[]" aria-describedby="nim" placeholder="Masukkan alergi makanan">
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="foto_diri4_1">Upload foto diri</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_diri4_1" name="foto_diri4[]" accept="image/*" required>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="foto_kartu4_1">Upload foto kartu pelajar</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="File berupa 1 foto dan maksimal berukuran 1MB"></i>
			                      <input type="file" class="form-control-file" id="foto_kartu4_1" name="foto_kartu4[]" accept="image/*" required>
			                    </div>
			                  </div>
			                  <hr>
			                  <h6><b>Official</b> (Kosongi jika tidak ada official)</h6>
			                  <div class="form-row">
			                    <div class="form-group col-lg-6">
			                      <label for="official1_1">Nama Official</label>
			                      <input type="text" class="form-control" id="official1_1" name="official1[]" aria-describedby="namaPemain" placeholder="Masukkan nama official 1">
			                      <input type="text" class="form-control" id="official2_1" name="official2[]" aria-describedby="namaPemain" placeholder="Masukkan nama official 2">
			                      <small id="pemain4_1" class="form-text text-muted">Gelar diberi tanda kurung</small>
			                    </div>
			                    <div class="form-group col-lg-6">
			                      <label for="jk_official1_1">Jenis Kelamin</label>
			                      <select id="jk_official1_1" class="form-control" name="jk_official1[]">
			                        <option selected disabled>Official 1</option>
			                        <option value="L">Laki-laki</option>
			                        <option value="P">Perempuan</option>
			                        <option>Tidak ada official 1</option>
			                      </select>
			                      <select id="jk_official2_1" class="form-control" name="jk_official2[]">
			                        <option selected disabled>Official 2</option>
			                        <option value="L">Laki-laki</option>
			                        <option value="P">Perempuan</option>
			                        <option>Tidak ada official 2</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-row">
			                    <div class="form-group col-lg-4">
			                      <label for="sebagai1_1">Sebagai</label>
			                      <input type="text" class="form-control" id="sebagai1_1" name="sebagai1[]" aria-describedby="nim" placeholder="Masukkan kedudukan official 1">
			                      <input type="text" class="form-control" id="sebagai2_1" name="sebagai2[]" aria-describedby="nim" placeholder="Masukkan kedudukan official 2">
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="alergi_official1_1">Alergi makanan</label> <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="Kosongi jika tidak memiliki alergi"></i>
			                      <input type="text" class="form-control" id="alergi_official1_1" name="alergi_official1[]" aria-describedby="nim" placeholder="Masukkan alergi official 1">
			                      <input type="text" class="form-control" id="alergi_official2_1" name="alergi_official2[]" aria-describedby="nim" placeholder="Masukkan alergi official 2">
			                    </div>
			                    <div class="form-group col-lg-4">
			                      <label for="paket_official_1">Pilih paket</label>
			                      <select id="paket_official_1" class="form-control" name="paket_official[]">
			                        <option selected disabled>Pilih salah satu</option>
			                        <?php for ($i = 8; $i < 12; $i++) : ?>
			                          <option value="<?= $kategori[$i]['id'] ?>"><?= $kategori[$i]['nama'] ?></option>
			                        <?php endfor; ?>
			                      </select>
			                    </div>
			                  </div>
			                  <hr>
			                </div>
			              </div>
			            </div>
			          </form>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			</div>
			</div>
			</div>

			<div class="modal fade" id="modalPerorangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Harga Kategori Perorangan</h5>
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
			              <?php $count = 1; ?>
			              <?php for ($i = 0; $i < 4; $i++) : ?>
			                <tr>
			                  <th scope="row"><?= $count++ ?></th>
			                  <td><?= $kategori[$i]['nama'] ?></td>
			                  <td class="text-right">Rp <?= number_format($kategori[$i]['harga'], 0, ',', '.') ?></td>
			                </tr>
			              <?php endfor; ?>
			              <?php for ($i = 12; $i < 20; $i++) : ?>
			                <tr>
			                  <th scope="row"><?= $count++ ?></th>
			                  <td><?= $kategori[$i]['nama'] ?>
			                    <?php if ($count % 2 == 0) : ?>
			                      <ul>
			                        <li>Pendaftaran</li>
			                        <li>Penginapan</li>
			                        <li>Makan Siang (3x)</li>
			                      </ul>
			                    <?php else : ?>
			                      <ul>
			                        <li>Pendaftaran</li>
			                        <li>Makan Siang (3x)</li>
			                      </ul>
			                    <?php endif; ?>
			                  </td>
			                  <td class="text-right">Rp <?= number_format($kategori[$i]['harga'], 0, ',', '.') ?></td>
			                </tr>
			              <?php endfor; ?>
			            </tbody>
			          </table>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

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
