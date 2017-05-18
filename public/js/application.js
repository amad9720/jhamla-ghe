$(document).ready(function(){
	//Allow us to activate the text editor anytime we use a textarea tag
	tinymce.init({ selector:'textarea' });

	
	$(".addCapteur_btn").click(function(event) {
		$(".addCapteur").toggle();
	});

    $(".paramCapteur_btn").click(function(event) {

        var type = $("input:checked", "td").parent().siblings("#type").text();
        var piece = $("input:checked", "td").parent().siblings("#piece").text();

        $(".textHolder").html("<p>Capteur : <b>" + type + "</b></br> piece actuelle : <b>" + piece + "</b></p>");
        $(".paramCapteur").toggle();

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



});

//JS Louis

function validateform() {
    if (document.formulaire.prenom.value==""){
        alert("Le champ prénom est vide");
        return false;
    }

    if (document.formulaire.nom.value==""){
        alert("Le champ nom est vide");
        return false;
    }

    if (document.formulaire.message.value==""){
        alert("Le champ message est vide");
        return false;
    }
    return true;
}
