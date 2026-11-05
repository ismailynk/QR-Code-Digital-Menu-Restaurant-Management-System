$(document).ready(function() {
    var ct=0;
    $("body").on("click",".exekle",function(){
        var exdivname=ct+"extr";
        var trname="#"+$(this).data("value");
        var ad=$(trname+" #exisim").val();
        var fiyat=$(trname+" #exfiyat").val();
        $(trname+" #extras").prepend('<tr id="'+exdivname+'"><td><input type="text"  value="'+ad+'" name="exad[]" class="form-control" placeholder="Özellik Adı"></td><td><input type="text" value="'+fiyat+'" name="exfiyat[]" class="form-control" placeholder="Özellik Fiyatı"></td><td><select disabled name="type" class="form-select" aria-label="Default select example"><option value="1" selected >Aktif</option></select></td><td><button class="btn btn-danger exdelete" type="button" value="'+exdivname+'">SİL</button></td></tr> ');
        $(trname+" #exisim").val("");
        $(trname+" #exfiyat").val("");
        ct++;
    });
    $("body").on("click",".exdelete",function(){
        var val=$(this).val();
        var exdivname="#"+val;
        $(exdivname).remove();
        
        
    });
    $("body").on("change",".sw",function(){
        var swname="#"+$(this).data("id");
        if(this.checked) {
            $(swname).removeClass("bg-warning");
            $(this).val("1");
        }else{
            $(swname).addClass("bg-warning");
            $(this).val("0");
        }
    });
});