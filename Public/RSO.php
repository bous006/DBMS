<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RSO Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/DBMS.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

  <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">College Event Planner</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">                
                    <li>
                        <a href="student.php">Student Portal</a>
                    </li>
                    <li>
                        <a href="RSO.php">RSO Portal</a>
                    </li>
                    <li>
                        <a href="college.php">College Portal</a>
                    </li>
                    <li class="dropdown">
                                <a href="event.php">View Events</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <br>
            <h1 class="page-header">RSO Portal
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Image Header -->
    <div class="row">
        <div class="col-lg-12">
            <img class="img-responsive" src="images/rso.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->

    <!-- Service Tabs -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Ready to make an RSO?</h2>
        </div>
        <div class="col-lg-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> What is an RSO?</a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-list"></i> Register A RSO</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                    <h4>What is an RSO?</h4>
                    <p>An RSO is a Registered Student Organization (RSO). Organizations can be dedicated to a wide array of interests. If you can't find an RSO that matches your interests, create your own!</p>
                </div>
                <div class="tab-pane fade" id="service-two">
                    <h4>Register A RSO</h4>
                    <form action="#" method="post">
                    <fieldset class="form-group">
                            <label for="registerNameRso">RSO Name</label>
                            <input type="text" class="form-control" id="registerNameRso" placeholder="ex. Pokemon Club" name="registerNameRso">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerDescRso">RSO Description</label>
                            <input type="text" class="form-control" id="registerDescRso" placeholder="Last Name" name="registerDescRso">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerAdminRso">Email Address of Admin</label>
                            <input type="email" class="form-control" id="registerAdminRso" placeholder="Enter email" name="registerAdminRso">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registermem1Rso">Email Addresses of five members</label>
                            <input type="email" class="form-control" id="registermem1Rso" placeholder="Member 1" name="registermem1Rso">
                            <input type="email" class="form-control" id="registermem2Rso" placeholder="Member 2" name="registermem2Rso">
                            <input type="email" class="form-control" id="registermem3Rso" placeholder="Member 3" name="registermem3Rso">
                            <input type="email" class="form-control" id="registermem4Rso" placeholder="Member 4" name="registermem4Rso">
                            <input type="email" class="form-control" id="registermem5Rso" placeholder="Member 5" name="registermem5Rso">
                        </fieldset>
                        <input id="submit" name="submit" type="submit" value="submit" class="btn btn-primary">
                  </form>
              </div>
          </div>

      </div>
  </div>
  <hr>

  <!-- Footer -->
  <footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; College Event Planner 2016</p>
        </div>
    </div>
</footer>

</div>
<!-- /.container -->

<?php

                if (isset($_POST['submit']))
                {
                    $student_creator =  -1;
                    $member1 = -1;
                    $member2 = -1;
                    $member3 = -1;
                    $member4 = -1;
                    $member5 = -1;
                    $rsoName = -1;
                    $rsoDesc = -1;


                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                   
                    $student_creator =  $_POST["registerAdminRso"];
                    $member1 = $_POST["registermem1Rso"];
                    $member2 = $_POST["registermem2Rso"];
                    $member3 = $_POST["registermem3Rso"];
                    $member4 = $_POST["registermem4Rso"];
                    $member5 = $_POST["registermem5Rso"];
                    $rsoName = $_POST["registerNameRso"];
                    $rsoDesc = $_POST["registerDescRso"];

                    $sql = mysqli_query($conn, "INSERT INTO rso (student_creator, member1, member2, member3, member4, member5, rsoname, description)VALUES ('$student_creator','$member1','$member2', '$member3', '$member4', 'member5', 'rsoName', 'rsoDesc')") or die(mysqli_error($conn));

                    $rsoid = mysqli_insert_id($conn);

                    if ($conn->multi_query($sql) === TRUE) {
                        echo "New records created successfully";
                    } else {
                        
                    }

                    mysqli_close($conn);
                }
               //
                ?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
