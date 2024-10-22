<?php
include("../connection/config.php");
?>
<html>
    <head>
        <title>Manajemen Keuangan</title>
        <link rel="stylesheet" type="text/css" href="style-form-daftar-rekening-bank.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
            include("../navigation_bar/navigation-model.php");
        ?>

    </head>

    <body>
        <div class="header">
            <header><h2>Daftar Rekening Bank</h2></header>
        </div>
        <div class="container">
        <div class="row">
            <table class="table" border="1">
                <?php 
                    include("fetch-data-daftar-rekening-bank.php");
                ?>
                <thead>
                    <tr>
                        <th scope="col" style="display: none;">Id Jenis Bank</th>
                        <th>Nama Bank</th>
                        <th>Nama Saldo Awal</th>
                        <th>Catatan</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
            <div class="row">
                <a href="form-tambah-daftar-rekening-bank.php"><input type="button" value="Tambah Rekening Bank"></input></a>
            </div>
        </div>    
    </body>
</html>