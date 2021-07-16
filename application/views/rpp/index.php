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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#datarpp_add">Tambah Data RPP</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Materi Pokok</th>
                        <th scope="col" class="text-center">Mata Pelajaran</th>
                        <th scope="col" class="text-center">Kelas</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data_rpp as $dr) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i; ?></th>
                            <td scope="row" class="text-center"><?= $dr->materi_pokok; ?></td>
                            <td scope="row" class="text-center"><?= $dr->nama_mapel; ?></td>
                            <td scope="row" class="text-center"><?= $dr->nama_kelas; ?></td>
                            <td class="text-center">
                                <a href="" class="badge badge-info" data-toggle="modal" data-target="#copyrpp<?= $dr->id_data; ?>">copy</a>
                                <a href="<?= base_url('rpp/edit_datarpp/') . $dr->id_data; ?>" class="badge badge-warning">edit</a>
                                <a href="<?= base_url('rpp/hapus_datarpp/') . $dr->id_data; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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
<div class="modal fade" id="datarpp_add" tabindex="-1" role="dialog" aria-labelledby="datarpp_addLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="datarpp_addLabel">Tambah Data RPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('rpp'); ?>" method="post">
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
                                        <?php foreach ($tugas_guru as $tg) : ?>
                                            <option value="<?= $tg->id_rombel; ?>"><?= $tg->nama_kelas; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-5">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                    <select name="id_mapel" id="id_mapel" class="form-control">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($tugas_guru as $tg) : ?>
                                            <option value="<?= $tg->id_mapel; ?>"><?= $tg->nama_mapel; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pilih Semester</label>
                                    <select name="id_semester" id="id_semester" class="form-control">
                                        <option value="">Pilih Semester</option>
                                        <?php foreach ($semester as $smstr) : ?>
                                            <option value="<?= $smstr['id']; ?>"><?= $smstr['ket_semester']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlInput1" class="form-label">Kode KI/KD Pengetahuan</label>
                                    <input type="text" class="form-control" id="kode_kikd_peng" name="kode_kikd_peng" placeholder="Kode KI/KD Pengetahuan" autocomplete="off">
                                </div>
                                <div class="mb-3 col-sm-8">
                                    <label for="exampleFormControlInput1" class="form-label">Kompetensi Dasar Pengetahuan</label>
                                    <textarea type="text" class="form-control" id="ket_kd_peng" name="ket_kd_peng" placeholder="Kompetensi Dasar Pengetahuan"></textarea>
                                </div>
                                <div class="mb-3 col-sm-4">
                                    <label for="exampleFormControlInput1" class="form-label">Kode KI/KD Keterampilan</label>
                                    <input type="text" class="form-control" id="kode_kikd_ket" name="kode_kikd_ket" placeholder="Kode KI/KD Keterampilan" autocomplete="off">
                                </div>
                                <div class="mb-3 col-sm-8">
                                    <label for="exampleFormControlInput1" class="form-label">Kompetensi Dasar Keterampilan</label>
                                    <textarea type="text" class="form-control" id="ket_kd_ket" name="ket_kd_ket" placeholder="Kompetensi Dasar Keterampilan"></textarea>
                                </div>
                                <div class="mb-3 col-sm-12">
                                    <label for="exampleFormControlInput1" class="form-label">Pengisian Materi Pokok</label>
                                    <input type="text" class="form-control" id="materi_pokok" name="materi_pokok" placeholder="Pengisian Materi Pokok" autocomplete="off">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleFormControlInput1" class="form-label">Pengisian Alokasi Waktu</label>
                                    <input type="text" class="form-control" id="alokasi_waktu" name="alokasi_waktu" placeholder="Pengisian Alokasi Waktu" autocomplete="off">
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="exampleFormControlInput1" class="form-label">Isi Pertemuan</label>
                                    <input type="text" class="form-control" id="pertemuan" name="pertemuan" placeholder="Pertemuan ke" autocomplete="off">
                                </div>
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

<!-- Modal -->
<?php foreach ($data_rpp as $dr) : ?>
    <div class="modal fade" id="copyrpp<?= $dr->id_data; ?>" tabindex="-1" role="dialog" aria-labelledby="copyrppLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="copyrppLabel">Copy Data RPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rpp/copy_datarpp'); ?>" method="post">
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
                                            <?php foreach ($tugas_guru as $tg) : ?>
                                                <option value="<?= $tg->id_rombel; ?>"><?= $tg->nama_kelas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                                    <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $dr->id_mapel; ?>">
                                    <input type="hidden" id="id_semester" name="id_semester" value="<?= $dr->id_semester; ?>">
                                    <input type="hidden" id="kode_kikd_peng" name="kode_kikd_peng" value="<?= $dr->kode_kikd_peng; ?>">
                                    <input type="hidden" id="ket_kd_peng" name="ket_kd_peng" value="<?= $dr->ket_kd_peng; ?>">
                                    <input type="hidden" id="kode_kikd_ket" name="kode_kikd_ket" value="<?= $dr->kode_kikd_ket; ?>">
                                    <input type="hidden" id="ket_kd_ket" name="ket_kd_ket" value="<?= $dr->ket_kd_ket; ?>">
                                    <input type="hidden" id="materi_pokok" name="materi_pokok" value="<?= $dr->materi_pokok; ?>">
                                    <input type="hidden" id="alokasi_waktu" name="alokasi_waktu" value="<?= $dr->alokasi_waktu; ?>">
                                    <input type="hidden" id="pertemuan" name="pertemuan" value="<?= $dr->pertemuan; ?>">
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