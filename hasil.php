<?php
// input title halaman
$title = 'Laporan';

// include dengan header
include 'layout/header.php';

// memenggil nilai untuk aspek disiplin
$perhitungan = mysqli_query($konek, "SELECT alt.id_alternatif,alt.nama,pm.D1,pm.D2,pm.D3,pm.K1,pm.K2,pm.K3
FROM pm_alternatif alt 
left JOIN (SELECT * FROM( select id_alternatif,sum( if(id_faktor=1,value,0) ) as 'D1',sum( if(id_faktor=2,value,0) ) as 'D2',sum( if(id_faktor=3,value,0) ) as 'D3', sum( if(id_faktor=4,value,0) ) as 'K1',sum( if(id_faktor=5,value,0) ) as 'K2',sum( if(id_faktor=6,value,0) ) as 'K3'
from pm_sample group by id_alternatif)tbl) pm on alt.id_alternatif =pm.id_alternatif");

// memanggil nilai target

$data_faktor = select("SELECT * FROM pm_faktor GROUP BY id_faktor");

$profil_ideal_1 = mysqli_query($konek, "select target as nilai from pm_faktor where id_faktor=1");
$profil_ideal_2 = mysqli_query($konek, "select target as nilai from pm_faktor where id_faktor=2");
$profil_ideal_3 = mysqli_query($konek, "select target as nilai from pm_faktor where id_faktor=3");
$profil_ideal_4 = mysqli_query($konek, "select target as nilai from pm_faktor where id_faktor=4");
$profil_ideal_5 = mysqli_query($konek, "select target as nilai from pm_faktor where id_faktor=5");
$profil_ideal_6 = mysqli_query($konek, "select target as nilai from pm_faktor where id_faktor=6");
$data_1 = mysqli_fetch_assoc($profil_ideal_1);
$data_2 = mysqli_fetch_assoc($profil_ideal_2);
$data_3 = mysqli_fetch_assoc($profil_ideal_3);
$data_4 = mysqli_fetch_assoc($profil_ideal_4);
$data_5 = mysqli_fetch_assoc($profil_ideal_5);
$data_6 = mysqli_fetch_assoc($profil_ideal_6);
$pi1 = $data_1['nilai'];
$pi2 = $data_2['nilai'];
$pi3 = $data_3['nilai'];
$pi4 = $data_4['nilai'];
$pi5 = $data_5['nilai'];
$pi6 = $data_6['nilai'];


// memanggil nilai faktor
$type_1 = mysqli_query($konek, "select type as nilai from pm_faktor where id_faktor=1");
$type_2 = mysqli_query($konek, "select type as nilai from pm_faktor where id_faktor=2");
$type_3 = mysqli_query($konek, "select type as nilai from pm_faktor where id_faktor=3");
$type_4 = mysqli_query($konek, "select type as nilai from pm_faktor where id_faktor=4");
$type_5 = mysqli_query($konek, "select type as nilai from pm_faktor where id_faktor=5");
$type_6 = mysqli_query($konek, "select type as nilai from pm_faktor where id_faktor=6");
$dt_1 = mysqli_fetch_assoc($type_1);
$dt_2 = mysqli_fetch_assoc($type_2);
$dt_3 = mysqli_fetch_assoc($type_3);
$dt_4 = mysqli_fetch_assoc($type_4);
$dt_5 = mysqli_fetch_assoc($type_5);
$dt_6 = mysqli_fetch_assoc($type_6);
$tp1 = $dt_1['nilai'];
$tp2 = $dt_2['nilai'];
$tp3 = $dt_3['nilai'];
$tp4 = $dt_4['nilai'];
$tp5 = $dt_5['nilai'];
$tp6 = $dt_6['nilai'];


// memnaggil data aspek
$data_aspek = select("SELECT * FROM pm_aspek");
// disiplin
$core = mysqli_query($konek, "select bobot_core as nilai from pm_aspek where id_aspek=1");
$cf_disiplin = mysqli_fetch_assoc($core);
$cfd = $cf_disiplin['nilai'];
$secondary = mysqli_query($konek, "select bobot_secondary as nilai from pm_aspek where id_aspek=1");
$sf_disiplin = mysqli_fetch_assoc($secondary);
$sfd = $sf_disiplin['nilai'];
// kerjasama
$core = mysqli_query($konek, "select bobot_core as nilai from pm_aspek where id_aspek=2");
$cf_kerjasama = mysqli_fetch_assoc($core);
$cfk = $cf_kerjasama['nilai'];
$secondary = mysqli_query($konek, "select bobot_secondary as nilai from pm_aspek where id_aspek=2");
$sf_kerjasama = mysqli_fetch_assoc($secondary);
$sfk = $sf_kerjasama['nilai'];

$presentase_disiplin = mysqli_query($konek, "select presentase as nilai from pm_aspek where id_aspek=1");
$presentase_kerjasama = mysqli_query($konek, "select presentase as nilai from pm_aspek where id_aspek=2");
$n_disiplin = mysqli_fetch_assoc($presentase_disiplin);
$n_kerjasama = mysqli_fetch_assoc($presentase_kerjasama);
$pd = $n_disiplin['nilai'];
$pk = $n_kerjasama['nilai'];


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan</h1>
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
            <!-- Laporan Hasil Akhir  -->
            <div class="card-header">
              <h3 class="card-title"><b>Laporan Hasil Akhir</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>D1</th>
                    <th>D2</th>
                    <th>D3</th>
                    <th>K1</th>
                    <th>K2</th>
                    <th>K3</th>
                    <th>NTD</th>
                    <th>NTK</th>
                    <th>Hasil Akhir</th>
                    <th>Rangking</th>
                    <th>Ket</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (mysqli_num_rows($perhitungan) > 0) {
                    foreach ($perhitungan as $row) {
                      $gap = array();
                      $terbobot = array();
                      $terbobot1 = array();
                      $terbobot2 = array();
                      $terbobot_total = array();

                      $bobot1 = $row['D1'] - $pi1;
                      $query1 = "select * from pm_bobot where selisih = " . $bobot1 . "";
                      $sql1 = mysqli_query($konek, $query1);
                      $row1 = mysqli_fetch_array($sql1);

                      $bobot2 = $row['D2'] - $pi2;
                      $query2 = "select * from pm_bobot where selisih = " . $bobot2 . "";
                      $sql2 = mysqli_query($konek, $query2);
                      $row2 = mysqli_fetch_array($sql2);

                      $bobot3 = $row['D3'] - $pi3;
                      $query3 = "select * from pm_bobot where selisih = " . $bobot3 . "";
                      $sql3 = mysqli_query($konek, $query3);
                      $row3 = mysqli_fetch_array($sql3);

                      $bobot4 = $row['K1'] - $pi4;
                      $query4 = "select * from pm_bobot where selisih = " . $bobot4 . "";
                      $sql4 = mysqli_query($konek, $query4);
                      $row4 = mysqli_fetch_array($sql4);

                      $bobot5 = $row['K2'] - $pi5;
                      $query5 = "select * from pm_bobot where selisih = " . $bobot5 . "";
                      $sql5 = mysqli_query($konek, $query5);
                      $row5 = mysqli_fetch_array($sql5);

                      $bobot6 = $row['K3'] - $pi6;
                      $query6 = "select * from pm_bobot where selisih = " . $bobot6 . "";
                      $sql6 = mysqli_query($konek, $query6);
                      $row6 = mysqli_fetch_array($sql6);


                  ?>
                      <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['D1']; ?></td>
                        <td><?php echo $row['D2']; ?></td>
                        <td><?php echo $row['D3']; ?></td>
                        <td><?php echo $row['K1']; ?></td>
                        <td><?php echo $row['K2']; ?></td>
                        <td><?php echo $row['K3']; ?></td>
                        <td class="">
                          <?php
                          // hitung total
                          $terbobot1[$row['id_alternatif']] = ((($row1['bobot'] + $row2['bobot']) / 2) * ($cfd / 100)) + ((($row3['bobot']) / 1) * ($sfd / 100));
                          // panggil total
                          echo $terbobot1[$row['id_alternatif']];
                          ?>
                        </td>
                        <td class="">
                          <?php
                          // hitung total
                          $terbobot2[$row['id_alternatif']] = ((($row4['bobot'] + $row5['bobot']) / 2) * ($cfd / 100)) + ((($row6['bobot']) / 1) * ($sfd / 100));
                          // panggil total
                          echo $terbobot2[$row['id_alternatif']];
                          ?>
                        </td>

                        <td>
                          <?php
                          // Perhitungan Nilai Akhir
                          $terbobot_total[$row['id_alternatif']] = (($terbobot1[$row['id_alternatif']]) * ($pd / 100)) + (($terbobot2[$row['id_alternatif']]) * ($pk / 100));

                          // Cetak Hasil
                          echo $terbobot_total[$row['id_alternatif']];
                          ?>
                        </td>
                        <td>
                          <?php
                          $query = mysqli_query($konek, "select rank as nilai from(SELECT id_alternatif, nilai_akhir,@ranking := @ranking + 1 AS rank FROM pm_ranking p, (SELECT @ranking :=0) r ORDER BY nilai_akhir desc) tbl where id_alternatif =" . $row['id_alternatif'] . "");
                          $hasil = mysqli_fetch_assoc($query);
                          $ranking = $hasil['nilai'];
                          echo $ranking;
                          ?>
                        </td>

                        <td>
                          <?php
                          if ($ranking == 1) {
                            echo "Guru Terbaik";
                          } else {
                            echo "-";
                          }
                          ?>
                        </td>

                      </tr>
                  <?php
                      mysqli_query($konek, "DELETE FROM pm_ranking where id_alternatif = " . $row['id_alternatif'] . "");

                      mysqli_query($konek, "INSERT INTO pm_ranking(id_alternatif, nilai_akhir) VALUES ('" . $row['id_alternatif'] . "', '" . $terbobot_total[$row['id_alternatif']] . "')");
                    }
                  }
                  ?>
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