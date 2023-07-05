<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Data Film</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($semuaFilm as $film): ?>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="/assets/cover/<?= $film["cover"] ?>" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?= $film["nama_film"] ?>
                                                </h5>
                                                <p class="card-text">
                                                    <?= $film["nama_genre"] ?> ||
                                                    <?= $film["duration"] ?>
                                                </p>
                                                <a href="#" class="btn btn-info">Detail</a>
                                                <a href="#" class="btn btn-success">Update</a>
                                                <a href="#" class="btn btn-warning">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>

                        <!-- import JS -->
                        <script src="/assets/js/bootstrap.min.js"></script>

                        <?= $this->endSection() ?>