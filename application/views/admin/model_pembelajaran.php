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
                            <p class="card-text">Silahkan Download Format <a href="<?= base_url('file_upload/format_model_pembelajaran.xlsx'); ?>" class="badge bg-info text-white">Format Model Pembelajaran</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/upload_model'); ?>
                            <div class="input-group">
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="pembelajaran" name="pembelajaran" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="pembelajaran">Choose file</label>
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
                <!-- <div class="col-sm-5">
                    <form action="<?= base_url('admin/model_pemb'); ?>" method="post">
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
                        <th scope="col" class="text-center">Jenis Model Pembelajaran</th>
                        <th scope="col" class="text-center">Penjelasan</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($models)) : ?>
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($models as $m) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= ++$start; ?></th>
                            <td class="text-center"><?= $m['jenis_model_pemb']; ?></td>
                            <td class="text-center"><?= $m['penjelasan_model']; ?></td>
                            <td class="text-center">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editpembelajaran<?= $m['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapus_model_pemb/') . $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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

<!-- Modal Edit -->
<?php foreach ($model as $m) : ?>
    <div class="modal fade" id="editpembelajaran<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editpembelajaranLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editpembelajaranLabel">Ubah Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_model_pemb/') . $m['id']; ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $m['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="jenis_model_pemb" name="jenis_model_pemb" placeholder="Jenis Pembelajaran" value="<?= $m['jenis_model_pemb']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="penjelasan_model" name="penjelasan_model" placeholder="Penjelasan Model"><?= $m['penjelasan_model']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="langkah_langkah" name="langkah_langkah" placeholder="Langkah-langkah Model"><?= $m['langkah_langkah']; ?></textarea>
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