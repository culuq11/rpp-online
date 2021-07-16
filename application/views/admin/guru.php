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
                            <p class="card-text">Silahkan Download Format <a href="<?= base_url('file_upload/format_data_guru.xlsx'); ?>" class="badge bg-info text-white">Format Data Guru</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/upload_guru'); ?>
                            <div class="input-group">
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="guru" name="guru" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="guru">Choose file</label>
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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahPTK">Tambah Data PTK</a>
                </div>
                <!-- <div class="col-sm-5">
                    <form action="<?= base_url('admin/guru'); ?>" method="post">
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
                        <th scope="col" class="text-center">Nama PTK</th>
                        <th scope="col" class="text-center">NIP PTK</th>
                        <th scope="col" class="text-center">Email PTK</th>
                        <th scope="col" class="text-center">Password PTK</th>
                        <th scope="col" class="text-center">Status PTK</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($gurus)) : ?>
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($gurus as $g) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= ++$start; ?></th>
                            <td><?= $g['nama']; ?></td>
                            <td><?= $g['nip']; ?></td>
                            <td><?= $g['email']; ?></td>
                            <td><?= $g['pass_tampil']; ?></td>
                            <?php foreach ($status as $s) : ?>
                                <?php if ($s['id'] == $g['id_ket_guru']) : ?>
                                    <td><?= $s['ket_role']; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="text-center">
                                <a href="" class="badge badge-info" data-toggle="modal" data-target="#detailguru<?= $g['id_user']; ?>">detail</a>
                                <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editguru<?= $g['id_user']; ?>">edit</a>
                                <a href="<?= base_url('admin/hapusguru/') . $g['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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
<div class="modal fade" id="tambahPTK" tabindex="-1" role="dialog" aria-labelledby="tambahPTKLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPTKLabel">Tambah Data PTK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/guru'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama" name="nama" class="col-sm-3 col-form-label">Nama PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap PTK" autocomplete="off" value="<?= set_value('nama'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" name="nip" class="col-sm-3 col-form-label">NIP PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP PTK" autocomplete="off" value="<?= set_value('nip'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" name="email" class="col-sm-3 col-form-label">Email PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email aktif" autocomplete="off" value="<?= set_value('email'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password1" name="password1" class="col-sm-3 col-form-label">Password PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password2" name="password2" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_lahir" name="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" autocomplete="off" value="<?= set_value('tempat_lahir'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" name="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" value="<?= set_value('tanggal_lahir'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" name="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <?php foreach ($jenis as $jk) : ?>
                                    <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ket_role" name="ket_role" class="col-sm-3 col-form-label">Status PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <select type="text" class="form-control" id="ket_role" name="ket_role">
                                <option value="">Pilih Status PTK</option>
                                <?php foreach ($status as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['ket_role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ket_role" name="ket_role" class="col-sm-3 col-form-label">Role PTK</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-6">
                            <select type="text" class="form-control" id="role_id" name="role_id">
                                <option value="">Pilih Role PTK</option>
                                <?php foreach ($status as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Aktif?
                        </label>
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

<!-- Modal Detail -->
<?php foreach ($guru as $g) : ?>
    <div class="modal fade" id="detailguru<?= $g['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailguruLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailguruLabel">Detail Data PTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nama" name="nama" class="col-sm-3 col-form-label">Nama PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $g['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" name="nama" class="col-sm-3 col-form-label">NIP PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nip" id="nip" value="<?= $g['nip']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" name="email" class="col-sm-3 col-form-label">Email PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" id="email" value="<?= $g['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tempat_lahir" name="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $g['tempat_lahir']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal_lahir" name="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $g['tanggal_lahir']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_kelamin" name="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $g['jenis_kelamin']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ket_role" name="ket_role" class="col-sm-3 col-form-label">Status PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ket_role" id="ket_role" value="<?= $g['ket_role']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Modal Edit -->
<?php foreach ($guru as $g) : ?>
    <div class="modal fade" id="editguru<?= $g['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="editguruLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editguruLabel">Ubah Data PTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editguru/') . $g['id_user']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id_user" name="id_user" value="<?= $g['id_user']; ?>">
                        <div class="mb-3 row">
                            <label for="nama" name="nama" class="col-sm-3 col-form-label">Nama PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $g['nama']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" name="nama" class="col-sm-3 col-form-label">NIP PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nip" id="nip" value="<?= $g['nip']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" name="email" class="col-sm-3 col-form-label">Email PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" id="email" value="<?= $g['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tempat_lahir" name="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $g['tempat_lahir']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal_lahir" name="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $g['tanggal_lahir']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_kelamin" name="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-6">
                                <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <?php foreach ($jenis as $jk) : ?>
                                        <?php if ($jk == $g['jenis_kelamin']) : ?>
                                            <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jk; ?>"><?= $jk; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role_id" name="role_id" class="col-sm-3 col-form-label">Role PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-6">
                                <select type="text" class="form-control" id="role_id" name="role_id">
                                    <option value="">Pilih Role PTK</option>
                                    <?php foreach ($status as $s) : ?>
                                        <?php if ($s['id'] == $g['role_id']) : ?>
                                            <option value="<?= $s['id']; ?>" selected><?= $s['role']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $s['id']; ?>"><?= $s['role']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="id_ket_guru" name="id_ket_guru" class="col-sm-3 col-form-label">Status PTK</label>
                            <label class="col-form-label">:</label>
                            <div class="col-sm-6">
                                <select type="text" class="form-control" id="id_ket_guru" name="id_ket_guru">
                                    <option value="">Pilih Status PTK</option>
                                    <?php foreach ($status as $s) : ?>
                                        <?php if ($s['id'] == $g['id_ket_guru']) : ?>
                                            <option value="<?= $s['id']; ?>" selected><?= $s['ket_role']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $s['id']; ?>"><?= $s['ket_role']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Aktif?
                            </label>
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