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
        <title>Halaman Artikel</title>
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
                        <h1 class="mt-4">Data Merek</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Merek</li>
                        </ol>
                        <div class="card-body">
                                <form method="POST" action="tambah_merek.php" enctype="multipart/form-data">
                                    Jumlah Data
                                    <input type="text" name="jum" size="1">
                                    <input type="submit" name="submit" value="Proses" class="btn btn-primary">
                                </form>
                        </div>
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Merek</button>  
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form action="ubah_merek.php" method="post" enctype="multipart/form-data">
                                <input type="submit" class="btn btn-warning mb-3" name="proses" value="Proses Update Checkbox">  
                                <input type="submit" class="btn btn-danger mb-3" name="hapus" value="Proses Hapus Checkbox">  
                                <!-- <button class ="btn btn-danger mb-3" name="hapus" onclick="return confirm('Yakin Data Ingin Dihapus?')">Proses Hapus Checkbox</button> -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Merek</th>
                                            <th>Merek</th>
                                            <th>Action</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include "koneksi.php";
                                        $query = mysqli_query($koneksi, "SELECT * FROM merek ORDER BY id_merek ASC");

                                        $no = 0;
                                        while ($row = mysqli_fetch_array($query)) :
                                        $no++;
                                        $id = $row['id_merek'];
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['id_merek'] ?></td>
                                        <td><?php echo $row['merek'] ?></td>                                      
                                        <td>
                                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?= $no ?>">Edit</a>
                                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">hapus</a>
                                        </td>
                                        <td><input type="checkbox" name="ide[]" value="<?php echo $id ?>"></td>
                                        <input type="hidden" name="id<?php echo $no?>" class="form-control" value="<?php echo $id ?>">
                                    </tr>
                                                
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $no ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div cl ass="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Merek</h5>
                                                </div>
                                                <form action="aksi_merek.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id_merek" value="<?= $row['id_merek']?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label" for="merek">Merek</label>
                                                            <input type="text" class="form-control" name="merek" value="<?= $row['merek']?>" >
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Kembali</button>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Merek</h5>
                                                </div>
                                                <form action="aksi_merek.php" method="POST">
                                                    <input type="hidden" name="id_merek" value="<?= $row['id_merek'] ?>">
                                                    <div class="modal-body">
                                                        <div class="modal-footer">
                                                            <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Merek Ini? <br>
                                                                <span class="text-danger"><?= $row['merek']?></span>
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
                                </form>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Merek</h5>
                    </div>
                    <form action="aksi_merek.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="merek">Merek</label>
                                <input type="text" class="form-control" name="merek" required>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
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
    </body>
</html>
