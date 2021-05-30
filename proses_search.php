<?php 
error_reporting(0);
include 'konek-search.php' 
?>
<!doctype html>
<html lang="en">

  <head>
    <title>KPP PRATAMA CIBITUNG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo" >
                <a href="index.php">KPP Pratama Cibitung</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.php" class="nav-link">Home</a></li>
                 
                  <li><a href="contact.php" class="nav-link">Contact</a></li>
                  <li><a href="cpanel/index.php" class="nav-link">Login</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('images/pajak.jpeg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            
          </div>
        </div>
      </div>
    </div>
    
    

    <form action="proses_search.php" method="post">
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
            <a href="#for-rent" class="active" data-toggle="tab" id="rent-tab" aria-controls="rent" aria-selected="true">Trace & Tracking </a>
           
          </div>
        </div>
      </div>
      
      <div class="realestate-tabpane pb-5">
        <div class="container tab-content">
           <div class="tab-pane active" id="for-rent" role="tabpanel" aria-labelledby="rent-tab">

             <div class="row">
               
               <div class="col-md-4 form-group">
                 <input type="text" class="form-control" placeholder="NPWP" name="npwp">
               </div>
               <div class="col-md-4 form-group">
                 <input type="text" class="form-control" placeholder="Nomor BPS" name="bps">
               </div>
             </div>

            
             
             <div class="row">
               <div class="col-md-4">
                 <button type="submit" class="btn btn-black py-3 btn-block" name="submit">Search</button>
               </div>
             </div>
             <?php 
				if (isset($_POST['submit'])) {
					header("location:proses-search.php");
				}
			 ?>

           </div>
           <?php
           include 'konek-search.php' ;
            $search = $_POST['npwp'];
            $search1 = $_POST['bps'];
			if ($search1 !='' or $search !='' ) {
			 	$select = mysqli_query($conn, "SELECT * FROM permohonan WHERE no_bps LIKE '".$search1."'  or npwp LIKE '".$search."'");
			 } 
			
				
				while ($baris = mysqli_fetch_array($select)) {
            ?>
            <p>
            

			<table class="table table-bordered">
			<tr bgcolor='#DAA520'>
				<td>NPWP</td>
				<td>Nama WP </td>
				<td>Nomor BPS </td>
				<td>Jenis Permohonan</td>
				<td>Tanggal Permohonan</td>
				<td>Status</td>
				<td>Keterangan</td>
			</tr>

			<tr bgcolor='#F0FFF0'>
				<td><?php echo $baris['npwp'] ?></td>
				<td> <?php echo $baris['nama_wp'] ?> </td>
				<td><?php echo $baris['no_bps'] ?></td>
				<td><?php echo $baris['jenis_permohonan'] ?></td>
				<td><?php echo $baris['tanggal_permohonan'] ?></td>
                <td > 
                            <?php
                                                if ($baris['status'] == 0){
                                                    echo '<span class=text-warning>Menunggu Persetujuan</span>';
                                                } elseif ($baris['status'] == 1) {
                                                    echo '<span class=text-primary>Setujui</span>';
                                                } else {
                                                    echo '<span class=text-danger>Tidak Disetujui</span>';
                                                }
                                               ?> 
                        </td> 
                
				<td><?php echo $baris['keterangan'] ?></td>

			</tr>
			<?php } ?>
          
          
        </table>
        

        </div>
        
      </div>
    </form>
   

   
        <div class="row pt-10 mt-9 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
             <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="icon-heart text-danger" aria-hidden="true"></i> by <a>FK</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

