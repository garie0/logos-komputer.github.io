<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $tambah = mysqli_query($koneksi, "INSERT INTO login (username, password, level) 
            VALUES ('$_POST[username]', 
            '$_POST[password]', 
            '$_POST[level]') ");

    if($tambah){
        echo "<script> 
        alert('tambah data berhasil');
        document.location='akun.php';
        </script>";
    }else{
        echo "<script> 
        alert('tambah data gagal');
        document.location='akun.php';
        </script>";
    }
}

if(isset($_POST['ubah'])){
    $ubah = mysqli_query($koneksi, "UPDATE login SET
        username = '$_POST[username]',
        password = '$_POST[password]',
        level = '$_POST[level]'
        WHERE id_user = '$_POST[id_user]'
    ");

    if($ubah){
        echo "<script> 
        alert('ubah data berhasil');
        document.location='akun.php';
        </script>";
    }else{
        echo "<script> 
        alert('ubah data gagal');
        document.location='akun.php';
        </script>";
    }
}

if(isset($_POST['hapus'])){
    $hapus = mysqli_query($koneksi, "DELETE FROM login WHERE id_user = '$_POST[id_user]'");

    if($hapus){
        echo "<script> 
        alert('hapus data berhasil');
        document.location='akun.php';
        </script>";
    }else{
        echo "<script> 
        alert('hapus data gagal');
        document.location='akun.php';
        </script>";
    }
}