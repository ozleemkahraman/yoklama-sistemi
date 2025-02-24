<?php

include '../Includes/dbcon.php';

    $cid = intval($_GET['cid']);//

        $queryss=mysqli_query($conn,"select * from odkssube where sinifId=".$cid."");                        
        $countt = mysqli_num_rows($queryss);

        echo '
        <select required name="subeId" class="form-control mb-3">';
        echo'<option value="">--Şube Seç--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Id'].'" >'.$row['subeAdi'].'</option>';
        }
        echo '</select>';
?>

