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

    $('#bouton_supprimer').hide();
    $("select[name='nom_contenu']").change(function () {


        $('#bouton_supprimer').show();

        var num = String("#"+$(this).val());
        var content = $(""+num+"").text();
        var numero=String($(this).val());
        console.log(content);
        tinymce.activeEditor.setContent('<span>'+content+'</span>');

    });


    $("select[name='type_capteurs']").change(function () {
        $('#bouton_capteur').toggle();

    });
<<<<<<< HEAD

    $(".Add_mission_btn").click(function(event){
        $(".add_mission").toggle();
        $("input:checked", "td").clone().appendTo("#checkbox_transfer");
    });

    $(".Modifier_btn").click(function(event){
        $(".modifier").toggle();
    });

    
}); 
=======
});


>>>>>>> fa91dd07d0bb797cfa820575297fba63d92e4ba9


