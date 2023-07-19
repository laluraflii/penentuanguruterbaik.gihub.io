<?php
// title
$title = 'Ubah Kriteria';

// include header
include 'layout/header.php';

$id_faktor = $_GET['id_faktor'];

$data_kriteria = mysqli_query($konek, "SELECT * FROM pm_faktor INNER JOIN pm_aspek ON pm_faktor.id_aspek=pm_aspek.id_aspek WHERE id_faktor = '$id_faktor'");
foreach ($data_kriteria as $df) {
  $id_faktor = $df['id_faktor'];
  $id_aspek = $df['id_aspek'];
  $aspek = $df['aspek'];
  $faktor = $df['faktor'];
  $target = $df['target'];
  $type = $df['type'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FORM UBAH KRITERIA</h1>
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
            <form action="ubah_kriteria_action.php" method="post">

              <div class="card-body">
                <input type="hidden" name="id_faktor" value="<?= $id_faktor; ?>">
                <!-- aspek -->
                <div class="form-group">
                  <label for="aspek">Aspek</label>
                  <select name="aspek" id="aspek" class="form-control select2bs4" required>
                    <?= $id_aspek; ?>
                    <?php
                    $data_aspek = select("SELECT * FROM pm_aspek");
                    ?>
                    <?php foreach ($data_aspek as $da) : ?>
                      <option value="<?= $da['id_aspek']; ?>"><?= $da['aspek']; ?></option>
                    <?php endforeach; ?>

                  </select>
                </div>

                <!-- Kriteria -->
                <div class="form-group">
                  <label for="faktor">Kriteria</label>
                  <input type="text" name="faktor" id="faktor" class="form-control" placeholder="Masukan Kriteria" value="<?= $faktor; ?>" required>
                </div>


                <!-- Target -->
                <div class="form-group">
                  <label for="target">Target</label>
                  <select name="target" id="target" class="form-control select2bs4" required>
                    <?= $target; ?>
                    <option value="1" <?= $target == '1' ? 'selected' : null; ?>>1</option>
                    <option value="2" <?= $target == '2' ? 'selected' : null; ?>>2</option>
                    <option value="3" <?= $target == '3' ? 'selected' : null; ?>>3</option>
                    <option value="4" <?= $target == '4' ? 'selected' : null; ?>>4</option>
                    <option value="5" <?= $target == '5' ? 'selected' : null; ?>>5</option>
                  </select>
                </div>

                <!-- Type -->
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control select2bs4" required>
                    <?= $type; ?>
                    <option value="core" <?= $target == 'core' ? 'selected' : null; ?>>core</option>
                    <option value="secondary" <?= $target == 'secondary' ? 'selected' : null; ?>>secondary</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- submit -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> |
                <a href="kriteria.php" name="reset" class="btn btn-warning mr-1">Cencel</a>
              </div>
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