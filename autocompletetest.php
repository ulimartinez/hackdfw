<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>jQuery UI Autocomplete - Default functionality</title>


  <script src="bower_components\jquery-ui\external\jquery\jquery.js"></script>

  <script src="bower_components/jquery-ui/jquery-ui.js"></script>


  <script>

  $(function() {

    var availableTags = [

      "ActionScript",

      "AppleScript",

      "Asp",

      "BASIC",

      "C",

      "C++",

      "Clojure",

      "COBOL",

      "ColdFusion",

      "Erlang",

      "Fortran",

      "Groovy",

      "Haskell",

      "Java",

      "JavaScript",

      "Lisp",

      "Perl",

      "PHP",

      "Python",

      "Ruby",

      "Scala",

      "Scheme"

    ];

    $( "#tags" ).autocomplete({

      source: availableTags

    });

  });

  </script>

</head>

<body>



<div class="ui-widget">

  <label for="tags">Tags: </label>

  <input id="tags">

</div>





</body>

</html>
