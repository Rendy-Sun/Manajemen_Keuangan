<?php
    include("../connection/config.php");
?>
<html>
    <head>
        <title>Manajemen Keuangan</title>
        <link rel="stylesheet" type="text/css" href="style-form-transfer.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
            include("../navigation_bar/navigation-model.php");
        ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header>
                    <h1>Transfer Antar Rekening</h1>
                </header>
            </div>
            <form action="action-transfer.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label>Bank Pengirim</label>
                    </div>
                    <div class="col-75">
                        <select name="bank_pengirim" required>
                            <option hidden>Pilih Bank</option>
                            <?php 
                                $bankSelected = $_POST['bank_pengirim'];
                                include("select-option-item.php");
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Bank Tujuan</label>
                    </div>
                    <div class="col-75">
                        <select name="bank_tujuan" required>
                            <option hidden>Pilih Bank</option>
                            <?php 
                                $bankSelected = $_POST['bank_tujuan'];
                                include("select-option-item.php");
                            ?>
                        </select>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Nominal Saldo</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="nominal_saldo" placeholder="0" required>                 
                    </div>
                </div>
                <div class="row">
                <div class="row">
                    <div class="col-25">
                        <label>Tanggal Transaksi</label>
                    </div>
                    <div class="col-75">
                        <input type="date" required name="date_transaksi" value="<?php $dt = new DateTime(); echo $dt->format('Y-m-d')?>">                
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Bukti Transaksi</label>
                    </div>
                    <div class="col-75">
                        <input type="url" name="bukti_transaksi" placeholder = "https://">
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
                    <div class="btnSubmit">
                        <input type="submit" name="submit" value="Kirim">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>