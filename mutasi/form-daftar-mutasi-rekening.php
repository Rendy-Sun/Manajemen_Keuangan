<?php
include("../connection/config.php");
?>
<html>
    <head>
        <title>Manajemen Keuangan</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="style-form-daftar-mutasi-rekening.css"/>
        <?php
            include("../navigation_bar/navigation-model.php");
        ?>
    </head>

    <body>
    <div class="header">
    <header><h2>Mutasi Rekening</h2></header>
    </div>
    <div class="scroll">
        <table id="riwayat" class="table" border="1">
            <thead>
                <tr>
                    <th scope="col" style="display: none;">Id Mutasi</th>
                    <th>No</th>
                    <th>Saldo Transaksi</th>
                    <th>Sisa Saldo</th>
                    <th>Tanggal Transaksi</th>
                    <th>Catatan Transaksi</th>
                    <th>Bukti Transaksi</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include("fetch-data-mutasi-rekening.php");  
                ?>
            </tbody>
        </table>
    </div>
        <p>
            <label class="jumlahLabel">Jumlah Data: <?php echo $jumlah_data?></label>
        </p>
        <div class="pagination-div">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link"<?php 
                    $startpagination = $halaman;
                    $limitpagination = 9 + $halaman;                      
                    if($halaman > 1){
                        echo "href='?halaman=$previous'";
                    }?>>Previous</a>
                </li>
                <?php 
                    if($halaman > 1){
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=1">...</a>
                        </li>
                        <?php
                    }
                ?>
                <?php
                    if(isset($_POST['next'])){
                        $startpagination +=1;
                    }              
                    for($x=$startpagination;$x<=$limitpagination;$x++){
                        if($x > ($jumlah_data/$batas))
                        {

                        }else{
                            ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x?>"><?php echo $x; ?></a></li>
                            <?php
                        }

                    }
                    ?>
                <?php 
                    if($halaman < $total_halaman){
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $total_halaman; ?>">...</a>
                        </li>
                        <?php
                    }
                ?>
                    <li class="page-item">
                        <a name= "next" class="page-link"<?php if($halaman < $total_halaman){echo "href='?halaman=$next'";}?> >Next</a>
                    </li>
            </ul>
        </nav>
        </div>
        <div class="row">
            <div class="buttonField">
            <a href="../transaksi/form-transaksi.php"><input type="button" class="buttonTambah" value="Tambah Transaksi"></input></a>
            </div>
        </div>
    </body>
</html>