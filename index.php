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
    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cutlery fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    At least
                                    <div class="huge">
                                      <?php
                                        include 'conn.php';
                                        $sql = "SELECT name FROM ingredients WHERE id = '$_SESSION[id]'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($res);
                                        $ingredients = $row['name'];
                                        while($row = mysqli_fetch_assoc($res)){
                                          $ingredients = $ingredients . ", " . $row['name'];
                                        }
                                        $url = "http://food2fork.com/api/search?key=390d0b2ce01701c07631dc39aa7bbd5b&q=".$ingredients."";
                                        $json = file_get_contents($url);
                                        $recipes = json_decode($json, true);
                                        echo $recipes['count'];
                                      ?>
                                    </div>
                                    <div>Recipes were found</div>
                                </div>
                            </div>
                        </div>
                        <a href="myrecipes.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Recipes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        include 'conn.php';
                                        $sql = "SELECT name FROM ingredients WHERE id = '$_SESSION[id]'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($res);
                                        echo mysqli_num_rows($res);
                                      ?>
                                    </div>
                                    <div>Items are in your pantry</div>
                                </div>
                            </div>
                        </div>
                        <a href="mypantry.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Pantry</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-warning fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    You've registered
                                    <div class="huge">
                                      <?php
                                        include 'conn.php';
                                        $sql = "SELECT allergie FROM allergies WHERE id = '$_SESSION[id]'";
                                        $res = mysqli_query($con, $sql);
                                        echo mysqli_num_rows($res);
                                      ?>
                                    </div>
                                    <div>Allergies</div>
                                </div>
                            </div>
                        </div>
                        <a href="myallergies.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Allergen(s)</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- logout -->
    <script type="text/javascript">
        $('#logout').click(function(e){
            e.preventDefault();
            $.post('login.php', {'logout': true}).done(function(){
                window.location = "login.html";
            });
        })
    </script>

</body>

</html>
