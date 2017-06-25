$(document).ready(function()
{
	//Allow us to activate the text editor anytime we use a textarea tag
	tinymce.init({
        selector:'textarea',
        entities : '160,nbsp,162,cent,8364,euro,163,pound',
        entity_encoding : "raw"
    });


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

    $(".paramClient_btn").click(function(event) {

        var offre = $("input:checked", "td").parent().siblings("#offre").text();
        $(".paramClient").toggle();

        $("input:checked", "td").clone().appendTo("#arrayCheckbox");

    });

    $(".notificationClient_btn").click(function(event) {

        $(".notificationClient").toggle();

        $("input:checked", "td").clone().appendTo(".checkBoxTransfer");

    });

    // $(".detail_btn").click(function(event) {
    //
    //     $(".detail").toggle();
    //
    //     $("input:checked", "td").clone().appendTo("#arrayCheckbox");
    //
    // });

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
        $('#titre_contenu');

        var num = String("#"+$(this).val());
        var content = $(""+num+"").text();
        var numero=String($(this).val());
        console.log(content);
        tinymce.activeEditor.setContent('<span>'+content+'</span>');

    });


    $("select[name='type_role']").change(function () {
        $('#bouton_role').toggle();

    });


    $("select[name='type_capteurs']").change(function () {
        $('#bouton_capteur').toggle();

    });

    $(".Add_mission_btn").click(function(event){
        $(".add_mission").toggle();
        $("input:checked", "td").clone().appendTo("#checkbox_transfer");
    });

    $(".Modifier_btn").click(function(event){
        $(".modifier").toggle();
    });

    $(".Modifier_client_btn").click(function(event){
        $(".form_profil").toggle();
    });

    $(".Mission_client_btn").click(function(event){
        $(".Suivi").toggle();
    });

    $(".Facture_btn").click(function(event){
        $(".Factures").toggle();
    });

    });

$("#feature1").click(function() {
    $('html, body').animate({
        scrollTop: $("#container1").offset().top
    }, 1000);
});

$("#feature2").click(function() {
    $('html, body').animate({
        scrollTop: $("#container2").offset().top
    }, 1000);
});


$("#feature3").click(function() {
    $('html, body').animate({
        scrollTop: $("#container3").offset().top
    }, 1000);
});

$('#feature1').hover(
    function(){
        $(this).animate({'top':'-=20px','left':'-=20px', 'height':'+=40px'});
    },
    function(){
        $(this).animate({'top':'+=20px','left':'+=20px', 'height':'-=40px' });
    }
);

$('#feature2').hover(
    function(){
        $(this).animate({'top':'-=20px','left':'-=20px', 'height':'+=40px'});
    },
    function(){
        $(this).animate({'top':'+=20px','left':'+=20px', 'height':'-=40px' });
    }
);

$('#feature3').hover(
    function(){
        $(this).animate({'top':'-=20px','left':'-=20px', 'height':'+=40px'});
    },
    function(){
        $(this).animate({'top':'+=20px','left':'+=20px', 'height':'-=40px' });
    }
);

$(".paramOffre_btn").click(function(event) {

    $(".paramOffre").toggle();

    $("input:checked", "td").clone().appendTo("#arrayCheckbox");

});

    $(".addOffre_btn").click(function(event) {

    $(".addOffre").toggle();

    $("input:checked", "td").clone().appendTo(".checkBoxTransfer");

});