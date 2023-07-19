<?php
// title
$title = 'Tambah Data Guru';

// include header
include 'layout/header.php';

// Cek apakah tombol tambah ditekan berhasil atau tidak
if (isset($_POST['submit'])) {
  if (tambah_guru($_POST) > 0) {
    echo "<script>
        alert('Data Guru Berhasil ditambahkan!');
        document.location.href = 'dataguru.php';
        </script>";
  } else {
    echo "<script>
        alert('Data Guru Gagal ditambahkan!');
        document.location.href = 'dataguru.php';
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
          <h1>FORM TAMBAH DATA GURU</h1>
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
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Guru" required>
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