<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>College Portal</title>

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
            <h1 class="page-header">College Portal
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Image Header -->
    <div class="row">
        <div class="col-lg-12">
            <img class="img-responsive" src="images/college.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->

    <!-- Service Tabs -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">College: the place we go to learn</h2>
        </div>
        <div class="col-lg-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Can't find your college or university?</a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-list"></i> Register A College</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                    <h4>Can't find your college or university?</h4>
                    <p>If your university or college is not listed you can register it here.</p>
                </div>
                <div class="tab-pane fade" id="service-two">
                    <h4>Register As Super Admin</h4>
                    <form action="#" method="post">
                        <fieldset class="form-group">
                            <label for="registerFirstUniversity">First Name</label>
                            <input type="text" class="form-control" id="registerFirstUniversity" placeholder="First Name" name="registerFirstUniversity">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerLastUniversity">Last Name</label>
                            <input type="text" class="form-control" id="registerLastUniversity" placeholder="Last Name" name="registerLastUniversity">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerEmailUniversity">Email address</label>
                            <input type="email" class="form-control" id="registerEmailUniversity" placeholder="Enter email" name="registerEmailUniversity">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerPasswordUniversity">Password</label>
                            <input type="password" class="form-control" id="registerPasswordUniversity" placeholder="Password" name="registerPasswordUniversity">
                        </fieldset>                        
                        <hr>
                        <fieldset class="form-group">
                            <label for="registerNameUniversity">School Name</label>
                            <input type="text" class="form-control" id="registerNameUniversity" placeholder="UCF" name="registerNameUniversity">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerDescUniversity">School Description</label>
                            <input type="text" class="form-control" id="registerDescUniversity" placeholder="A little tidbit about your school." name="registerDescUniversity">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerAttendUniversity">School Attendence</label>
                            <input type="text" class="form-control" id="registerAttendUniversity" placeholder="How many students attend your school?" name="registerAttendUniversity">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerStreetUniversity">Your School's Address</label>
                            <input type="text" class="form-control" id="registerStreetUniversity" placeholder="Street" name="registerStreetUniversity">
                            <input type="text" class="form-control" id="registerCityUniversity" placeholder="City" name="registerCityUniversity">
                            <input type="text" class="form-control" id="registerZipUniversity" placeholder="Zip Code" name="registerZipUniversity">
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
                    $firstName =  -1;
                    $lastName =  -1;
                    $email = -1;
                    $password = -1;
                    $name =  -1;                    
                    $description = -1;
                    $amount_stu = -1;
                    $street = -1;
                    $city = -1;
                    $zip = -1;

                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                    $firstName =  $_POST["registerFirstUniversity"];
                    $lastName =  $_POST["registerLastUniversity"];
                    $email = $_POST["registerEmailUniversity"];
                    $passwordhash = $_POST["registerPasswordUniversity"];
                    $name =  $_POST["registerNameUniversity"];
                    $description = $_POST["registerDescUniversity"];
                    $amount_stu = $_POST["registerAttendUniversity"];
                    $street = $_POST["registerStreetUniversity"];
                    $city = $_POST["registerCityUniversity"];
                    $zip = $_POST["registerZipUniversity"];

                    $sql = mysqli_query($conn, "INSERT INTO university (name, description, amount_stu, street, city, zip)VALUES ('$name','$description', '$amount_stu', '$street', '$city', '$zip')") or die();

                    $uid = mysqli_insert_id($conn);

                    $sql = mysqli_query($conn, "INSERT INTO superadmins (firstname, lastname, username, passwordhash, university_ID) VALUES ('$firstName', '$lastName', '$email', '$passwordhash, '$name')") or die();

                    $sql = mysqli_query($conn, "INSERT INTO user (firstname, lastname, username, passwordhash, university_id, privilegeLevel, type) VALUES ('$firstName', '$lastName', '$email', '$passwordhash, '$name', '3', 'SuperAdmin')") or die();

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
