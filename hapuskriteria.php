<?php
include 'config/db.php';
include 'config/controller.php';

$id_faktor = (int)$_GET['id_faktor'];
if (hapus_kriteria($id_faktor) > 0) {
  echo "<script>
        alert('Data Kriteria Berhasil dihapus!');
        document.location.href = 'kriteria.php';
        </script>";
} else {
  echo "<script>
        alert('Data Kriteria Gagal dihapus!');
        document.location.href = 'kriteria.php';
        </script>";
}
