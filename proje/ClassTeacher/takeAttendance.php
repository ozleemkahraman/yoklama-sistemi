
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

    $query = "SELECT odkssinif.sinifAdi,odkssube.subeAdi 
    FROM odksogretmen
    INNER JOIN odkssinif ON odkssinif.Id = odksogretmen.sinifId
    INNER JOIN odkssube ON odkssube.Id = odksogretmen.subeId
    Where odksogretmen.Id = '$_SESSION[userId]'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rrw = $rs->fetch_assoc();


//session and Term
        $querey=mysqli_query($conn,"select * from odksdonemaralik where aktiflik ='1'");
        $rwws=mysqli_fetch_array($querey);
        $donemAralikId = $rwws['Id'];

        $dateTaken = date("Y-m-d");

        $qurty=mysqli_query($conn,"select * from odksyoklama  where sinifId = '$_SESSION[sinifId]' and subeId = '$_SESSION[subeId]' and yoklamaTarih='$dateTaken'");
        $count = mysqli_num_rows($qurty);

        if($count == 0){ //if Record does not exsit, insert the new record

          //insert the students record into the attendance table on page load
          $qus=mysqli_query($conn,"select * from odksogrenci  where sinifId = '$_SESSION[sinifId]' and subeId = '$_SESSION[subeId]'");
          while ($ros = $qus->fetch_assoc())
          {
              $qquery=mysqli_query($conn,"insert into odksyoklama(ogrenciNo,sinifId,subeId,donemAralikId,durum,yoklamaTarih) 
              value('$ros[ogrenciNo]','$_SESSION[sinifId]','$_SESSION[subeId]','$donemAralikId','0','$dateTaken')");

          }
        }

  
      



if(isset($_POST['save'])){
    
    $ogrenciNo=$_POST['ogrenciNo'];

    $check=$_POST['check'];
    $N = count($ogrenciNo);
    $status = "";


//check if the attendance has not been taken i.e if no record has a durum of 1
  $qurty=mysqli_query($conn,"select * from odksyoklama  where sinifId = '$_SESSION[sinifId]' and subeId = '$_SESSION[subeId]' and yoklamaTarih='$dateTaken' and durum = '1'");
  $count = mysqli_num_rows($qurty);

  if($count > 0){

      $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bugün için Yoklama Alınmıştır!</div>";

  }

    else //update the durum to 1 for the checkboxes checked
    {

        for($i = 0; $i < $N; $i++)
        {
                $ogrenciNo[$i]; //admission Number

                if(isset($check[$i])) //the checked checkboxes
                {
                      $qquery=mysqli_query($conn,"update odksyoklama set durum='1' where ogrenciNo = '$check[$i]'");

                      if ($qquery) {

                          $durumMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Yoklama Başarıyla Alınmıştır!</div>";
                      }
                      else
                      {
                          $durumMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bir Hata Oluştu!</div>";
                      }
                  
                }
          }
      }

   

}


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
  <title>Dashboard</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">



   <script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>
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
            <h1 class="h3 mb-0 text-gray-800">Yoklama Alma (Bugünün Tarihi : <?php echo $todaysDate = date("m-d-Y");?>)</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sınıftaki Tüm Öğrenciler</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->


              <!-- Input Group -->
        <form method="post">
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tüm Öğrenciler (<?php echo $rrw['sinifAdi'].' - '.$rrw['subeAdi'];?>) Sınıf</h6>
                  <h6 class="m-0 font-weight-bold text-danger">Not: <i>Yoklama almak için her öğrencinin yanındaki onay kutularına tıklayın!</i></h6>
                </div>
                <div class="table-responsive p-3">
                <?php echo $durumMsg; ?>
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Öğrenci Adı</th>
                        <th>Öğrenci Soyadı</th>
                        <th>Diğer Adı</th>
                        <th>Öğrenci Numarası</th>
                        <th>Sınıf</th>
                        <th>Şube</th>
                        <th>Kontrol</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                  <?php
                      $query = "SELECT odksogrenci.Id,odksogrenci.ogrenciNo,odkssinif.sinifAdi,odkssinif.Id As sinifId,odkssube.subeAdi,odkssube.Id AS subeId,odksogrenci.adi,
                      odksogrenci.soyadi,odksogrenci.digerAdi,odksogrenci.ogrenciNo,odksogrenci.kayitZamani
                      FROM odksogrenci
                      INNER JOIN odkssinif ON odkssinif.Id = odksogrenci.sinifId
                      INNER JOIN odkssube ON odkssube.Id = odksogrenci.subeId
                      where odksogrenci.sinifId = '$_SESSION[sinifId]' and odksogrenci.subeId = '$_SESSION[subeId]'";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $durum="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
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
                                <td><input name='check[]' type='checkbox' value=".$rows['ogrenciNo']." class='form-control'></td>
                              </tr>";
                              echo "<input name='ogrenciNo[]' value=".$rows['ogrenciNo']." type='hidden' class='form-control'>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            Kayıt Bulunamadı
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <button type="submit" name="save" class="btn btn-primary">Yoklama Al</button>
                  </form>
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