<?php 
    include("../connection/config.php");
    if(isset($_POST['submit'])){
        $bank_pengirim = $_POST['bank_pengirim'];
        $nominal_saldo = $_POST['nominal_saldo'];
        $saldo_keluar = 0 - $nominal_saldo;
        $saldo_masuk = 0 + $nominal_saldo;
        $date_transaksi = $_POST['date_transaksi'];
        $bukti_transaksi = $_POST['bukti_transaksi'];
        $catatan = $_POST['catatan'];
        $dt = new DateTime($date_transaksi);

        $min = 0;
        $max = mt_getrandmax();
        $generateId = mt_rand($min,$max) .$dt->format('Ymdhis');
        $queryCheck = "SELECT * FROM mutasi_rekening WHERE id_transaksi = '$generateId'";
        $resultCheck = $dbConnection->query($queryCheck);
        $rowCheck = mysqli_num_rows($resultCheck);

        if($rowCheck>2){
            return;
        }else if($rowCheck == 0){
            $query4="SELECT saldo_awal FROM daftar_rekening WHERE nama_bank='$bank_pengirim'";
            $result4= $dbConnection->query($query4);
            $row4 = mysqli_fetch_array($result4);

            $query5= "SELECT SUM(saldo) AS saldo FROM mutasi_rekening WHERE rekening_id = (SELECT id FROM daftar_rekening WHERE nama_bank='$bank_pengirim')";
            $result5 = $dbConnection->query($query5);
            $row5 = mysqli_fetch_array($result5);
            $saldo_awal = ($row4['saldo_awal']+$row5['saldo']) + $saldo_keluar;

            $query = "INSERT INTO mutasi_rekening (id_transaksi, rekening_id, saldo, saldo_awal, tanggal, bukti_transaksi, catatan_transaksi) VALUES ('$generateId', (SELECT id FROM daftar_rekening WHERE nama_bank = '$bank_pengirim'), '$saldo_keluar', '$saldo_awal', '$date_transaksi', '$bukti_transaksi', '$catatan')";
            $result = $dbConnection->query($query);
            if($result){
                header('Location: ../transaksi/form-transaksi.php');
            }
        }else{
            die("Error");
        }

    }
?>