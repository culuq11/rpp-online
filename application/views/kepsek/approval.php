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

                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Guru</th>
                            <th scope="col" class="text-center">Mata Pelajaran</th>
                            <th scope="col" class="text-center">Kelas</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($hasil as $h) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td scope="row" class="text-center"><?= $h['nama']; ?> <a href="" class="badge badge-info" data-toggle="modal" data-target="#detailrppData<?= $h['id_cetak']; ?>">Lihat RPP</a></td>
                                <td scope="row" class="text-center"><?= $h['nama_mapel']; ?></td>
                                <td scope="row" class="text-center"><?= $h['nama_kelas']; ?></td>
                                <td scope="row" class="text-center">
                                    <?php if ($h['status'] == "N") : ?>
                                        <a href="#" class="badge badge-warning">Pending...</a>
                                    <?php else : ?>
                                        <a href="#" class="badge badge-success">Disetujui</a>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($h['status'] == "N") : ?>
                                        <a href="" class="badge badge-warning" data-toggle="modal" data-target="#editrppData<?= $h['id_cetak']; ?>">edit</a>
                                    <?php else : ?>
                                        <!-- <a href="" class="badge badge-info" data-toggle="modal" data-target="#detailrppData<?= $h['id_cetak']; ?>">Detail</a> -->
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

    <!-- Modal Edit -->
    <?php foreach ($hasil as $h) : ?>
        <div class="modal fade" id="editrppData<?= $h['id_cetak']; ?>" tabindex="-1" role="dialog" aria-labelledby="editrppDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editrppDataLabel">Ubah Data RPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('kepsek/edit_approval/') . $h['id_cetak']; ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $h['id_cetak']; ?>">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <div class="row mb-2">
                                        <div class="mb-3 col-sm-12">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Guru</label>
                                            <input type="text" class="form-control" value="<?= $h['nama']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="mb-3 col-sm-12">
                                            <label for="exampleFormControlInput1" class="form-label">Data Kelas</label>
                                            <input type="text" class="form-control" value="<?= $h['nama_kelas']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="mb-3 col-sm-12">
                                            <label for="exampleFormControlInput1" class="form-label">Data Mata Pelajaran</label>
                                            <input type="text" class="form-control" value="<?= $h['nama_mapel']; ?>" readonly>
                                        </div>
                                    </div> -->
                                    <div class="row mb-3">
                                        <div class="mb-3 col-sm-12">
                                            <label for="exampleFormControlInput1" class="form-label">Ubah Validasi</label>
                                            <select type="text" class="form-control" id="status" name="status">
                                                <option value="">Pilih Validasi</option>
                                                <?php foreach ($status_approve as $sa) : ?>
                                                    <?php if ($sa == $h['status']) : ?>
                                                        <option value="<?= $sa; ?>" selected>
                                                            <?php if ($sa == "N") : ?>
                                                                Belum Disetujui
                                                            <?php endif; ?>
                                                        </option>
                                                    <?php else : ?>
                                                        <option value="<?= $sa; ?>">Disetujui</option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="mb-3 col-sm-12">
                                            <!-- <label for="exampleFormControlInput1" class="form-label"></label> -->
                                            <input type="text" class="form-control" name="notif" id="notif" placeholder="isi keterangan bila belum disetujui" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
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

    <!-- Modal Detail -->
    <?php foreach ($hasil as $h) : ?>
        <div class="modal fade" id="detailrppData<?= $h['id_cetak']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailrppDataLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailrppDataLabel">Detail Data RPP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('kepsek/edit_approval/') . $h['id_cetak']; ?>" method="post">
                        <div class="modal-body">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
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
                                                            <h6>: <?= $h['nama_mapel']; ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-3">
                                                            <h6 class="">Materi Pokok </h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>: <?= $h['materi_pokok']; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="row mb-1">
                                                        <div class="col-6">
                                                            <h6 class="">Kelas/Semester</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>: <?= $h['nama_kelas']; ?> / <?= $h['ket_semester']; ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-6">
                                                            <h6 class="">Alokasi Waktu</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>: <?= $h['alokasi_waktu']; ?></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-6">
                                                            <h6 class="">Pertemuan Ke-</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>: <?= $h['pertemuan']; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <h6 class="">Kompetensi Dasar </h6>
                                                </div>
                                                <div class="col-10">
                                                    <h6>: <?= $h['kode_kikd_peng']; ?> <?= $h['ket_kd_peng']; ?> </h6>
                                                    <h6> <?= $h['kode_kikd_ket']; ?> <?= $h['ket_kd_ket']; ?> </h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="text-uppercase">1. Tujuan Pembelajaran</p>
                                                    <ul>
                                                        <p><?= $h['t_condition']; ?>, melalui pendekatan sainfitik dengan menggunakan metode pembelajaran <?= $h['jenis_model_pemb']; ?> <?= $h['t_audience']; ?>, dapat <?= $h['kko_1']; ?> <?= $h['t_behaviour']; ?>, <?= $h['kko_2']; ?> <?= $h['t_behaviour_2']; ?> dan <?= $h['kko_4']; ?> <?= $h['t_behaviour_4']; ?>. <?= $h['t_m']; ?> dengan sikap <?= $h['t_4c']; ?>, <?= $h['t_degree']; ?>. </p>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="text-uppercase">2. Langkah-Langkah Kegiatan Pembelajaran</p>
                                                    <h6>a. Kegiatan Pendahuluan </h6>
                                                    <ul>1. <?= $h['keg_awal_1']; ?></ul>
                                                    <ul>2. <?= $h['keg_awal_2']; ?></ul>
                                                    <ul>3. <?= $h['keg_awal_3']; ?></ul>
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
                                                                <td scope="col"><?= $h['sintak1']; ?></td>
                                                                <td scope="col"><?= $h['aktifitas1']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="col"><?= $h['sintak2']; ?></td>
                                                                <td scope="col"><?= $h['aktifitas2']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="col"><?= $h['sintak3']; ?></td>
                                                                <td scope="col"><?= $h['aktifitas3']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="col"><?= $h['sintak4']; ?></td>
                                                                <td scope="col"><?= $h['aktifitas4']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="col"><?= $h['sintak5']; ?></td>
                                                                <td scope="col"><?= $h['aktifitas5']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h6>c. Kegiatan Penutup </h6>
                                                    <ul>1. <?= $h['keg_akhir_1']; ?></ul>
                                                    <ul>2. <?= $h['keg_akhir_2']; ?></ul>
                                                    <ul>3. <?= $h['keg_akhir_3']; ?></ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="text-uppercase">3. Penilaian</p>
                                                    <ul>
                                                        <h6>a. Pengetahuan : <?= $h['pengetahuan']; ?></h6>
                                                    </ul>
                                                    <ul>
                                                        <h6>b. Keterampilan : <?= $h['keterampilan']; ?></h6>
                                                    </ul>
                                                    <ul>
                                                        <h6>c. Sikap : <?= $h['sikap']; ?> </h6>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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