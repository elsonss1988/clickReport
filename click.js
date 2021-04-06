async function clickName(id,nome, email, material, timestamp){
    console.log("var",id,nome, email, material, timestamp)
    $.ajax({
        url: "clickWriteReport.php",
        type: "POST",
        // data: "campo1=dado1&campo2=dado2&campo3=dado3",
        data: "id="+id+"&nome="+nome+"&email="+email+"&material="+material+"&timestamp="+timestamp,
        dataType: "html"
    
    }).done(function(resposta) {
        console.log(resposta);
    
    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);
    
    }).always(function() {
        console.log("completou");
    });
}