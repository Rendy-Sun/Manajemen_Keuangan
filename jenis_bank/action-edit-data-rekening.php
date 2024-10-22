<?php 
    if(isset($_POST['submit'])){
        $id_bank = $_POST['id_bank'];
        $nama_bank = $_POST['nama_bank'];
        $saldo_awal = $_POST['saldo_awal'];
        $catatan = $_POST['catatan'];
        
        $query = "UPDATE daftar_rekening SET nama_bank = '$nama_bank', saldo_awal = '$saldo_awal', catatan='$catatan' WHERE id = '$id_bank'";
        $result = $dbConnection->query($query);
        if($result){
            header('Location:form-daftar-rekening-bank.php');
        }else{
            echo '<script>alert("Error Deleting Data!"); location.href="form-daftar-rekening-bank.php"</script>';
        }
    }
?>