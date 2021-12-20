<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pendaftaran Pasien Baru</title>
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


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

  <main id="main">



    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <div class="col-lg-6 col-md-9 footer-contact" data-aos="fade-up">
            <h2>Pendaftaran Pasien Baru</h2>
          </div>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="accordion-list">
          <form action="pendaftaranPasien.php" method="post">
            <div class="form-group">
              <label for="namepasien">Username</label>
              <input type="text" class="form-control" required placeholder="Masukkan Username" name="username">
            </div>

            <div class="form-group">
              <label for="namepasien">Password</label>
              <input type="password" class="form-control" required placeholder="Masukkan Password" name="password">
            </div>

            <div class="form-group">
              <label for="namepasien">Nama Pasien</label>
              <input type="text" class="form-control" required placeholder="Masukkan Nama" name="nama">
            </div>

            <div class="form-group">
              <label for="name">Tanggal Lahir</label>
              <input class="form-control" name="tanggal" type="date" required>
            </div>

            <div class="form-group">
              <label for="jk">Jenis Kelamin</label>
              <select class="form-control" name="jk" required>
                <option disabled selected value="">Pilih Jenis Kelamin</option>
                <option value="lk">Laki-laki</option>
                <option value="pr">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="kota">Kota/Kabupaten Domisili</label>
              <select name="kota" class="form-control select-kota" required>
                <option value="" selected disabled>Pilih Kota/Kabupaten Domisili</option>
                <?php
                include "connect.php";
                $query = "SELECT name, id FROM mpsi.regencies";
                $conn->query("LOCK TABLE regencies READ");
                $result = $conn->query($query);

                if ($conn->affected_rows > 0) {
                  while ($data = $result->fetch_object()) {
                    echo "<option value='$data->id'>" . $data->name . "</option>";
                  }
                } else {
                  echo "<option value=''>Tidak Ada Data Kota</option>";
                }
                ?>
              </select>

            </div>

            <div class="form-group">
              <label for="Gd">Golongan Darah</label>
              <select class="form-control" name="gol_darah" required>
                <option disabled selected value="">Pilih Golongan Darah</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="ab">AB</option>
                <option value="o">O</option>
                <option value="na">Tidak Mengetahui</option>
              </select>
            </div>

            <div class="form-group">
              <label for="Agama">Agama</label>
              <select class="form-control" name="agama" required>
                <option selected disabled value="">Pilih Agama</option>
                <option value="islam">Islam</option>
                <option value="protestan">Kristen Protestan</option>
                <option value="katolik">Kristen Katolik</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="konghucu">Khonghucu</option>
              </select>
            </div>

            <div class="form-group">
              <label for="Agama">Pekerjaan</label>
              <select class="form-control" name="pekerjaan" required>
                <option disabled selected value="">Pilih Pekerjaan</option>
                <option value="pns">PNS</option>
                <option value="wiraswasta">Wiraswasta</option>
                <option value="pelajar">Pelajar/Mahasiswa</option>
                <option value="petani">Petani</option>
                <option value="nelayan">Nelayan</option>
                <option value="lainnya">Lainnya</option>
              </select>
            </div>

            <div class="form-group">
              <label for="status">Status Pernikahan</label>
              <select class="form-control" name="status" required>
                <option disabled selected value="">Pilih Status</option>
                <option value="kwn">Kawin</option>
                <option value="blm">Belum Kawin</option>
                <option value="cri">Cerai</option>
              </select>
            </div>

            <div class="form-group">
              <label for="pendidikan"> Pendidikan Terakhir</label>
              <select class="form-control" name="pend_terakhir" required>
                <option disabled selected value="">Pilih Pendidikan</option>
                <option value="tidak-ada">Tidak Sekolah</option>
                <option value="sd">SD/Sederajat</option>
                <option value="smp">SMP/Sederajat</option>
                <option value="sma">SMA/Sederajat</option>
                <option value="s1">S1/Sederajat</option>
                <option value="s2">S2/Sederajat</option>
                <option value="s3">S3/Sederajat</option>
              </select>
            </div>

            <div class="form-group ">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <select class="form-control" name="kewarganegaraan" required>
                <option disabled selected value="">Pilih Kewarganegaraan</option>
                <option value="wni">WNI</option>
                <option value="wna">WNA</option>
              </select>

            </div>

            <div class="form-group">
              <label for="cara_pembayaran">Cara Pembayaran</label>
              <select class="form-control" name="cara_pembayaran" required>
                <option disabled selected value="">Pilih Pembayaran</option>
                <option value="B1">Jaminan Kesehatan Nasional</option>
                <option value="B2">Jaminan Kesehatan Masyarakat</option>
                <option value="B3">Jaminan Kesehatan Daerah</option>
                <option value="B4">Umum</option>
              </select>

            </div>
            <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">Next</button>
          </form>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->



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
                
              </div>
              <div class="form-group">
                <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                
              </div>
              <div class="form-group">
                <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                
              </div>
              <div class="form-group">
                <textarea placeholder="Message" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function() {
      $('.select-kota').select2();
    });
  </script>

</body>

</html>