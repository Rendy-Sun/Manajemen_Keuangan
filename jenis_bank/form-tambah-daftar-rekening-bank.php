<?php
    include("../connection/config.php");
?>
<html>
    <head>
        <title>Manajemen Keuangan</title>
        <link rel="stylesheet" type="text/css" href="style-form-tambah-daftar-rekening-bank.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
            include("../navigation_bar/navigation-model.php");
        ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header>
                    <h1>Tambah Rekening Bank</h1>
                </header>
            </div>
            <form action="action-tambah-daftar-rekening-bank.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label>Nama Bank</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_bank">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Saldo Awal</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="saldo_awal">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Catatan</label>
                    </div>
                    <div class="col-75">
                        <textarea name="catatan"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="btnTambah">
                        <input type="submit" name="submit" value="Tambah">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>