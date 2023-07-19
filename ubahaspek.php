<?php
// title
$title = 'Ubah Aspek';

// include header
include 'layout/header.php';

// mengambil alternatif dari database
$id_aspek = $_GET['id_aspek'];

$data_aspek = mysqli_query($konek, "SELECT * FROM pm_aspek WHERE id_aspek = '$id_aspek'");
foreach ($data_aspek as $da) {
  $id_aspek = $da['id_aspek'];
  $aspek = $da['aspek'];
  $presentase = $da['presentase'];
  $bobot_core = $da['bobot_core'];
  $bobot_secondary = $da['bobot_secondary'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FORM UBAH ASPEK</h1>
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
            <form action="ubah_aspek_action.php" method="post">

              <div class="card-body">
                <input type="hidden" name="id_aspek" value="<?= $id_aspek; ?>">
                <!-- aspek -->
                <div class="form-group">
                  <label for="aspek">aspek</label>
                  <input type="text" name="aspek" value="<?= $aspek; ?>" class="form-control" id="aspek" placeholder="Masukkan aspek" required>
                </div>
                <!-- presentase -->
                <div class="form-group">
                  <label for="presentase">presentase</label>
                  <input type="text" name="presentase" value="<?= $presentase; ?>" class="form-control" id="presentase" placeholder="Masukkan nilai presentase" required>
                </div>
                <!-- Bobot core -->
                <div class="form-group">
                  <label for="bobot_core">bobot_core</label>
                  <input type="text" name="bobot_core" value="<?= $bobot_core; ?>" class="form-control" id="bobot_core" placeholder="Masukkan nilai bobot core " required>
                </div>
                <!-- bobot secondary -->
                <div class="form-group">
                  <label for="bobot_secondary">bobot_secondary</label>
                  <input type="text" name="bobot_secondary" value="<?= $bobot_secondary; ?>" class="form-control" id="bobot_secondary" placeholder="Masukkan bobot secondary " required>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- submit -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> |
                <a href="aspek.php" name="reset" class="btn btn-warning mr-1">Cencel</a>
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