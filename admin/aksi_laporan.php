<?php
include "koneksi.php";

if ($_GET['aksi'] == "tgl") {

    $tgl = $_POST['tgl'];

    echo "<html>";
    echo "<head>";
    echo "<title>Laporan Laptop LOGOS - Periode Tanggal</title>";
    echo "<link rel='stylesheet' href='assets/dist/css/custom.css'>";
    echo "<link rel='stylesheet' href='assets/dist/bower_components/bootstrap/dist/css/bootstrap.min.css'>";
    echo "<link rel='stylesheet' href='assets/dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'>";
    echo "</head>";
    echo "<body onload='window.print()' style='font-family: Quicksand, sans-serif'>";
    echo "<h3 class='text-center' style='font-family: Quicksand, sans-serif; margin-top: -30px;'>.:: Laporan Laptop LOGOS ::.</h3>";
    
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<table class='table table-striped table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Nama Pegawai</th>";
    echo "<th>Tanggal</th>";
    echo "<th>Nama Laptop</th>";
    echo "<th>Merek</th>";
    echo "<th>Spesifikasi</th>";
    echo "<th>Gambar</th>";
    echo "</tr>";
    echo "</thead>";
    $no = 1;
    echo "<tbody>"; // Letakkan <tbody> di luar loop agar hanya dibuka sekali
    
    $sql = mysqli_query($koneksi, "SELECT laptop.*, merek.merek FROM laptop INNER JOIN merek ON laptop.id_merek = merek.id_merek WHERE laptop.tanggal = '$tgl'");
    
    while ($row = mysqli_fetch_assoc($sql)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['nama_pegawai'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['nama_laptop'] . "</td>";
        echo "<td>" . $row['merek'] . "</td>";
        echo "<td>" . $row['spek'] . "</td>";
        echo "<td><img src='img/" . $row['gambar'] . "' style='max-width: 100px; max-height: 100px;'></td>"; // Ganti 'img/' dengan path direktori yang sesuai
        echo "</tr>";
    }    
    
    echo "</tbody>";
    echo "</table>";
    echo "<p style='text-align: center;'>Laporan Laptop LOGOS Berdasarkan Tanggal (" . $_POST['tgl'] . ")</p>";
    echo "<script src='assets/dist/bower_components/jquery/dist/jquery.min.js'></script>";
    echo "<script src='assets/dist/bower_components/bootstrap/dist/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
}
?>
