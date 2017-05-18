$(document).ready(function(){
	//Allow us to activate the text editor anytime we use a textarea tag
	tinymce.init({selector:'textarea'});

	
	$(".addCapteur_btn").click(function(event) {
		$(".addCapteur").toggle();
	});

    $(".paramCapteur_btn").click(function(event) {

        var type = $("input:checked", "td").parent().siblings("#type").text();
        var piece = $("input:checked", "td").parent().siblings("#piece").text();

        $(".textHolder").html("<p>Capteur : <b>" + type + "</b></br> piece actuelle : <b>" + piece + "</b></p>");
        $(".paramCapteur").toggle();

        $("input:checked", "td").clone().appendTo("#arrayCheckbox");

    });

    $('#selectAllBoxes').click(function(event){
        if(this.checked){
            $('.checkBoxes').each(function() {
                this.checked = true;
            });
        }else {
            $('.checkBoxes').each(function() {
                this.checked = false;
            });
        }
    });

    // $(".green-text").click(function(event){
    //     var idCapteur = $(this).attr('data-idcapteur');
    //     $(".function_holder").html("<?php $Capteur::capteur_switch("+ idCapteur +")?>");
    // });
    
    var off = $(".green-text", "div.card-content").filter(function() {
       return $(this).text() === String('OFF');
    });
    
    off.css("color", "red");
}); 
