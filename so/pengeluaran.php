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
                            <a class="nav-link text-white" href="penegeluaran.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file text-white"></i></div>
                                Data Pengeluaran
                            </a>
                            </div>
                            <div class="bg">
                            <a class="nav-link" href="pemasukan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
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
                    <h1 class="mt-4 text-white" align="center" style="font-weight: bold; background-color: blue ; border: 3px solid black; border-radius: 5px;">Data Pengeluaran Tidak Tetap</h1>
                    </div>
                        <button style=" font-weight: bold; background-color: blue ;border: 3px solid black; border-radius: 5px;" type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                  Tambah Data Pengeluaran
                        </button>

                        <div class="card mb-4" style="font-weight: bold ">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pengeluaran Tidak Tetap
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered border-dark">
                                    <thead>
                                        <tr align="center">
                                            <th >No</th>
                                            <th>Nama Biaya</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                        $get = mysqli_query($c,"select * from biaya_tidaktetap");
                                        $i = 1;
                                        while($p=mysqli_fetch_array($get)){
                                        $namabiaya = $p['nama_biaya'];
                                        $jumlah = $p['jumlah'];
                                        $tanggal = $p['tanggal'];
                                        $totalharga = $p['total_harga'];
                                        $catatan = $p['catatan'];
                                        $idbiayatidaktetap = $p['id_biayatidaktetap'];
                                        $harga = $p['harga_satuan'];

                                        
                                    ?>


                                        <tr align="center" style="font-weight: bold;">
                                            <td><?=$i++;?></td>
                                            <td><?=$namabiaya;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$jumlah;?></td>
                                            <td>Rp <?=number_format($totalharga, 0, ',', '.');?></td>
                                            <td><?=$catatan;?></td>
                                            <td>
                                            
                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit<?=$idbiayatidaktetap;?>">
                                                    Edit
                                            </button>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idbiayatidaktetap;?>">
                                                    Hapus
                                            </button>
                                                

                                            </td>
                                        </tr>

                                        

                                             <!-- The Modal edit -->
                                             <div class="modal" id="edit<?=$idbiayatidaktetap;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title"> Edit Data Pengeluaran Tidak Tetap</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <form method="post">

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <div style="font-weight: bold;">
                                                Nama Biaya
                                                <input type="text" name="namabiaya" class="form-control mb-2" placeholder="Nama Biaya" value="<?=$namabiaya;?>" required >
                                                <?php
                                                    $today = date("Y-m-d"); 
                                                ?>
                                                Waktu
                                                <input type="date" name="tanggal" class="form-control mb-2" value="<?=$tanggal;?>" readonly >
                                                Jumlah
                                                <input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah"  value="<?=$jumlah;?>" required>
                                                Harga Satuan
                                                <input type="number" name="harga" class="form-control mb-2" placeholder="Harga Satuan" value="<?=$harga;?>" required>
                                                Catatan
                                                <textarea name="catatan"  class="form-control mb-2" cols="30" rows="5" placeholder="Catatan"> <?=$catatan;?></textarea>
                                                </div>
                                                    <input type="hidden" name="editidtidaktetap" value="<?=$idbiayatidaktetap;?>">
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="editbiayatidaktetap">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                                </div>

                                                </form>

                                                </div>
                                            </div>
                                        </div>




                                         <!-- The Modal hapus-->
                                         <div class="modal" id="delete<?=$idbiayatidaktetap;?>">
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
                                            <input type="hidden" name="idbiayatidaktetap" value="<?=$idbiayatidaktetap;?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="hapusbiayatidaktetap">Ya</button>
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
                        <h4 class="modal-title">Tambah Pengeluaran Tidak Tetap</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form method="post">

                    <!-- Modal body -->
                    <div class="modal-body">
                    <div style="font-weight: bold;">
                        Nama Biaya
                        <input type="text" name="namabiaya" class="form-control mb-2" placeholder="Nama Biaya" required >
                        <?php
                            $today = date("Y-m-d"); 
                        ?>
                        Waktu
                        <input type="date" name="tanggal" class="form-control mb-2" value="<?=$today;?>" required >
                        Jumlah
                        <input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah" required>
                        Harga Satuan
                        <input type="number" name="harga" class="form-control mb-2" placeholder="Harga Satuan" required>
                        Catatan
                        <textarea name="catatan"  class="form-control mb-2" cols="30" rows="5" placeholder="Catatan"> </textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahbiayatidaktetap">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>

                    </form>

                    </div>
                </div>
             </div>







</html>
