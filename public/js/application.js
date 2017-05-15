$(document).ready(function(){
	//Allow us to activate the text editor anytime we use a textarea tag
	tinymce.init({ selector:'textarea' });

	
	$(".addCapteur_btn").click(function(event) {
		$(".addCapteur").toggle();
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
