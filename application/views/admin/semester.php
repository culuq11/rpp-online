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
                            <p class="card-text">Silahkan Download Format</p>
                            <p><a href="<?= base_url('file_upload/format_semester.xlsx'); ?>" class="badge bg-info text-white">Format Semester</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/semester_upload'); ?>
                            <div class="input-group">
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="semester" name="semester" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="semester">Choose file</label>
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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Semester</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($semester as $s) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i; ?></th>
                            <td><?= $s['ket_semester']; ?></td>
                            <td class="text-center">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editsemester<?= $s['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapusJurusan/') . $s['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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

<!-- Modal Edit -->
<?php foreach ($semester as $s) : ?>
    <div class="modal fade" id="editsemester<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editsemesterLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editsemesterLabel">Ubah Data Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/semesteredit/') . $s['id']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ket_semester" name="ket_semester" placeholder="Bidang Keahlian" value="<?= $s['ket_semester']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan1" name="bulan1" placeholder="bulan1" value="<?= $s['bulan1']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan2" name="bulan2" placeholder="bulan2" value="<?= $s['bulan2']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan3" name="bulan3" placeholder="bulan3" value="<?= $s['bulan3']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan4" name="bulan4" placeholder="bulan4" value="<?= $s['bulan4']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan5" name="bulan5" placeholder="bulan5" value="<?= $s['bulan5']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan6" name="bulan6" placeholder="bulan6" value="<?= $s['bulan6']; ?>" autocomplete="off">
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