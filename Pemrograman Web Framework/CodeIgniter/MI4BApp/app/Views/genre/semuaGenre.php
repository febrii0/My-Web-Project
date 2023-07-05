<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Data Genre</h1>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Genre Name</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($semuaGenre as $genre): ?>
                        <tr>
                            <td>
                                <?= $i++; ?>
                            </td>
                            <td>
                                <?php echo $genre['nama_genre'] ?>
                            </td>
                            <td>
                                <a href="" class="btn btn-success">Update</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>