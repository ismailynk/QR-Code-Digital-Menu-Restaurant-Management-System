//------Ürün güncelleme kısmı resim önizleme-------
images.onchange = evt => {
  const [file] = images.files
  if (file) {
    preview.src = URL.createObjectURL(file)
  }
}


//------Ürün ekleme kısmı resim önizleme-------
imagesadd.onchange = evt => {
  const [file] = imagesadd.files
  if (file) {
    previewadd.src = URL.createObjectURL(file)
  }
}

/*function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewadd").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }*/
  /*$(document).ready(()=>{
  $('#images').change(function(){
    const file = this.files[0];
    console.log(file);
    if (file){
    let reader = new FileReader();
    reader.onload = function(event){
      console.log(event.target.result);
      $('.previewadd').attr('src', event.target.result);
    }
    reader.readAsDataURL(file);
    }
  });
  });*/











