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

            <a href="<?= base_url('rpp/cetak_input'); ?>" class="btn btn-primary mb-3">Tambah Data RPP</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Mata Pelajaran</th>
                        <th scope="col" class="text-center">Kelas</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($cetak_rpp as $cr) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i; ?></th>
                            <td scope="row" class="text-center"><?= $cr->nama_mapel; ?></td>
                            <td scope="row" class="text-center"><?= $cr->nama_kelas; ?></td>
                            <td scope="row" class="text-center">
                                <?php if ($cr->status == "N") : ?>
                                    <a href="#" class="badge badge-warning">Pending...</a>
                                <?php else : ?>
                                    <a href="#" class="badge badge-success">Disetujui</a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($cr->status == "N") : ?>
                                    <a href="<?= base_url('rpp/cetak_edit/') . $cr->id_cetak; ?>" class="badge badge-warning">edit</a>
                                    <a href="<?= base_url('rpp/cetak_hapus/') . $cr->id_cetak; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
                                <?php else : ?>
                                    <a href="<?= base_url('rpp/cetak_detail/') . $cr->id_cetak; ?>" class="badge badge-info"><i class="fas fa-print"> CETAK</a></i>
                                <?php endif; ?>
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