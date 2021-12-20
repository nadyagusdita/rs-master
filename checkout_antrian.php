<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Check Out Antrian</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Appland - v2.2.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html">RSUP Dr M Djamil</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="jadwal_dokter.php">Jadwal Dokter</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
            <h1>App landing page template</h1>
            <h2>Lorem ipsum dolor sit amet, tota senserit percipitur ius ut, usu et fastidii forensibus voluptatibus. His ei nihil feugait</h2>
            <a href="#" class="download-btn"><i class="bx bxl-play-store"></i> Google Play</a>
            <a href="#" class="download-btn"><i class="bx bxl-apple"></i> App Store</a>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section>End Hero -->
<?php
include "connect.php";
$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
$hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu');

$no_antri = '';
$no_rm = $_GET['no_rm'];
if(isset($_POST['submit'])){
    $id_dokter = $_POST['dokter'];
    $id_jadwal = $_POST['jadwal'];

    $today = date('l');
    $now = date('Ymdhm');

    $q1 = "SELECT * FROM jadwal WHERE id_jadwal = $id_jadwal";
    $r = $conn->query($q1);
    $hariJadwal = '';
    while($data = $r->fetch_object()){
        $hariJadwal = $data->hari;
    }

    strtolower($hariJadwal);
    $cari = array_search($hariJadwal, $hari);
    $cari = $days[$cari];

    $tanggal = strtotime($cari);
    $qq = date('d/m/Y', $tanggal);
    $qqq = date('Y-m-d', $tanggal);
    $z = date('dmy', $tanggal);

    $p = date('dmY', $tanggal);
//    var_dump($no_rm);

    //pengecekan jenis pembayaran pasien
    $caraBayar = '';
    $jenisCari = "SELECT cara_pembayaran FROM pasien WHERE no_rm = '$no_rm'";
    $rrr = $conn->query($jenisCari);
    if($rrr->num_rows > 0){
        while ($data = $rrr->fetch_object()):
            $caraBayar = $data->cara_pembayaran;
        endwhile;
    }else{
        echo $conn->connect_errno;
    }

    //pengecekan nomor urut pada tanggal pendaftaran
    $count = 0;
    $queryCari = "
        SELECT 
	        COUNT(daftar.no_antrian) as hitung     
        FROM daftar 
        JOIN pasien 
	        ON pasien.no_rm = daftar.no_rm 
        WHERE daftar.tglDatangDaftar = '$qqq' 
            AND pasien.cara_pembayaran = '$caraBayar'";
    $r = $conn->query($queryCari);
    if($r->num_rows > 0){
        while ($data = $r->fetch_object()){
            $count = $data->hitung;
        }
    }else{

    }
    $count++;


    $no_antri = $caraBayar.'-'.$z.$count."-".$now;

    $q = "INSERT INTO `mpsi`.`daftar` (no_antrian, no_rm, `id_dokter`, `hari`, `id_jadwal`, tglDatangDaftar) VALUES ('$no_antri','$no_rm', '$id_dokter', '$today', '$id_jadwal', '$qqq')";
    $r = $conn->query($q);
    if($conn->affected_rows == 0){
        header("Location:/appland/pilih_jadwal.php?no_rm=$no_rm");
    }else{
        $result = $conn->query("SELECT dokter.nama_dokter FROM daftar JOIN jadwal_dokter ON jadwal_dokter.id_dokter = daftar.id_dokter JOIN dokter ON dokter.id_dokter = daftar.id_dokter WHERE daftar.no_antrian = '$no_antri' GROUP BY daftar.no_antrian");
        if($result->num_rows > 0){
            while ($data = $result->fetch_object()){
                $dokterNama = $data->nama_dokter;
            }
        }
    }


}else{
    header("Location:/appland/pilih_jadwal.php?no_rm=$no_rm");
}

?>
  <main id="main">


  <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Check Out Antrian</h2>
        </div>

      
        <div style="margin-left: 300px;" class="row no-gutters" >
        
          <div  class="col-lg-8 box featured" data-aos="fade-up">
            
            <h3>No Antrian</h3>
            <h2><?php echo $no_antri ?><span></span></h2>
            <ul>
              <li><i class="bx bx-check"></i> No Rekam Medis  &nbsp;<?php echo $no_rm ?></li>
              <li><i class="bx bx-check"></i> Nama Dokter &nbsp;<?php echo $dokterNama ?></li>
              <li><i class="bx bx-check"></i> Terdaftar Pada &nbsp;<?php echo $qq?></li>
                <li><i class="bx bx-check"></i> Pendaftaran &nbsp;<?php echo $baru = date('Y-m-d H:i:s') ?></li>
            </ul>
            <a href="print.php?rm=<?php echo $no_rm?>&no_antri=<?php echo $no_antri ?>&doc=<?php echo $dokterNama ?>&tgt=<?php echo $qq ?>&skr=<?php echo $baru?>" target="_blank" rel="noopener" class="get-started-btn">Save PDF</a>
            
          </div>
          


        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- End Frequently Asked Questions Section -->

 

    <!-- ======= Contact Section ======= -->
    <!-- <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6 info" data-aos="fade-up">
                <i class="bx bx-map"></i>
                <h4>Address</h4>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>
              <div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-phone"></i>
                <h4>Call Us</h4>
                <p>+1 5589 55488 55<br>+1 5589 22548 64</p>
              </div>
              <div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-envelope"></i>
                <h4>Email Us</h4>
                <p>contact@example.com<br>info@example.com</p>
              </div>
              <div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-time-five"></i>
                <h4>Working Hours</h4>
                <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-up">
              <div class="form-group">
                <input placeholder="Your Name" type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea placeholder="Message" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <!-- <div class="footer-newsletter" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <!-- <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up">
            <h3>Appland</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="100">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div> --> 

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Appland</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html> 