<?php
sleep(1);
$query = "SELECT * FROM daftar_rekening";
$result = $dbConnection->query($query);
while($row = mysqli_fetch_array($result)){
    echo '<option value="'.$row['nama_bank'].'">'.$row['nama_bank'].'</option>';
    if($_POST['bankOption'] == $row['nama_bank']){
    }
}
?>