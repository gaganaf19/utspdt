<?php
require 'ceklogin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
		body {
			background-image: url("img/sawah.jpeg");
			background-repeat: no-repeat;
			background-size: cover;
		}
        .bg{
           font-family: 'Times New Roman', Times, serif;
        }
        
	</style>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Keuangan Petani Padi</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index1.php">Aplikasi Pencatatan</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="bg">
                            <div class="sb-sidenav-menu-heading text-white" align="center">Menu</div>
                            </div>
                            <div class="bg">
                            <a class="nav-link" href="utama.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Halaman Utama
                            </a>
                            </div>
                            <div class="bg">
                            <a class="nav-link" href="pengeluaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Pengeluaran
                            </a>
                            </div>
                            <div class="bg">
                            <a class="nav-link text-white" href="pemasukan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd text-white"></i></div>
                                Data Pemasukan
                            </a>
                            </div>
                            <div class="bg">
                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Laporan 
                            </a>
                            </div>
                            <div class="bg">
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="bg">
                    <h1 class="mt-4 text-white" align="center" style="font-weight: bold; background-color: blue ; border: 3px solid black; border-radius: 5px;">Data Pemasukan </h1>
                    </div>
                        <button  style="font-weight: bold; background-color: blue ; border: 3px solid black; border-radius: 5px;" type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                  Tambah Pemasukan
                        </button>

    

                        <div class="card mb-4" style="font-weight: bold" >
                            <div class="card-header" style="">
                                <i class="fas fa-table me-1"></i>
                                Data Pemasukan
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered border-dark">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                        $get = mysqli_query($c,"select * from pemasukan");
                                        $i = 1;
                                        while($p=mysqli_fetch_array($get)){
                                            $idpemasukan = $p['id_pemasukan'];
                                            $namapelanggan = $p['nama_pelanggan'];
                                            $tanggal = $p['tanggal'];
                                            $jumlah =$p['jumlah'];
                                            $totalharga =$p['total_harga'];
                                            $catatan=$p['catatan'];
                                            $jenis=$p['jenis'];
                                            $harga = $p['harga_satuan'];
                                            
                                        

                
                                            

                                        
                                    ?>
                                    


                                        <tr align="center">
                                            <td><?=$i++;?></td>
                                            <td><?=$namapelanggan;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$jenis;?></td>
                                            <td><?=$jumlah;?> Kg</td>
                                            <td>Rp <?=number_format($totalharga, 0, ',', '.');?></td>
                                            <td><?=$catatan;?></td>
                                            <td>
                                           

                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit<?=$idpemasukan;?>">
                                                    Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idpemasukan;?>">
                                                    Hapus
                                            </button>
                                            </td>
                                        </tr>
                                       
                                       

                                        

                                        <!-- The Modal edit -->
                                        <div class="modal" id="edit<?=$idpemasukan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Distribusi Mustahik</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                             <!-- Modal body -->
                                            <div class="modal-body">
                                            <div style="font-weight: bold;">
                                                 Nama Pelanggan
                                            <input type="text" name="namapelanggan" class="form-control mb-2" placeholder="Masukan Nama Pelanggan" value="<?=$namapelanggan;?>" required >
                                            <?php
                                                $today = date("Y-m-d"); 
                                            ?>
                                                  Waktu
                                            <input type="date" name="tanggal" class="form-control mb-2" value="<?=$tanggal;?>" readonly >
                                                Jenis Hasil Panen
                                            <select name="jenis" class="form-control mb-2" required>
                                                <option value="<?=$jenis;?>"><?=$jenis;?></option>
                                                <option value="Padi">Padi</option>
                                                <option value="Beras">Beras</option>
                                                
                                            </select>
                                                 Jumlah
                                            <div class="input-group">
                                                <input type="number" name="jumlah" class="form-control mb-2" placeholder="Masukan Jumlah " value="<?=$jumlah;?>" required>
                                                <div class="input-group-append">
                                                <span class="input-group-text">kg</span>
                                                </div>
                                            </div>
                                            Harga /Kg
                                            <input type="text" name="harga" class="form-control mb-2" placeholder="Masukan Harga /Kg" value="<?=$harga;?>" required >
                                            Catatan
                                            <textarea name="catatan"  class="form-control mb-2" cols="30" rows="5" placeholder="Catatan" value="<?=$catatan;?>" ><?=$catatan;?></textarea>
                                            <input type="hidden" name="idpemasukan" value="<?=$idpemasukan;?>">
                                        </div>
                                                
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="editpemasukan">Edit</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                            </div>

                                            </form>

                                            </div>
                                        </div>
                                    </div>


                                        <!-- The Modal hapus -->
                                        <div class="modal" id="delete<?=$idpemasukan;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <form method="post">

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus??
                                            <input type="hidden" name="idpemasukan" value="<?=$idpemasukan;?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapuspemasukan">Ya</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                            </div>

                                            </form>

                                            </div>
                                        </div>
                                    </div>
                                        
                                        <?php
                                        };
                                        ?>

                                       


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Gagan Akhmad Fauzi</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>


                    <!-- The Modal -->
                <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Data Pemasukan</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="post">

                    <!-- Modal body -->
                    <div class="modal-body">
                    <div style="font-weight: bold;">
                        Nama Pelanggan
                        <input type="text" name="namapelanggan" class="form-control mb-2" placeholder="Masukan Nama Pelanggan" required >
                        <?php
                            $today = date("Y-m-d"); 
                        ?>
                        Waktu
                        <input type="date" name="tanggal" class="form-control mb-2" value="<?=$today;?>" required >
                        Jenis Hasil Panen
                        <select name="jenis" class="form-control mb-2" required>
                            <option value="">-- Pilih Jenis Hasil Panen --</option>
                            <option value="Padi">Padi</option>
                            <option value="Beras">Beras</option>
                            
                        </select>
                        Jumlah
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control mb-2" placeholder="Masukan Jumlah " required>
                            <div class="input-group-append">
                            <span class="input-group-text">kg</span>
                            </div>
                        </div>
                        Harga /Kg
                        <input type="text" name="harga" class="form-control mb-2" placeholder="Masukan Harga /Kg" required >
                        Catatan
                        <textarea name="catatan"  class="form-control mb-2" cols="30" rows="5" placeholder="Catatan"> </textarea>
                       
                    </div>
                        
                        
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahpemasukan">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>

                    </form>

                    </div>
                </div>
             </div>






</html>
