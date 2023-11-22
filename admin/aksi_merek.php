<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $tambah = mysqli_query($koneksi, "INSERT INTO merek (merek) VALUES ('$_POST[merek]')");

    if($tambah){
        echo "<script> 
        alert('tambah merek berhasil');
        document.location='merek.php';
        </script>";
    }else{
        echo "<script> 
        alert('tambah merek gagal');
        document.location='merek.php';
        </script>";
    }
}

if(isset($_POST['ubah'])){
    $ubah = mysqli_query($koneksi, "UPDATE merek SET merek = '$_POST[merek]' WHERE id_merek = '$_POST[id_merek]'");

    if($ubah){
        echo "<script> 
        alert('ubah merek berhasil');
        document.location='merek.php';
        </script>";
    }else{
        echo "<script> 
        alert('ubah merek gagal');
        document.location='merek.php';
        </script>";
    }
}

if(isset($_POST['hapus'])){
    $hapus = mysqli_query($koneksi, "DELETE FROM merek WHERE id_merek = '$_POST[id_merek]'");

    if($hapus){
        echo "<script> 
        alert('hapus merek berhasil');
        document.location='merek.php';
        </script>";
    }else{
        echo "<script> 
        alert('hapus merek gagal');
        document.location='merek.php';
        </script>";
    }
}