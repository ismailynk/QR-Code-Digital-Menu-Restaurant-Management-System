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
      <title>Carizma Cafe-Admin-ürünler</title>

      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="bootstrap.css">
      <link rel="stylesheet" href="assets/bootstrap.css">
      
      <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
      
      <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
      <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
      
      <link rel="stylesheet" href="assets/css/app.css">
      <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

      <style type="text/css">
        #search-table td{
            max-width:100px;
            max-height:50px;
        }
        .pbaslık{
            color: #25396f;
        }  
    </style>
</head>
<body>
   <?php include 'connection.php';
   $db = conopen();
   //require_once("operators.php"); ?>
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
                        <h3 class="ps-5 pe-5">Ürünler</h3>
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

                        <div class="col">
                            <select id="searchfilter" class="form-select" aria-label="Default select example">
                              <option value="1" selected>İsim</option>
                              <option value="2">Kategori</option>
                              <option value="8">Durum</option>
                          </select> 
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Filtrele</span>
                            </div>
                            <input type="text"id="search-ınput" onkeyup="search()" name="secondexp" style="max-width:180px;" placeholder="..."class="form-control" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col ">
                      <button type="button" class="btn btn-outline-primary btn-primary px-3" data-bs-whatever="ali" data-bs-toggle="modal"data-bs-target="#inlineFormÜrünEkle"> Ürün Ekle</button>
                      
                  </div>
                  
                  
              </div>
          </div>
          <!----------------------------MODAL Ürün Ekleme-------------------------------------------------------------------------->
          <div class="modal fade text-left modalss"  id="inlineFormÜrünEkle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable "
          role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ürün Ekleme </h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="ürüneklemeform" enctype="multipart/form-data" name="ürünekle" >
                <div class="row">
                    <div class="col">
                       <div class="form-group">
                        <input name="txtürüneklead" type="text"  value="" placeholder="İsim"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <select type="text" name="txtkategori" value="" placeholder="Kategori"
                        class="form-control">

                        
                        <?php


                        $postasor = $db->prepare("SELECT * FROM category");
                        $postasor->execute();
                        while ($postacek = $postasor->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?php echo $postacek["category_id"]; ?>"><?php echo $postacek["category_name"]; ?></option>
                            
                            <?php
                        }

                        ?>


                    </select>
                </div>
                <div class="form-group">
                    <textarea type="text" name="txtfirstexp" value="" placeholder="Açıklama"
                    class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <input type="text"  name="txtfiyat" value="" placeholder="Fiyat"
                    class="form-control">
                </div>
                
                <div class="form-group">
                    <div class="divider divider-left-center">
                        <div class="divider-text">
                            <p class="pbaslık fw-bold">Resim Seç</p>
                        </div>
                    </div>
                    
                    <input type="file" name="file_upload" id="imagesadd"  multiple="multiple">
                </div>
                <div class="form-group">
                    <img id="previewadd" style="max-width: 300px; max-height: 300px;" src="CafeDB/img/custom-pics/icon-picture.jpg"  class="previewadd img-thumbnail">
                </div>
                <div class="form-group">


                    <div class="divider divider-left-center">
                        <div class="divider-text">
                            <p class="pbaslık fw-bold">Menü Gösterim Şekli</p>
                        </div>
                    </div>
                    <div class="row">
                       <!--  <div class="col-6">
                            <select class="form-select" name="type" aria-label="Default select example">
                              <option value="0" selected>Resimli </option>
                              <option value="1">Resimsiz</option>
                          </select>
                      </div> -->
                      <div class="col-6">
                        <select class="form-select" name="vis" aria-label="Default select example">
                          <option value="1" selected>Aktif </option>
                          <option value="0">Pasif</option>
                      </select>
                  </div>
                  
              </div>
              
              
          </div>
      </div>
  </div>
</form>
</div>
<div class="modal-footer">
    <button type="button "  name="ürüneklebuton" data-value="ürüneklemeform" data-bs-dismiss="modal" value="GÖNDER" id="ajaxbtn" class="ajaxbtn btn btn-primary">Ürün Ekle
    </button>
    <button type="button" class="btn btn-warning"
    data-bs-dismiss="modal">İptal</button>
</div>


</div>
</div>
</div>
<!---------------------------------------------MODAL Üeün Ekleme Son----------------------------------------------------------->  


