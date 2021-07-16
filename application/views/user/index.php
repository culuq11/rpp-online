<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php foreach ($hasil_cetak as $hc) : ?>
        <?php if ($hc->status == 'Y') : ?>
        <?php elseif ($hc->status == 'N') : ?>
            <?php if (!empty($hc->notif)) : ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-fw fa-bell "></i> Mohon diperbaiki pada <?= $hc->notif; ?> di kelas <?= $hc->nama_kelas; ?> mata pelajaran <?= $hc->nama_mapel; ?>
                </div>
            <?php endif; ?>
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-fw fa-bell "></i> Data Masih Pending atau Belum diverifikasi Oleh Kepala Sekolah. Mohon Menghubungi Kepala Sekolah.
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

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
                        <i class="fas fa-fw fa-book mr-1"></i>
                    </div>
                    <h5 class="card-title">JUMLAH JURUSAN</h5>
                    <div class="display-4"><?= $this->db->get('tb_jurusan')->num_rows(); ?></div>
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
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>DATA PEMBAGIAN TUGAS GURU</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($tugas_guru)) : ?>
                                <tr>
                                    <td colspan="3">
                                        <div class="alert alert-danger" role="alert">
                                            Data Tidak Ditemukan.
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php $i = 1; ?>
                            <?php foreach ($tugas_guru as $tg) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td scope="row" class="text-center"><?= $tg->nama_mapel; ?></td>
                                    <td scope="row" class="text-center"><?= $tg->nama_kelas; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->