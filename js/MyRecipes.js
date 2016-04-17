$(document).ready(function(){
  $("img").click(function(){
    var rId = $(this).attr('id');
    $.post("fetchRecipe.php", {rId: rId}, function(data){
      $("#targetDiv_recipe").html(data);
      $("#targetDiv_recipe").fadeIn(300);
    });
  });
});