<div class="card-body" style="overflow-x:auto;">
    <table class="table table-striped" id="search-table"  >
        <thead>
            <tr class="header">
                <th>ID</th>
                <th>İsim</th>
                <th>Kategori</th>
                <th>Resim</th>
                <th>Açıklama </th>
                <th>Fiyat</th>
                <th>Gösterim Tipi</th>  
                <th>Durum</th>                                          
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
           <?php


           $postasor = $db->prepare("SELECT menu.*,category.* FROM menu INNER JOIN category on product_category=category_id GROUP BY product_category,product_id ");
           $postasor->execute();
           while ($postacek = $postasor->fetch(PDO::FETCH_ASSOC)) {


            ?>
            <tr id="tr<?php echo $postacek["product_id"]; ?>">
                <td><?php echo $postacek["product_id"]; ?></td>
                <td><?php echo $postacek["product_name"]; ?></td>
                <td><?php echo $postacek["category_name"]; ?></td>
                <td><?php echo '<img width="100" height="100" class="img" id="imgg" src="'.$postacek["pic_name"].'"style="border-radius: 21px 21px 21px 21px" />'; ?></td>
                <td><?php echo $postacek["product_first_exp"]; ?></td>
                <td><?php echo $postacek["product_price"]; ?></td>
                <?php 
                if ($postacek["type"]==0) {
                    echo "<td>Resimli</td>";
                }else{ 
                    echo "<td>Resimsiz</td>";
                }
                if ($postacek["product_visible"]==0) {
                    echo "<td>Pasif</td>";
                }else{ 
                    echo "<td>Aktif</td>";
                }
                ?>


                <td>

                 <button name="degistir" type="button"  value="<?php echo $postacek["product_id"]; ?>" onclick="modal(<?php echo $postacek["product_id"]; ?>,'urunguncelle')" class="btn mb-1 btn-outline-success btn-primary" data-bs-whatever="ali" data-bs-toggle="modal"data-bs-target="#inlineForm" >Düzenle</button>
                 <button type="button" onclick="silmodal(<?php echo $postacek["product_id"]; ?>)" class="btn mb-1 btn-danger" data-bs-toggle="modal" data-bs-target="#silmodal">
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
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="exampleModalLabel">Sil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <h3 class="text-dark">Seçili Ürünü Silmek İstediğinize Emin misiniz?</h3>
    </div>
    <div class="modal-footer">
        <button id="silmodalbuton" data-id="product"  data-value="0" type="button" class="btn btn-danger ajaxbtndelete" data-bs-dismiss="modal">Sil</button>
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">İptal</button>
    </div>
</div>
</div>
</div>
<!-- Modal güncelle -->
<div class="modal fade text-left modalss"  id="inlineForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Güncelleme</h4>
        <button type="button" class="close" data-bs-dismiss="modal"aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="modal-body">
   <form id="guncelleformveri" >
    <div id="formveri" ></div> 
    <div class="form-group ps-4">
      <div class="divider divider-left-center">
        <div class="divider-text">
            <h5 class="pbaslık fw-bold">Resim seç</h5>
        </div>
      </div>
      <input type="file" name="file_upload"  id="images" multiple="multiple">
    </div> 
</form>
</div>

<div class="modal-footer">
    <button type="button " data-value="guncelleformveri" name="güncelle" data-bs-dismiss="modal"   id="ajaxbtn" class="ajaxbtn btn btn-primary ">Ürün Güncelle</button>
    <button type="button" class="btn btn-warning"
    data-bs-dismiss="modal">İptal
</button>

</div>


</div>
</div>
</div> 
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
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets/js/pages/horizontal-layout.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="assets/js/myScripts/image_preview.js"></script>
<script src="assets/js/myScripts/modal_fill.js"></script>
<script src="assets/js/myScripts/extras.js"></script>
<script src="assets/js/myScripts/urunler-ajax-methods.js"></script>
<script src="assets/js/myScripts/table-search.js"></script>

<script src="assets/js/main.js"></script>
<script>
        // Simple Datatable
        //let table1 = document.querySelector('#search-table');
        //let dataTable = new simpleDatatables.DataTable(table1);
    </script>
</div>

</body>
</html>
<?php } ?>