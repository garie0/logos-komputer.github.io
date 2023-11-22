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
                            <div class="table-responsive">
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                    <table>
                                        <tr bgcolor="#eee">
                                            <th>Merek</th>                                        
                                        </tr>
                                        <?php
                                            include "koneksi.php";
                                            if(isset($_POST['ide'])) {
                                                $ide = $_POST['ide'];    
                                                foreach($ide as $id) {
                                                    $query = mysqli_query($koneksi, "SELECT * FROM merek WHERE id_merek='$id'");
                                                    $data = mysqli_fetch_array($query);
                                                    
                                                    if($data) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="merek">Merek Laptop</label>
                                                    <input type="text" name="merek[]" class="form-control" value="<?php echo $data['merek'] ?>">
                                                    <input type="hidden" name="id_merek[]" class="form-control" value="<?php echo $id ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                                                    }
                                                }
                                            }
                                        ?> 
                                    </table>
                                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    <!-- <input class="btn btn-success" type="submit" name="proses" value="Simpan"> -->
                                    <input class="btn btn-danger" type="button" value="Kembali" onclick="location.href='merek.php';">
                                </form>
                                <?php
                                    if(isset($_POST['simpan'])){
                                        include 'koneksi.php';
                                    
                                        $ide = $_POST['id_merek'];
                                        $jum = count($ide);
                                    
                                        for($i = 0; $i < $jum; $i++){
                                            $id = $ide[$i];
                                            $merek = $_POST['merek'][$i]; 
                                            $simpan = mysqli_query($koneksi, "UPDATE merek SET merek='$merek' WHERE id_merek='$id'") or die(mysqli_error($koneksi)); // Ganti die(mysql_error()) menjadi die(mysqli_error($koneksi))
                                        }
                                        if($simpan){
                                            echo "<script>alert('Data Berhasil Diubah')</script>";
                                            echo '<script type="text/javascript">window.location="merek.php"</script>';
                                        }else{
                                            echo "<script>alert('Data Gagal Diubah')</script>";
                                            echo '<script type="text/javascript">window.location="merek.php"</script>';
                                        }
                                    }else if(isset($_POST['hapus'])){
                                        include 'koneksi.php';
                                        
                                        $ide = $_POST['ide'];
                                        $jum = count($ide);
                                    
                                        if($jum == 0){
                                            echo "<script>alert('Tidak Ada Data Yang di Pilih')</script>";
                                            echo '<script type="text/javascript">window.location="merek.php"</script>';
                                        }
                                    
                                        for($i = 0; $i < $jum; $i++){
                                            $id = $ide[$i];
                                            $simpan = mysqli_query($koneksi, "DELETE FROM merek WHERE id_merek='$id'") or die(mysqli_error($koneksi));
                                        }
                                        if($simpan){
                                            echo "<script>alert('Data Berhasil Dihapus')</script>";
                                            echo '<script type="text/javascript">window.location="merek.php"</script>';
                                        }else{
                                            echo "<script>alert('Data Gagal Dihapus')</script>";
                                            echo '<script type="text/javascript">window.location="merek.php"</script>';
                                        }
                                    }                                   
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
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
