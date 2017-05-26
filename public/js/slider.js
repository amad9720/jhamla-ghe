$(function(){
  
  var slide_duration = 7000;
  var slider_controls = $('.slider-controls');
  var slider_width = $('.slider').width();
  var slide_nb = $('.slider .slide').length;
  var slides = $('.slides');
  var auto_play = true;
  
 for (var i = 0; i < slide_nb; i++) {
   slider_controls.append('<div class="slider-control" id="slide-control-i>' +  '"</div>')
 }

  
  for (var i = 1; i < slide_nb; i++) {
    if (auto_play) {
     (function(ind) {
         setTimeout(function(){
           console.log('next');
           slides.animate({
             left: - (slider_width * ind)
           }, 1000);
         }, slide_duration * ind);
     })(i);
  } 
}

$('.slider-control').click(function(){
  var slide_to_go = $(this).index();
  console.log(slide_to_go);
  slides.animate({
    left:  - (slider_width * slide_to_go) }, 1000);
});
  auto_play = false;
});

