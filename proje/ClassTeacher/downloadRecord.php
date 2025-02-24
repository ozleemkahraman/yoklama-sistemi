<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

?>
        <table border="1">
        <thead>
            <tr>
            <th>#</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Diğer Ad</th>
            <th>Öğrenci Numarası</th>
            <th>Sınıf</th>
            <th>Şube</th>
            <th>Dönem Aralık</th>
            <th>Dönem</th>
            <th>Durum</th>
            <th>Tarih</th>
            </tr>
        </thead>

<?php 
$filename="Yoklama Listesi";
$dateTaken = date("Y-m-d");

$cnt=1;			
$ret = mysqli_query($conn,"SELECT odksyoklama.Id,odksyoklama.durum,odksyoklama.yoklamaTarih,odkssinif.sinifAdi,
        odkssube.subeAdi,odksdonemaralik.donemAralikAdi,odksdonemaralik.donemId,odksdonem.donemAdi,
        odksogrenci.adi,odksogrenci.soyadi,odksogrenci.digerAdi,odksogrenci.ogrenciNo
        FROM odksyoklama
        INNER JOIN odkssinif ON odkssinif.Id = odksyoklama.sinifId
        INNER JOIN odkssube ON odkssube.Id = odksyoklama.subeId
        INNER JOIN odksdonemaralik ON odksdonemaralik.Id = odksyoklama.donemAralikId
        INNER JOIN odksdonem ON odksdonem.Id = odksdonemaralik.donemId
        INNER JOIN odksogrenci ON odksogrenci.ogrenciNo = odksyoklama.ogrenciNo
        where odksyoklama.yoklamaTarih = '$dateTaken' and odksyoklama.sinifId = '$_SESSION[sinifId]' and odksyoklama.subeId = '$_SESSION[subeId]'");

if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
    
    if($row['status'] == '1'){$status = "Katıldı"; $colour="#00FF00";}else{$status = "Katılmadı";$colour="#FF0000";}

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$adi= $row['adi'].'</td> 
<td>'.$soyadi= $row['soyadi'].'</td> 
<td>'.$digerAdi= $row['digerAdi'].'</td> 
<td>'.$ogrenciNo= $row['ogrenciNo'].'</td> 
<td>'.$sinifAdi= $row['sinifAdi'].'</td> 
<td>'.$subeAdi=$row['subeAdi'].'</td>	
<td>'.$donemAralikAdi=$row['donemAralikAdi'].'</td>	 
<td>'.$donemAdi=$row['donemAdi'].'</td>	
<td>'.$status=$status.'</td>	 	
<td>'.$yoklamaTarih=$row['yoklamaTarih'].'</td>	 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>