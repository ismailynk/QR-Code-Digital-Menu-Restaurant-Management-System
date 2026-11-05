$(document).ready(function(){//dosya hazır olunca
  $(".ajaxbtn").on("click", function(){ // ajaxbtn idli elemana tıklandığında
    var name=$(this).data("value");//data-value değerini al
    var myform = document.getElementById(name);//değerden gelen ismli formu tut
    var gonderilenform= new FormData(myform);//formu form data yap
    $.ajax({
      url:'ajax.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
      contentType:false,
      cache:false,
      processData:false,
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        Toastify({
            text: e,
            duration: 3000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#0086D2",//Green Color code that mean is update Succesfull
        }).showToast();
      }
    });
  });
//----------DELETE----------
   $(".ajaxbtndelete").on("click", function(){ // ajaxbtn idli elemana tıklandığında
    
    var id=$(this).data("value");//data-value değerini al
    var type=$(this).data("id");

    $.ajax({
      url:'ajax.php', // serileştirilen değerleri ajax.php dosyasına
      type:'POST', // post metodu ile 
      data:{"deleteid":id,"type":type}, // yukarıda serileştirdiğimiz gonderilenform değişkeni
      success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
        Toastify({
            text: e,
            duration: 3000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#0086D2",//Green Color code that mean is update Succesfull
        }).showToast();
      }
    });
  });
});
