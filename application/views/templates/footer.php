            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mohammad Khusnul Chuluq <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Pilih Logout bila anda ingin mengakhiri sesi ini.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });


                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('menu/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('menu/roleaccess/'); ?>" + roleId;
                        }
                    });

                });

                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
                $(document).ready(function() {
                    $('#dataTable1').DataTable();
                });
                $(document).ready(function() {
                    $('#dataTable2').DataTable();
                });
                $(document).ready(function() {
                    $('#dataTable3').DataTable();
                });

                // $('#dataTable').DataTable({
                //     'paging': false,
                // });

                $(function() {
                    $("#kko_pengetahuan").autocomplete({
                        source: "<?= base_url('rpp/get_kkopeng') ?>",
                        select: function(event, data) {
                            $('#kko_1').val(data.item.label);
                        }
                    });
                });

                $(function() {
                    $("#kko_peng_2").autocomplete({
                        source: "<?= base_url('rpp/get_kkopeng') ?>",
                        select: function(event, data) {
                            $('#kko_3').val(data.item.label);
                        }
                    });
                });

                $(function() {
                    $("#kko_keterampilan").autocomplete({
                        source: "<?= base_url('rpp/get_kkoket') ?>",
                        select: function(event, data) {
                            $('#kko_2').val(data.item.label);
                        }
                    });
                });

                $(function() {
                    $("#kko_sikap").autocomplete({
                        source: "<?= base_url('rpp/get_kkosikap') ?>",
                        select: function(event, data) {
                            $('#kko_4').val(data.item.label);
                        }
                    });
                });

                $(function() {
                    $("#model_pemb").autocomplete({
                        source: "<?= base_url('rpp/get_model') ?>",
                        select: function(event, data) {
                            $('#id_model_pemb').val(data.item.model);
                        }
                    });
                });
            </script>

            </body>

            </html>