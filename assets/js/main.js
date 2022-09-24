$(document).ready(function(){




$('.verifier').on('click',function(){
    var msg = " Are you sure?";
    var id = $(this).data('id');
    var page = $(this).data('page');
    if(confirm(msg)){
        document.location.href=page+'/delete?id='+id;
    }
})






})