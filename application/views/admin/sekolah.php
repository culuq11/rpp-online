<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mb-3">
        <div class="col-sm-8 md-auto">

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart('admin/sekolah'); ?>
                    <input type="hidden" id="id" name="id" value="<?= $sekolah['id']; ?>">
                    <div class="mb-3 row">
                        <label for="nama_sekolah" name="nama_sekolah" class="col-sm-3 col-form-label">Nama Sekolah</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" value="<?= $sekolah['nama_sekolah']; ?>" autocomplete="off">
                            <?= form_error('nama_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="npsn" name="npsn" class="col-sm-3 col-form-label">NPSN Sekolah</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="npsn" id="npsn" value="<?= $sekolah['npsn']; ?>" autocomplete="off">
                            <?= form_error('npsn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" name="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $sekolah['alamat']; ?>" autocomplete="off">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_kepsek" name="nama_kepsek" id="nama_kepsek" class="col-sm-3 col-form-label">Nama Kepala Sekolah</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_kepsek" class="form-control" id="nama_kepsek" value="<?= $sekolah['nama_kepsek']; ?>" autocomplete="off">
                            <?= form_error('nama_kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip_kepsek" name="nip_kepsek" id="nip_kepsek" class="col-sm-3 col-form-label">NIP Kepala Sekolah</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" name="nip_kepsek" class="form-control" id="nip_kepsek" value="<?= $sekolah['nip_kepsek']; ?>" autocomplete="off">
                            <?= form_error('nip_kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ket" name="ket" id="ket" class="col-sm-3 col-form-label">Status Akreditasi</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" name="ket" class="form-control" id="ket" value="<?= $sekolah['ket']; ?>" autocomplete="off">
                            <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-sm-3 justify-content-start">
                        <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <?= form_open_multipart('admin/logosekolah'); ?>
                <input type="hidden" id="id" name="id" value="<?= $sekolah['id']; ?>">
                <div class="card-body">
                    <h5 class="card-title text-center">Logo Sekolah</h5>
                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets/img/') . $sekolah['logo']; ?>" class="img-thumbnail">
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 md-auto">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart('admin/kurikulum'); ?>
                    <input type="hidden" id="id" name="id" value="<?= $kurikulum['id']; ?>">
                    <div class="mb-3 row">
                        <label for="tahun_ajar" name="tahun_ajar" class="col-sm-3 col-form-label">Tahun Akademik</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tahun_ajar" id="tahun_ajar" value="<?= $kurikulum['tahun_ajar']; ?>" autocomplete="off">
                            <?= form_error('tahun_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kurikulum" name="jenis_kurikulum" class="col-sm-3 col-form-label">Jenis Kurikulum</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="jenis_kurikulum" id="jenis_kurikulum" value="<?= $kurikulum['jenis_kurikulum']; ?>" autocomplete="off">
                            <?= form_error('jenis_kurikulum', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ket" name="ket" class="col-sm-3 col-form-label">Keterangan</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ket" id="ket" value="<?= $kurikulum['ket']; ?>" placeholder="Boleh dikosongi bila tidak ada keterangan...." autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-3 justify-content-start">
                        <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->