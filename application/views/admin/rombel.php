<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="clas sm-col-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Silahkan Download Format <a href="<?= base_url('file_upload/format_data_rombel.xlsx'); ?>" class="badge bg-info text-white">Format Rombel</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/upload_rombel'); ?>
                            <div class="input-group">
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="rombel" name="rombel" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="rombel">Choose file</label>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h6>Jumlah Data : <?= $total_rows; ?></h6> -->
            <div class="row">
                <div class="col-sm-7">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRombelModal">Tambah Rombel Baru</a>
                </div>
                <!-- <div class="col-sm-5">
                    <form action="<?= base_url('admin/rombel'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pencarian" name="kata">
                            <input class="btn btn-primary" type="submit" name="submit">
                        </div>
                    </form>
                </div> -->
            </div>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Kompetensi Keahlian</th>
                        <th scope="col" class="text-center">Tingkat</th>
                        <th scope="col" class="text-center">Nama Kelas</th>
                        <th scope="col" class="text-center">Keterangan</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rombels)) : ?>
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($rombels as $r) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= ++$start; ?></th>
                            <?php foreach ($jurusan as $j) : ?>
                                <?php if ($j['id'] == $r['id_jurusan']) : ?>
                                    <td><?= $j['komp_keahlian']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="text-center"><?= $r['tingkat_kelas']; ?></td>
                            <td class="text-center"><?= $r['nama_kelas']; ?></td>
                            <td class="text-center"><?= $r['ket']; ?></td>
                            <td class="text-center">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editjurusan<?= $r['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapusrombel/') . $r['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRombelModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/rombel'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_jurusan" id="id_jurusan" class="form-control">
                            <option value="">Pilih Kompetensi Keahlian</option>
                            <?php foreach ($jurusan as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['komp_keahlian']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas">
                            <option value="">Pilih Tingkat Kelas</option>
                            <?php foreach ($tingkat as $t) : ?>
                                <option value="<?= $t; ?>"><?= $t; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" value="<?= set_value('nama_kelas'); ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" value="<?= set_value('ket'); ?>" autocomplete="off">
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
<?php foreach ($rombel as $r) : ?>
    <div class="modal fade" id="editjurusan<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editjurusanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editjurusanLabel">Ubah Data Rombel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editrombel/') . $r['id']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $r['id']; ?>">
                        <div class="form-group">
                            <select name="id_jurusan" id="id_jurusan" class="form-control">
                                <?php foreach ($jurusan as $j) : ?>
                                    <?php if ($j['id'] == $r['id_jurusan']) : ?>
                                        <option value="<?= $j['id']; ?>" selected><?= $j['komp_keahlian']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j['id']; ?>"><?= $j['komp_keahlian']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="tingkat_kelas" id="tingkat_kelas" class="form-control">
                                <?php foreach ($tingkat as $t) : ?>
                                    <?php if ($t == $r['tingkat_kelas']) : ?>
                                        <option value="<?= $t; ?>" selected><?= $t; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $t; ?>"><?= $t; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" value="<?= $r['nama_kelas']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" value="<?= $r['ket']; ?>" autocomplete="off">
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