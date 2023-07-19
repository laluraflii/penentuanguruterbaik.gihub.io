<?php
// title
$title = 'Tambah Profile';

// include header
include 'layout/header.php';

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['submit'])) {
  if (tambah_profile($_POST) > 0) {
    echo "<script>
        alert('Profile Berhasil ditambahkan!');
        document.location.href = 'profile.php';
        </script>";
  } else {
    echo "<script>
        alert('Profile Gagal ditambahkan!');
        document.location.href = 'profile.php';
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
          <h1>FORM TAMBAH PROFILE</h1>
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
                <!-- nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <select name="nama" id="nama" class="form-control select2bs4" required>
                    <Option selected="selected">Pilih Nama</Option>
                    <?php
                    $data_alternatif = select("SELECT * FROM pm_alternatif");
                    ?>
                    <?php foreach ($data_alternatif as $da) : ?>
                      <option value="<?= $da['id_alternatif']; ?>"><?= $da['nama']; ?></option>
                    <?php endforeach; ?>

                  </select>
                </div>

                <!-- faktor -->
                <div class="form-group">
                  <label for="faktor">Kriteria</label>
                  <select name="faktor" id="faktor" class="form-control select2bs4" required>
                    <Option selected="selected">Pilih Kriteria</Option>
                    <?php
                    $data_faktor = select("SELECT * FROM pm_faktor");
                    ?>
                    <?php foreach ($data_faktor as $df) : ?>
                      <option value="<?= $df['id_faktor']; ?>"><?= $df['faktor']; ?></option>
                    <?php endforeach; ?>

                  </select>
                </div>
                <!-- Value -->
                <div class="form-group">
                  <label for="value">Value</label>
                  <select name="value" id="value" class="form-control select2bs4" required>
                    <option selected="selected" value="">Skala Penilaian</option>
                    <option value="1">Sangat Kurang</option>
                    <option value="2">Kurang</option>
                    <option value="3">Cukup</option>
                    <option value="4">Baik</option>
                    <option value="5">Sangat Baik</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- submit -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button> |
                <a href="profile.php" name="reset" class="btn btn-success mr-1">Profile</a>
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