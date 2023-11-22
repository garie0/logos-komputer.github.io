<?php
                                    if(isset($_POST['hapus'])){
                                        include 'koneksi.php';
                                        
                                        $ide = $_POST['id'];
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