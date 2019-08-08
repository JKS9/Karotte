function notifCarts() {
    $.ajax({
        url: "http://localhost/Karotte/controller/refresh/cards.php",

        ifModified:true,
        success: function(content){
            $('#reloadCart').html(content); //id de la <div> à refresh
        }

    });
    setTimeout(notifCarts, 2000); //refresh toutes secondes (1 minute = 60000)
}

function message() {
    $.ajax({
        url: "http://localhost/Karotte/controller/refresh/message.php",

        ifModified:true,
        success: function(content){
            $('#messageri').html(content); //id de la <div> à refresh
        }

    });
    setTimeout(message, 6000); //refresh toutes secondes (1 minute = 60000)
}


notifCarts();
message();