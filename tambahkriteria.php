<?php
// title
$title = 'Tambah Data Kriteria';

// include header
include 'layout/header.php';

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['submit'])) {
  if (tambah_kriteria($_POST) > 0) {
    echo "<script>
        alert('Data Kriteria Berhasil ditambahkan!');
        document.location.href = 'kriteria.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Kriteria Gagal ditambahkan!');
        document.location.href = 'kriteria.php';
        </script>";
  }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FORM TAMBAH DATA KRITERIA</h1>
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
              <h3 class="card-title">Form Tambah</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="post">

              <div class="card-body">
                <!-- aspek -->
                <div class="form-group">
                  <label for="aspek">Aspek</label>
                  <select name="aspek" id="aspek" class="form-control select2bs4" required>
                    <Option selected="selected">Pilih Aspek</Option>
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
                  <input type="text" name="faktor" id="faktor" class="form-control" placeholder="Masukan Kriteria" required>
                </div>


                <!-- Target -->
                <div class="form-group">
                  <label for="target">Target</label>
                  <select name="target" id="target" class="form-control select2bs4" required>
                    <option selected="selected" value="">Pilih Skala Penilaian</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>

                <!-- Type -->
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control select2bs4" required>
                    <option selected="selected" value="">Pilih Type</option>
                    <option value="core">core</option>
                    <option value="secondary">secondary</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- submit -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> |
                <a href="dataKriteria.php" name="reset" class="btn btn-warning mr-1">Cencel</a>
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