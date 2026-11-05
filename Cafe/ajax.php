<?php 	
include 'connection.php';
$db = conopen();
extract($_POST);
error_reporting(0);
$data = $_FILES['file_upload']; //post edilen dosya verisi

//---------PİC LOAD START------------
function pic_upload($pic,$path)
{
      $dosya_adi   =    $pic["name"];  //Dsoya adını aldık.
      $dir = 'CafeDB/'.$path; //dosyalarin kaydedileceği klasor yolu
      if ($pic["size"]<1024*1024){//Dosya boyutu  aldık ve 1Mb'tan az olmasını söyledik.
            if ($pic["type"]=="image/jpeg"){  //Dosya tipi aldık ve sadece jpeg olmasını söyledik.
                  //Resimi kayıt ederken yeni bir isim oluşturalım
                  $uret=array("cv","fg","th","lu","er");
                  $dots = explode(".",$dosya_adi);
                  $uzanti = $dots[(count($dots)-1)];
                  $dadı=$dots[0];
                  $sayi_tut=rand(1,10000);
                  //$dadı=substr($dosya_adi,0,strlen($dosya_adi)-4)
                  $yeni_ad=str_replace(" ", "",$dir.$dadı.$uret[rand(0,4)].$sayi_tut.".".$uzanti);
                  if (move_uploaded_file($pic["tmp_name"],$yeni_ad)){
                        return $yeni_ad;
                  }else{
                        return false;
                  }
            }else{
                  $result=false;
            }
      }else{
            $result=false;          
      }
      return $result;
}
//---------PİC LOAD END------------


//-----------INSERTİNG product START--------------
function inserting($picname)
{
      $db = conopen();
      extract($_POST);
      try{
            $sql=$db->prepare("INSERT INTO menu set product_name=:p,product_category=:k,product_price=:fiyat,product_first_exp=:bir,product_second_exp=:iki,pic_name=:picname,type=:t,product_visible=:vis ");
            $ekle = $sql->execute(array(
                  "p" => $txtürüneklead,
                  "k" => $txtkategori,
                  "fiyat" => $txtfiyat,
                  "bir" => $txtfirstexp,
                  "iki" => $txtsecondexp,
                  "picname" => $picname,
                  "t" => $type,
                  "vis" => $vis,
                  ));
            if ($ekle) {
                  $result= "İşlem Başarılı.";
            }else {
                  $result= "Ekleme Başarısız.";
            }
             
      }catch (PDOException $e) {
            $error=$e->getMessage();
            $result=$error;
      }
      return $result;
}
//-----------INsERTİNG END--------------


//-----------UPDATE product START--------------
function update($picname)
{
      $db = conopen();
      extract($_POST);
      if ($picname !== "CafeDB/img/custom-pics/icon-picture.jpg") {
            try{  
                  $sql=$db->prepare("UPDATE menu set product_name=:p,product_category=:k,product_price=:fiyat,product_first_exp=:bir,product_second_exp=:iki,pic_name=:picname,type=:t,product_visible=:vis WHERE product_id=:id");
                  $ekle = $sql->execute(array(
                        "p" => $txtürünguncellead,
                        "k" => $txtkategori,
                        "fiyat" => $price,
                        "bir" => $firstexp,
                        "iki" => $secondexp,
                        "picname" => $picname,
                        "t" => $type,
                        "vis" => $vis,
                        "id" => $txtguncelleid,
                    ));
                  if ($ekle) {
                        $result= "Güncelleme Başarılı.";
                  }else {
                        $result= "Güncelleme Başarısız. ";
                  }
            }catch (PDOException $e) {
                  $error=$e->getMessage();
                  $result=$error;
            }
      }else{
            try{  
                  $sql=$db->prepare("UPDATE menu set product_name=:p,product_category=:k,product_price=:fiyat,product_first_exp=:bir,product_second_exp=:iki,type=:t,product_visible=:vis WHERE product_id=:id");
                  $ekle = $sql->execute(array(
                        "p" => $txtürünguncellead,
                        "k" => $txtkategori,
                        "fiyat" => $price,
                        "bir" => $firstexp,
                        "iki" => $secondexp,
                        "t" => $type,
                        "vis" => $vis,
                        "id" => $txtguncelleid,
                  ));
                  if ($ekle) {
                        $result= "Güncelleme Başarılı.";
                  }else {
                        $result= "Güncelleme Başarısız!!!";
                  }
            } catch (PDOException $e) {
                  $error=$e->getMessage();
                  $result=$error;
            }
      }
      return $result;
}
//-----------UPDATE END--------------

