<?php
$query = "SELECT nama_bank FROM daftar_rekening";
$result = $dbConnection->query($query);
while($row = mysqli_fetch_array($result)){
    echo '<option value="'.$row['nama_bank'].'">'.$row['nama_bank'].'</option>';
    if($bankSelected == $row['nama_bank']){
        echo '<option value="'.$row['nama_bank'].'" selected="selected" hidden>'.$row['nama_bank'].'</option>';
    }
}
?>