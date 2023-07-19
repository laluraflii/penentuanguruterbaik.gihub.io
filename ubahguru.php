<?php
// title
$title = 'Ubah Data Guru';

// include header
include 'layout/header.php';

// mengambil alternatif dari database
$id_alternatif = $_GET['id_alternatif'];

$data_guru = mysqli_query($konek, "SELECT * FROM pm_alternatif WHERE id_alternatif = '$id_alternatif'");
foreach ($data_guru as $dg) {
  $id_alternatif = $dg['id_alternatif'];
  $nama = $dg['nama'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FORM UBAH DATA GURU</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Ubah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="ubah_guru_action.php" method="post">

              <div class="card-body">
                <input type="hidden" name="id_alternatif" value="<?= $id_alternatif; ?>">
                <!-- nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" value="<?= $nama; ?>" class="form-control" id="nama" placeholder="Masukkan Nama Guru" required>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- submit -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> |
                <a href="dataguru.php" name="reset" class="btn btn-warning mr-1">Cencel</a>
              </div>
            </form>
            <!-- /.form -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
// include footer
include 'layout/footer.php';
?>