<?php
// input title halaman
$title = 'Profile Guru';

// include dengan header
include 'layout/header.php';

// memenggil nilai untuk aspek disiplin
$aspek_disiplin = select("SELECT alt.id_alternatif,alt.nama,pm.D1,pm.D2,pm.D3
FROM pm_alternatif alt 
left JOIN (SELECT * FROM( select id_alternatif,sum( if(id_faktor=1,value,0) ) as 'D1',sum( if(id_faktor=2,value,0) ) as 'D2',sum( if(id_faktor=3,value,0) ) as 'D3' 
from pm_sample group by id_alternatif)tbl) pm on alt.id_alternatif =pm.id_alternatif");

// memanggil aspek untu kerjasama
$aspek_kerjasama = select("SELECT alt.id_alternatif,alt.nama,pm.K1,pm.K2,pm.K3 
FROM pm_alternatif alt 
left JOIN (SELECT * FROM( select id_alternatif,sum( if(id_faktor=4,value,0) ) as 'K1',sum( if(id_faktor=5,value,0) ) as 'K2',sum( if(id_faktor=6,value,0) ) as 'K3'
from pm_sample group by id_alternatif)tbl) pm on alt.id_alternatif =pm.id_alternatif");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil Guru</h1>
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
            <!-- Aspek Disiplin  -->
            <div class="card-header">
              <h3 class="card-title"><b>Aspek Disiplin</b></h3>
            </div>
            <div class="card-header">
              <a href="tambahprofile.php" class="btn btn-primary mb-1"><i class="nav-icon far fa-plus-square"></i> Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Hadir Tepat Waktu</th>
                    <th>Tanggung Jawab</th>
                    <th>Berpakaian Rapi Dan Sopan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($aspek_disiplin as $ad) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $ad['nama']; ?></td>
                      <td><?= $ad['D1']; ?></td>
                      <td><?= $ad['D2']; ?></td>
                      <td><?= $ad['D3']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <!-- Aspek Kerjasama  -->
            <div class="card-header">
              <h3 class="card-title"><b>Aspek Kerjasama</b></h3>
            </div>
            <div class="card-header">
              <a href="tambahprofile.php" class="btn btn-primary mb-1"><i class="nav-icon far fa-plus-square"></i> Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Berpartisipasi Dan Berkontribusi</th>
                    <th>Aktif Dan Produktif</th>
                    <th>Membantu Rekan Guru</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($aspek_kerjasama as $ak) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $ak['nama']; ?></td>
                      <td><?= $ak['K1']; ?></td>
                      <td><?= $ak['K2']; ?></td>
                      <td><?= $ak['K3']; ?></td>
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