<!doctype html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include '../layout/sidebar.php'; ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include '../layout/header.php'; ?>
            <!--  Header End -->
            <!-- Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-start">Tabel Riwayat Transaksi</h5>

                                <?php
                                if (isset($_SESSION['msg'])) {

                                ?>
                                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                                        <?= $_SESSION['msg']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } elseif (isset($_SESSION['msg_err'])) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                                        <?= $_SESSION['msg_err']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                }
                                unset($_SESSION['msg']);
                                unset($_SESSION['msg_err']);
                                ?>
                                <div class="table-responsive mt-5">
                                    <table class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pembeli</th>
                                                <th>Produk</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../action/transaksi_action/show_data_transaksi.php';

                                            while ($data = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['pembeli'] ?></td>
                                                    <td><?= $data['produk'] ?></td>
                                                    <td><?= $data['tgl_transaksi'] ?></td>
                                                    <td><?= $data['total_harga'] ?></td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#editStatus" data-id="<?=$data['id']?>" data-status="<?= $data['status']?>" >
                                                            <?php if ($data['status'] == 1) { ?>
                                                                <span class="badge bg-warning rounded-3 fw-semibold">Pending</span>
                                                            <?php
                                                            } elseif ($data['status'] == 2) { ?>
                                                                <span class="badge bg-success rounded-3 fw-semibold">Success</span>
                                                            <?php } else { ?>
                                                                <span class="badge bg-danger rounded-3 fw-semibold">Failed</span>
                                                            <?php } ?>
                                                        </a>
                                                        
                                                    </td>
                                                    <td>
                                                    <a href="" class="badge bg-primary text-white text-decoration-none " data-toggle="modal" data-target="#detailTransaksi" data-id="<?= $data['id']?>"> <i class="ti ti-eye" id="detail" ></i></a>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Status-->
    <div class="modal fade" id="editStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                    <!-- button close -->
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../../action/transaksi_action/update_status.php" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-4">
                            <label for="exampleInputtext1" class="form-label">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status" id="status">
                                <option selected>Pilih Status</option>
                                <option value="1">Pending</option>
                                <option value="2">Success</option>
                                <option value="3">Failed</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Transaksi -->
    <div class="modal fade" id="detailTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                    <!-- button close -->
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama Pembeli</p>
                            <p>Produk</p>
                            <p>Metode Pembayaran</p>
                            <p>Qty</p>
                            <p>Tanggal Transaksi</p>
                            <p>Alamat</p>
                            <p>Total Harga</p>
                            <p>Status</p>
                        </div>
                        <div class="col-md-6">
                            <p id="nama_pembeli"></p>
                            <p id="produk"></p>
                            <p id="metode_pembayaran"></p>
                            <p id="qty"></p>
                            <p id="tgl_transaksi"></p>
                            <p id="alamat"></p>
                            <p id="total_harga"></p>
                            <p id="status"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../assets/js/sidebarmenu.js"></script>
    <script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>

    <script>
        $('#editStatus').on('show.bs.modal', function(event) {
            var a = $(event.relatedTarget);
            var id = a.data('id');
            var status = a.data('status');

            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #status').val(status);
        });

        $('#detailTransaksi').on('show.bs.modal', function(event) {
            var a = $(event.relatedTarget);
            var id = a.data('id');

            $.ajax({
                type: 'post',
                url: '../../action/transaksi_action/detail_transaksi.php',
                data: {
                    id: id

                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    console.log(obj);
                    $('#nama_pembeli').html(obj.pembeli);
                    $('#produk').html(obj.produk);
                    $('#metode_pembayaran').html(obj.pembayaran);
                    $('#qty').html(obj.qty);
                    $('#tgl_transaksi').html(obj.tgl_transaksi);
                    $('#alamat').html(obj.alamat);
                    $('#total_harga').html(obj.total_harga);
                    $('#status').html(obj.status);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

    </script>

</body>

</html>