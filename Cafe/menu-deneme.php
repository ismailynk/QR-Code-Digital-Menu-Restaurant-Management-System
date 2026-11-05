<!DOCTYPE html>
<html>
<head>
  <?php include 'connection.php';
  $db = conopen(); 
  $cafesor=$db->prepare("SELECT * from infos ");
  $cafesor->execute();
  $cafecek=$cafesor->fetch(PDO::FETCH_ASSOC);
  ?>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> <?php  echo $cafecek["cafe_name"];  ?> </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="assets/menu/menu-css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="assets/menu/menu-css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="assets/menu/menu-css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/menu/menu-css/responsive.css" rel="stylesheet" />

</head>

<body style="<?php  echo $cafecek["body_bg"];  ?>" class="sub_page">

  <div class="hero_area">
    <!--<div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
     header section strats -->
    <header class="header_section" style="<?php  echo $cafecek["header_bg"];  ?>">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              <h1 style="<?php  echo $cafecek["header_text"];  ?>"> <?php  echo $cafecek["cafe_name"];  ?></h1>
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button> 

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="menu.html">Menu <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="book.html">Book Table</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a class="cart_link" href="#">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                </svg>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section ">
    <div class="container filter-container" >
      <div class="heading_container heading_center">
        <h2 style="<?php  echo $cafecek["menu_text"];  ?>" id="tab-start">
          Menü  
        </h2>
      </div>
      <div class="scrollmenu " >
        <ul id="navbari" class="filters_menu" class="sticky"  >
          <li class="active " style="<?php  echo $cafecek["scrollmenu_button"],";",$cafecek["scrollmenu_button_shadow"];  ?>" data-filter="*"><a style="<?php  echo $cafecek["scrollmenu_text"];  ?>" class="activehrf" href="#tab-start">Tümü</a></li>
          <?php
          $postasor = $db->prepare("SELECT * FROM category  where visible = 1");
          $postasor->execute();
          while ($postacek = $postasor->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <li style="<?php  echo $cafecek["scrollmenu_button"];  ?>" data-filter="<?php echo ".",$postacek["category_id"]; ?>"><a style="<?php  echo $cafecek["scrollmenu_text"];  ?>" href="#tab-start"><?php echo $postacek["category_name"]; ?></a></li>
            <?php } ?>
        </ul>
      </div>
      <div  class="filters-content" >
        <div class="row grid">
          <?php
          $postasor = $db->prepare("SELECT * FROM menu where product_visible=1 ");
          $postasor->execute();
          while ($postacek = $postasor->fetch(PDO::FETCH_ASSOC)) {
            ?>
          <div class=" col-xs-6  col-lg-4  all <?php echo $postacek["product_category"]; ?>"> <!--- kart başlangıcı  --->
            <div  class="box"style="<?php  echo $cafecek["card_detail_bg"],";",$cafecek["card_shadow"];  ?>"><!-- -->
              <div>
                <div class="img-box"><!--- Resim  --->
                  <img style="<?php  echo $cafecek["card_img_rad"];  ?>" src="<?php echo $postacek["pic_name"]; ?>" alt="">
                </div>
                <div class="detail-box" ><!--- kartbody  --->
                  <h5 style="<?php  echo $cafecek["card_detail_text"];  ?>">
                    <?php echo $postacek["product_name"]; ?><!--- İsim  --->
                  </h5 style="<?php  echo $cafecek["card_detail_text"];  ?>">
                  <p style="<?php  echo $cafecek["card_detail_text"];  ?>"><!--- Açıklama  --->
                    <?php echo $postacek["product_first_exp"]; ?>
                  </p>
                  <div class="options">
                    <span style="<?php  echo $cafecek["card_price_bg"];  ?>"><h6 style="<?php  echo $cafecek["card_price_text"];  ?>"><!--- Fiyat --->
                      <?php echo $postacek["product_price"]; ?> TL
                    </h6></span>
                    <a style="<?php  echo $cafecek["card_button_bg"];  ?>" href="">
                      <svg style="<?php  echo $cafecek["card_button_text"];  ?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-fullscreen" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344 0a.5.5 0 0 1 .707 0l4.096 4.096V11.5a.5.5 0 1 1 1 0v3.975a.5.5 0 0 1-.5.5H11.5a.5.5 0 0 1 0-1h2.768l-4.096-4.096a.5.5 0 0 1 0-.707zm0-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707zm-4.344 0a.5.5 0 0 1-.707 0L1.025 1.732V4.5a.5.5 0 0 1-1 0V.525a.5.5 0 0 1 .5-.5H4.5a.5.5 0 0 1 0 1H1.732l4.096 4.096a.5.5 0 0 1 0 .707z"/>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div><?php } ?>
        </div>
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
  <footer class="footer_section" style="<?php  echo $cafecek["footer_bg"],";",$cafecek["footer_text"];  ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Bizimle İletişime Geçin 
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Konumumuz
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Telefon : +9<?php  echo $cafecek["cafe_tel"];  ?>05316960560
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <?php  echo $cafecek["cafe_email"];  ?>demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              <?php  echo $cafecek["cafe_name"];  ?>
            </a>
            <p>
              <?php  echo $cafecek["cafe_slogan"];  ?>Burgerin En Lezzetli Hali. Yoksa Siz Hala Tatmadınız mı?
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Çalışma Saatlerimiz
          </h4>
          <p>
            <?php  echo $cafecek["cafe_days"];  ?>
          </p>
          <p>
            <?php  echo $cafecek["cafe_hours"];  ?>10:00 - 22:00 
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> Bütün Haklar 
          <a href="https://html.design/">Muhammet İsmail YANIK</a> Tarafından Saklıdır.
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="assets/menu/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="assets/menu/js/bootstrap.js"></script>
  <!-- sticky js -->
  <script src="assets/menu/js/sticky-content.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="assets/menu/js/custom.js"></script>
  <!-- Google Map -->
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
   End Google Map -->

</body>

</html>