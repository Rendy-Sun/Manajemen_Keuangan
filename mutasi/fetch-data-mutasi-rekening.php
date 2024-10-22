<?php
    $batas=10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1 ;
    $halaman_awal = ($halaman>1)?($halaman*$batas) - $batas : 0;

    $previous = $halaman -1;
    $next = $halaman + 1;

    $bank_selected = $_SESSION['selected_bank'];

    $query = "SELECT * FROM mutasi_rekening WHERE rekening_id = (SELECT id FROM daftar_rekening WHERE nama_bank= '$bank_selected')";
    $data = mysqli_query($dbConnection, $query);
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data/$batas);

    $query = "SELECT mutasi_rekening.id_transaksi AS id_transaksi, saldo, saldo_awal, tanggal, catatan_transaksi, bukti_transaksi FROM mutasi_rekening WHERE rekening_id =(SELECT id FROM daftar_rekening WHERE nama_bank = '$bank_selected') ORDER BY tanggal DESC, saldo_awal ASC LIMIT $halaman_awal, $batas";
    $data_mutasi = mysqli_query($dbConnection, $query);
    $nomor = $halaman_awal+1;

    $noUrut=0;
    if($halaman > 1){
        $noUrut = ($halaman -1) *10; 
    }
    
    while($row_data = mysqli_fetch_array($data_mutasi)){
        $noUrut++;
        $date = date("d-M-Y", strtotime($row_data['tanggal']));
        $saldo = number_format($row_data["saldo"], 0,'','.');
        $saldo_awal = number_format($row_data["saldo_awal"], 0,'','.');

        echo "<tr>";
        echo "<td scope='row' style='display:none'>". $row_data["id_transaksi"] ."</td>";
        echo "<td>". $noUrut ."</td>";
        echo "<td>Rp ". $saldo ."</td>";
        echo "<td>Rp ". $saldo_awal ."</td>";
        echo "<td>". $date ."</td>";
        echo "<td>". $row_data["catatan_transaksi"] ."</td>";
        echo "<td>". $row_data["bukti_transaksi"] ."</td>";
        //echo "<td>". $row["tipe_kapal_id"] ."</td>";
        echo "<td>";
        echo "<a href = '#?id=".$row_data['id_transaksi']."'>Edit</a></td>";
        echo "<td>";
        echo "<a href = 'action-hapus-mutasi-rekening.php?id=".$row_data['id_transaksi']."'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }
?>