<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/editprofile'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $user['tempat_lahir']; ?>">
                    <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir']; ?>">
                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>">
                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-7">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->