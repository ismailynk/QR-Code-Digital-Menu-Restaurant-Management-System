<?php 
include 'connection.php';
$db = conopen();

if ($_POST['name'] == "urunguncelle") {
	$id=$_POST['val'];
	 $katstring="";
   $typestring="";
   $vis="";
	$postasor=$db->prepare("SELECT menu.*,category.* FROM menu INNER JOIN category on product_category=category_id where product_id=$id ");
                                    $postasor->execute();
                                    $postacek=$postasor->fetch(PDO::FETCH_ASSOC);
                                    if ($postacek["type"]==0) {
                                      $typestring="<option value='0' selected>Resimli </option><option value='1'>Resimsiz</option>";
                                    }else{
                                      $typestring="<option value='1' selected>Resimsiz </option><option value='0'>Resimli</option>";
                                    }
                                    if ($postacek["product_visible"]==0) {
                                      $vis="<option value='0' selected>Pasif </option><option value='1'>Aktif</option>";
                                    }else{
                                      $vis="<option value='1' selected>Aktif </option><option value='0'>Pasif</option>";
                                    }
                                     $postaso = $db->prepare("SELECT * FROM category");
                                     $postaso->execute();
                                      while ($postace = $postaso->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($postace["category_id"] == $postacek["category_id"]) {
                                                                    $katstring.= '<option value="' . $postace["category_id"] . '" selected >' . $postace["category_name"] . '</option>';
                                                                }
                                                                else {
                                                                      $katstring.='<option value="' . $postace["category_id"] . '"  >' . $postace["category_name"] . '</option>';
                                                                }
                                                                
                                      }
                                    
                                   echo '
                                                        
                                                            
                                                                <div class="form-group">
                                                                    <input name="txtguncelleid" type="text"  value="'.$postacek["product_id"].'" placeholder="İsim"
                                                                        class="form-control" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Ürün adı</span>
                                                                      </div>
                                                                      <input type="text" name="txtürünguncellead" value="'.$postacek["product_name"].'" placeholder="İsim."
                                                                        class="form-control" aria-describedby="basic-addon1">
                                                                    </div>
                                                                       
                                                                 </div>
                                                                 <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Kategori</span>
                                                                      </div>
                                                                      <select type="text" name="txtkategori" value="" placeholder="Kategori"
                                                                        class="form-control">'.$katstring.'
                                                                      </select>
                                                                    </div>
                                                                       
                                                                 </div>

                                                                    <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Açıklama</span>
                                                                      </div>
                                                                      <input type="text" name="firstexp" value="'.$postacek["product_first_exp"].'" placeholder="Birincil açıklama."
                                                                        class="form-control" aria-describedby="basic-addon1">
                                                                    </div>
                                                                       
                                                                 </div>
                                                                 
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Fiyat</span>
                                                                      </div>
                                                                      <input type="text" name="price" value="'.$postacek["product_price"].'" placeholder="Fiyat"
                                                                        class="form-control" aria-describedby="basic-addon1">
                                                                    </div>
                                                                       
                                                                 </div>
                                                                
                                                                
                                                                <div class="form-group ps-4" >
                                                                     <img id="preview" style="max-width: 300px; max-height: 300px;" src="'.$postacek["pic_name"].'"  class=" img-thumbnail">
                                                                    
                                                                </div>
                                                                <div class="form-group">
                                                                  <div class="divider divider-left-center">
                                                                    <div class="divider-text">
                                                                            <p class="pbaslık fw-bold">Menü Gösterim Şekli</p>
                                                                    </div>
                                                                  </div>
                                                                     <div class="row">
                                                                        <div class="col-6">
                                                                          <select class="form-select" name="type" aria-label="Default select example">
                                                                            '.$typestring.'
                                                                          </select>
                                                                        </div>
                                                                        <div class="col-6">
                                                                          <select class="form-select " name="vis" aria-label="Default select example">
                                                                            '.$vis.'
                                                                          </select>
                                                                        </div>
                                                                      </div>
                                                                </div>
                                                               
                                                                
                                                                <div class="form-check">
                                                                  <input name="kopyapicname" class="form-check-input" type="checkbox" value="'.$postacek["pic_name"].'" id="flexCheckDefault">
                                                                  <label class="form-check-label text-primary fw-bold" for="flexCheckDefault">
                                                                    Yeni Ürün Olarak Kayıt et.
                                                                  </label>
                                                                </div>
                                                            
                                                            
                                                        ';
}elseif ($_POST['name']=="katguncelle") {
  $id=$_POST['val'];
  $selectstring="";
   
                                    
                                     $postasor = $db->prepare("SELECT * FROM category where category_id = $id");
                                     $postasor->execute();
                                      $postacek=$postasor->fetch(PDO::FETCH_ASSOC);
                                      if ($postacek["visible"]== 1 ) {
                                        $selectstring = '<option value="1" selected >Aktif</option> <option value="0"  >Pasif</option>';
                                      }else{ 
                                        $selectstring ='<option value="0" selected >Pasif</option> <option value="1"  >Aktif</option>';
                                      }
                                    
                                                           echo '         <div class="form-group">
                                                                    <input name="idguncellekategori" type="text"  value="'.$postacek["category_id"].'" placeholder="İsim"
                                                                        class="form-control" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">İsim</span>
                                                                      </div>
                                                                      <input name="adguncellekategori" type="text"  value="'.$postacek["category_name"].'" placeholder="İsim"
                                                                        class="form-control" aria-describedby="basic-addon1">
                                                                    </div>
                                                                    
                                                                </div>
                                                                 <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                      <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">Görünürlük</span>
                                                                      </div>
                                                                      
                                                                        <select type="text" name="visible" value="" placeholder="Görünürlük"
                                                                        class="form-control">'.$selectstring.'

                                                                             
                                                                        </select>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="form-group ps-4" >
                                                                     <img id="preview" style="max-width: 200px; max-height: 200px;" src="'.$postacek["cat_pic_name"].'"  class="previewadd img-thumbnail">
                                                                    
                                                                </div>

                                                                ';
}elseif ($_POST['name'] == "extraguncelle") {
  $id=$_POST['val'];
  $selectstring="";
  $postasor = $db->prepare("SELECT * from extras where grup_id=$id");
  $postasor->execute();
  $extras="";

  while ($postacek = $postasor->fetch(PDO::FETCH_ASSOC)) {
     if ($postacek["visible"]== 1 ) {
      $selectstring ='<option value="1" selected >Aktif</option> <option value="0">Pasif</option>';
     }else{ 
      $selectstring ='<option value="0" selected >Pasif</option> <option value="1">Aktif</option>';
     } 
     $extras=$extras.'<tr id="'.$postacek["extra_id"].'extrupdate">
     <td>
     <input type="hidden"  value="'.$postacek["extra_id"].'" name="exid[]" class="form-control" placeholder="Özellik Adı">
     <input type="text"  value="'.$postacek["extra_ad"].'" name="exadg[]" class="form-control" placeholder="Özellik Adı">
     </td>
     <td>
     <input type="text" value="'.$postacek["extra_fiyat"].'" name="exfiyatg[]" class="form-control" placeholder="Özellik Fiyatı">
     </td>
     <td>
     <select name="exvisibleg[]" class="form-select" aria-label="Default select example">
      '.$selectstring.'
      </select>
     </td>
     <td>
     <div class="form-check form-switch">
        <input class="sw form-check-input" name="exdelg[]" value="1" data-id="'.$postacek["extra_id"].'extrupdate" type="checkbox" id="flexSwitchCheckChecked" checked>
      </div>
     </td>
     </tr>
        ';
  }
  $postasor = $db->prepare("SELECT * from extra_group where group_id=$id");
  $postasor->execute();
  $postacek = $postasor->fetch(PDO::FETCH_ASSOC);
  if ($postacek["grup_type"]== 1 ) {
    $selectstring = '<option value="1" selected >Tekli Seçim</option> <option value="0">Çoklu Seçim</option>';
  }else{ 
    $selectstring ='<option value="0" selected >Çoklu Seçim</option> <option value="1">Tekli Seçim</option>';
  }
  $selectstringvisible="";
  if ($postacek["visible"]== 1 ) {
    $selectstringvisible = '<option value="1" selected >Aktif</option> <option value="0"  >Pasif</option>';
  }else{ 
    $selectstringvisible ='<option value="0" selected >Pasif</option> <option value="1"  >Aktif</option>';
  }
  echo '<div class="form-group">
    <input name="extraupdate" type="hidden"  value="'.$postacek["group_id"].'" placeholder="Grup Adı" class="form-control">
    <input name="özellikgrupad" type="text"  value="'.$postacek["grup_name"].'" placeholder="Grup Adı" class="form-control">
  </div>
  <div class="row">
   <div class="col">
   <h5>Seçim Türü</h5>
     <select name="tip" class="form-select" aria-label="Default select example">
    '.$selectstring.'
  </select>
   </div>
   <div class="col">
   <h5>Görünürlük</h5>
     <select name="visible" class="form-select" aria-label="Default select example">
    '.$selectstringvisible.'
  </select>
   </div>
 </div>
  
  
  <div id="exupdatediv" class="form-group verticalLine mt-2">
    <h4 class="pbaslık fw-bold">Ürün İçeriği Ekle</h4>
    <div  class="row">
      <div class="col">
        <div class="form-group">
          <input id="exisim" type="text" value="" placeholder="Extra İsmi" class="form-control">
        </div>
      </div>   
      <div class="col">
        <div class="form-group">
          <input id="exfiyat" type="text" value="" placeholder="Extra Fiyatı" class="form-control">
        </div>
      </div>
      <div class="col">
        <button type="button" data-value="exupdatediv" class="exekle btn btn-primary">EKLE</button>
      </div>
    </div>
    <div class="divider divider-left-center">
      <div class="divider-text">
        <p class="pbaslık fw-bold">Eklenen Extralar</p>
      </div>
    </div>
    <div class="panel" >
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr>
              <th>İçerik</th>
              <th>Fiyat</th>
              <th>Görünürlük</th>
              <th>Sil</th>
            </tr>
          </thead>
          <tbody id="extras">'.$extras.'
           </tbody>
         </table>
       </div>
     </div>
   </div>';
  
 



  
}








 ?>
 
