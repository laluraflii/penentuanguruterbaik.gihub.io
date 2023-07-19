<?php
// input title halaman
$title = 'Bobot';

// include dengan header
include 'layout/header.php';

// memanggil data $db dan mengurutkannya dari data terlama ke terbaru
$data_bobot = select("SELECT * FROM pm_bobot");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keterangan</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bobot Nilai Gap</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>selisih</th>
                    <th>Bobot</th>
                    <th>Keterangan Bobot</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_bobot as $db) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $db['selisih']; ?></td>
                      <td><?= $db['bobot']; ?></td>
                      <td><?= $db['keterangan']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skala Penilaian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nilai</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Sangat Kurang</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Kurang</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Cukup</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Baik</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Sangat Baik</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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
// include dengan footer
include 'layout/footer.php';
?>