$(document).ready(function(){
  $("#addIng").click(function(){
    var ing = $("#ing").val();
    var uni = $("#uni").val();
    var qty = $("#qty").val();
    $.post("insertRecord.php", {ing: ing, uni: uni, qty:qty}, function(data){
      $("#targetDiv").html(data);
      $("#targetDiv").fadeIn(300);
      $("#targetDiv").fadeOut(2000);
    });
    $.post("mypantry_table.php", {}, function(data){
      $("#mypantry_table").html(data);
    });
  });
});

$(document).ready(function(){
  $.get("http://food2fork.com/api/get/", {key: "c83c1fbed9af4883bc8d85b23596b560", rId: "35120"}, function(data){
    console.log(data);
  });
});
