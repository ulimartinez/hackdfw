<?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("Location: login.html"); /* Redirect browser */
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cook Pal</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('navbar.php'); ?>

        <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header"><i class="fa fa-shopping-cart fa-1x"></i> My Pantry</h1>
                  <div id="mypantry_table">
                    <!-- List of user's ingredients -->
                    <?php include 'mypantry_table.php'; ?>
                  </div>
                  <h1>Add Item</h1>
                  <hr />
                  <!-- <form class="form-inline" role="form" action="insertRecord.php" method="POST"> -->
                  <form class="form-inline" role="form" style="display:inline-block;">
                    <div class="form-group">
                      <label for="email">Ingredient:</label>
                      <input id="ing" class="form-control" required autofocus>
                    </div>
                    <!-- <div id="othIng" class="form-group">
                      <label for="uni">Other:</label>
                      <input class="form-control" id="oth"/>
                    </div> -->
                    <div class="form-group">
                      <label for="uni">Unit:</label>
                      <select class="form-control" id="uni" name="uni">
                        <option>Lb(s)</option>
                        <option>GAL</option>
                        <option>NUM</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="qty">Quantity:</label>
                      <input type="number" step="0.01" class="form-control" id="qty" name="qty" required>
                    </div>
                  </form>
                  <button style="display:inline-block;" id="addIng" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i> Add</button><br />
                  <div id="targetDiv"></div><br />
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- jQuery UI -->
    <script src="bower_components/jquery-ui/jquery-ui.js"></script>

    <script>
    var availableTags;
    $(function() {

      availableTags = [
        <?php
          // require_once('conn.php');
          $sql = "SELECT * FROM ingredient_list";
          $results = mysqli_query($con, $sql);
          $total = mysqli_num_rows($results);
          if($total > 0){
            $i = 1;
            while($row = mysqli_fetch_assoc($results)){
              if($i == $total){
                echo '"'. $row['ing'] .'"';
              }else{
                echo '"' . $row['ing'] . '",';
              }
              $i++;
            }
          }
        ?>
      ];

      $( "#ing" ).autocomplete({

        source: availableTags

      });

    });

    </script>

    <!-- MyPantry.js -->
    <script src="js/mypantry.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