//---------INSERTİNG CATEGORY START-----------
function insert_category($picname){
      $db = conopen();
      extract($_POST);
       //$sql=$db->prepare("INSERT INTO category (category_name,cat_pic_name,visible) VALUES ($kategoriekle,$picname,1) ");
      try {
            $sql=$db->prepare("INSERT INTO category set category_name=:c,cat_pic_name=:n,visible=:vis");
            $ekle = $sql->execute(array(
                  "c" => $kategoriekle,
                  "n" => $picname,
                  "vis" => 1,
            ));
            if ($ekle) {
                  $result="Ekleme Başarılı.";
            }else{
                  $result="Ekleme Başarısız!!!";
            }
      
      } catch (PDOException $e) {
            $result=$e->getMessage();
            
      }
      return $result;
}
//-----------İNSERTİNG CATEGORY END-----------

//-----------UPDATE CATEGORY START------------
function update_category($picname)
{
      $db = conopen();
      extract($_POST);
      if ($picname!=="CafeDB/img/custom-pics/icon-picture.jpg") {
           try {
                  $sql=$db->prepare("UPDATE category SET category_name=?,cat_pic_name=?,visible=? WHERE category_id=? ");
                  $güncelle=$sql->execute(array($adguncellekategori,$picname,$visible,$idguncellekategori));
                  if ($güncelle) {
                        $result="Kategori Güncelleme Başarılı.";
                  }else{
                        $result="Kategori Güncelleme BAŞARISIZ!!!";
                  }
            } catch (PDOException $e) {
                  $result="Kategori Güncelleme BAŞARISIZ!!!";
            }
      }else{
            try {
                  $sql=$db->prepare("UPDATE category SET category_name=?,visible=? WHERE category_id=? ");
                  $güncelle=$sql->execute(array($adguncellekategori,$visible,$idguncellekategori));
                  if ($güncelle) {
                        $result="Kategori Güncelleme Başarılı.";
                  }else{
                        $result="Kategori Güncelleme BAŞARISIZ!!!";
                  }
            } catch (PDOException $e) {
                  $result="Kategori Güncelleme BAŞARISIZ!!!";
            }
      }
      return $result; 
}
//--------------------------UPDATE CATEGORY END---------------------------
//---------INSERTİNG GROUP START-----------
function insert_group(){
      $db = conopen();
      extract($_POST);
      try {
            $sql=$db->prepare("INSERT INTO extra_group set grup_name=:name,grup_type=:type,visible=:vis");
            $ekle = $sql->execute(array(
                  "name" => $özellikgrupad,
                  "type" => $type,
                  "vis" => 1,
            ));
            if ($ekle) {
                  $result="Ekleme Başarılı.";
            }else{
                  $result="Ekleme Başarısız!!!";
            }
      
      } catch (PDOException $e) {
            $result=$e->getMessage();
            
      }
      $id=$db->lastInsertID();
      return $id;
}
//-----------İNSERTİNG GROUP END-----------

//---------INSERTİNG Extras START-----------
function insert_extra($grup_id){
      $db = conopen();
      extract($_POST);
      $sql=$db->prepare("INSERT INTO extras set extra_ad=:name,extra_fiyat=:price,visible=:vis,grup_id=:grup_id");
      for ($i=0; $i < count($exad) ; $i++) { 
            try {
                  $ekle = $sql->execute(array(
                        "name" => $exad[$i],
                        "price" => $exfiyat[$i],
                        "vis" => 1,
                        "grup_id" => $grup_id,
                  ));
                  if ($ekle) {
                        $result="Ekleme Başarılı.";
                  }else{
                        $result="Ekleme Başarısız!!!";
                        break;
                  }
            } catch (PDOException $e) {
                  $result=$e->getMessage();
                  break;
            }
            
      }
      return $result;
}
//-----------İNSERTİNG extra END-----------


//-----------Updating group START-----------
function update_group($id)
{
      $db = conopen();
      extract($_POST);
      //echo $özellikgrupad."--".$tip."----".$visible."------".$id;
      try {
            $sql=$db->prepare("UPDATE extra_group SET grup_name=?,grup_type=?,visible=? WHERE group_id=? ");
            $güncelle=$sql->execute(array($özellikgrupad,$tip,$visible,$id));
            if ($güncelle) {
                  $result="Kategori Güncelleme Başarılı.";
            }else{
                  $result="Kategori Güncelleme BAŞARISIZ!!!";
            }
      } catch (PDOException $e) {
            $result=$e->getMessage();
      }
      return $result;


}
//-----------Updating group END--------------
//-----------update extra start-------------
function update_extras($id){
      $db = conopen();
      extract($_POST);
      $sql=$db->prepare("UPDATE extras SET extra_ad=?,extra_fiyat=?,visible=? WHERE group_id=? ");
      for ($i=0; $i < count($exid) ; $i++) {

            if ($exdelg[$i]==0) {echo "--",$exadg[$i],"--",$exfiyatg[$i],"--",$exvisibleg[$i];
                  /*echo $exadg[$i],"--";
                  $güncelle=$sql->execute(array(echo $exadg[$i],$exfiyatg[$i],$exvisibleg[$i];,$id))
                  if ($güncelle) {
                        $result="oldu";
                  }else{
                        $result="olmadı";
                  }*/
            } 
            
      }
      return $result;

}
//-----------update extra end---------------


