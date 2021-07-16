    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-lg">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="<?= base_url('rpp/input_tujuan'); ?>" class="btn btn-primary mb-3">Tambah Tujuan Pembelajaran</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Audience</th>
                            <th scope="col" class="text-center">Model Pembelajaran</th>
                            <th scope="col" class="text-center">Mata Pelajaran</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data_tujuan as $dt) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td scope="row" class="text-center"><?= $dt->t_audience; ?></td>
                                <td scope="row" class="text-center"><?= $dt->jenis_model_pemb; ?></td>
                                <td scope="row" class="text-center"><?= $dt->nama_mapel; ?></td>
                                <td scope="row" class="text-center"><?= $dt->nama_kelas; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#copyrpp<?= $dt->id_tujuan; ?>">copy</a>
                                    <a href="<?= base_url('rpp/edit_tujuan/') . $dt->id_tujuan; ?>" class="badge badge-warning">edit</a>
                                    <a href="<?= base_url('rpp/hapus_tujuan/') . $dt->id_tujuan; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>


            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

    <!-- Copy Data -->
    <?php foreach ($data_tujuan as $dt) : ?>
        <div class="modal fade" id="copyrpp<?= $dt->id_tujuan; ?>" tabindex="-1" role="dialog" aria-labelledby="copyrppLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="copyrppLabel">Copy Data RPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('rpp/copy_tujuan'); ?>" method="post">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
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
                                                    <option value="<?= $r->id_rombel; ?>"><?= $r->nama_kelas; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $dt->id_mapel; ?>">
                                        <input type="hidden" id="t_condition" name="t_condition" value="<?= $dt->t_condition; ?>">
                                        <input type="hidden" id="t_audience" name="t_audience" value="<?= $dt->t_audience; ?>">
                                        <input type="hidden" id="id_model_pemb" name="id_model_pemb" value="<?= $dt->id_model_pemb; ?>">
                                        <input type="hidden" id="kko_1" name="kko_1" value="<?= $dt->kko_1; ?>">
                                        <input type="hidden" id="t_behaviour" name="t_behaviour" value="<?= $dt->t_behaviour; ?>">
                                        <input type="hidden" id="kko_2" name="kko_2" value="<?= $dt->kko_2; ?>">
                                        <input type="hidden" id="t_behaviour_2" name="t_behaviour_2" value="<?= $dt->t_behaviour_2; ?>">
                                        <input type="hidden" id="kko_4" name="kko_4" value="<?= $dt->kko_4; ?>">
                                        <input type="hidden" id="t_behaviour_4" name="t_behaviour_4" value="<?= $dt->t_behaviour_4; ?>">
                                        <input type="hidden" id="t_m" name="t_m" value="<?= $dt->t_m; ?>">
                                        <input type="hidden" id="t_4c" name="t_4c" value="<?= $dt->t_4c; ?>">
                                        <input type="hidden" id="t_degree" name="t_degree" value="<?= $dt->t_degree; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>