<!DOCTYPE html>
<html lang="en">
<?php
$con = mysqli_connect("localhost","root","", "dbms project");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Portal</title>

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
            <a class="navbar-brand" href="index.html">College Event Planner</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!--<a href="#" data-toggle="modal" data-target="#myModal1">Sign In</a>-->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="loginUserName">Username (Usually Email)</label>
                                            <input type="text" class="form-control" id="loginUserName" placeholder="Username (Usually Email)" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="loginPassword">Password</label>
                                            <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
                                            <div class="help-block text-right"><a href="">Forgot Password</a></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember Me
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <li>
                        <a href="student.html">Student Portal</a>
                    </li>
                    <li>
                        <a href="RSO.html">RSO Portal</a>
                    </li>
                    <li>
                        <a href="college.html">College Portal</a>
                    </li>
                    <li class="dropdown">
                                <a href="event.html">View Events</a>
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
            <h1 class="page-header">Student Portal
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Image Header -->
    <div class="row">
        <div class="col-lg-12">
            <img class="img-responsive" src="images/student.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->

    <!-- Service Tabs -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Take a look around</h2>
        </div>
        <div class="col-lg-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Basic Info</a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-list"></i> Register As Student</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                    <h4>Basic Info</h4>
                    <p>Students are what make College possible. Without willing minds to absorb the brainwashings of the institution there would be no reason for College to exist. Also, without students to pay exorbitant sums earn a degree there would be no reason to have such large collections of building where all could congregate. That said, please register as a Student on the next tab so you can get in touch with the many RSOs and Events on this site.</p>
                </div>
                <div class="tab-pane fade" id="service-two">
                    <h4>Register As Student</h4>
                    <form>
                        <fieldset class="form-group">
                            <label for="registerFirstStudent">Select Your School (Can't find your school? Register it on the "College Portal")</label>
                            <select class="form-control form-control-sm" id="selectSchool">
                                <option>UCF</option>
                                <option>UF</option>
                                <option>FSU</option>
                                <option>UGA</option>
                                <option>MIT</option>
                            </select>
                        </fieldset>                       
                        <fieldset class="form-group">
                            <label for="registerFirstStudent">First Name</label>
                            <input type="text" class="form-control" id="registerFirstStudent" placeholder="First Name">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerLastStudent">Last Name</label>
                            <input type="text" class="form-control" id="registerLastStudent" placeholder="Last Name">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerEmailStudent">Email address (This will be your username)</label>
                            <input type="email" class="form-control" id="registerEmailStudent" placeholder="Enter email">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerPasswordStudent">Password</label>
                            <input type="password" class="form-control" id="registerPasswordStudent" placeholder="Password">
                        </fieldset>
                        <button type="submit" class="btn btn-primary" value="submit" name="submit" id="submit">Register</button>
                    </form>
                </div>
                <?php

                if (isset($_POST['submit']))
                {
                	$name = -1;
                	$university_id = -1;
                	$username = -1;
                	$passwordhash = -1;

                	$con = mysqli_connect("localhost","root","", "dbms project");
					// Check connection
                	if (mysqli_connect_errno())
                	{
                		echo "Failed to connect to MySQL: " . mysqli_connect_error();
                	}

                	$firstname = $_POST["registerFirstStudent"];
                	$name = $firstname . $_POST[" registerLastStudent"];
                	$university_id = $_POST["selectSchool"];
                	$username = $_POST["registerEmailStudent"];
                	$passwordhash = $_POST["registerPasswordStudent"];

                	$sql = mysqli_query($connect, "INSERT INTO users ( name, university_id, username, passwordhash)
                		VALUES ('$name', '$university_id', '$username', '$passwordhash')")
                	or die(mysqli_error($connect));

                	$uid = mysqli_insert_id($connect);

                	$sql .= mysqli_query($connect, "INSERT INTO students ( uid, username, passwordhash, university_id) VALUES ('$uid', '$username', '$passwordhash', '$university_id')") or die(mysqli_error($connect));

                	$test = mysqli_quert($connect, "SELECT name FROM users");
                	echo "$test";

                	if ($conn->multi_query($sql) === TRUE) {
                		echo "New records created successfully";
                	} else {
                		echo "Error: " . $sql . "<br>" . $conn->error;
                	}

                	mysqli_close($connect);
                }
                ?>
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

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

