<?= $this->extend('layouts/v_template') ?>

<?= $this->section('content') ?>


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Checkout</h1>
                <!-- <p>
                    Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident.
                </p> -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <?php foreach ($chart as $item) : ?>
                    <?php if ($item != null) { ?>
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach ?>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/checkout/store" method="POST">
                            <?= csrf_field(); ?>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="no_telepon" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">No HP</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="alamat" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kecamatan" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Kecamatan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kota" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Kota</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Featured Product -->

<?= $this->endSection() ?>