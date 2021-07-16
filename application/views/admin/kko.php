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

            <div class="row">
                <!-- Pengetahuan -->
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            Data KKO Pengetahuan
                        </div>
                        <div class="card-body">
                            <p class="card-text">Silahkan Download Format</p>
                            <p><a href="<?= base_url('file_upload/format_kko_pengetahuan.xlsx'); ?>" class="badge bg-info text-white">Format KKO Pengetahuan</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/kko_peng'); ?>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="pengetahuan" name="pengetahuan" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="pengetahuan">Choose file</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detailKKOPengetahuan">Lihat KKO</a>
                                </div>
                            </div>

                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>

                <!-- Keterampilan -->
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            Data KKO Keterampilan
                        </div>
                        <div class="card-body">
                            <p class="card-text">Silahkan Download Format</p>
                            <p><a href="<?= base_url('file_upload/format_kko_keterampilan.xlsx') ?>" class="badge bg-info text-white">Format KKO Keterampilan</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/kko_'); ?>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="keterampilan" name="keterampilan" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#kkoketerampilan">Lihat KKO</a>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Sikap -->
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            Data KKO Sikap
                        </div>
                        <div class="card-body">
                            <p class="card-text">Silahkan Download Format</p>
                            <p><a href="<?= base_url('file_upload/format_kko_sikap.xlsx') ?>" class="badge bg-info text-white">Format KKO Sikap</a></p>
                            <p class="card-text">Upload File</p>
                            <?= form_open_multipart('admin/kko_sikap'); ?>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="sikap" name="sikap" accept=".xlsx, .xls">
                                    <label class="custom-file-label" for="sikap">Choose file</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detailKKOSikap">Lihat KKO</a>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Detail Pengetahuan -->
