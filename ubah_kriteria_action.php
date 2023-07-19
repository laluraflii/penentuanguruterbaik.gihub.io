<?php
include 'config/db.php';
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_faktor = $_POST['id_faktor'];
  $aspek = $_POST['aspek'];
  $faktor = $_POST['faktor'];
  $target = $_POST['target'];
  $type = $_POST['type'];
  $query = mysqli_query($konek, "UPDATE pm_faktor SET  id_aspek = '$aspek', faktor = '$faktor', target = '$target', type = '$type' WHERE id_faktor = '$id_faktor'");
  if ($query) {
    echo "<script>
        alert('Data Kriteria Berhasil diubah!');
        document.location.href = 'kriteria.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Kriteria Gagal diubah!');
        document.location.href = 'kriteria.php';
        </script>";
  }
}
