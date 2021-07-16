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

                <a href="<?= base_url('rpp/input_model'); ?>" class="btn btn-primary mb-3">Tambah Model Pembelajaran</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Model Pembelajaran</th>
                            <th scope="col" class="text-center">Mata Pelajaran</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data_model as $dm) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td scope="row" class="text-center"><?= $dm->jenis_model_pemb; ?></td>
                                <td scope="row" class="text-center"><?= $dm->nama_mapel; ?></td>
                                <td scope="row" class="text-center"><?= $dm->nama_kelas; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#copyrpp<?= $dm->id_model; ?>">copy</a>
                                    <a href="<?= base_url('rpp/edit_model/') . $dm->id_model; ?>" class="badge badge-warning">edit</a>
                                    <a href="<?= base_url('rpp/hapus_model/') . $dm->id_model; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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

    <!-- Modal -->
    <?php foreach ($data_model as $dm) : ?>
        <div class="modal fade" id="copyrpp<?= $dm->id_model; ?>" tabindex="-1" role="dialog" aria-labelledby="copyrppLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="copyrppLabel">Copy Data RPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('rpp/copy_model'); ?>" method="post">
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
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
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                                        <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $dm->id_mapel; ?>">
                                        <input type="hidden" id="id_model_pemb" name="id_model_pemb" value="<?= $dm->id_model_pemb; ?>">
                                        <input type="hidden" id="keg_awal_1" name="keg_awal_1" value="<?= $dm->keg_awal_1; ?>">
                                        <input type="hidden" id="keg_awal_2" name="keg_awal_2" value="<?= $dm->keg_awal_2; ?>">
                                        <input type="hidden" id="keg_awal_3" name="keg_awal_3" value="<?= $dm->keg_awal_3; ?>">
                                        <input type="hidden" id="keg_akhir_1" name="keg_akhir_1" value="<?= $dm->keg_akhir_1; ?>">
                                        <input type="hidden" id="keg_akhir_2" name="keg_akhir_2" value="<?= $dm->keg_akhir_2; ?>">
                                        <input type="hidden" id="keg_akhir_3" name="keg_akhir_3" value="<?= $dm->keg_akhir_3; ?>">
                                        <input type="hidden" id="sintak1" name="sintak1" value="<?= $dm->sintak1; ?>">
                                        <input type="hidden" id="aktifitas1" name="aktifitas1" value="<?= $dm->aktifitas1; ?>">
                                        <input type="hidden" id="sintak2" name="sintak2" value="<?= $dm->sintak2; ?>">
                                        <input type="hidden" id="aktifitas2" name="aktifitas2" value="<?= $dm->aktifitas2; ?>">
                                        <input type="hidden" id="sintak3" name="sintak3" value="<?= $dm->sintak3; ?>">
                                        <input type="hidden" id="aktifitas3" name="aktifitas3" value="<?= $dm->aktifitas3; ?>">
                                        <input type="hidden" id="sintak4" name="sintak4" value="<?= $dm->sintak4; ?>">
                                        <input type="hidden" id="aktifitas4" name="aktifitas4" value="<?= $dm->aktifitas4; ?>">
                                        <input type="hidden" id="sintak5" name="sintak5" value="<?= $dm->sintak5; ?>">
                                        <input type="hidden" id="aktifitas5" name="aktifitas5" value="<?= $dm->aktifitas5; ?>">
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