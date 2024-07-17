$(".searchbtn").click(function(){
  $(this).toggleClass("bg-green");
  $(".fas").toggleClass("color-white");
  $(".input").focus().toggleClass("active-width").val('');
});