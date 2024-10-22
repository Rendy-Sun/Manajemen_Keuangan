<?php
    //untuk ambil data atau fetch data tidak perlu connection database, tapi di formnya pakai
    $sql = "SELECT id, nama_bank, saldo_awal, catatan FROM daftar_rekening";
    $query = $dbConnection->query($sql);

    while ($row = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td scope='row' style='display:none'>". $row["id"] ."</td>";
    echo "<td>". $row["nama_bank"] ."</td>";
    echo "<td>Rp ". number_format($row["saldo_awal"],0,'','.') ."</td>";
    echo "<td>". $row["catatan"] ."</td>";
    //echo "<td>". $row["tipe_kapal_id"] ."</td>";
    echo "<td>";
    echo "<a href = 'form-edit-data-rekening.php?id=".$row['id']."'>Edit</a></td>";
    echo "<td>";
    echo "<a href = 'action-hapus-data-rekening.php?id=".$row['id']."'>Hapus</a>";
    echo "</td>";
    echo "</tr>";
    }
?>