<?php
// input title halaman
$title = 'Aspek';

// include dengan header
include 'layout/header.php';

// memanggil data $da dan mengurutkannya dari data terlama ke terbaru
$data_aspek = select("SELECT * FROM pm_aspek");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Aspek</h1>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>z
                    <th>Aspek</th>
                    <th>presentase (%)</th>
                    <th>core factor (%)</th>
                    <th>secondary factor (%)</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_aspek as $da) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $da['aspek']; ?></td>
                      <td><?= $da['presentase']; ?></td>
                      <td><?= $da['bobot_core']; ?></td>
                      <td><?= $da['bobot_secondary']; ?></td>
                      <td class="text-center">
                        <!-- ubah -->
                        <a href="ubahaspek.php?id_aspek=<?= $da['id_aspek']; ?>" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-pen"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
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