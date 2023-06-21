<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LK 21</title>

    <!-- import CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="/assets/js/unpkg.com_sweetalert.min.js.js"></script>
</head>

<body>
    <!-- import JS -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="/assets/img/demon-slayer.png" width="40" height="40" style="margin-right: 10px;">
            <a class="navbar-brand" href="#">LK 21</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- class="nav-link active -->
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/film">Film All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/genre/all">Genre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About me</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <div class="container">
        <!-- <footer class="jumbotron jumbotron-fluid mt-5 mb-0"> -->
        <footer class="row row-cols-5 py-5 my-5 border-top">
            <div class="container text-center">Copyright &copy
                <?= Date('Y') ?> Febriansyah Agung Tirta
            </div>
        </footer>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            swal({
                title: "Informasi",
                text: "<?= session()->getFlashdata('success') ?>",
                icon: "success",
                button: "OK",
            });
        </script>
    <?php endif; ?>

</body>

</html>