//---------------------------------ürün EKLEME-----------------------------------------------------------------------------------
if (isset($txtürüneklead)) {
      $dosya_adi   =    $_FILES['file_upload']["name"];  //Dsoya adını aldık.
      if ($dosya_adi!=="") {
            $yeni_ad=pic_upload($_FILES['file_upload'],'uploaded_img/Product_imgs/');
            if ($yeni_ad !== false){
                $result=inserting($yeni_ad);
            }else{
                  $result= 'Dosya Yüklenemedi! Dosya yalnızca jpeg veya jpg formatında olabilir! Dosya boyutu 1 Mb ı geçmemeli!';
            }
      }else {
            $result=inserting("CafeDB/img/custom-pics/icon-picture.jpg");
            
      }
      echo $result; 
}
//-----------------------------------------------------------------ürün GÜNCELLEME----------------------------------------------------------------------------
if (isset($txtürünguncellead)) {
      $dosya_adi   =    $_FILES['file_upload']["name"];  //Dsoya adını aldık.
      if ($dosya_adi!=="") {
            $yeni_ad=pic_upload($_FILES['file_upload'],"uploaded_img/Product_imgs/");
            if ($yeni_ad !== false){
                $result=update($yeni_ad);  

            }else{
                  $result= 'Dosya Yüklenemedi! Dosya yalnızca jpeg veya jpg formatında olabilir! Dosya boyutu 1 Mb ı geçmemeli!!';
            }
      }else {
            $result=update("CafeDB/img/custom-pics/icon-picture.jpg");
                
      }echo $result;  
}

	
//----------------Kategori Ekle------------------
if (isset($kategoriekle)) {
      
      $dosya_adi   =    $_FILES['file_upload']["name"];  //Dsoya adını aldık.
      if ($dosya_adi!=="") {
            $yeni_ad=pic_upload($_FILES['file_upload'],'uploaded_img/Category_imgs/');
            if ($yeni_ad !== false){
                $result=insert_category($yeni_ad);  
            }else{
                  $result= 'Dosya Yüklenemedi! Dosya yalnızca jpeg veya jpg formatında olabilir! Dosya boyutu 1 Mb ı geçmemeli!';
            }
      }else {
            $result=insert_category("CafeDB/img/custom-pics/icon-picture.jpg");
            
      }
      echo $result; 

      
}

//--------------Kategori güncelle ---------------
if (isset($adguncellekategori)) {
      
      $dosya_adi   =    $_FILES['file_upload']["name"];  //Dsoya adını aldık.
      if ($dosya_adi!=="") {
            $yeni_ad=pic_upload($_FILES['file_upload'],"uploaded_img/Category_imgs/");
            if ($yeni_ad !== false){
                $result=update_category($yeni_ad);  
            }else{
                  $result= 'Dosya Yüklenemedi! Dosya yalnızca jpeg veya jpg formatında olabilir! Dosya boyutu 1 Mb ı geçmemeli!!';
            }
      }else {
            $result=update_category("CafeDB/img/custom-pics/icon-picture.jpg");
                
      }echo $result; 
}
if (isset($deleteid)) {
      
      if ($type=="category") {
            $sql = $db->prepare("DELETE FROM category WHERE category_id = $deleteid");
      }elseif($type=="product"){
            $sql = $db->prepare("DELETE FROM menu WHERE product_id = $deleteid");
      }elseif ($type=="extra-group") {
            $sql = $db->prepare("DELETE FROM extra_group WHERE group_id = $deleteid");
      }
      $sql->execute();
      if ($sql->rowCount() > 0) {
        $result=$sql->rowCount() . " Kayıt silindi.";
      } else {
        $result="Herhangi bir kayıt silinemedi.";
      }
      echo $result; 
      
}
if (isset($extraadd)) {
      $group_id=insert_group();
      echo insert_extra($group_id);
      
}
if (isset($extraupdate)) {
    //echo update_group($extraupdate);  
    //echo update_extras($extraupdate);

}







 ?>