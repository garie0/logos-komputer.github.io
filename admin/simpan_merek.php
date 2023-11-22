<?php

if(isset($_POST['simpan'])){

$koneksi = mysqli_connect("localhost","root","","logos_komputer") 
or die(mysqli_connect_error());
 
$jum = $_POST['jum'];  

$merek = $_POST['merek'];

for ($i=0; $i<$jum; $i++)
{
    mysqli_query($koneksi,"insert into merek set
    merek = '$merek[$i]'") or die(mysqli_error($koneksi));
}
    echo "<script>alert('Data telah tersimpan');
    document.location='merek.php'</script>";
}
 
?>