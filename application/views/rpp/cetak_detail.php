<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mb-3">
        <div class="col-sm-3">
            <a href="<?= base_url('rpp/cetak'); ?>" class="btn btn-warning">Kembali ke Menu</a>
            <a href="<?= base_url('rpp/print_rpp'); ?>" class="btn btn-danger" target="_blank"><i class="fas fa-print"></i> Cetak</a>
        </div>
        <!-- <a href="<?= base_url('rpp/toPDF'); ?>" class="btn btn-danger mb-3"><i class="fas fa-print"></i> Cetak PDF</a> -->
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="<?= base_url('assets/img/kop.png') ?>" width="1180px">
                            <h5 class="text-center">RENCANA PELAKSANAAN PEMBELAJARAN </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row mb-1">
                                <div class="col-3">
                                    <h6 class="">Nama Sekolah </h6>
                                </div>
                                <div class="col-6">
                                    <h6>: <?= $sekolah['nama_sekolah']; ?></h6>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-3">
                                    <h6 class="">Mata Pelajaran </h6>
                                </div>
                                <div class="col-6">
                                    <h6>: <?= $cetak_rpp['nama_mapel']; ?></h6>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-3">
                                    <h6 class="">Materi Pokok </h6>
                                </div>
                                <div class="col-6">
                                    <h6>: <?= $cetak_rpp['materi_pokok']; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row mb-1">
                                <div class="col-5">
                                    <h6 class="">Kelas/Semester</h6>
                                </div>
                                <div class="col-7">
                                    <h6>: <?= $cetak_rpp['nama_kelas']; ?> / <?= $cetak_rpp['ket_semester']; ?></h6>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-5">
                                    <h6 class="">Alokasi Waktu</h6>
                                </div>
                                <div class="col-7">
                                    <h6>: <?= $cetak_rpp['alokasi_waktu']; ?></h6>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-5">
                                    <h6 class="">Pertemuan Ke-</h6>
                                </div>
                                <div class="col-7">
                                    <h6>: <?= $cetak_rpp['pertemuan']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h6 class="">Kompetensi Dasar </h6>
                        </div>
                        <div class="col-10">
                            <h6>: <?= $cetak_rpp['kode_kikd_peng']; ?> <?= $cetak_rpp['ket_kd_peng']; ?> </h6>
                            <h6> <?= $cetak_rpp['kode_kikd_ket']; ?> <?= $cetak_rpp['ket_kd_ket']; ?> </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-uppercase">1. Tujuan Pembelajaran</p>
                            <ul>
                                <p><?= $cetak_rpp['t_condition']; ?>, melalui pendekatan sainfitik dengan menggunakan metode pembelajaran <?= $cetak_rpp['jenis_model_pemb']; ?> <?= $cetak_rpp['t_audience']; ?>, dapat <?= $cetak_rpp['kko_1']; ?> <?= $cetak_rpp['t_behaviour']; ?>, <?= $cetak_rpp['kko_2']; ?> <?= $cetak_rpp['t_behaviour_2']; ?> dan <?= $cetak_rpp['kko_4']; ?> <?= $cetak_rpp['t_behaviour_4']; ?>. <?= $cetak_rpp['t_m']; ?> dengan sikap <?= $cetak_rpp['t_4c']; ?>, <?= $cetak_rpp['t_degree']; ?>. </p>


                                <!-- <p><?= $cetak_rpp['t_condition']; ?> (C), dengan pendekatan sainfitik menggunakan metode pembelajaran <?= $cetak_rpp['jenis_model_pemb']; ?> <?= $cetak_rpp['t_audience']; ?> (A), dapat <?= $cetak_rpp['kko_1']; ?> <?= $cetak_rpp['t_behaviour']; ?> dan <?= $cetak_rpp['kko_2']; ?> <?= $cetak_rpp['t_behaviour_2']; ?> serta <?= $cetak_rpp['kko_4']; ?> <?= $cetak_rpp['t_behaviour_4']; ?> (B) <?= $cetak_rpp['t_m']; ?> (M) dengan sikap <?= $cetak_rpp['t_4c']; ?> (4C), <?= $cetak_rpp['t_degree']; ?> (D). </p> -->
                            </ul>
                            <!-- <?= $cetak_rpp['kko_3']; ?> <?= $cetak_rpp['t_behaviour_3']; ?> . Berdasarkan pendekatan sainfitik dan juga -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-uppercase">2. Langkah-Langkah Kegiatan Pembelajaran</p>
                            <h6>a. Kegiatan Pendahuluan </h6>
                            <ul>1. <?= $cetak_rpp['keg_awal_1']; ?></ul>
                            <ul>2. <?= $cetak_rpp['keg_awal_2']; ?></ul>
                            <ul>3. <?= $cetak_rpp['keg_awal_3']; ?></ul>
                            <h6>b. Kegiatan Inti (Sintaks Model Pembelajaran) </h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sintaks</th>
                                        <th scope="col" class="text-center">Aktifitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="col"><?= $cetak_rpp['sintak1']; ?></td>
                                        <td scope="col"><?= $cetak_rpp['aktifitas1']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"><?= $cetak_rpp['sintak2']; ?></td>
                                        <td scope="col"><?= $cetak_rpp['aktifitas2']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"><?= $cetak_rpp['sintak3']; ?></td>
                                        <td scope="col"><?= $cetak_rpp['aktifitas3']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"><?= $cetak_rpp['sintak4']; ?></td>
                                        <td scope="col"><?= $cetak_rpp['aktifitas4']; ?></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"><?= $cetak_rpp['sintak5']; ?></td>
                                        <td scope="col"><?= $cetak_rpp['aktifitas5']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6>c. Kegiatan Penutup </h6>
                            <ul>1. <?= $cetak_rpp['keg_akhir_1']; ?></ul>
                            <ul>2. <?= $cetak_rpp['keg_akhir_2']; ?></ul>
                            <ul>3. <?= $cetak_rpp['keg_akhir_3']; ?></ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-uppercase">3. Penilaian</p>
                            <ul>
                                <h6>a. Pengetahuan : <?= $cetak_rpp['pengetahuan']; ?></h6>
                            </ul>
                            <ul>
                                <h6>b. Keterampilan : <?= $cetak_rpp['keterampilan']; ?></h6>
                            </ul>
                            <ul>
                                <h6>c. Sikap : <?= $cetak_rpp['sikap']; ?> </h6>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <h6>4. SUMBER BELAJAR</h6>
                            <?php foreach ($tujuanRPP as $tr) : ?>
                                <ul>
                                    <p>* <?= $tr->sumber_belajar; ?></p>
                                </ul>
                            <?php endforeach; ?>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-3 offset-md-3"></div>
                        <div class="col-md-3 offset-md-3">
                            Pasuruan, <?= format_indo(date('Y-m-d')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 offset-md-3">
                            <h6>Mengetahui</h6>
                            <h6 class="text-capitalize">Kepala <?= $sekolah['nama_sekolah']; ?></h6>
                            </br>
                            </br>
                            </br>
                            <h6 class="text-decoration-underline"><?= $sekolah['nama_kepsek']; ?></h6>
                            <h6 class="text-capitalize">NIP. <?= $sekolah['nip_kepsek']; ?></h6>
                        </div>
                        <div class="col-md-3 offset-md-3">
                            Guru Mata Pelajaran
                            </br>
                            </br>
                            </br>
                            </br>
                            </br>
                            <h6 class="text-decoration-underline"><?= $user['nama']; ?></h6>
                            <h6 class="text-capitalize">NIP. <?= $user['nip']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>