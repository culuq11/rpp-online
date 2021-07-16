    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg">

                <form action="<?= base_url('rpp/input_model'); ?>" method="POST">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                                        <div class="mb-3 col-sm-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label">Pilih Model Pembelajaran</label>
                                            <select name="id_model_pemb" id="id_model_pemb" class="form-control">
                                                <option value="">Pilih Model Pembelajaran</option>
                                                <?php foreach ($tujuan as $t) : ?>
                                                    <option value="<?= $t->id_model_pemb; ?>"><?= $t->jenis_model_pemb; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_model_pemb', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3 col-sm-3">
                                            <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                            <select name="id_mapel" id="id_mapel" class="form-control">
                                                <option value="">Pilih Mata Pelajaran</option>
                                                <?php foreach ($mapel as $m) : ?>
                                                    <option value="<?= $m->id_mapel; ?>"><?= $m->nama_mapel; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="mb-3 col-sm-2">
                                            <label for="exampleFormControlInput1" class="form-label">Pilih Kelas</label>
                                            <select name="id_rombel" id="id_rombel" class="form-control">
                                                <option value="">Pilih Kelas</option>
                                                <?php foreach ($rombel as $r) : ?>
                                                    <option value="<?= $r->id_rombel; ?>"><?= $r->nama_kelas; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_rombel', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 mb-2">
                                                            <label for="keg_awal" class="form-label">Kegiatan Pendahuluan</label>
                                                            <input type="text" class="form-control" id="keg_awal_1" name="keg_awal_1" placeholder="Kegiatan pertama" autocomplete="off" value="<?= set_value('keg_awal_1'); ?>">
                                                            <?= form_error('keg_awal_1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-12 mb-2">
                                                            <input type="text" class="form-control" id="keg_awal_2" name="keg_awal_2" placeholder="Kegiatan kedua" autocomplete="off" value="<?= set_value('keg_awal_2'); ?>">
                                                            <?= form_error('keg_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-12 mb-5">
                                                            <input type="text" class="form-control" id="keg_awal_3" name="keg_awal_3" placeholder="Kegiatan ketiga" autocomplete="off" value="<?= set_value('keg_awal_3'); ?>">
                                                            <?= form_error('keg_awal_3', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-12 mb-2">
                                                            <label for="keg_akhir_1" class="form-label">Kegiatan Penutup</label>
                                                            <input type="text" class="form-control" id="keg_akhir_1" name="keg_akhir_1" placeholder="Kegiatan pertama" autocomplete="off" value="<?= set_value('keg_akhir_1'); ?>">
                                                            <?= form_error('keg_akhir_1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-12 mb-2">
                                                            <input type="text" class="form-control" id="keg_akhir_2" name="keg_akhir_2" placeholder="Kegiatan kedua" autocomplete="off" value="<?= set_value('keg_akhir_2'); ?>">
                                                            <?= form_error('keg_akhir_2', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-12 mb-2">
                                                            <input type="text" class="form-control" id="keg_akhir_3" name="keg_akhir_3" placeholder="Kegiatan ketiga" autocomplete="off" value="<?= set_value('keg_akhir_3'); ?>">
                                                            <?= form_error('keg_akhir_3', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-2">
                                                        <div class="col-sm-12">
                                                            <h6 class="text-center">Judul Kegiatan Inti</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4">
                                                            <h6 class="text-center">Sintaks</h6>
                                                            <textarea type="text" class="form-control" id="sintak1" name="sintak1" readonly>Orientasi peserta didik pada masalah</textarea>
                                                            <?= form_error('sintak1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <h6 class="text-center">Aktifitas</h6>
                                                            <textarea type="text" class="form-control" id="aktifitas1" name="aktifitas1"></textarea>
                                                            <?= form_error('aktifitas1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4">
                                                            <textarea type="text" class="form-control" id="sintak2" name="sintak2" readonly>Mengorganisasi peserta didik</textarea>
                                                            <?= form_error('sintak2', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <textarea type="text" class="form-control" id="aktifitas2" name="aktifitas2"><?= set_value('aktifitas2'); ?></textarea>
                                                            <?= form_error('aktifitas2', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4">
                                                            <textarea type="text" class="form-control" id="sintak3" name="sintak3" readonly>Membimbing penyelidikan individu/kelompok</textarea>
                                                            <?= form_error('sintak3', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <textarea type="text" class="form-control" id="aktifitas3" name="aktifitas3"><?= set_value('aktifitas3'); ?></textarea>
                                                            <?= form_error('aktifitas3', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4">
                                                            <textarea type="text" class="form-control" id="sintak4" name="sintak4" readonly>Mengembangkan dan menyajikan hasil karya</textarea>
                                                            <?= form_error('sintak4', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <textarea type="text" class="form-control" id="aktifitas4" name="aktifitas4"><?= set_value('aktifitas4'); ?></textarea>
                                                            <?= form_error('aktifitas4', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-4">
                                                            <textarea type="text" class="form-control" id="sintak5" name="sintak5" readonly>Menganalisis dan mengevaluasi proses pemecahan masalah</textarea>
                                                            <?= form_error('sintak5', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <textarea type="text" class="form-control" id="aktifitas5" name="aktifitas5"><?= set_value('aktifitas5'); ?></textarea>
                                                            <?= form_error('aktifitas5', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>



        </div>
        <!-- /.container-fluid -->