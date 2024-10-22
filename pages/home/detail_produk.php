<?php
include '../../action/security.php';
include '../../action/dashboard_action/show_detail_produk.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="./produk.php" class="btn btn-primary mb-3"><i class="ti ti-arrow-left"></i></a>
                <div class="row px-xl-5">
                    <div class="col-lg-5 pb-5">
                        <!-- add image -->
                        <img src="../../assets/images/produk/<?= $data['foto_produk'] ?>" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-7 pb-5">
                        <h3 class="font-weight-semi-bold"><?= $data['nama'] ?></h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary ">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <small class="pt-1 ms-2">(50 Reviews)</small>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4">Rp <?= number_format($data['harga'], 0, ',', '.') ?></h3>
                        <p class="mb-4"><?= $data['deskripsi'] ?></p>

                        <div class="d-flex align-items-center mb-4 pt-2">
                            <!-- Make form quantity -->
                            <form class="d-flex" action="../../action/dashboard_action/add_cart.php" method="post">
                                <button class="btn btn-primary mx-3" id="minus" type="button"><i class="ti ti-minus"></i></button>

                                <input class="form-control" type="text" name="qty" id="qty" style="width: 80px;" value="1">

                                <button class="btn btn-primary mx-3" id="plus" type="button"><i class="ti ti-plus"></i></button>

                                <?php
                                if ($data['stok_produk'] == 0) {
                                ?>
                                    <button class="btn btn-danger px-3" id="add-to-cart" type="submit" disabled>STOK HABIS</button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-primary px-3" id="add-to-cart" type="submit"><i class="ti ti-shopping-cart mr-1"></i> Add To Cart</button>
                                <?php } ?>

                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <input type="hidden" name="harga" value="<?= $data['harga'] ?>">
                            </form>
                        </div>
                        <form action="../../action/ulasan_action/insert_act.php" method="post" enctype="multipart/form-data">

                            <div class="form-group mb-2 mt-5">
                                <label for="exampleInputPassword1" class="form-label">Ulasan</label>
                                <textarea class="form-control" rows="3" placeholder="Tulis ulasan Anda di sini..." name="ulasan"></textarea>
                                <label for="exampleInputPassword1" class="form-label">Rating</label>
                                <div class="dropdown mb-3">
                                    <select name="rating" id="" class="form-select">
                                        <option value="">Beri Rating</option>
                                        <option value="5">Sangat Bagus</option>
                                        <option value="4">Bagus</option>
                                        <option value="3">Biasa</option>
                                        <option value="2">Jelek</option>
                                        <option value="1">Sangat Jelek</option>

                                    </select>

                                </div>
                                <label for="exampleInputPassword1" class="form-label">Foto Ulasan</label>
                                <input type="file" class="form-control" id="image" name="foto_ulasan">
                                <div class="mt-3" id="gambar"></div>
                            </div>
                            <input type="hidden" name="produk_id" value="<?= $data['id'] ?>">
                            <div class="mb-4">
                                <button class="btn btn-primary btn-sm mb-5" type="submit">Kirim Ulasan</button>
                            </div>
                        </form>
                        <!-- show ulasan -->
                        <h4 class="font-weight-semi-bold">Ulasan</h4>
                        <div class="row">
                            <?php
                            $produkId = $data['id'];
                            $sql = "select ulasan.id,user.nama as nama_user, ulasan.ulasan, ulasan.foto_ulasan, ulasan.rating, user.nama AS nama_user
                                FROM ulasan
                                JOIN user ON ulasan.user_id = user.id
                                WHERE ulasan.produk_id = $produkId";
                            $resultUlasan = $conn->query($sql);
                            while ($dataUlasan = mysqli_fetch_assoc($resultUlasan)) {
                            ?>
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="me-3">
                                                    <img src="../../assets/images/profile/user-1.jpg" alt="" width="50" height="50" class="rounded-circle">
                                                </div>
                                                <div>
                                                    <h6 class="font-weight-semi-bold"><?= $dataUlasan['nama_user'] ?></h6>
                                                    <div class="text-primary ">
                                                        <?php
                                                        for ($i = 0; $i < $dataUlasan['rating']; $i++) {
                                                        ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                    </div>
                                                    <p class="mt-2"><?= $dataUlasan['ulasan'] ?></p>
                                                    <?php
                                                    if ($dataUlasan['foto_ulasan'] != '') {
                                                    ?>
                                                        <img src="../../assets/images/ulasan/<?= $dataUlasan['foto_ulasan'] ?>" alt="" class="img-fluid" style="width: 100px; height: 100px;">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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
                $('#plus').click(function() {
                    qty += 1;
                    $('#qty').val(qty);
                });

                $('#minus').click(function() {
                    if (qty > 1) {
                        qty -= 1;
                        $('#qty').val(qty);
                    }
                });
            });

            $('#image').change(function() {
                const file = $(this)[0].files[0];
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file);
                fileReader.onload = function(e) {
                    $('#gambar').html(
                        `<img src="${e.target.result}" class="img-fluid" style="width: 100px; height: 100px;">`
                    );
                }
            });
        </script>
</body>

</html>