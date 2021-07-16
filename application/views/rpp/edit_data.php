<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <a href="<?= base_url('rpp'); ?>" class="btn btn-warning mb-3">Kembali Ke Menu Data</a>

            <form action="" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" class="form-control" id="id_data" name="id_data" value="<?= $IDdata['id_data']; ?>">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                            </div>
                            <div class="mb-3 col-sm-4">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Kelas</label>
                                <select name="id_rombel" id="id_rombel" class="form-control">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($tugas_guru as $tg) : ?>
                                        <?php if ($tg->id_rombel == $IDdata['id_rombel']) : ?>
                                            <option value="<?= $tg->id_rombel; ?>" selected><?= $tg->nama_kelas; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tg->id_rombel; ?>"><?= $tg->nama_kelas; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3 col-sm-5">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                <select name="id_mapel" id="id_mapel" class="form-control">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($tugas_guru as $tg) : ?>
                                        <?php if ($tg->id_mapel == $IDdata['id_mapel']) : ?>
                                            <option value="<?= $tg->id_mapel; ?>" selected><?= $tg->nama_mapel; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tg->id_mapel; ?>"><?= $tg->nama_mapel; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3 col-sm-3">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Semester</label>
                                <select name="id_semester" id="id_semester" class="form-control">
                                    <option value="">Pilih Semester</option>
                                    <?php foreach ($semester as $smstr) : ?>
                                        <?php if ($smstr['id'] == $IDdata['id_semester']) : ?>
                                            <option value="<?= $smstr['id']; ?>" selected><?= $smstr['ket_semester']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $smstr['id']; ?>"><?= $smstr['ket_semester']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3 col-sm-4">
                                <label for="exampleFormControlInput1" class="form-label">Kode KI/KD Pengetahuan</label>
                                <input type="text" class="form-control" id="kode_kikd_peng" name="kode_kikd_peng" placeholder="Kode KI/KD Pengetahuan" autocomplete="off" value="<?= $IDdata['kode_kikd_peng']; ?>">
                            </div>
                            <div class="mb-3 col-sm-8">
                                <label for="exampleFormControlInput1" class="form-label">Kompetensi Dasar Pengetahuan</label>
                                <textarea type="text" class="form-control" id="ket_kd_peng" name="ket_kd_peng" placeholder="Kompetensi Dasar Pengetahuan"><?= $IDdata['ket_kd_peng']; ?></textarea>
                            </div>
                            <div class="mb-3 col-sm-4">
                                <label for="exampleFormControlInput1" class="form-label">Kode KI/KD Keterampilan</label>
                                <input type="text" class="form-control" id="kode_kikd_ket" name="kode_kikd_ket" placeholder="Kode KI/KD Keterampilan" autocomplete="off" value="<?= $IDdata['kode_kikd_ket']; ?>">
                            </div>
                            <div class="mb-3 col-sm-8">
                                <label for="exampleFormControlInput1" class="form-label">Kompetensi Dasar Keterampilan</label>
                                <textarea type="text" class="form-control" id="ket_kd_ket" name="ket_kd_ket" placeholder="Kompetensi Dasar Keterampilan"><?= $IDdata['ket_kd_ket']; ?></textarea>
                            </div>
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Pengisian Materi Pokok</label>
                                <input type="text" class="form-control" id="materi_pokok" name="materi_pokok" placeholder="Pengisian Materi Pokok" autocomplete="off" value="<?= $IDdata['materi_pokok']; ?>">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Pengisian Alokasi Waktu</label>
                                <input type="text" class="form-control" id="alokasi_waktu" name="alokasi_waktu" placeholder="Pengisian Alokasi Waktu" autocomplete="off" value="<?= $IDdata['alokasi_waktu']; ?>">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Isi Pertemuan</label>
                                <input type="text" class="form-control" id="pertemuan" name="pertemuan" placeholder="Pertemuan ke" autocomplete="off" value="<?= $IDdata['pertemuan']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-2">
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