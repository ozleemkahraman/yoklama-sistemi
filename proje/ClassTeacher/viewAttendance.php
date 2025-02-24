
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/kurum.jpg" rel="icon">
  <title>Gösterge Paneli</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sınıf Yoklamasını Görüntüle</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Yönetim Paneli</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sınıf Yoklamasını Görüntüle</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sınıf Yoklamasını Görüntüle
</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Gün Seç<span class="text-danger ml-2">*</span></label>
                            <input type="date" class="form-control" name="dateTaken" id="exampleInputadi" placeholder="Şube Adı Seçiniz..">
                        </div>
                        <!-- <div class="col-xl-6">
                        <label class="form-control-label">Class Arm Name<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="subeAdi" value="<?php echo $row['subeAdi'];?>" id="exampleInputadi" placeholder="Class Arm Name">
                        </div> -->
                    </div>
                    <button type="submit" name="view" class="btn btn-primary">Yoklamayı Görüntüle</button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sınıflarda Yoklama</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Öğrenci Adı</th>
                        <th>Öğrenci Soyadı</th>
                        <th>Diğer Adı</th>
                        <th>Öğrenci Numarası</th>
                        <th>Sınıf</th>
                        <th>Şube</th>
                        <th>Dönem Aralık</th>
                        <th>Dönem</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                      </tr>
                    </thead>
                   
                    <tbody>

                  <?php

                    if(isset($_POST['view'])){

                      $dateTaken =  $_POST['dateTaken'];

                      $query = "SELECT odksyoklama.Id,odksyoklama.durum,odksyoklama.yoklamaTarih,odkssinif.sinifAdi,
                      odkssube.subeAdi,odksdonemaralik.donemAralikAdi,odksdonemaralik.donemId,odksdonem.donemAdi,
                      odksogrenci.adi,odksogrenci.soyadi,odksogrenci.digerAdi,odksogrenci.ogrenciNo
                      FROM odksyoklama
                      INNER JOIN odkssinif ON odkssinif.Id = odksyoklama.sinifId
                      INNER JOIN odkssube ON odkssube.Id = odksyoklama.subeId
                      INNER JOIN odksdonemaralik ON odksdonemaralik.Id = odksyoklama.donemAralikId
                      INNER JOIN odksdonem ON odksdonem.Id = odksdonemaralik.donemId
                      INNER JOIN odksogrenci ON odksogrenci.ogrenciNo = odksyoklama.ogrenciNo
                      where odksyoklama.yoklamaTarih = '$dateTaken' and odksyoklama.sinifId = '$_SESSION[sinifId]' and odksyoklama.subeId = '$_SESSION[subeId]'";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                              if($rows['durum'] == '1'){$status = "Katıldı"; $colour="#00FF00";}else{$status = "Katılmadı";$colour="#FF0000";}
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                 <td>".$rows['adi']."</td>
                                <td>".$rows['soyadi']."</td>
                                <td>".$rows['digerAdi']."</td>
                                <td>".$rows['ogrenciNo']."</td>
                                <td>".$rows['sinifAdi']."</td>
                                <td>".$rows['subeAdi']."</td>
                                <td>".$rows['donemAralikAdi']."</td>
                                <td>".$rows['donemAdi']."</td>
                                <td style='background-color:".$colour."'>".$status."</td>
                                <td>".$rows['yoklamaTarih']."</td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            Kayıt Bulunamadı
                            </div>";
                      }
                    }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>