<?php
include 'config/db.php';
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_alternatif = $_POST['id_alternatif'];
  $nama = $_POST['nama'];
  $query = mysqli_query($konek, "UPDATE pm_alternatif SET  nama = '$nama' WHERE id_alternatif = '$id_alternatif'");
  if ($query) {
    echo "<script>
        alert('Data Guru Berhasil diubah!');
        document.location.href = 'dataguru.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Guru Gagal diubah!');
        document.location.href = 'dataguru.php';
        </script>";
  }
}
