<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mb-3">
        <div class="col-sm-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-users mr-1"></i>
                    </div>
                    <h5 class="card-title">JUMLAH USER</h5>
                    <div class="display-4"><?= $this->db->get('tb_user')->num_rows(); ?></div>
                    <a href="<?= base_url('admin/guru'); ?>" class="card-text text-white">Detail ---></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-book mr-1"></i>
                    </div>
                    <h5 class="card-title">JUMLAH JURUSAN</h5>
                    <div class="display-4"><?= $this->db->get('tb_jurusan')->num_rows(); ?></div>
                    <a href="<?= base_url('admin/jurusan'); ?>" class="card-text text-white">Detail ---></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-archway mr-1"></i>
                    </div>
                    <h5 class="card-title">JUMLAH ROMBEL</h5>
                    <div class="display-4"><?= $this->db->get('tb_rombel')->num_rows(); ?></div>
                    <a href="<?= base_url('admin/rombel'); ?>" class="card-text text-white">Detail ---></a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-book-open mr-1"></i>
                    </div>
                    <h5 class="card-title">JUMLAH MAPEL</h5>
                    <div class="display-4"><?= $this->db->get('tb_mapel')->num_rows(); ?></div>
                    <a href="<?= base_url('admin/mapel'); ?>" class="card-text text-white">Detail ---></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang <?= $user['nama']; ?></h5>
                    <p class="card-text">“Pendidikan adalah senjata paling ampuh untuk mengubah dunia.” - Nelson Mandela</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->