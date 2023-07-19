<?php
// input title halaman
$title = 'Data Guru';

// include dengan header
include 'layout/header.php';

// memanggil data $dg dan mengurutkannya dari data terlama ke terbaru
$data_guru = select("SELECT * FROM pm_alternatif");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Guru</h1>
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
              <a href="tambahguru.php" class="btn btn-primary mb-1"><i class="nav-icon far fa-plus-square"></i> Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_guru as $dg) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $dg['nama']; ?></td>
                      <td class="text-center">
                        <!-- ubah -->
                        <a href="ubahguru.php?id_alternatif=<?= $dg['id_alternatif']; ?>" class="btn btn-secondary btn-sm"><i class="nav-icon fas fa-pen"></i></a> |
                        <!-- hapus -->
                        <a href="hapusguru.php?id_alternatif=<?= $dg['id_alternatif']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin Dihapus??')"><i class="nav-icon fas fa-trash"></i></a>
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