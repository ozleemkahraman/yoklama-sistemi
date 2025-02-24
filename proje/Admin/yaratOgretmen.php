
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    
    $adi=$_POST['adi'];
  $soyadi=$_POST['soyadi'];
  $eposta=$_POST['eposta'];

  $telefonNo=$_POST['telefonNo'];
  $sinifId=$_POST['sinifId'];
  $subeId=$_POST['subeId'];
  $kayitZamani = date("Y-m-d");
   
    $query=mysqli_query($conn,"select * from odksogretmen where eposta ='$eposta'");
    $ret=mysqli_fetch_array($query);

    $sampPass = "pass123";
    $sampPass_2 = md5($sampPass);

    if($ret > 0){ 

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bu E-mail Zaten Var</div>";
    }
    else{

    $query=mysqli_query($conn,"INSERT into odksogretmen(adi,soyadi,eposta,sifre,telefonNo,sinifId,subeId,kayitZamani) 
    value('$adi','$soyadi','$eposta','$sampPass_2','$telefonNo','$sinifId','$subeId','$kayitZamani')");

    if ($query) {
        
        $qu=mysqli_query($conn,"update odkssube set atamaDurum='1' where Id ='$subeId'");
            if ($qu) {
                
                $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>E- mail Bşarıyla Oluşturuldu</div>";
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>E-mail oluşturulurken bir hata oluştu!</div>";
            }
    }
    else
    {
         $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>E-mail oluşturulurken bir hata oluştu</div>";
    }
  }
}

//---------------------------------------EDIT-------------------------------------------------------------






//--------------------EDIT------------------------------------------------------------

 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit")
	{
        $Id= $_GET['Id'];

        $query=mysqli_query($conn,"select * from odksogretmen where Id ='$Id'");
        $row=mysqli_fetch_array($query);

        //------------UPDATE-----------------------------

        if(isset($_POST['update'])){
    
             $adi=$_POST['adi'];
              $soyadi=$_POST['soyadi'];
              $eposta=$_POST['eposta'];

              $telefonNo=$_POST['telefonNo'];
              $sinifId=$_POST['sinifId'];
              $subeId=$_POST['subeId'];
              $kayitZamani = date("Y-m-d");

    $query=mysqli_query($conn,"update odksogretmen set adi='$adi', soyadi='$soyadi',
    eposta='$eposta', sifre='$sifre',telefonNo='$telefonNo', sinifId='$sinifId',subeId='$subeId'
    where Id='$Id'");
            if ($query) {
                
                echo "<script type = \"text/javascript\">
                window.location = (\"yaratOgretmen.php\")
                </script>"; 
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Güncellenirken bir Hata Oluştu</div>";
            }
        }
    }


//--------------------------------DELETE------------------------------------------------------------------

  if (isset($_GET['Id']) && isset($_GET['subeId']) && isset($_GET['action']) && $_GET['action'] == "delete")
	{
        $Id= $_GET['Id'];
        $subeId= $_GET['subeId'];

        $query = mysqli_query($conn,"DELETE FROM odksogretmen WHERE Id='$Id'");

        if ($query == TRUE) {

            $qu=mysqli_query($conn,"update odkssube set atamaDurum='0' where Id ='$subeId'");
            if ($qu) {
                
                 echo "<script type = \"text/javascript\">
                window.location = (\"yaratOgretmen.php\")
                </script>"; 
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
            }
        }
        else{

            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
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
  <link href="img/logo/kurum.jpeg" rel="icon">
<?php include 'includes/title.php';?>
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
        xmlhttp.open("GET","ajaxClassArms.php?cid="+str,true);
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
            <h1 class="h3 mb-0 text-gray-800">Öğretmenleri Oluştur</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Ana Sayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Öğretmenleri Oluştur</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Öğretmenleri Oluştur</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                   <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Adı<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" required name="adi" value="<?php echo $row['adi'];?>" id="exampleInputadi">
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Soyadı<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" required name="soyadi" value="<?php echo $row['soyadi'];?>" id="exampleInputadi" >
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">E-Posta Adresi<span class="text-danger ml-2">*</span></label>
                        <input type="email" class="form-control" required name="eposta" value="<?php echo $row['eposta'];?>" id="exampleInputadi" >
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Telefon No<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="telefonNo" value="<?php echo $row['telefonNo'];?>" id="exampleInputadi" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Sınıf Seçin<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM odkssinif ORDER BY sinifAdi ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="sinifId" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
                          echo'<option value="">--Sınıf Seç--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['sinifAdi'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Şube<span class="text-danger ml-2">*</span></label>
                            <?php
                                echo"<div id='txtHint'></div>";
                            ?>
                        </div>
                    </div>
                      <?php
                    if (isset($Id))
                    {
                    ?>
                    <button type="submit" name="update" class="btn btn-warning">Güncelle</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    } else {           
                    ?>
                    <button type="submit" name="save" class="btn btn-primary">Kaydet</button>
                    <?php
                    }         
                    ?>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tüm Öğretmenler</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Öğretmen Adı</th>
                        <th>Öğretmen Soyadı</th>
                        <th>E-mail Adres</th>
                        <th>Telefon Numarası</th>
                        <th>Sınıf</th>
                        <th>Şube</th>
                        <th>Kayıt Zamanı</th>
                        <th>Sil</th>
                      </tr>
                    </thead>
                   
                    <tbody>

                  <?php
                      $query = "SELECT odksogretmen.Id,odkssinif.sinifAdi,odkssube.subeAdi,odkssube.Id AS subeId,odksogretmen.adi,
                      odksogretmen.soyadi,odksogretmen.eposta,odksogretmen.telefonNo,odksogretmen.kayitZamani
                      FROM odksogretmen
                      INNER JOIN odkssinif ON odkssinif.Id = odksogretmen.sinifId
                      INNER JOIN odkssube ON odkssube.Id = odksogretmen.subeId";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
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
                                <td>".$rows['eposta']."</td>
                                <td>".$rows['telefonNo']."</td>
                                <td>".$rows['sinifAdi']."</td>
                                <td>".$rows['subeAdi']."</td>
                                 <td>".$rows['kayitZamani']."</td>
                                <td><a href='?action=delete&Id=".$rows['Id']."&subeId=".$rows['subeId']."'><i class='fas fa-fw fa-trash'></i></a></td>
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
                      
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div> -->

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