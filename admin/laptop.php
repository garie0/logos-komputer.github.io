<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php"); // Arahkan ke halaman login jika belum login
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Laptop</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Halaman Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="akun.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Akun
                            </a>
                            <a class="nav-link" href="merek.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Merek
                            </a>
                            <a class="nav-link" href="laptop.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Laptop
                            </a>
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-align-justify"></i></div>
                                Laporan Laptop
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['login']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Laptop</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Laptop</li>
                        </ol>
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Laptop</button>                                             
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Tanggal</th>
                                            <th>Nama Laptop</th>
                                            <th>Merek</th>
                                            <th>Spesifikasi</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include "koneksi.php";

                                        $limit = 5; // Jumlah item per halaman
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $start = ($page - 1) * $limit;

                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT laptop.*, merek.merek FROM laptop INNER JOIN merek ON laptop.id_merek = merek.id_merek ORDER BY id_laptop ASC LIMIT $start, $limit");                                        
                                        while ($row = mysqli_fetch_array($query)) :
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_pegawai'] ?></td>
                                        <td><?= date('Y-m-d', strtotime($row['tanggal'])); ?></td>
                                        <td><?= $row['nama_laptop'] ?></td>
                                        <td><?= $row['merek'] ?></td>
                                        <td><?= $row['spek'] ?></td>
                                        <td><img src="img/<?= $row['gambar'] ?>" width="100"></td>
                                        <td>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $no ?>">Edit</a>
                                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">hapus</a>
                                        </td>
                                    </tr>
                                                
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $no ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Laptop</h5>
                                                </div>
                                                <form action="aksi_laptop.php" method="POST" enctype="multipart/form-data">
                                                    <?php
                                                        include "koneksi.php";

                                                        $sql = "SELECT * FROM merek";
                                                        $result = $koneksi->query($sql);
                                                        $data2 = array();

                                                        if ($result->num_rows > 0) {
                                                            while ($row3 = $result->fetch_assoc()) {
                                                                $data2[] = array(
                                                                    'id_merek' => $row3["id_merek"],
                                                                    'merek' => $row3["merek"]
                                                                );
                                                            }
                                                        } else {
                                                            die("Tidak Dapat Mendapat Data Dari Database");
                                                        }
                                                        $koneksi->close(); 
                                                    ?>
                                                    <input type="hidden" name="id_laptop" value="<?= $row['id_laptop'] ?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label" for="nama_pegawai">Nama Pegawai</label>
                                                            <input type="text" class="form-control" name="nama_pegawai" value="<?= $row['nama_pegawai'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="tanggal">Tanggal</label>
                                                            <input type="date" class="form-control" name="tanggal" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="nama_laptop">Nama Laptop</label>
                                                            <input type="text" class="form-control" name="nama_laptop" value="<?= $row['nama_laptop'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="merek">merek</label>
                                                            <select name="id_merek" class="form-select">
                                                                <?php   
                                                                    foreach ($data2 as $key => $value ){
                                                                        echo "<option value='$value[id_merek]'>$value[merek]</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="spek">Spesifikasi</label>
                                                            <textarea class="form-control" style="resize: none; height: 70px;" name="spek" required><?= $row['spek'] ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label" for="gambar">Gambar</label>
                                                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Kembali</button>
                                                            <button class="btn btn-primary" type="submit" name="ubah">Edit</button>
                                                        </div>                    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Hapus Modal -->
                                    <div class="modal fade" id="hapus<?= $no ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Laptop</h5>
                                                </div>
                                                <form action="aksi_laptop.php" method="POST">
                                                    <input type="hidden" name="id_laptop" value="<?= $row['id_laptop'] ?>">
                                                    <div class="modal-body">
                                                        <div class="modal-footer">
                                                            <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Laptop Ini? <br>
                                                                <span class="text-danger">Laptop : <?= $row['nama_laptop']?></span>
                                                            </h5>
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                                        </div>                                                               
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>
                                </table>
                                <!-- Tampilkan pagination -->
                                <div class="d-flex justify-content-center">
                                    <ul class="pagination">
                                        <?php
                                        include 'koneksi.php';
                                        $result = mysqli_query($koneksi, "SELECT COUNT(id_laptop) AS jumlah FROM laptop");
                                        $row = mysqli_fetch_assoc($result);
                                        $total_records = $row['jumlah'];
                                        $total_pages = ceil($total_records / $limit);

                                        $previous_page = $page - 1;
                                        $next_page = $page + 1;

                                        if ($previous_page > 0) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . $previous_page . '">Previous</a></li>';
                                        }

                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }

                                        if ($next_page <= $total_pages) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . $next_page . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- Tambah Modal -->
        <div class="modal fade" id="tambah" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Laptop</h5>
                    </div>
                    <form action="aksi_laptop.php" method="POST" enctype="multipart/form-data">
                            <?php
                                include "koneksi.php";

                                $sql = "SELECT * FROM merek";
                                $result = $koneksi->query($sql);
                                $data = array();

                                if ($result->num_rows > 0) {
                                    while ($row2 = $result->fetch_assoc()) {
                                        $data[] = array(
                                            'id_merek' => $row2["id_merek"],
                                            'merek' => $row2["merek"]
                                        );
                                    }
                                } else {
                                    die("Tidak Dapat Mendapat Data Dari Database");
                                }
                                $koneksi->close(); 
                            ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="nama_pegawai">Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama_pegawai" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nama_laptop">Nama Laptop</label>
                                <input type="text" class="form-control" name="nama_laptop" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="merek">Merek</label>
                                <select name="id_merek" class="form-select">                              
                                    <?php   
                                        foreach ($data as $key => $value ){
                                            echo "<option value='$value[id_merek]'>$value[merek]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="spek">Spesifikasi</label>
                                <textarea class="form-control" style="resize: none; height: 70px;" name="spek" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="gambar">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button class="btn btn-primary" type="submit" name="simpan">Tambah</button>
                            </div>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    </body>
</html>
