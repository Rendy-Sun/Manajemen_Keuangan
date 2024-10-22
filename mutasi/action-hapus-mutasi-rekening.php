<?php
    include("../connection/config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM mutasi_rekening WHERE id_transaksi = '$id'";
        $result =$dbConnection->query($query);
        if($result){
            header('Location: ../mutasi/form-daftar-mutasi-rekening.php');
        }    
    }
?>