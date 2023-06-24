<?php $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <h1>Edit Data Film</h1>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="/film" class="btn btn-dark mt-4 m-4">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="/film/update" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- tambahkan film input id -->
                            <input type="hidden" value="<?= $film["id"]; ?>" name="id">
                            <div class="col-md-6">
                                <label for="nama_film" class="form-label">Nama Film</label>
                                <!-- tambahkan kondisi pada value -->
                                <input type="text"
                                    class="form-control <?= isset($errors['nama_film']) ? 'is-invalid ' : ''; ?>"
                                    id="nama_film" name="nama_film"
                                    value="<?= isset($errors['nama_film']) ? old('nama_film') : $film["nama_film"]; ?>">

                                <?php if (isset($errors['nama_film'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_film'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="genre" class="form-label">Genre</label>
                                <select name="id_genre" id="genre"
                                    class="form-control <?= isset($errors['id_genre']) ? 'is-invalid ' : ''; ?>"
                                    name="id_genre" value="<?= old('id_genre'); ?>">
                                    <option value="">PILIH..</option>
                                    <?php foreach ($v_genre as $g): ?>
                                        <!-- tambahkan kondisi ini -->
                                        <?php if ($film['id_genre'] == $g['id']): ?>
                                            <option value="<?= $g["id"] ?>"><?= $g["nama_genre"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $g["id"] ?>"><?= $g["nama_genre"] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['id_genre'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['id_genre'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="duration" class="form-label">Durasi</label>
                                <!-- tambahkan kondisi ini pada value -->
                                <input type="text"
                                    class="form-control <?= isset($errors['duration']) ? 'is-invalid ' : ''; ?>"
                                    id="duration" name="duration"
                                    value=" <?= isset($errors['nama_film']) ? old('duration') : $film["duration"]; ?>">
                                <?php if (isset($errors['duration'])): ?>
                                    <div class=" invalid-feedback">
                                        <?= $errors['duration'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- ubah menjadi seperti ini apda cover -->
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cover" class="form-label">Cover</label>
                                    <input type="file"
                                        class="form-control <?= isset($errors['cover']) ? 'is-invalid' : ''; ?>"
                                        id="cover" name="cover" value="<?= old('cover'); ?>">
                                    <?php if (isset($errors['cover'])): ?>
                                        <div class="invalid-feedback">
                                            <?= $errors['cover'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Cover Saat Ini</label>
                                <div class="mb-2">
                                    <?php if ($film["cover"]): ?>
                                        <img src="/assets/cover/<?= $film["cover"]; ?>" width="100">
                                    <?php else: ?>
                                        <span>Tidak ada gambar lama</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- ganti textnya saja -->
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mt-5">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>