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

            <div class="row">
                <div class="clas sm-col-8 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Silahkan Download Format <a href="<?= base_url('file_upload/format_data_jurusan.xlsx'); ?>" class="badge bg-info text-white">Format Data Jurusan</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/upload_jurusan'); ?>
                            <div class="input-group">
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="jurusan" name="jurusan" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="jurusan">Choose file</label>
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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahjurusan">Tambah Jurusan Baru</a>
                </div>
                <!-- <div class="col-sm-5">
                    <form action="<?= base_url('admin/jurusan'); ?>" method="post">
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
                        <th scope="col" class="text-center">Bidang Keahlian</th>
                        <th scope="col" class="text-center">Program Keahlian</th>
                        <th scope="col" class="text-center">Kompetensi Keahlian</th>
                        <th scope="col" class="text-center">Program Pendidikan</th>
                        <th scope="col" class="text-center">Keterangan</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($jurusan)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($jurusan as $j) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= ++$start; ?></th>
                            <td><?= $j['bidang_keahlian']; ?></td>
                            <td><?= $j['prog_keahlian']; ?></td>
                            <td><?= $j['komp_keahlian']; ?></td>
                            <td class="text-center"><?= $j['prog_pend']; ?></td>
                            <td class="text-center"><?= $j['ket']; ?></td>
                            <td class="text-center">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editjurusan<?= $j['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapusJurusan/') . $j['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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
<div class="modal fade" id="tambahjurusan" tabindex="-1" role="dialog" aria-labelledby="tambahjurusanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahjurusanLabel">Tambah Data Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/jurusan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" placeholder="Bidang Keahlian" value="<?= set_value('bidang_keahlian'); ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prog_keahlian" name="prog_keahlian" placeholder="Program Keahlian" value="<?= set_value('prog_keahlian'); ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="komp_keahlian" name="komp_keahlian" placeholder="Kompetensi Keahlian" value="<?= set_value('komp_keahlian'); ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prog_pend" name="prog_pend" placeholder="Program Pendidikan" value="<?= set_value('prog_pend'); ?>" autocomplete="off">
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
<?php foreach ($jurusan as $j) : ?>
    <div class="modal fade" id="editjurusan<?= $j['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editjurusanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editjurusanLabel">Ubah Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editjurusan/') . $j['id']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $j['id']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" placeholder="Bidang Keahlian" value="<?= $j['bidang_keahlian']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="prog_keahlian" name="prog_keahlian" placeholder="Program Keahlian" value="<?= $j['prog_keahlian']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="komp_keahlian" name="komp_keahlian" placeholder="Kompetensi Keahlian" value="<?= $j['komp_keahlian']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="prog_pend" name="prog_pend" placeholder="Program Pendidikan" value="<?= $j['prog_pend']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" value="<?= $j['ket']; ?>" autocomplete="off">
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