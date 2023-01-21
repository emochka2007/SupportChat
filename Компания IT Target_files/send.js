function send() {

    var name = send_name.value ;
    
    var mess = send_mess.value ;
    
    var jqxhr = $.post( "submit.php", { name,mess,},
    
    function( data ) { $( "#show_rezult" ).html(data); }
    
    )
    
    .always(function() {
    
    setTimeout(function(){show_rezult.innerHTML="&nbsp;";}, 2000);
    
    });
    
    return false;
    
    }