<div class="modal fade" id="detailKKOPengetahuan" tabindex="-1" role="dialog" aria-labelledby="detailKKOPengetahuanLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailKKOPengetahuanLabel">Detail KKO Pengetahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(''); ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Taksonomi Bloom Revisi</p>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">Kategori</th>
                                                <th scope="col" class="text-center">Penjelasan</th>
                                                <th scope="col" class="text-center">Kata Kerja Kunci</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col" class="text-center">1</th>
                                                <td>Mengingat / Pengetahuan</td>
                                                <td>Kemampuan menyebutkankembali informasi /pengetahuan yang tersimpandalam ingatan.
                                                    Contoh:menyebutkan arti taksonomi.
                                                </td>
                                                <td>
                                                    Mendefinisikan, menyusun daftar,menjelaskan, mengingat, mengenali,menemukan kembali, menyatakan,mengulang, mengurutkan, menamai,menempatkan, menyebutkan</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">2</th>
                                                <td>Memahami / Pemahaman</td>
                                                <td>
                                                    Kemampuan memahamiinstruksi dan menegaskanpengertian/makna ide ataukonsep yang telah diajarkan baikdalam bentuk lisan, tertulis,maupun grafik/diagram.
                                                    Contoh : Merangkum materiyang telah diajarkan dengankata-kata sendiri.
                                                </td>
                                                <td>
                                                    Menerangkan, menjelaskan,menterjemahkan, menguraikan, mengartikan,menyatakan kembali, menafsirkan,menginterpretasikan, mendiskusikan,menyeleksi, mendeteksi, melaporkan,menduga, mengelompokkan, membericontoh, merangkum menganalogikan,mengubah, memperkirakan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">3</th>
                                                <td>Menerapkan / Penerapan</td>
                                                <td>
                                                    Kemampuan melakukan sesuatudan mengaplikasikan konsepdalam situasi tertentu.
                                                    Contoh:Melakukan proses pembayarangaji sesuai dengan sistemberlaku.

                                                </td>
                                                <td>
                                                    Memilih, menerapkan, melaksanakan,mengubah, menggunakan,mendemonstrasikan, memodifikasi,menginterpretasikan, menunjukkan,membuktikan, menggambarkan,mengoperasikan, menjalankanmemprogramkan, mempraktekkan, memulai.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">4</th>
                                                <td>Menganalisis / Analisa</td>
                                                <td>
                                                    Kemampuan memisahkankonsep kedalam beberapakomponen dan mnghubungkansatu sama lain untukmemperoleh pemahaman ataskonsep tersebut secara utuh.
                                                    Contoh: Menganalisis penyebabmeningkatnya Harga pokokpenjualan dalam laporankeuangan dengan memisahkankomponen- komponennya.
                                                </td>
                                                <td>
                                                    Mengkaji ulang, membedakan,membandingkan, mengkontraskan,memisahkan, menghubungkan, menunjukanhubungan antara variabel, memecah menjadibeberapa bagian, menyisihkan, menduga,mempertimbangkan mempertentangkan,menata ulang, mencirikan, mengubahstruktur, melakukan pengetesan,mengintegrasikan, mengorganisir,mengkerangkakan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">5</th>
                                                <td>Menilai / Evaluasi</td>
                                                <td>
                                                    Kemampuan menetapkanderajat sesuatu berdasarkannorma, kriteria atau patokantertentu
                                                    Contoh: Membandingkan hasil ujian siswa dengan kuncijawaban.
                                                </td>
                                                <td>
                                                    Mengkaji ulang, mempertahankan,menyeleksi, mempertahankan, mengevaluasi,mendukung, menilai, menjustifikasi,mengecek, mengkritik, memprediksi,membenarkan, menyalahkan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">6</th>
                                                <td>Mencipta / Sintesa</td>
                                                <td>
                                                    Kemampuan memadukan unsur-unsurmenjadi sesuatu bentukbaru yang utuh dan koheren,atau membuat sesuatu yangorisinil.
                                                    Contoh: Membuatkurikulum denganmengintegrasikan pendapat danmateri dari beberapa sumber.
                                                </td>
                                                <td>
                                                    Merakit, merancang, menemukan,menciptakan, memperoleh,mengembangkan, memformulasikan,membangun, membentuk, melengkapi,membuat, menyempurnakan, melakukaninovasi, mendisain, menghasilkan karya.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Daftar KKO Pengetahuan</p>
                                    <table class="table table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">C1 Pengetahuan</th>
                                                <th scope="col" class="text-center">C2 Pemahaman</th>
                                                <th scope="col" class="text-center">C3 Penerapan</th>
                                                <th scope="col" class="text-center">C4 Analisis</th>
                                                <th scope="col" class="text-center">C5 Penilaian / Evaluasi</th>
                                                <th scope="col" class="text-center">C6 Sintesis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kko_peng as $kko1) : ?>
                                                <tr>
                                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                                    <td><?= $kko1['c1_pengetahuan']; ?></td>
                                                    <td><?= $kko1['c2_pemahaman']; ?></td>
                                                    <td><?= $kko1['c3_penerapan']; ?></td>
                                                    <td><?= $kko1['c4_analisis']; ?></td>
                                                    <td><?= $kko1['c5_penilaian']; ?></td>
                                                    <td><?= $kko1['c6_sintesis']; ?></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
