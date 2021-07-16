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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahTugas">Tambah Pembagian Tugas</a>

            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama Guru</th>
                        <th scope="col" class="text-center">Mata Pelajaran</th>
                        <th scope="col" class="text-center">Kelas</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($tugas)) : ?>
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php foreach ($tugas as $t) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i; ?></th>
                            <td class="text-center"><?= $t['nama']; ?></td>
                            <td class="text-center"><?= $t['nama_mapel']; ?></td>
                            <td class="text-center"><?= $t['nama_kelas']; ?></td>
                            <td class="text-center">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editTugasGuru<?= $t['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapustugas/') . $t['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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

</div>
<!-- End of Main Content -->

<div class="modal fade" id="tambahTugas" tabindex="-1" role="dialog" aria-labelledby="tambahTugasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahTugasLabel">Tambah Data Tugas Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tugas'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Guru Pengampu :</label>
                            <div class="col-sm-8">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Pilih Guru Pengampu</option>
                                    <?php foreach ($userdata as $ud) : ?>
                                        <option value="<?= $ud['id_user']; ?>"><?= $ud['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Mata Pelajaran :</label>
                            <div class="col-sm-8"><select name="id_mapel" id="id_mapel" class="form-control">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['nama_mapel']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kelas yang diampu :</label>
                            <div class="col-sm-8">
                                <select name="id_rombel" id="id_rombel" class="form-control">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($rombel as $r) : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['nama_kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
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

<!-- Modal Edit -->
<?php foreach ($tugas as $t) : ?>
    <div class="modal fade" id="editTugasGuru<?= $t['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editTugasGuruLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTugasGuruLabel">Ubah Data Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editTugas/') . $t['id']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $t['id']; ?>">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Guru Pengampu :</label>
                                <div class="col-sm-8">
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Pilih Guru Pengampu</option>
                                        <?php foreach ($userdata as $ud) : ?>
                                            <?php if ($ud['id_user'] == $t['user_id']) : ?>
                                                <option value="<?= $ud['id_user']; ?>" selected><?= $ud['nama']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $ud['id_user']; ?>"><?= $ud['nama']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Mata Pelajaran :</label>
                                <div class="col-sm-8"><select name="id_mapel" id="id_mapel" class="form-control">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($mapel as $m) : ?>
                                            <?php if ($m['id'] == $t['id_mapel']) : ?>
                                                <option value="<?= $m['id']; ?>" selected><?= $m['nama_mapel']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m['id']; ?>"><?= $m['nama_mapel']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Kelas yang diampu :</label>
                                <div class="col-sm-8">
                                    <select name="id_rombel" id="id_rombel" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($rombel as $r) : ?>
                                            <?php if ($r['id'] == $t['id_rombel']) : ?>
                                                <option value="<?= $r['id']; ?>" selected><?= $r['nama_kelas']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $r['id']; ?>"><?= $r['nama_kelas']; ?></option>
                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>