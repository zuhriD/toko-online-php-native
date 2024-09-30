<?php
include '../../action/security.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
                    <div class="col-md-8">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Table of Cart</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../../action/dashboard_action/show_list_cart.php';

                                            $no = 1;
                                            while ($data = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <tr>
                                                    <td><img src="../../assets/images/produk/<?= $data['foto_produk'] ?>" alt="" width="100" height="100"></td>
                                                    <td><?= number_format($data['harga'], 0, ',', '.') ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button class="btn btn-primary mx-3" id="minus-<?= $no++ ?>" type="button"><i class="ti ti-minus"></i></button>
                                                            <input class="form-control" type="text" name="qty" id="qty" style="width: 50px;" value="<?= $data['jml_beli'] ?>">
                                                            <button class="btn btn-primary mx-3" id="plus-<?= $no++ ?>" type="button"><i class="ti ti-plus"></i></button>
                                                        </div>
                                                    </td>
                                                    <td>Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                                                    <td>
                                                        <a href="../../action/dashboard_action/delete_cart.php?id=<?= $data['keranjang_id'] ?>" class="btn btn-danger"><i class="ti ti-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                include '../../action/dashboard_action/show_list_cart.php';

                                $totalHarga = $conn->query("select sum(total_harga) as tot from keranjang");
                                $tot = mysqli_fetch_assoc($totalHarga);
                                while ($cart = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="font-weight-medium"><?= $cart['produk'] ?></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="font-weight-medium">x<?= $cart['jml_beli'] ?></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="font-weight-medium"> <?= number_format($cart['total_harga'], 0, ',', '.') ?></h6>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold"><?= $tot['tot'] == true ? number_format($tot['tot'], 0, ',', '.') : 0 ?></h5>
                                </div>
                                <div class="d-flex ">
                                    <a href="../home/checkout.php" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/sidebarmenu.js"></script>
    <script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        $(document).ready(function() {
            var qty = 1;
            var no = 1;
            while (no <= 10) {
                $('#plus-' + no).click(function() {
                    qty += 1;
                    $('#qty').val(qty);
                });

                $('#minus-' + no).click(function() {
                    if (qty > 1) {
                        qty -= 1;
                        $('#qty').val(qty);
                    }
                });
                no++;
            }
        });
    </script>
</body>

</html>