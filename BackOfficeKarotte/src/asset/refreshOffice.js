function conversation() {
    $.ajax({
        url: "http://localhost/Karotte/BackOfficeKarotte/Controller/refreshOffice/conversation.php",

        ifModified:true,
        success: function(content){
            $('#Convs').html(content); //id de la <div> à refresh
        }

    });
    setTimeout(conversation, 2000); //refresh toutes secondes (1 minute = 60000)
}

conversation();