<!-- Modal Detail Keterampilan -->
<div class="modal fade" id="kkoketerampilan" tabindex="-1" role="dialog" aria-labelledby="kkoketerampilanLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kkoketerampilanLabel">Detail KKO Keterampilan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(''); ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Domain Psikomotor “Dave” (Ketrampilan Abstrak)</p>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">Kategori</th>
                                                <th scope="col" class="text-center">Deskripsi Perilaku</th>
                                                <th scope="col" class="text-center">Contoh Aktifitas yang diukur</th>
                                                <th scope="col" class="text-center">Cara Kerja</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col" class="text-center">1</th>
                                                <td>Imitasi(Imitation)</td>
                                                <td>Meniru tindakan dari yang ditunjukkan orang lain: mengamati kemudian mereplikasi.</td>
                                                <td>Mengamati guru atau pelatih kemudian menirukannya: aktivitas proses.</td>
                                                <td>Meniru, mengikuti, mereplikasi, mengulangi.</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">2</th>
                                                <td>Manipulasi(Manipulation)</td>
                                                <td>Mereproduksi aktivitas dari pelatih atau ingatannya.</td>
                                                <td>Melakukan tugas dari instruksi tertulis atau verbal.</td>
                                                <td>Menciptakan kembali, membangun, menunjukkan, melaksanakan, mengimplementasikan.</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">3</th>
                                                <td>Presisi(Precision)</td>
                                                <td>Melakukan keterampilan tanpa bantuan orang lain.</td>
                                                <td>Mempertunjukkan keahlian melaksanakan tugas atau aktivitas tanpa bantuan atau instruksi, mampu menunjukkan aktivitas pada siswa lain.</td>
                                                <td>Mendemonstrasikan, melengkapi, mempertunjukkan, menyempurnakan, mengkalibrasi, mengontrol.</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">4</th>
                                                <td>Artikulasi(Articulation)</td>
                                                <td>Mengadaptasi dan mengintegrasikan keahlian</td>
                                                <td>Mengaitkan dan mengkombinasikan aktivitas untuk mengembangkan metoda.</td>
                                                <td>Mengkonstruksikan, memecahkan, mengkombinasikan, mengkoordinasikan, mengintgrasikan, mengadaptasi, mengembangkan, memformulasi.</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">5</th>
                                                <td>Naturalisasi (Naturalization)</td>
                                                <td>Melakukan aktivitas secara terkait dengan tingkat keterampilan yang telah dimiliki.</td>
                                                <td>Mendefinisika tujuan, pendekatan dan strategi untuk melakukan aktivitas untuk keperluan.</td>
                                                <td>Merancang, menspesifkasi, mengelola.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover" id="dataTable1">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">P1 Menirukan</th>
                                                <th scope="col" class="text-center">P2 Memanipulasi</th>
                                                <th scope="col" class="text-center">P3 Pengalamiahan</th>
                                                <th scope="col" class="text-center">P4 Artikulasi</th>
                                                <th scope="col" class="text-center">P5 Imitasi</th>
                                                <th scope="col" class="text-center">P6 Presisi</th>
                                                <th scope="col" class="text-center">P7 Naturalisasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kko_ket as $kko1) : ?>
                                                <tr>
                                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                                    <td><?= $kko1['p1_menirukan']; ?></td>
                                                    <td><?= $kko1['p2_memanipulasi']; ?></td>
                                                    <td><?= $kko1['p3_pengalamiahan']; ?></td>
                                                    <td><?= $kko1['p4_artikulasi']; ?></td>
                                                    <td><?= $kko1['p5_imitasi']; ?></td>
                                                    <td><?= $kko1['p6_presisi']; ?></td>
                                                    <td><?= $kko1['p7_naturalisasi']; ?></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
