
// chuyển slide
$(document).ready(function() {
    $('#btn_right').click(function(event) {
       var slide_sau = $('.active').next();
       if(slide_sau.length!=0){
          $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
             $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
          });
          slide_sau.addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
             $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
          });
       }else{
          $('.active').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
             $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('active');
          });
          $('.slide:first-child').addClass('active').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
             $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
          });
       }
    });
 });
 //
 $(document).ready(function() {
    $('#btn_left').click(function(event) {
       var slide_sau = $('.active').next();
       if(slide_sau.length!=0){
          $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
             $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
          });
          slide_sau.addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
             $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
          });
       }else{
          $('.active').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
             $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('active');
          });
          $('.slide:first-child').addClass('active').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
             $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
          });
       }
    });
 });
 var auto_load=setInterval(function(){
   $('#btn_right').trigger('click');
 },5000);

 //chuyenslide product
$(document).ready(function() {
   $('#btn_right-product').click(function(event) {
      var slide_sau = $('.slide-block').next();
      if(slide_sau.length!=0){
         $('.slide-block').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('slide-block');
         });
         slide_sau.addClass('slide-block').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
         });
      }else{
         $('.slide-block').addClass('bien-mat-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-trai').removeClass('bien-mat-ben-trai').removeClass('slide-block');
         });
         $('.slideproduct:first-child').addClass('slide-block').addClass('di-vao-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-phai').removeClass('di-vao-ben-phai');
         });
      }
   });
});
//
$(document).ready(function() {
   $('#btn_left-product').click(function(event) {
      var slide_sau = $('.slide-block').next();
      if(slide_sau.length!=0){
         $('.slide-block').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('slide-block');
         });
         slide_sau.addClass('slide-block').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
         });
      }else{
         $('.slide-block').addClass('bien-mat-ben-phai').one('webkitAnimationEnd', function(event) {
            $('.bien-mat-ben-phai').removeClass('bien-mat-ben-phai').removeClass('slide-block');
         });
         $('.slideproduct:first-child').addClass('slide-block').addClass('di-vao-ben-trai').one('webkitAnimationEnd', function(event) {
            $('.di-vao-ben-trai').removeClass('di-vao-ben-trai');
         });
      }
   });
});
$('.angle-double-up').click(function(event){
   $('html, body').animate({scrollTop:0},3000);
});