$(document).ready(function(){
  $("#addAlg").click(function(){
    var alg = $("#alg").val();
    availableTags.push(alg);
    $.post("insertAllergie.php", {alg: alg}, function(data){
      $("#targetDiv").html(data);
      $("#targetDiv").fadeIn(300);
      $("#targetDiv").fadeOut(2000);
    });
    $.post("myallergies_table.php", {}, function(data){
      $("#myallergies_table").html(data);
    });
  });
});
$(document).ready(function(){
  $("#clearAll").click(function(){
      $.post("emptyAllergies.php", {}, function(data){
        $("#myallergies_table").html(data);
      });
  });
});
