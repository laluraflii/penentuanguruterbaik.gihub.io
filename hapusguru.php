<?php 
include 'config/db.php';
include 'config/controller.php';

$id_alternatif = (int)$_GET['id_alternatif'];
if (hapus_guru($id_alternatif)>0){
  echo "<script>
        alert('Data Guru Berhasil dihapus!');
        document.location.href = 'dataguru.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Guru Gagal dihapus!');
        document.location.href = 'dataguru.php';
        </script>";
  }
