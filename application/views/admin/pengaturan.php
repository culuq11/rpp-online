<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Backup Database
                        </div>
                        <div class="card-body">
                            <p class="card-text">Download Database</p>
                            <div class="row">
                                <div class="col-lg">
                                    <a href="<?= base_url('admin/backup'); ?>" class="btn btn-primary" id="pengetahuan" name="pengetahuan">Klik Backup Database</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Restore Database
                        </div>
                        <?= form_open_multipart('admin/restore'); ?>
                        <div class="card-body">
                            <p class="card-text">Upload File Database</p>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <input type="file" class="custom-file-input" id="restorefile" name="restorefile" accept=".sql">
                                                    <label class="custom-file-label" for="restorefile">Choose file</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="submit" class="btn btn-primary" value="Restore Database">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>


            </div>
        </div>

    </div>