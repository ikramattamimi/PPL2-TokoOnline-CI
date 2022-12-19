<?= $this->extend('layouts/v_template') ?>

<?= $this->section('content') ?>

<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Souvenir Tersedia</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($barang as $item) : ?>

                <div class="col-12 col-md-3 mb-4">
                    <div class="card h-100">
                        <a href="/details/<?= $item['id'] ?>">
                            <img src="./assets/img/<?= $item['gambar'] ?>" class="img-square" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">Rp <?= $item['harga'] ?></li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark"><?= $item['nama'] ?></a>
                            <p class="text-muted">Stock: <?= $item['stok'] ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- End Featured Product -->

<?= $this->endSection() ?>