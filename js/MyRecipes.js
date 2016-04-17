$(document).ready(function(){
  $("img").click(function(){
    var rId = $(this).attr('id');
    $.post("fetchRecipe.php", {rId: rId}, function(data){
      $("#targetDiv_recipe").html(data);
      $("#targetDiv_recipe").fadeIn(300);
      $('#targetDiv_recipe').click();
    });
  });
  // *********************************************
  $("#targetDiv_recipe").delegate("#sendRecipe","click",function(){
    var rId = $('#rId').val();
    var noe = $('#noe').val();
    $.post("sendRecipe.php", {rId: rId, noe:noe}, function(data){
      $("#message_sent").html(data);
      $("#message_sent").fadeIn(300);
      // $('#message_sent').click();
    });
  });
});
