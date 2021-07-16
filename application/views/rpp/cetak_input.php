<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <a href="<?= base_url('rpp/cetak'); ?>" class="btn btn-warning mb-3">Kembali ke Menu Cetak</a>
            <!-- <div class="row justify-content-md-center">
                <div class="col-sm-6"> -->
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('rpp/cetak_input'); ?>" method="POST">
                        <div class="row justify-content-md-center">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                <select name="id_mapel" id="id_mapel" class="form-control">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $m) : ?>
                                        <option value="<?= $m->id_mapel; ?>"><?= $m->nama_mapel; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Rombel</label>
                                <select name="id_rombel" id="id_rombel" class="form-control">
                                    <option value="">Pilih Rombel</option>
                                    <?php foreach ($rombel as $r) : ?>
                                        <option value="<?= $r->id_rombel; ?>"><?= $r->nama_kelas; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rombel', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan Materi Pokok</label>
                                <select name="id_rpp_data" id="id_rpp_data" class="form-control">
                                    <option value="">Pilih Materi Pokok</option>
                                    <?php foreach ($dataRPP as $drpp) : ?>
                                        <option value="<?= $drpp->id_data; ?>"><?= $drpp->materi_pokok; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_data', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Audience</label>
                                <select name="id_rpp_tujuan" id="id_rpp_tujuan" class="form-control">
                                    <option value="">Pilih Audience</option>
                                    <?php foreach ($tujuanRPP as $trpp) : ?>
                                        <option value="<?= $trpp->id_tujuan; ?>"><?= $trpp->t_audience; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Model Pembelajaran</label>
                                <select name="id_rpp_model" id="id_rpp_model" class="form-control">
                                    <option value="">Pilih Model Pembelajaran</option>
                                    <?php foreach ($modelRPP as $mrpp) : ?>
                                        <option value="<?= $mrpp->id_model; ?>"><?= $mrpp->jenis_model_pemb; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_model', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 col-sm-6">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Judul Penilaian</label>
                                <select name="id_rpp_penilaian" id="id_rpp_penilaian" class="form-control">
                                    <option value="">Pilih Judul Penilaian</option>
                                    <?php foreach ($nilaiRPP as $nrpp) : ?>
                                        <option value="<?= $nrpp->id_nilai; ?>"><?= $nrpp->judul_penilaian; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_penilaian', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 col-sm-2">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- </div>
            </div> -->
        </div>
    </div>
</div>