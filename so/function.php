<?php

session_start();


$c = mysqli_connect('localhost','root','','so');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = mysqli_query($c,"SELECT * FROM user WHERE username='$username' and password='$password' ");
    $hitung = mysqli_num_rows($check);
    if($hitung>0){

        $_SESSION['login'] = 'True';
        header('location:utama.php');
    } else {
        echo '
        <script> alert ("Username atau Password salah");
        window.location.href="login.php"
        </script>
        ';
    }
}

if(isset($_POST['tambahbiayatetap'])){
    $namabiaya            = $_POST['namabiaya'];
    $tanggal   = $_POST['tanggal'];
    $jumlah         = $_POST['jumlah'];
    $harga         = $_POST['harga'];
    $totalharga = $jumlah * $harga;
    $catatan         = $_POST['catatan'];

    $tambah = mysqli_query($c,"insert into biaya_tetap (nama_biaya,tanggal,jumlah,total_harga,catatan,harga_satuan) values ('$namabiaya','$tanggal','$jumlah','$totalharga','$catatan','$harga')");

    if($tambah){
        header('location:biayatetap.php');
    } else {
        echo '
        <script> alert ("Gagal menambah data baru");
        window.location.href="biayatetap.php"
        </script>
        ';
    }

}
if(isset($_POST['hapusbiayatetap'])){
    $idbiayatetap           = $_POST['idbiayatetap'];

    $hapus = mysqli_query($c,"delete from biaya_tetap where id_biayatetap = '$idbiayatetap'");

    if($hapus){
        header('location:biayatetap.php');
    } else {
        echo '
        <script> alert ("Gagal menghapus data ini");
        window.location.href="biayatetap.php"
        </script>
        ';
    }

}
if(isset($_POST['editbiayatetap'])){
    $namabiaya   = $_POST['namabiaya'];
    $tanggal   = $_POST['tanggal'];
    $jumlah   = $_POST['jumlah'];
    $catatan   = $_POST['catatan'];
    $harga   = $_POST['harga'];
    $editidtetap   = $_POST['editidtetap'];
    $totalharga = $harga * $jumlah;

    $edit = mysqli_query($c,"update biaya_tetap set  nama_biaya = '$namabiaya', jumlah = '$jumlah' , tanggal = '$tanggal', total_harga = '$totalharga', catatan = '$catatan' , harga_satuan = '$harga' where id_biayatetap = '$editidtetap'");
    if($edit ){
        header('location:biayatetap.php');
    } else {
        echo '
        <script> alert ("Gagal mengedit data ini");
        window.location.href="biayatetap.php"
        </script>
        ';
    }

}

if(isset($_POST['tambahbiayatidaktetap'])){
    $namabiaya            = $_POST['namabiaya'];
    $tanggal   = $_POST['tanggal'];
    $jumlah         = $_POST['jumlah'];
    $harga         = $_POST['harga'];
    $totalharga = $jumlah * $harga;
    $catatan         = $_POST['catatan'];

    $tambah = mysqli_query($c,"insert into biaya_tidaktetap (nama_biaya,tanggal,jumlah,total_harga,catatan,harga_satuan) values ('$namabiaya','$tanggal','$jumlah','$totalharga','$catatan','$harga')");

    if($tambah){
        header('location:pengeluaran.php');
    } else {
        echo '
        <script> alert ("Gagal menambah data baru");
        window.location.href="pengeluaran.php"
        </script>
        ';
    }

}
if(isset($_POST['hapusbiayatidaktetap'])){
    $idbiayatidaktetap           = $_POST['idbiayatidaktetap'];

    $hapus = mysqli_query($c,"delete from biaya_tidaktetap where id_biayatidaktetap = '$idbiayatidaktetap'");

    if($hapus){
        header('location:pengeluaran.php');
    } else {
        echo '
        <script> alert ("Gagal menghapus data ini");
        window.location.href="pengeluaran.php"
        </script>
        ';
    }

}

if(isset($_POST['editbiayatidaktetap'])){
    $namabiaya   = $_POST['namabiaya'];
    $tanggal   = $_POST['tanggal'];
    $jumlah   = $_POST['jumlah'];
    $catatan   = $_POST['catatan'];
    $harga   = $_POST['harga'];
    $editidtidaktetap   = $_POST['editidtidaktetap'];
    $totalharga = $harga * $jumlah;

    $edit = mysqli_query($c,"update biaya_tidaktetap set  nama_biaya = '$namabiaya', jumlah = '$jumlah' , tanggal = '$tanggal', total_harga = '$totalharga', catatan = '$catatan' , harga_satuan = '$harga' where id_biayatidaktetap = '$editidtidaktetap'");
    if($edit ){
        header('location:pengeluaran.php');
    } else {
        echo '
        <script> alert ("Gagal mengedit data ini");
        window.location.href="pengeluaran.php"
        </script>
        ';
    }

}

if(isset($_POST['tambahpemasukan'])){

    $namapelanggan   = $_POST['namapelanggan'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $totalharga = $jumlah * $harga;
    $catatan = $_POST['catatan'];

    $tambah = mysqli_query($c, "insert INTO pemasukan (nama_pelanggan,tanggal,jumlah,total_harga,catatan,harga_satuan,jenis) values ('$namapelanggan', '$tanggal', '$jumlah','$totalharga','$catatan','$harga','$jenis')");


    if($tambah){
        header('location:pemasukan.php');
    } else {
        echo '
        <script> alert ("Gagal memasukan data");
        window.location.href="pemasukan.php"
        </script>
        ' ;
    }
}

if(isset($_POST['hapuspemasukan'])){
    $idpemasukan          = $_POST['idpemasukan'];

    $hapus = mysqli_query($c,"delete from pemasukan where id_pemasukan = '$idpemasukan'");

    if($hapus ){
        header('location:pemasukan.php');
    } else {
        echo '
        <script> alert ("Gagal menghapus data ini");
        window.location.href="pemasukan.php"
        </script>
        ';
    }

}

if(isset($_POST['editpemasukan'])){
    $idpemasukan = $_POST['idpemasukan'];
    $namapelanggan   = $_POST['namapelanggan'];
    $tanggal   = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $catatan = $_POST['catatan'];
    $harga = $_POST['harga'];
    $totalharga= $jumlah * $harga;
    $edit = mysqli_query($c,"update pemasukan set nama_pelanggan = '$namapelanggan',tanggal = '$tanggal' , jenis = '$jenis',  jumlah = '$jumlah' , total_harga = '$totalharga', catatan = '$catatan', harga_satuan = '$harga' where id_pemasukan = '$idpemasukan'");



    if($edit ){
        header('location:pemasukan.php');
    } else {
        echo '
        <script> alert ("Gagal mengedit data ini");
        window.location.href="pemasukan.php"
        </script>
        ';
    }

}








?>