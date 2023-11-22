<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = isset($_POST['nama_pegawai']) ? $_POST['nama_pegawai'] : '';
    $tanggal = isset($_POST['tanggal']) ? date('Y-m-d', strtotime($_POST['tanggal'])) : '';
    $nama_laptop = isset($_POST['nama_laptop']) ? $_POST['nama_laptop'] : '';
    $merek = isset($_POST['id_merek']) ? $_POST['id_merek'] : '';
    $spek = isset($_POST['spek']) ? $_POST['spek'] : '';
    $gambar = upload_file();

    $tambah = mysqli_query($koneksi, "INSERT INTO laptop (nama_pegawai, tanggal, nama_laptop, id_merek, spek, gambar) 
    VALUES ('$nama', '$tanggal', '$nama_laptop', '$merek', '$spek', '$gambar')");


    if($tambah){
        echo "<script> 
        alert('tambah laptop berhasil');
        document.location='laptop.php';
        </script>";
    }else{
        echo "<script> 
        alert('tambah laptop gagal');
        document.location='laptop.php';
        </script>";
    }
}else if (isset($_POST['ubah'])) {
    $id_laptop = isset($_POST['id_laptop']) ? $_POST['id_laptop'] : '';
    $nama = isset($_POST['nama_pegawai']) ? $_POST['nama_pegawai'] : '';
    $tanggal = isset($_POST['tanggal']) ? date('Y-m-d', strtotime($_POST['tanggal'])) : '';
    $nama_laptop = isset($_POST['nama_laptop']) ? $_POST['nama_laptop'] : '';
    $merek = isset($_POST['id_merek']) ? $_POST['id_merek'] : '';
    $spek = isset($_POST['spek']) ? $_POST['spek'] : '';
    $gambar = upload_file();

    $update = mysqli_query($koneksi, "UPDATE laptop SET nama_pegawai = '$nama', tanggal = '$tanggal', nama_laptop = '$nama_laptop', id_merek = '$merek', spek = '$spek', gambar = '$gambar' WHERE id_laptop = '$id_laptop'");

    if($update){
        echo "<script> 
        alert('update laptop berhasil');
        document.location='laptop.php';
        </script>";
    }else{
        echo "<script> 
        alert('update laptop gagal');
        document.location='laptop.php';
        </script>";
    }
}else if(isset($_POST['hapus'])){
    $hapus = mysqli_query($koneksi, "DELETE FROM laptop WHERE id_laptop = '$_POST[id_laptop]'");

    if($hapus){
        echo "<script> 
        alert('hapus laptop berhasil');
        document.location='laptop.php';
        </script>";
    }else{
        echo "<script> 
        alert('hapus laptop gagal');
        document.location='laptop.php';
        </script>";
    }
}


function upload_file(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    $extensifileValid = ['jpg', 'png', 'jpeg'];
    $extensifile = explode('.', $namaFile);
    $extensifile = strtolower(end($extensifile));

    if(!in_array($extensifile, $extensifileValid)){
        echo    "<script> 
                    alert('format gambar tidak valid');
                    document.location='laptop.php';
                </script>";
        die();
    }else if($ukuranFile > 2048000){
        echo    "<script> 
                    alert('Ukuran File Max 2 MB');
                    document.location='laptop.php';
                </script>";
        die();
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    move_uploaded_file($tmpName, 'img/'. $namaFileBaru); 
    return $namaFileBaru;
}


