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

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahpenilian">Tambah Jenis Penilaian</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Judul Penilaian</th>
                            <th scope="col" class="text-center">Mata Pelajaran</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($nilai as $n) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td scope="row" class="text-center"><?= $n->judul_penilaian; ?></td>
                                <td scope="row" class="text-center"><?= $n->nama_mapel; ?></td>
                                <td scope="row" class="text-center"><?= $n->nama_kelas; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#copyrpp<?= $n->id_nilai; ?>">copy</a>
                                    <a href="<?= base_url('rpp/edit_penilaian/') . $n->id_nilai; ?>" class="badge badge-warning">edit</a>
                                    <a href="<?= base_url('rpp/hapus_penilaian/') . $n->id_nilai; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahpenilian" tabindex="-1" role="dialog" aria-labelledby="tambahpenilianLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahpenilianLabel">Tambah Data RPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rpp/penilaian'); ?>" method="post">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id_user']; ?>">
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Pilih Kelas</label>
                                        <select name="id_rombel" id="id_rombel" class="form-control">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($rombel as $r) : ?>
                                                <option value="<?= $r->id_rombel; ?>"><?= $r->nama_kelas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- <select name="id_rombel" id="id_rombel" class="form-control">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($tugas_guru as $tg) : ?>
                                                <option value="<?= $tg->id; ?>"><?= $tg->nama_kelas; ?></option>
                                            <?php endforeach; ?>
                                        </select> -->
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Pilih Mata Pelajaran</label>
                                        <select name="id_mapel" id="id_mapel" class="form-control">
                                            <option value="">Pilih Mata Pelajaran</option>
                                            <?php foreach ($mapel as $m) : ?>
                                                <option value="<?= $m->id_mapel; ?>"><?= $m->nama_mapel; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Judul Penilaian</label>
                                        <input type="text" class="form-control" id="judul_penilaian" name="judul_penilaian" placeholder="Contoh: Penilaian Mapel Matematika Kelas X AKL" autocomplete="off">
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Penilaian Pengetahuan</label>
                                        <textarea type="text" class="form-control" id="pengetahuan" name="pengetahuan" placeholder="Keterangan Pengetahuan"></textarea>
                                        <!-- <select name="id_kode_kikd" id="id_kode_kikd" class="form-control">
                                        <option value="">Pilih Kode KI KD</option>
                                        <?php foreach ($silabus as $s) : ?>
                                            <option value="<?= $s['id']; ?>"><?= $s['kode_kikd']; ?></option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Penilaian Keterampilan</label>
                                        <textarea type="text" class="form-control" id="keterampilan" name="keterampilan" placeholder="Keterangan Keterampilan"></textarea>
                                        <!-- <select name="id_ket_kd" id="id_ket_kd" class="form-control">
                                        <option value="">Pilih Kompetensi Dasar</option>
                                        <?php foreach ($silabus as $s) : ?>
                                            <option value="<?= $s['id']; ?>"><?= $s['kompetensi_dasar']; ?></option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="exampleFormControlInput1" class="form-label">Penilaian Sikap</label>
                                        <textarea type="text" class="form-control" id="sikap" name="sikap" placeholder="Keterangan Sikap"></textarea>
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

    <?php foreach ($nilai as $n) : ?>
        <div class="modal fade" id="copyrpp<?= $n->id_nilai; ?>" tabindex="-1" role="dialog" aria-labelledby="copyrppLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="copyrppLabel">Copy Data RPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('rpp/copy_penilaian'); ?>" method="post">
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
                                        <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $n->id_mapel; ?>">
                                        <input type="hidden" id="judul_penilaian" name="judul_penilaian" value="<?= $n->judul_penilaian; ?>">
                                        <input type="hidden" id="pengetahuan" name="pengetahuan" value="<?= $n->pengetahuan; ?>">
                                        <input type="hidden" id="keterampilan" name="keterampilan" value="<?= $n->keterampilan; ?>">
                                        <input type="hidden" id="sikap" name="sikap" value="<?= $n->sikap; ?>">
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