<?php
// input title halaman
$title = 'Kriteria';

// include dengan header
include 'layout/header.php';

// memanggil data $dk dan mengurutkannya dari data terlama ke terbaru
$data_kriteria = select("SELECT * FROM pm_faktor
INNER JOIN pm_aspek ON pm_faktor.id_aspek=pm_aspek.id_aspek");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kriteria</h1>
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
              <a href="tambahkriteria.php" class="btn btn-primary mb-1"><i class="nav-icon far fa-plus-square"></i> Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Aspek</th>
                    <th>Kriteria</th>
                    <th>Target</th>
                    <th>Type</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_kriteria as $dk) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $dk['aspek']; ?></td>
                      <td><?= $dk['faktor']; ?></td>
                      <td><?= $dk['target']; ?></td>
                      <td><?= $dk['type']; ?></td>
                      <td class="text-center">
                        <!-- ubah -->
                        <a href="ubahkriteria.php?id_faktor=<?= $dk['id_faktor']; ?>" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-pen"></i></a> |
                        <!-- hapus -->
                        <a href="hapuskriteria.php?id_faktor=<?= $dk['id_faktor']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin Dihapus??')"><i class="nav-icon fas fa-trash"></i></a>
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