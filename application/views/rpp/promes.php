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

                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahMapel">Tambah Program Semester</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Mata Pelajaran</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($rpp1 as $r) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td class="text-center"><?= $r['id_mapel']; ?></td>
                                <td><?= $r['id_rombel']; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editMapel<?= $r['id']; ?>">edit</a>
                                    <a href="<?= base_url('admin/hapusmapel/') . $r['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Yakin menghapus data tersebut ?');">delete</a>
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