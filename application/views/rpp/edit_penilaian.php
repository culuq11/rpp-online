    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <a href="<?= base_url('rpp/penilaian'); ?>" class="btn btn-warning mb-3">Kembali Ke Menu Data</a>

                <form action="" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" value="<?= $nilaidata['id_nilai']; ?>">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Kelas</label>
                                    <select name="id_rombel" id="id_rombel" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($rombel as $r) : ?>
                                            <?php if ($r->id_rombel == $nilaidata['id_rombel']) : ?>
                                                <option value="<?= $r->id_rombel; ?>" selected><?= $r->nama_kelas; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $r->id_rombel; ?>"><?= $r->nama_kelas; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <select name="id_rombel" id="id_rombel" class="form-control">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($tugas_guru as $tg) : ?>
                                                <option value="<?= $tg->id; ?>"><?= $tg->nama_kelas; ?></option>
                                            <?php endforeach; ?>
                                        </select> -->
                                </div>
                                <div class="mb-3 col-sm-8">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                    <select name="id_mapel" id="id_mapel" class="form-control">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($mapel as $m) : ?>
                                            <?php if ($m->id_mapel == $nilaidata['id_mapel']) : ?>
                                                <option value="<?= $m->id_mapel; ?>" selected><?= $m->nama_mapel; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m->id_mapel; ?>"><?= $m->nama_mapel; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleFormControlInput1" class="form-label">Judul Penilaian</label>
                                    <input type="text" class="form-control" id="judul_penilaian" name="judul_penilaian" placeholder="Contoh: Penilaian Mapel Matematika Kelas X AKL" autocomplete="off" value="<?= $nilaidata['judul_penilaian']; ?>">
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleFormControlInput1" class="form-label">Penilaian Pengetahuan</label>
                                    <textarea type="text" class="form-control" id="pengetahuan" name="pengetahuan" placeholder="Keterangan Pengetahuan"><?= $nilaidata['pengetahuan']; ?></textarea>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleFormControlInput1" class="form-label">Penilaian Keterampilan</label>
                                    <textarea type="text" class="form-control" id="keterampilan" name="keterampilan" placeholder="Keterangan Keterampilan"><?= $nilaidata['keterampilan']; ?></textarea>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleFormControlInput1" class="form-label">Penilaian Sikap</label>
                                    <textarea type="text" class="form-control" id="sikap" name="sikap" placeholder="Keterangan Sikap"><?= $nilaidata['sikap']; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>



    </div>
    <!-- /.container-fluid -->