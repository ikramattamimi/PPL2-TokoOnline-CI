<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?= $this->include('content-up') ?>


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Featured Product</h1>
                <p>
                    Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($barang as $item) : ?>

                <div class="col-12 col-md-3 mb-4">
                    <div class="card h-100">
                        <a href="/details/<?= $item['id'] ?>">
                            <img src="./assets/img/<?= $item['gambar'] ?>" class="img-square" alt="..." >
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">Rp <?= $item['harga'] ?></li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark"><?= $item['nama'] ?></a>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- End Featured Product -->

<?= $this->endSection() ?>