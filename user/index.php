<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Website LOGOS Komputer</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Website LOGOS Komputer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Selamat Datang Di Website LOGOS Komputer</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Dibuat pada 21 November 2023</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="index.php?merek=ASUS">Laptop ASUS</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="index.php?merek=ACER">Laptop ACER</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="index.php?merek=MSI">Laptop MSI</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="index.php?merek=HP">Laptop HP</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="index.php?merek=LENOVO">Laptop LENOVO</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="index.php?merek=AXIOO">Laptop AXIOO</a>
                        </header>
                        <!-- Preview image figure-->
                        <!-- Post content -->
                        <?php
                        include 'koneksi.php';

                        if (isset($_GET['q'])) {
                            $searchQuery = mysqli_real_escape_string($koneksi, $_GET['q']);

                            $query = "SELECT * FROM laptop WHERE nama_laptop LIKE '%$searchQuery%' OR isi LIKE '%$searchQuery%'";
                        } else if (isset($_GET['merek'])) {
                            $merek = $_GET['merek'];
    
                            $query = "SELECT * FROM laptop join merek on laptop.id_merek = merek.id_merek WHERE merek = '$merek'";
                        } else {
                            $query = "SELECT * FROM laptop";
                        }

                        $result = mysqli_query($koneksi, $query);

                        // Periksa hasil query
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $nama_laptop = $row['nama_laptop'];
                                $spek = $row['spek'];
                                $gambar = $row['gambar'];
                                $pegawai = $row['nama_pegawai'];
                                $tanggal = $row['tanggal'];
                                echo '<!-- Post header -->
                                <header class="mb-4">
                                    <!-- Preview image figure -->
                                    <figure class="mb-4"><img class="img-fluid rounded" src="../admin/img/' . $gambar . '" alt="..." /></figure>
                                    <!-- Post title -->
                                    <h1 class="fw-bolder mb-1"><a href="laptop.php?id=' . $row['id_laptop'] . '">' . $nama_laptop . '</a></h1>
                                    <!-- Post meta content -->
                                    <div class="text-muted fst-italic mb-2">Posted by ' . $pegawai . ' on ' . $tanggal . '</div>
                                </header>
                                <!-- Post content -->
                                <section class="mb-5">
                                    <p class="fs-5 mb-4">' . substr($spek, 0, 200) . '...</p>
                                </section>';
                            }
                        } else {
                            echo "Tidak ada laptop.";
                        }

                        // Tutup koneksi
                        mysqli_close($koneksi);
                        ?>
                    </article>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Cari</div>
                        <div class="card-body">
                            <form action="index.php" method="GET">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="q" placeholder="Cari......" aria-label="Cari......" aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Merek</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="index.php?merek=ASUS">Laptop ASUS</a></li>
                                        <li><a href="index.php?merek=ACER">Laptop ACER</a></li>
                                        <li><a href="index.php?merek=MSI">Laptop MSI</a></li>
                                        <li><a href="index.php?merek=HP">Laptop HP</a></li>
                                        <li><a href="index.php?merek=LENOVO">Laptop LENOVO</a></li>
                                        <li><a href="index.php?merek=AXIOO">Laptop AXIOO</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
