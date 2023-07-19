<?php
include 'config/db.php';
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_aspek = $_POST['id_aspek'];
  $aspek = $_POST['aspek'];
  $presentase = $_POST['presentase'];
  $bobot_core = $_POST['bobot_core'];
  $bobot_secondary = $_POST['bobot_secondary'];
  $query = mysqli_query($konek, "UPDATE pm_aspek SET aspek = '$aspek', presentase  ='$presentase', bobot_core = '$bobot_core', bobot_secondary = '$bobot_secondary' WHERE id_aspek= '$id_aspek'");
  if ($query) {
    echo "<script>
        alert('Data Aspek Berhasil diubah!');
        document.location.href = 'aspek.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Aspek Gagal diubah!');
        document.location.href = 'aspek.php';
        </script>";
  }
}
