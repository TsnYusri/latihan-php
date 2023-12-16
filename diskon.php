<html>
<head>
    <title>Diskon Belanja Buku</title>
</head>
<body>

<?php
function tampilkanHasil($nomor_transaksi, $nama_pembeli, $judul_buku, $jumlah_buku, $harga_buku,$total_belanja, $diskon_belanja, $diskon_transaksi, $total_setelah_diskon)
{
    echo "Nomor Transaksi: " . $nomor_transaksi ;
    echo "<br>";
    echo "Nama Pembeli: " . $nama_pembeli ;
    echo "<br>";
    echo "Judul Buku: " . $judul_buku ;
    echo "<br>";
    echo "Jumlah Buku: " . $jumlah_buku ;
    echo "<br>";
    echo "Harga Buku: " . $harga_buku ;
    echo "<br>";
    echo "Total Belanja: " . $total_belanja ;
    echo "<br>";
    echo "Diskon Belanja (10%) : " . $diskon_belanja ;
    echo "<br>";
    echo "Diskon Transaksi (5%) : " . $diskon_transaksi ;
    echo "<br>";
    echo "Total pembayaran setelah diskon: " . number_format($total_setelah_diskon, 2);
}
?>

<form method="post">

    <br><label for="no_transaksi">No transaksi :</label>
    <input type="number" name="no_transaksi" id="no_transaksi"><br>

    <br><label for="nama_pembeli">Nama pembeli :</label>
    <input type="text" name="nama_pembeli" id="nama_pembeli"><br>

    <br><label for="judul_buku">Judul buku :</label>
    <input type="text" name="judul_buku" id="judul_buku"><br>

    <br><label for="jumlah_buku">Jumlah buku :</label>
    <input type="text" name="jumlah_buku" id="jumlah_buku"><br>

    <br><label for="harga_buku">Harga buku :</label>
    <input type="text" name="harga_buku" id="harga_buku"><br>
    

    <br><button type="submit">Hitung Diskon</button><br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nomor_transaksi =$_POST["no_transaksi"];
    $nama_pembeli = $_POST["nama_pembeli"];
    $judul_buku = $_POST["judul_buku"];
    $jumlah_buku =$_POST["jumlah_buku"];
    $harga_buku =$_POST["harga_buku"];
    
    $total_belanja = $jumlah_buku * $harga_buku; 
    $diskon_belanja=0;
    $diskon_transaksi=0;
    
    if ($total_belanja > 150000) {
        $diskon = 0.1; 
        $diskon_belanja = $total_belanja * $diskon;
    }
    if ($nomor_transaksi <= 50) {
        $diskon = 0.05;
        $diskon_transaksi =$total_belanja*$diskon; 
    }
    
    $total_setelah_diskon = $total_belanja - ($diskon_belanja+$diskon_transaksi);

    tampilkanHasil($nomor_transaksi, $nama_pembeli, $judul_buku, $jumlah_buku, $harga_buku,$total_belanja, $diskon_belanja,$diskon_transaksi, $total_setelah_diskon);
}
?>

</body>
</html>