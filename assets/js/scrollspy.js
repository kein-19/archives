// // scroll spy
// $("#nav ul li a[href^='#']").on('click', function(e) {
//     // $('.nav-link a[href^='#']').on('click', function(e) {
//     // $('.nav-link').on('click', function(e) {
    
//         // prevent default anchor click behavior
//         e.preventDefault();
     
//         // store hash
//         var hash = this.hash;
     
//         // animate
//         $('html, body').animate({
//             scrollTop: $(hash).offset().top
//           }, 1000, function(){
     
//             // when done, add hash to url
//             // (default click behaviour)
//             window.location.hash = hash;
//           });
     
//      });

// this makes the height of each page equal to the height of the window
$('.page').css('height', $( window ).height());

// scrollspy section
(function($){
  //variable that will hold the href attr of the links in the menu
  var sections = [];
  //variable that stores the id of the section
  var id = false;
  //variable for the selection of the anchors in the navbar
  var $navbara = $('#navi a');
  
  $navbara.click(function(e){
    //prevent the page from refreshing
    e.preventDefault();
    //set the top offset animation and speed
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
},1000);
    hash($(this).attr('href'));
  });
  
  
  
  //select all the anchors in the navbar one after another
  $navbara.each(function(){
   // and adds them in the sections variable
    sections.push($($(this).attr('href')));
    
  })
  $(window).scroll(function(e){
    // scrollTop retains the value of the scroll top with the reference at the middle of the page
    var scrollTop = $(this).scrollTop() + ($(window).height()/2);
    //cycle through the values in sections array
    for (var i in sections) {
      var section = sections[i];
      //if scrollTop variable is bigger than the top offset of a section in the sections array then 
      if (scrollTop > section.offset().top){
        var scrolled_id = section.attr('id');
      }
    }
    if (scrolled_id !== id) {
      id = scrolled_id;
      $($navbara).removeClass('current');
      $('#navi a[href="#' + id + '"]').addClass('current'); 
    }
  })
})(jQuery);

hash = function(h){
  if (history.pushState){
    history.pushState(null, null, h);
  }else{
    location.hash = h;
  }
}
