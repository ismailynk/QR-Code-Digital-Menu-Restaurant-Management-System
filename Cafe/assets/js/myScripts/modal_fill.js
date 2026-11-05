//-----Güncelleme modalı doldurma--------
function modal(id,name){//Güncelleme modalın içeriğini gelen ID ye göre dolduruyor
        
        $.ajax({
              url:'veri.php', // serileştirilen değerleri ajax.php dosyasına
              type:'POST', // post metodu ile 
              data:{"val":id,"name":name}, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
              success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
                $("#formveri").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
                   
              }
        });
}

function silmodal(id){
const btn= document.getElementById("silmodalbuton");
btn.dataset.value=id; 
}