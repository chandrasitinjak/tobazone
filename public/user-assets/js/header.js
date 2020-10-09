$(document).ready(function() {
  function fungsi(){
    console.log("andreas");
  }
  $("#sidebar1Collapse").on("click", function() {
    $("#sidebar1").addClass("active");
    console.log("andreas");
  });

  $("#sidebar1CollapseX").on("click", function() {
    $("#sidebar1").removeClass("active");
  });

  $("#sidebar1Collapse").on("click", function() {
    if ($("#sidebar1").hasClass("active")) {
      $(".overlay").addClass("visible");
      console.log("it's working!");
    }
  });

  $("#sidebar1CollapseX").on("click", function() {
    $(".overlay").removeClass("visible");
  });
});
