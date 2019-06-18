<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Lan Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="robots" content="index, follow"/>
  <meta name="keywords" content=""/>
  <meta name="description" content=""/>
  <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/frontend/css/reset.css">
  <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/frontend/css/plugins.css">
  <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/frontend/css/style.css">
  <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/frontend/css/color.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="shortcut icon" href="<?= base_url()?>assets/frontend/images/favicon.ico">
</head>
<body>
  <div class="loader"><img src="<?= base_url()?>assets/frontend/images/loader.png" alt=""></div>
  <div id="main">
    <header>
      <div class="header-inner">
        <div class="container">
          <div class="nav-social">
            <ul>
              <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="#" target="_blank"><i class="fa fa-tumblr"></i></a></li>
            </ul>
          </div>
          <div class="logo-holder">
            <a href="<?= base_url()?>">
              <img src="<?= base_url()?>assets/frontend/images/dea.png" class="respimg logo-vis" alt="">
              <img src="<?= base_url()?>assets/frontend/images/dea.png" class="respimg logo-notvis" alt="">
            </a>
          </div>
          <div class="nav-holder">
            <nav class="scroll-nav">
              <ul>
                <li><a href="#sec1" class="act-link">Home</a></li>
                <li><a href="#sec2">About</a></li>
                <li><a href="#sec3">Booking</a></li>
                <li><a href="#sec4">Contacts</a></li>
                <li><a href="#sectes">Testimonial</a></li>
                <li><a href="<?= base_url('login')?>">Login</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <div id="wrapper">
      <div class="content full-height hero-content" id="sec1">
        <div class="slideshow-container" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
          <div class="slides-container">
            <div class="bg" style="background-image: url(<?= base_url()?>assets/frontend/images/bg/slider2.jpg)"></div>
            <div class="bg" style="background-image: url(<?= base_url()?>assets/frontend/images/bg/asa.jpg)"></div>
            <div class="bg" style="background-image: url(<?= base_url()?>assets/frontend/images/bg/1042415.jpg)"></div>
          </div>
        </div>
        <div class="hero-title-holder">
          <div class="overlay"></div>
          <div class="hero-title">
            <div class="hero-decor b-dec">
              <div class="half-circle"></div>
            </div>
            <div class="separator color-separator"></div>
            <h3>Welcome to Lan Service</h3>
            <h4>Booking Service Online</h4>
          </div>
        </div>
        <div class="hero-link">
          <a class="custom-scroll-link" href="#sec2"><i class="fa fa-angle-double-down"></i></a>
        </div>
      </div>
      <div class="content">
        <section class="about-section" id="sec2">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="section-title">
                  <h3>Discover</h3>
                  <h4 class="decor-title">Layanan Kami</h4>
                  <div class="separator color-separator"></div>
                </div>
                <p>Kami merupakan bengkel yang telah berdiri sejak lama, melayani jasa service sparepart semua jenis kendaraan.</p>
                <p> Saat ini kami menyediakan layanan booking online sehingga anda tidak perlu menunggu lama di tempat kami. Anda dapat membooking dari jarak jauh sehingga dapat mengoptimalkan waktu kerja anda.</p>
              </div>
              <div class="col-md-6">
                <div class="single-slider-holder">
                  <div class="customNavigation">
                    <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                    <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                  </div>
                  <div class="single-slider owl-carousel">
                    <div class="item">
                      <img src="<?= base_url()?>assets/frontend/images/bg/img1.png" class="respimg" alt="">
                    </div>
                    <div class="item">
                      <img src="<?= base_url()?>assets/frontend/images/bg/img2.png" class="respimg" alt="">
                    </div>
                    <div class="item">
                      <img src="<?= base_url()?>assets/frontend/images/bg/1546430_720789047931353_265059243_n.jpg" class="respimg" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>




        <section class="parallax-section">
          <div class="bg bg-parallax" style="background-image:url(<?= base_url()?>assets/frontend/images/bg/ges.jpg)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
          <div class="overlay"></div>
          <div class="container">
            <h2>Jam Kerja</h2>
            <h3>Silahkan Booking Disaat Jam Kerja</h3>
            <div class="bold-separator">
              <span></span>
            </div>
            <div class="work-time">
              <div class="row">
                <div class="col-md-6">
                  <h3>Sening - Jumat</h3>
                  <div class="hours">
                    08:00<br>
                    17:00
                  </div>
                </div>
                <div class="col-md-6">
                  <h3>Sabtu - Minggu</h3>
                  <div class="hours">
                    09:00<br>
                    15:00
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="big-number"><a href="#">(+62)823-7137-3347</a></div>
              </div>
            </div>
          </div>
        </section>

        <section class="about-section">
          <div class="triangle-decor">
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="single-slider-holder">
                  <div class="customNavigation">
                    <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                    <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                  </div>
                  <div class="single-slider owl-carousel">
                    <div class="item">
                      <img src="<?= base_url()?>assets/frontend/images/bg/gara.jpg" class="respimg" alt="">
                    </div>
                    <div class="item">
                      <img src="<?= base_url()?>assets/frontend/images/bg/mechanical-engineering.jpg" class="respimg" alt="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="section-title">
                  <h3>History</h3>
                  <h4 class="decor-title">Toko Kami</h4>
                  <div class="separator color-separator"></div>
                </div>
                <p>Kami telah berpengalaman dalam melayani seluruh keluhan pelanggan mengenai otomotif sehingga kami mampu memperbaiki kerusakan yang terjadi pada kendaraan anda</p>
              </div>
            </div>
          </div>
        </section>




        <section class="parallax-section" id="sec3">
          <div class="bg bg-parallax" style="background-image:url(<?= base_url()?>assets/frontend/images/bg/2.png)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
          <div class="overlay"></div>
          <div class="container">
            <h2>Make online Reervation</h2>
            <h3>Booking a service is easy way</h3>
          </div>
        </section>

        <section>
          <div class="triangle-decor"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-title">
                  <h4>Reervation info</h4>
                  <div class="separator color-separator"></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="inner">
                      <p> Silahkan daftarkan diri anda terlebih dahulu untuk melakukan booking online sehingga anda dapat melakukan pemesanan tanpa harus langsung datang kelokasi sehingga memeprmudah waktu anda</p>
                    </div>
                  </div>
                </div>
                <div class="bold-separator">
                  <span></span>
                </div>
                <div class="reservation-form-holder">
                  <div class="reservation-form">
                    <form method="post" action="<?= base_url('register')?>"  id="reservation-form">
                      <div class="row">
                        <div class="col-md-6">
                          <h3>Registrasi</h3>
                          <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
                          <input type="password" name="password" class="form-control" placeholder="Password" required="">
                          <input name="phone" type="text" id="phone" placeholder="Telepon" required="">
                          <input name="resdate" class="myInput" id="resdate" data-lang="en" data-years="1945-2019" data-format="YYYY-MM-DD" data-sundayfirst="false" value="Tanggal Lahir" onClick="this.select()" name="tgl">
                        </div>

                        <div class="col-md-6">
                          <h3> &nbsp;</h3>
                          <input type="text" name="username" class="form-control" placeholder="Username" required="">
                          <input type="password" name="repassword" class="form-control" placeholder="Re-Password" required="">
                          <input name="email" type="text" id="email" placeholder="Email" required="">
                          <textarea name="alamat"  placeholder="Alamat" required=""></textarea>
                        </div>

                      </div>
                      <button type="submit"  id="submit-res">Register</button>
                      <div class="row">
                        <br>
                        <a href="<?= base_url('login')?>" style="color:blue"><i>Sudah punya akun? Silahkan Login</i></a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="parallax-section" id="sec4">
          <div class="bg bg-parallax" style="background-image:url(<?= base_url()?>assets/frontend/images/bg/start_page_image.png)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
          <div class="overlay"></div>
          <div class="container">
            <h2>Our contacts</h2>
            <h3>Were to find us</h3>
          </div>
        </section>
        <section>
          <div class="triangle-decor"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-9">
                <div class="contact-details">
                  <h3>Contact info</h3>
                  <p> Silahkan Datang langsung kebengkel kami untuk memastikan pelayanan terbaik dan jika ada hal yang ingin ditanyakan</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="contact-details">
                  <h4>Kenten  - Palembang</h4>
                  <ul>
                    <li><a href="#">Palembang, Sumatera selatan</a></li>
                    <li><a href="#">(+62) 82371373347</a></li>
                    <li><a href="#">adityads@ymail.com</a></li>
                  </ul>
                </div>
                <div class="contact-details">
                  <h4>Timbangan - Indralaya</h4>
                  <ul>
                    <li><a href="#">Indralaya - OKI</a></li>
                    <li><a href="#">(+62) 82371373347</a></li>
                    <li><a href="#">adityads@ymail.com</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="bold-separator">
              <span></span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="section-title">
                  <h3>Our location</h3>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="no-padding">
          <div class="map-box">
            <div class="map-holder" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
              <div  id="map-canvas"></div>
            </div>
          </div>
        </section>

        <section class="parallax-section" id="sectes">
          <div class="bg bg-parallax" style="background-image:url(<?= base_url()?>assets/frontend/images/bg/asaz.jpg)" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
          <div class="overlay"></div>
          <div class="container">
            <h2>Testimonials</h2>
            <h3>What said about us</h3>
            <div class="bold-separator">
              <span></span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="testimonials-holder">
                  <div class="customNavigation">
                    <a class="prev-slide transition"><i class="fa fa-long-arrow-left"></i></a>
                    <a class="next-slide transition"><i class="fa fa-long-arrow-right"></i></a>
                  </div>
                  <div class="testimonials-slider owl-carousel">
                    <div class="item">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <p>" Service yang memuaskan, cepat dan ahli dalam bidangnya "</p>
                      <h4><a href="https://twitter.com/adityadees" target="_blank">AdityaDees</a></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="section-icon"><i class="fa fa-quote-left"></i></div>
          </div>
        </section>
      </div>
      <footer>
        <div class="footer-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="footer-social">
                  <h3>Find us</h3>
                  <ul>
                    <li><a href="#" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank" ><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#" target="_blank" ><i class="fa fa-tumblr"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="bold-separator">
              <span></span>
            </div>
            <ul class="footer-contacts">
              <li><a href="#">(+62) 82371373347</a></li>
              <li><a href="#">Palembang, Sumatera Selatan</a></li>
              <li><a href="#">adityads@ymail.com</a></li>
            </ul>
          </div>
        </div>
        <div class="to-top-holder">
          <div class="container">
            <p> <span> &#169; AdityaDS 2019 . </span> All rights reserved.</p>
            <div class="to-top"><span>Back To Top </span><i class="fa fa-angle-double-up"></i></div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script>
    <?php if($this->session->flashdata('success')){ ?>
     swal("Success!", "<?= $this->session->flashdata('error'); ?>", "success");
   <?php } else if($this->session->flashdata('error')){?>
     swal("Error!", "<?= $this->session->flashdata('error'); ?>", "error");
   <?php }?>
 </script>

 <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg"></script>
 <script type="text/javascript" src="<?= base_url()?>assets/frontend/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?= base_url()?>assets/frontend/js/plugins.js"></script>
 <script type="text/javascript" src="<?= base_url()?>assets/frontend/js/scripts.js"></script>
</body>
</html>