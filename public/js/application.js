$(document).ready(function(){
	//Allow us to activate the text editor anytime we use a textarea tag
	tinymce.init({selector:'textarea'});

	
	$(".addCapteur_btn").click(function(event) {
		$(".addCapteur").toggle();
	});

    $(".addRoom_btn").click(function(event) {
        $(".addRoom").toggle();
    });
	
    $(".Mission_btn").click(function(event) {
        $(".Suivi").toggle();
    });
	
    $(".Modifier_btn").click(function(event) {
        $(".form_profil").toggle();
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

    
    var off = $(".green-text", "div.card-content").filter(function() {
       return $(this).text() === String('OFF');
    });
    
    off.css("color", "red");

    $(".piece_name").click(function(event) {
        $(this).siblings(".card_holder").toggle();
    });

    $(".paramClient_btn").click(function(event) {

        var offre = $("input:checked", "td").parent().siblings("#offre").text();
        $(".paramClient").toggle();

        $("input:checked", "td").clone().appendTo("#arrayCheckbox");

    });

    $(".notificationClient_btn").click(function(event) {

        var titre = $("input:checked", "td").parent().siblings("#titre").text();
        var contenu = $("input:checked", "td").parent().siblings("#contenu").text();
        $(".notificationClient").toggle();

        $("input:checked", "td").clone().appendTo("#arrayCheckbox");

    });
}); 


