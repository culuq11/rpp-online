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
                            <p class="card-text">Silahkan Download Format <a href="<?= base_url('file_upload/format_data_mapel.xlsx'); ?>" class="badge bg-info text-white">Format Data Mata Pelajaran</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/upload_mapel'); ?>
                            <div class="input-group">
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="mapel" name="mapel" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="mapel">Choose file</label>
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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahMapel">Tambah Mata Pelajaran</a>
                </div>
                <!-- <div class="col-sm-5">
                    <form action="<?= base_url('admin/mapel'); ?>" method="post">
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
                        <th scope="col" class="text-center">Kode Mapel</th>
                        <th scope="col" class="text-center">Nama Mapel</th>
                        <th scope="col" class="text-center">Jenis Kurikulum</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($mapels)) : ?>
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($mapels as $m) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= ++$start; ?></th>
                            <td class="text-center"><?= $m['kode_mapel']; ?></td>
                            <td><?= $m['nama_mapel']; ?></td>
                            <?php foreach ($kurikulum as $k) : ?>
                                <?php if ($k['id'] == $m['id_kurikulum']) : ?>
                                    <td class="text-center"><?= $k['jenis_kurikulum']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="text-center">
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editMapel<?= $m['id']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapusmapel/') . $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambahMapel" tabindex="-1" role="dialog" aria-labelledby="tambahMapelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMapelLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/mapel'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Kode Mata Pelajaran" value="<?= set_value('kode_mapel'); ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama Mata Pelajaran" value="<?= set_value('kode_mapel'); ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" id="id_kurikulum" name="id_kurikulum">
                            <option value="">Pilih Jenis Kurikulum</option>
                            <?php foreach ($kurikulum as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['jenis_kurikulum']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
<?php foreach ($mapel as $m) : ?>
    <div class="modal fade" id="editMapel<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMapelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMapelLabel">Ubah Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/mapeledit/') . $m['id']; ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $m['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" placeholder="Kode Mata Pelajaran" value="<?= $m['kode_mapel']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Nama Mata Pelajaran" value="<?= $m['nama_mapel']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <select type="text" class="form-control" id="id_kurikulum" name="id_kurikulum">
                                <option value="">Pilih Jenis Kurikulum</option>
                                <?php foreach ($kurikulum as $k) : ?>
                                    <?php if ($k['id'] == $m['id_kurikulum']) : ?>
                                        <option value="<?= $k['id']; ?>" selected><?= $k['jenis_kurikulum']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['jenis_kurikulum']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
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