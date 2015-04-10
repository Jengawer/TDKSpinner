function sondur(){
    $('#btn').attr('disabled',true);
    yukleniyor();
    gonder();
}
function gonder(){
    $.ajax({
        type:'POST',
        url:'ozgunlestiricipost.php',
        data:$('#form').serialize(),
        success: function (msg) {
            $('#yaz').html(msg);
            $('#btn').removeAttr('disabled');
        }
    });
}
function yukleniyor(){
    $("#yaz").ajaxStart(function(){
        $(this).html('Bekleyin...');
    });
}