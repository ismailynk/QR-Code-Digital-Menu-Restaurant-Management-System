<?php
include("ayar.php");
session_start();
if(!isset($_SESSION["login"])){

  header("Refresh: 0; url=index.php");
}else{



?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carizma Cafe-Admin-Kategoriler</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    
    <link rel="stylesheet" href="assets/css/app.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <style type="text/css">
        
    </style>
</head>
<body>

     <?php include 'connection.php';  
     $db = conopen(); 
     //require_once("operators.php");?>
<div id="div"></div>
 <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><h3>Carizma Cafe</h3></a>
                        </div>
                        <div class="header-top-right">

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item  ">
                                <a href="menu.php" class='menu-link' target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-card-list"></i>
                                    <span>Menü</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="infos.php" class='menu-link' target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-diagram-3-fill"></i>
                                    <span>Menü Tasarımı</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="ürünler.php" class='menu-link' target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-pen-fill menu-link"></i>
                                    <span>Ürünler</span>
                                </a>
                            </li>
                            <li class="menu-item  ">
                                <a href="kategoriler.php" class='menu-link' target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-diagram-3-fill"></i>
                                    <span>Kategoriler</span>
                                </a>
                            </li>                          
                        </ul>
                    </div>
                 </nav>
             </header>
        </div>
        <div id="sonuc"></div>
  <div class="page-heading ">
                <div class="page-title">
                    <div class="">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3 class="ps-5 pe-5">Kategoriler</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            İşlemler
                        </div>
                        <div class="input-group mb-3 container">
                              <div class="input-group-prepend px-4 row row-cols-auto ">
                                <div class="col " >
                                    <span class="input-group-text bg-primary text-white mb-2 " style="max-width:50px;" id="inputGroup-sizing-default">Ara</span>
                                </div>
                                <div class="col"> 
                                    <input type="text" id="search-ınput" onkeyup="search()" class="form-control mb-2 " placeholder="İsim Bazında" style="max-width:180px;" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                               <div class="col">
                                    <button type="button" class="btn btn-outline-primary btn-primary px-3" data-bs-whatever="ali" data-bs-toggle="modal"data-bs-target="#inlineFormKategoriEkle"> Kategori Ekle</button>
                                </div>
                              </div>
                            </div>
                            
                            <!----------------------------MODAL KAtegori Ekleme-------------------------------------------------------------------------->
                                            <div class="modal fade text-left modalss"  id="inlineFormKategoriEkle" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Kategori Ekleme </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="kategoriform" >
                                                                <div class="form-group">
                                                                    <input name="kategoriekle" type="text"  value="" placeholder="Kategori adı"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <p>Resim Seç</p>
                                                                    <input type="file" name="file_upload" id="imagesadd" multiple="multiple">
                                                                </div>
                                                                <div class="form-group">
                                                                    <img id="previewadd" style="max-width: 300px; max-height: 300px;" src="CafeDB/img/custom-pics/icon-picture.jpg"  class="img-thumbnail">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                 <button type="button " name="ürüneklebuton" data-value="kategoriform" data-bs-dismiss="modal" value="GÖNDER" id="kategorieklebutonid" class="btn btn-primary ajaxbtn">Kategori Oluştur</button>
                                                                <button type="button" class="btn btn-warning"
                                                                    data-bs-dismiss="modal">İptal</button>
                                                                
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                             <!---------------------------------------------MODAL KAtegori Ekleme Son----------------------------------------------------------->  

                        <div class="card-body" style="overflow-x:auto;">
                            <table class="table table-striped" id="search-table"  >
                                <thead>
                                    <tr class="header">
                                        <th>ID</th>
                                        <th>İsim</th>
                                        <th>Resim</th>
                                        <th>Görünürlük</th>                           
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php

                                    
                                    $postasor=$db->prepare("SELECT * from category ");
                                    $postasor->execute();
                                    while ($postacek=$postasor->fetch(PDO::FETCH_ASSOC)) {
                                           

                                        ?>
                                    <tr>
                                        <td><?php   echo $postacek["category_id"]; ?></td>
                                        <td><?php   echo $postacek["category_name"]; ?></td>
                                        <td><?php echo '<img width="100" height="100" class="img" id="imgg" src="'.$postacek["cat_pic_name"].'"style="border-radius: 21px 21px 21px 21px" />'; ?></td>
                                        <td><?php   
                                         if ($postacek["visible"] == 1) {
                                         	echo "<h4><span class='badge bg-success'>Aktif</span></h4>";
                                         } else {
                                         	echo "<h4> <span class='badge bg-danger'>Pasif</span></h4>";
                                         }
                                         

                                         ?></td>
                                        <td >
                                            <button name="degistir" onclick="modal(<?php echo $postacek["category_id"]; ?>,'katguncelle')" type="button"  class="btn btn-outline-success btn-primary mb-1" data-bs-whatever="ali" data-bs-toggle="modal"data-bs-target="#inlineForm">Düzenle</button>
                                           <!-- Button trigger modal -->
                                            <button type="button" onclick="silmodal(<?php echo $postacek["category_id"]; ?>)" class="btn mb-1 btn-danger" data-bs-toggle="modal" data-bs-target="#silmodal">
                                              Sil
                                            </button>
                                        </td>
                                    </tr>
                                      <?php
                                    } 
                                      
                                     ?>      
                                    
                                </tbody>
                            </table>
                             <!-- Modal SİL -->
                                            <div class="modal fade" id="silmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-light" id="exampleModalLabel">Sil</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <h6 class="text-dark">Seçili Ürünü Silmek İstediğinize Emin misiniz? Bu Kategoriyi Silerseniz İçerisinde Bulunan <h6 class="text-danger">BÜTÜN ÜRÜNLER DE SİLİNECEKTİR!</h6> <h6 class="text-dark">Ürünleri Diğer Kategorilere veya Geçici bir Kategoriye Aktarmanızı Tavsiye ederiz.</h6>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button id="silmodalbuton" data-id="category" data-value="0" type="button" class="btn btn-danger ajaxbtndelete" data-bs-dismiss="modal">Sil</button>
                                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">İptal</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                            <!----------------------------MODAL Güncelle-------------------------------------------------------------------------->
                                     
                                            <div class="modal fade text-left modalss"  id="inlineForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33"><?php  echo $postacek["category_name"]; ?> </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="catguncelle">
                                                                <div id="formveri">
                                                                </div>
                                                                <div class="form-group ps-4">
                                                                    <p>Resim Seç</p>
                                                                    <input type="file" name="file_upload"  id="images" multiple="multiple">
                                                                </div>
                                                            </form>    
                                                        </div>
                                                        <div class="modal-footer">
                                                           <div class="">
                                                            
                                                            <button type="button " data-value="catguncelle" name="güncelle"  id="guncellemodalbutonid"  data-bs-dismiss="modal" class="btn ajaxbtn btn-primary ">Uygula</button>
                                                            <button type="button" class="btn btn-warning"
                                                                data-bs-dismiss="modal">İptal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                    <!---------------------------------------------MODALGüncelle son----------------------------------------------------------->

                        </div>
                    </div>

                </section>
            </div>
                   
            <footer class="bg-primary" style="left: 0;bottom: 0;width: 100%;">
                <div class="container pt-3">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start text-light">
                            <p>2022 © İsmail YANIK</p>
                        </div>
                        <div class="float-end text-light">
                            <p>Dev with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a>M. İsmail Yanık</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    

    <script src="assets/js/pages/horizontal-layout.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    

     <script src="assets/js/myScripts/image_preview.js"></script>
    <script src="assets/js/myScripts/modal_fill.js"></script>
    <script src="assets/js/myScripts/urunler-ajax-methods.js"></script>
    <script src="assets/js/myScripts/table-search.js"></script>

    




  
    
      
    

    

 </div>

</body>
</html>
<?php } ?>