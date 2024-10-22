<?php
    include("../connection/config.php");
    if(isset($_POST["submit"])){
        $nama_bank =$_POST["nama_bank"];
        $saldo_awal = $_POST["saldo_awal"];
        $catatan = $_POST['catatan'];
    }
    $queryCheck = "SELECT * FROM daftar_rekening WHERE nama_bank = '$nama_bank'";
    $resultCheck = $dbConnection->query($queryCheck);
    if(mysqli_num_rows($resultCheck)>0)
    {
        echo '<script>alert("Data is already Exist"); location.href="form-daftar-rekening-bank.php"</script>';
    }
    else{
        $sql = "INSERT INTO daftar_rekening (nama_bank, saldo_awal, catatan) VALUES ('$nama_bank', '$saldo_awal', '$catatan')";
        $result = $dbConnection->query($sql);
    
        if ($result) {
            header('Location: form-daftar-rekening-bank.php');
        }
        else {
            die('akses dilarang!');
        }
    }   
?>