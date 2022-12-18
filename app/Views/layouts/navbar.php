<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            Zay
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <div class="dropdown">
                    <button class="nav-icon d-none d-lg-inline me-4" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="all: unset; cursor: pointer;">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?= count(array_filter($chart)) ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <div class="d-flex align-items-center justify-content-between me-3">
                                <h6 class="ms-2">Keranjang(<?= count(array_filter($chart)) ?>)</h6>
                                <a href="/checkout">Checkout</a>
                            </div>
                        </li>
                        <?php foreach ($chart as $item) : ?>
                            <?php if ($item != null) { ?>
                                <li style="width: 400px;" class="dropdown-item">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="<?= base_url('assets/img/' . $item['gambar']) ?>" alt="" class="img-square-chart">
                                        </div>
                                        <div class="col-5">
                                            <a href="/details/<?= $item['id'] ?>" class="dropdown-item">
                                                <h6 class="mb-0"><?= $item['nama'] ?></h6>
                                                <span style="font-size: 12px;"><?= $item[0] ?> barang</span>
                                            </a>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-end">
                                            <span style="font-size: 12px;">Rp<?= number_format($item[1], 0, ',', '.') ?></span>
                                            <a href="/chart/delete/<?= $item['id'] ?>" type="button" class="btn close" data-dismiss="alert">×</a>
                                        </div>
                                    </div>

                                </li>
                            <?php } ?>
                        <?php endforeach ?>

                    </ul>
                </div>
                <a class="nav-icon position-relative text-decoration-none" href="#">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                </a>
            </div>

        </div>

    </div>
</nav>
<!-- Close Header -->