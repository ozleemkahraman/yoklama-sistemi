
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    
    $adi=$_POST['adi'];
  $soyadi=$_POST['soyadi'];
  $digerAdi=$_POST['digerAdi'];

  $ogrenciNo=$_POST['ogrenciNo'];
  $sinifId=$_POST['sinifId'];
  $subeId=$_POST['subeId'];
  $kayitZamani = date("Y-m-d");
   
    $query=mysqli_query($conn,"select * from odksogrenci where ogrenciNo ='$ogrenciNo'");
    $ret=mysqli_fetch_array($query);

    if($ret > 0){ 

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bu E-mail Kayıtlarde Mevcut</div>";
    }
    else{

    $query=mysqli_query($conn,"insert into odksogrenci(adi,soyadi,digerAdi,ogrenciNo,sifre,sinifId,subeId,kayitZamani) 
    value('$adi','$soyadi','$digerAdi','$ogrenciNo','12345','$sinifId','$subeId','$kayitZamani')");

    if ($query) {
        
        $statusMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Kayıt Başarılı</div>";
            
    }
    else
    {
         $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bir Hata OLuştu</div>";
    }
  }
}

//---------------------------------------EDIT-------------------------------------------------------------






//--------------------EDIT------------------------------------------------------------

 if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit")
	{
        $Id= $_GET['Id'];

        $query=mysqli_query($conn,"select * from odksogrenci where Id ='$Id'");
        $row=mysqli_fetch_array($query);

        //------------UPDATE-----------------------------

        if(isset($_POST['update'])){
    
             $adi=$_POST['adi'];
  $soyadi=$_POST['soyadi'];
  $digerAdi=$_POST['digerAdi'];

  $ogrenciNo=$_POST['ogrenciNo'];
  $sinifId=$_POST['sinifId'];
  $subeId=$_POST['subeId'];
  $kayitZamani = date("Y-m-d");

 $query=mysqli_query($conn,"update odksogrenci set adi='$adi', soyadi='$soyadi',
    digerAdi='$digerAdi', ogrenciNo='$ogrenciNo',sifre='12345', sinifId='$sinifId',subeId='$subeId'
    where Id='$Id'");
            if ($query) {
                
                echo "<script type = \"text/javascript\">
                window.location = (\"createStudents.php\")
                </script>"; 
            }
            else
            {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bir Hata Oluştu</div>";
            }
        }
    }


//--------------------------------DELETE------------------------------------------------------------------

  if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete")
	{
        $Id= $_GET['Id'];
        $subeId= $_GET['subeId'];

        $query = mysqli_query($conn,"DELETE FROM odksogrenci WHERE Id='$Id'");

        if ($query == TRUE) {

            echo "<script type = \"text/javascript\">
            window.location = (\"createStudents.php\")
            </script>";
        }
        else{

            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Bir Hata Oluştu!</div>"; 
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
            <h1 class="h3 mb-0 text-gray-800">Öğrenci Oluştur</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Öğrenci Oluştur</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Öğrenci Oluştur</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                   <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Öğrenci Adı<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="adi" value="<?php echo $row['adi'];?>" id="exampleInputadi" >
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Öğrenci Soyadı<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="soyadi" value="<?php echo $row['soyadi'];?>" id="exampleInputadi" >
                        </div>
                    </div>
                     <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Diğer Adı<span class="text-danger ml-2">*</span></label>
                        <input type="text" class="form-control" name="digerAdi" value="<?php echo $row['digerAdi'];?>" id="exampleInputadi" >
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Öğrenci Numarası<span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" required name="ogrenciNo" value="<?php echo $row['ogrenciNo'];?>" id="exampleInputadi" >
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Sınıf Seç<span class="text-danger ml-2">*</span></label>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tüm Öğrenciler</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Öğrenci Adı</th>
                        <th>Öğrenci Soyadı</th>
                        <th>Diğer Adı</th>
                        <th>Öprenci Numarası</th>
                        <th>Sınıf</th>
                        <th>Şube</th>
                        <th>Kayıt Zamanı</th>
                         <th>Düzenle</th>
                        <th>Sil</th>
                      </tr>
                    </thead>
                
                    <tbody>

                  <?php
                      $query = "SELECT odksogrenci.Id,odkssinif.sinifAdi,odkssube.subeAdi,odkssube.Id AS subeId,odksogrenci.adi,
                      odksogrenci.soyadi,odksogrenci.digerAdi,odksogrenci.ogrenciNo,odksogrenci.kayitZamani
                      FROM odksogrenci
                      INNER JOIN odkssinif ON odkssinif.Id = odksogrenci.sinifId
                      INNER JOIN odkssube ON odkssube.Id = odksogrenci.subeId";
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
                                <td>".$rows['digerAdi']."</td>
                                <td>".$rows['ogrenciNo']."</td>
                                <td>".$rows['sinifAdi']."</td>
                                <td>".$rows['subeAdi']."</td>
                                 <td>".$rows['kayitZamani']."</td>
                                <td><a href='?action=edit&Id=".$rows['Id']."'><i class='fas fa-fw fa-edit'></i></a></td>
                                <td><a href='?action=delete&Id=".$rows['Id']."'><i class='fas fa-fw fa-trash'></i></a></td>
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