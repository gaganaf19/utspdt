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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
                            <a class="nav-link" href="pemasukan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                                Data Pemasukan
                            </a>
                            </div>
                            <div class="bg">
                            <a class="nav-link text-white" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book text-white"></i></div>
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
                    <h1 class="mt-4 text-white" align="center" style="font-weight: bold; background-color: blue ; border: 3px solid black; border-radius: 5px;">Laporan Pengeluaran Dan Pemasukan</h1>
                    </div>
                      

                       
                                    <hr>
                                   
                        <div class="card mb-4" style="font-weight: bold" >
                            <div class="card-header" style="">
                                <i class="fas fa-table me-1"></i>
                                Data Laporan Pengeluaran Dan Pemasukan
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered border-dark">
                                    <thead>
                                        <tr align="center">
                                            <th>Total Pengeluaran</th>
                                            <th>Total Pemasukan</th>
                                            <th>Keuntungan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    
                                        $get1 = mysqli_query($c,"select * from biaya_tidaktetap ");
                                        $totalbiayatidaktetap = 0;
                                        $totalpengeluaran =0;
                                        while($p=mysqli_fetch_array($get1)){
                                            $totalharga1 = $p['total_harga'];
                                            
                                            $totalbiayatidaktetap += $totalharga1;
                                        }
                                            $totalpengeluaran += $totalbiayatidaktetap;

                                        $get2 = mysqli_query($c,"select * from pemasukan ");
                                        $totalpemasukan = 0;
                                        $totalkeuntungan =0;
                                        while($p=mysqli_fetch_array($get2)){
                                            $totalharga2 = $p['total_harga'];
                                            
                                            $totalpemasukan += $totalharga2;
                                        }
                                        $totalkeuntungan = $totalpemasukan - $totalpengeluaran;
                                        
                                    ?>
                                    
                                        

                                        <tr align="center">
                                            <td>Rp <?=number_format($totalpengeluaran, 0, ',', '.');?></td>
                                            <td>Rp <?=number_format($totalpemasukan, 0, ',', '.');?></td>
                                            <td>Rp <?=number_format($totalkeuntungan, 0, ',', '.');?></td>
                                           
                                           
                                            
                                        </tr>
                                       
                                       
                                    </tbody>
                                </table>
                                <button style=" float:right ; font-weight: bold; background-color: red ; border: 3px solid black; border-radius: 5px;" type="button" class="btn btn-primary mb-4" onclick="location.href='export.php'">
                                 <i class="bi bi-printer"> Print </i> 
                        </button> 
                            </div>
                        </div>
                                    </hr>

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
  






</html>
