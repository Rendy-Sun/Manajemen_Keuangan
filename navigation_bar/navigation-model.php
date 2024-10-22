<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../navigation_bar/style-navigation-model.css"/>

<form action="#" method="post">
  <nav class="navBar">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <h3 class="insideMenu">Menu</h3>
        <a href="../jenis_bank/form-daftar-rekening-bank.php">Rekening Bank</a>
        <a href="../mutasi/form-daftar-mutasi-rekening.php">Mutasi Rekening</a>
        <a href="../transfer/form-transfer.php">Transfer Antar Rekening</a>
        <a href="../transaksi/form-transaksi.php">Transaksi</a>
        <a href="Action/action-logout-users.php">Log Out</a>
      </div>
      
      <span class="spanMenu" onclick="openNav()">&#9776;</span>
      <form action="#">
        <select name="bankOption" class="userSaldo" onchange="this.form.submit();">
          <?php 
            $select = $_POST['bankOption'];
            include("select-option-item.php");
          ?>
          <option hidden selected>
            <?php
              if($select == null)
              {
                $bankSelected = "DANA";
              }else{
                $bankSelected = $select;
              }
              $query = "SELECT saldo_awal FROM daftar_rekening WHERE nama_bank='$bankSelected'";
              $result = $dbConnection->query($query);
              $row = mysqli_fetch_array($result);
              $saldo_awal = $row['saldo_awal'];

              $query2="SELECT SUM(saldo) AS transaksi FROM mutasi_rekening WHERE rekening_id = (SELECT id FROM daftar_rekening WHERE nama_bank = '$bankSelected')";
              $result2 = $dbConnection->query($query2);
              $row2 = mysqli_fetch_array($result2);
              $saldo_transaksi = $row2['transaksi'];
              if($bankSelected)
              {
                $saldo_akhir = $saldo_awal + $saldo_transaksi;
              }
              echo "Rp ".number_format($saldo_akhir,0,'','.');
              session_start();
              $_SESSION['selected_bank'] = $bankSelected;
              $_SESSION['saldo_awal'] = $saldo_akhir;
            ?>
          </option>
          
        </select>
      </form>
      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
      </script>
  </nav>
</form>
</html> 
