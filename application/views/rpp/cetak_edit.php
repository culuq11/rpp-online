<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="<?= base_url('rpp/cetak'); ?>" class="btn btn-warning mb-3">Kembali ke Menu Cetak</a>
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <!-- <div class="row justify-content-md-center">
                <div class="col-sm-6"> -->
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <input type="hidden" class="form-control" id="id_cetak" name="id_cetak" value="<?= $cetak_rpp['id_cetak']; ?>">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                <select name="id_mapel" id="id_mapel" class="form-control">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <!-- <?php foreach ($mapel as $m) : ?>
                                        <?php if ($m['id'] == $cetak_rpp['id_mapel']) : ?>
                                            <option value="<?= $m['id']; ?>" selected><?= $m['nama_mapel']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['nama_mapel']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?> -->
                                    <?php foreach ($dataRPP as $dr) : ?>
                                        <?php if ($dr->id_mapel == $cetak_rpp['id_matpel']) : ?>
                                            <option value="<?= $dr->id_mapel; ?>" selected><?= $dr->nama_mapel; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $dr->id_mapel; ?>"><?= $dr->nama_mapel; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Rombel</label>
                                <select name="id_rombel" id="id_rombel" class="form-control">
                                    <option value="">Pilih Rombel</option>
                                    <?php foreach ($dataRPP as $dr) : ?>
                                        <?php if ($dr->id_rombel == $cetak_rpp['id_kelas']) : ?>
                                            <option value="<?= $dr->id_rombel; ?>" selected><?= $dr->nama_kelas; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $dr->id_rombel; ?>"><?= $dr->nama_kelas; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" id="id_rombel" name="id_rombel" value="<?= $cetak_rpp['nama_kelas']; ?>"> -->
                                <?= form_error('id_rombel', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan Materi Pokok</label>
                                <select name="id_rpp_data" id="id_rpp_data" class="form-control">
                                    <option value="">Pilih Materi Pokok</option>
                                    <?php foreach ($dataRPP as $drpp) : ?>
                                        <?php if ($drpp->id_data == $cetak_rpp['id_rpp_data']) : ?>
                                            <option value="<?= $drpp->id_data; ?>" selected><?= $drpp->materi_pokok; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $drpp->id_data; ?>"><?= $drpp->materi_pokok; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_data', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Audience</label>
                                <select name="id_rpp_tujuan" id="id_rpp_tujuan" class="form-control">
                                    <option value="">Pilih Audience</option>
                                    <?php foreach ($tujuanRPP as $trpp) : ?>
                                        <?php if ($trpp->id_tujuan == $cetak_rpp['id_rpp_tujuan']) : ?>
                                            <option value="<?= $trpp->id_tujuan; ?>" selected><?= $trpp->t_audience; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $trpp->id_tujuan; ?>"><?= $trpp->t_audience; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Model Pembelajaran</label>
                                <select name="id_rpp_model" id="id_rpp_model" class="form-control">
                                    <option value="">Pilih Model Pembelajaran</option>
                                    <?php foreach ($modelRPP as $mrpp) : ?>
                                        <?php if ($mrpp->id_model == $cetak_rpp['id_rpp_model']) : ?>
                                            <option value="<?= $mrpp->id_model; ?>" selected><?= $mrpp->jenis_model_pemb; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $mrpp->id_model; ?>"><?= $mrpp->jenis_model_pemb; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_model', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-12">
                                <label for="exampleFormControlInput1" class="form-label">Pilih Judul Penilaian</label>
                                <select name="id_rpp_penilaian" id="id_rpp_penilaian" class="form-control">
                                    <option value="">Pilih Judul Penilaian</option>
                                    <?php foreach ($nilaiRPP as $nrpp) : ?>
                                        <?php if ($nrpp->id_nilai == $cetak_rpp['id_rpp_penilaian']) : ?>
                                            <option value="<?= $nrpp->id_nilai; ?>" selected><?= $nrpp->judul_penilaian; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $nrpp->id_nilai; ?>"><?= $nrpp->judul_penilaian; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_rpp_penilaian', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-sm-4">
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
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