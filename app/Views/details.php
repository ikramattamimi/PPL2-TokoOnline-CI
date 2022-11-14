<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-10 col-md-3 mr-2 mt-5">
                <div class="card d-flex align-items-center">
                    <img src="<?= base_url('assets/img/' . $barang['gambar']) ?>" alt="" class="img-square">
                </div>
            </div>
            <div class="col-10 col-md-6 mr-2 mt-5">
                <div class="card">
                    <div class="card-header ">
                        <h6><?= $barang['nama'] ?></h6>
                        <p class="fs-6 text-muted"><span>Terjual 100+ </span><i class="fa fa-solid fa-circle" style="size: 12rem;"></i> <span>Rating 0</span></p>
                    </div>
                    <div class="card-body">
                        <h3 class="mb-4">Rp<?= number_format($barang['harga']) ?></h3>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>Easy Wear</strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-3 mt-5">
                <div class="card">
                    <div class="card-header ">
                        <h6>Atur jumlah dan catatan</h6>
                    </div>

                    <form action="/details/<?= $barang['id'] ?>/add-to-chart" method="post">
                        <?php csrf_token() ?>
                        <div class="card-body">
                            <div class="row d-flex align-items-center">
                                <div class="col-6">
                                    <?= $this->include('input-pm') ?>
                                </div>
                                <div class="col-6">
                                    <small>Stok total: <?= $barang['stok'] ?></small>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-between align-items-center mt-3">
                                <div class="col-6">
                                    <h6>Sub total:</h6>
                                </div>
                                <div class="col-6">
                                    <script>
                                        harga = <?= $barang['harga'] ?>
                                    </script>
                                    <p class="text-end">Rp<span id="jumlah"><?= number_format($barang['harga'], 0, ',', '.') ?></span></p>
                                    <input type="text" id="total_harga" name="total_harga" value="<?= $barang['harga'] ?>" hidden/>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center align-items-center mt-3 p-2">
                                <!-- <div class="col-12"> -->
                                <button class="btn btn-success mb-2" type="submit">+ Keranjang</button>
                                <button class="btn btn-outline-success">Beli Langsung</button>
                                <!-- </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>