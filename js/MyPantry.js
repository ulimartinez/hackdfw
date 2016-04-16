$(document).ready(function(){
  $("#addIng").click(function(){
    var ing = $("#ing").val();
    var uni = $("#uni").val();
    var qty = $("#qty").val();
    $.post("insertRecord.php", {ing: ing, uni: uni, qty:qty}, function(data){
      $("#targetDiv").html(data);
      $("#targetDiv").fadeIn(300);
      $("#targetDiv").fadeOut(3000);
    });
    $.post("mypantry_table.php", {}, function(data){
      $("#mypantry_table").html(data);
    });
  });
});
