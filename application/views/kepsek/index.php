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
                    <h5 class="card-title">JUMLAH DATA RPP</h5>
                    <div class="display-4"><?= $this->db->get('tb_rpp_data')->num_rows(); ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-server mr-1"></i>
                    </div>
                    <h5 class="card-title">JUMLAH TUGAS GURU</h5>
                    <div class="display-4"><?= $this->db->get('tb_tugas_guru')->num_rows(); ?></div>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>DATA APPROVAL RPP GURU</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center">1</th>
                                        <td scope="row" class="text-center"><a href="#" class="badge badge-warning">Pending</a></td>
                                        <td scope="row" class="text-center"><?= $hasil_pending; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-center">2</th>
                                        <td scope="row" class="text-center"><a href="#" class="badge badge-success">Disetujui</a></td>
                                        <td scope="row" class="text-center"><?= $hasil_setujui; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                                    <p class="card-text"><?= $user['email']; ?></p>
                                    <p class="card-text"><?= $user['tempat_lahir']; ?>, <?= $user['tanggal_lahir']; ?>
                                    <p class="card-text"><?= $user['jenis_kelamin']; ?></p>
                                    <p class="card-text"><small class="text-muted">Akun ini dibuat sejak <?= date('d F Y', $user['tanggal_buat']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="text-center mb-2">
                            <img src="<?= base_url('assets/img/logo.png'); ?>" width="100px" height="80px">
                        </div>
                        <p>Visi dan Misi Sekolah</p>
                        <p>Visi</p>
                        <p>Terwujudnya SDM yang unggul dalam kondisi yang “DAMAI”.</p>
                        <p>Misi</p>
                        <ul>
                            <p>
                                <li>Mewujudkan generasi bangsa yang berkarakter dan disipli dengan taat mematuhi semua peraturan sekolah.</li>
                                <li>Mewujudkan keimanan generasi bangsa yang berkarakter sehingga tercipta generasi yang bertaqwa.</li>
                                <li>Mewujudkan generasi bangsa yang mampu mengapliksikan ilmu-ilmu yng diperoleh di DU/DI secara terencana dan terprogram.</li>
                                <li>Mewujudkan lingkungan sekolah yang aman dan tentram.</li>
                                <li>Mewujudkan lingkungan sekolah yang hijau dan rindang dengan kepedulian lingkungan.</li>
                            </p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">“Pendidikan adalah senjata paling ampuh untuk mengubah dunia.” - Nelson Mandela</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->