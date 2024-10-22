<?php
include("../connection/config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM daftar_rekening WHERE id = '$id'";
        $result = $dbConnection->query($query);
        if($result){
           header('Location:form-daftar-rekening-bank.php');
        }else{
            echo '<script>alert("Error Deleting Data!"); location.href="form-daftar-rekening-bank.php"</script>';
        }
    }
?>