<!-- Modal Detail Sikap -->
<div class="modal fade" id="detailKKOSikap" tabindex="-1" role="dialog" aria-labelledby="detailKKOSikapLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailKKOSikapLabel">Detail KKO Sikap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(''); ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Penjelasan KKO</p>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">Kategori</th>
                                                <th scope="col" class="text-center">Penjelasan</th>
                                                <th scope="col" class="text-center">Kata Kerja Kunci</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="col" class="text-center">1</th>
                                                <td>Penerimaan</td>
                                                <td>Kemampuan untuk menunjukkan atensi dan penghargaan terhadap orang lain
                                                    Contoh: mendengar pendapat orang lain, mengingat nama seseorang

                                                </td>
                                                <td>
                                                    menanyakan, mengikuti, memberi, menahan / mengendalikan diri, mengidentifikasi, memperhatikan, menjawab</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">2</th>
                                                <td>Responsif</td>
                                                <td>
                                                    Kemampuan berpartisipasi aktif dalam pembelajaran dan selalu termotivasi untuk segera bereaksi dan mengambil tindakan atas suatu kejadian.
                                                    Contoh: berpartisipasi dalam diskusi kelas.
                                                </td>
                                                <td>
                                                    Menjawab, membantu, mentaati, memenuhi, menyetujui, mendiskusikan, melakukan, memilih, menyajikan, mempresentasikan, melaporkan, menceritakan, menulis, menginterpretasikan, menyelesaikan, mempraktekkan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">3</th>
                                                <td>Nilai yang dianut (Nilai diri)</td>
                                                <td>
                                                    Kemampuan menggunakan konsep dalam praktek atau situasi yang baru
                                                    Contoh: Menggunakan pedoman/ aturan dalam menghitung gaji pegawai.
                                                </td>
                                                <td>
                                                    Kemampuan menunjukkan nilai yang dianut untuk membedakan mana yang baik dan kurang baik terhadap suatu kejadian/obyek, dan nilai tersebut diekspresikan dalam perilaku.
                                                    Contoh: Mengusulkan kegiatan Corporate Social Responsibility sesuai dengan nilai yang berlaku dan komitmen perusahaan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">4</th>
                                                <td>Organisasi/Menghayati</td>
                                                <td>
                                                    Kemampuan membentuk sistem nilai dan budaya organisasi dengan mengharmonisasikan perbedaan nilai.
                                                    Contoh: Menyepakati dan mentaati etika profesi, mengakui perlunya keseimbangan antara kebebasan dan tanggung jawab.
                                                </td>
                                                <td>
                                                    Mentaati, mematuhi, merancang, mengatur, mengidentifikasikan, mengkombinasikan, mengorganisir, merumuskan, menyamakan, mempertahankan, menghubungkan, mengintegrasikan, menjelaskan, mengaitkan, menggabungkan, memperbaiki, menyepakati, menyusun, menyempurnakan, menyatukan pendapat, menyesuaikan, melengkapi, membandingkan, memodifikasi.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="text-center">5</th>
                                                <td>Karakterisasi/Mengamalkan</td>
                                                <td>
                                                    Kemampuan mengendalikan perilaku berdasarkan nilai yang dianut dan memperbaiki hubungan intrapersonal, interpersonal dan sosial.
                                                    Contoh: Menunjukkan rasa percaya diri ketika bekerja sendiri, kooperatif dalam aktivitas kelompok

                                                </td>
                                                <td>
                                                    Melakukan, melaksanakan, memperlihatkan, membedakan, memisahkan, menunjukkan, mempengaruhi, mendengarkan, memodifikasi, mempraktekkan, mengusulkan, merevisi, memperbaiki, membatasi, mempertanyakan, mempersoalkan, menyatakan, bertindak, Membuktikan, mempertimbangkan.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-center">Daftar KKO Sikap</p>
                                    <table class="table table-hover" id="dataTable2">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col" class="text-center">C1 Menerima</th>
                                                <th scope="col" class="text-center">C2 Menanggapi</th>
                                                <th scope="col" class="text-center">C3 Menilai</th>
                                                <th scope="col" class="text-center">C4 Menghayati</th>
                                                <th scope="col" class="text-center">C5 Mengamalkan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kko_sikap as $kko3) : ?>
                                                <tr>
                                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                                    <td><?= $kko3['c1_menerima']; ?></td>
                                                    <td><?= $kko3['c2_menanggapi']; ?></td>
                                                    <td><?= $kko3['c3_menilai']; ?></td>
                                                    <td><?= $kko3['c4_menghayati']; ?></td>
                                                    <td><?= $kko3['c5_mengamalkan']; ?></td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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