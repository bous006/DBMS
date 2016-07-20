<!DOCTYPE html>
<html lang="en">

<?php
                    $conn = new mysqli("localhost", "root", "root", "dbms");
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                    }

                    $query = mysqli_query($conn, "SELECT name FROM university ");

                    //$query = "SELECT name FROM university";
                    //$result = $conn->query($query);

                    while($row = $query->fetch_assoc()){
                        $categories[] = array("name" => $row['name']);
                    }
                    
                    $jsonUniversity = json_encode($categories);
                                mysqli_close($conn);

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

    <script type='text/javascript'>
     
      function loadCategories(){
      <?php
        echo "var categories = $jsonUniversity; \n";
      ?>
        var select = document.getElementById("selectschool");
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].name);          
        }
      }
      </script>

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

            <!----><ul id="myTab" class="nav nav-tabs nav-justified">
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
                    <form action="#" method="post">
                        <fieldset class="form-group">
                            <label for="registerFirstStudent">Select Your School (Can't find your school? Register it on the "College Portal")</label>
                            <!--<select class="form-control form-control-sm" id="selectSchool" name="selectSchool">
                                <option>UCF</option>
                                <option>UF</option>
                                <option>FSU</option>
                                <option>UGA</option>
                                <option>MIT</option>
                            </select>-->
                            <div class="dropdown" >                                
                                
                                    <?php

                                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                                    $sql = "SELECT name FROM university";
$result = $conn->query($sql);

                                    echo "<select name='selectSchool' id='selectSchool'>";

                                    while ($row = mysql_fetch_array($result)) {
                                        echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                                    }
                                    echo "</select>";
                                    ?>
                                
                            </div>
                        </fieldset>                       
                        <fieldset class="form-group">
                            <label for="registerFirstStudent">First Name</label>
                            <input type="text" class="form-control" id="registerFirstStudent" placeholder="First Name" name="registerFirstStudent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerLastStudent">Last Name</label>
                            <input type="text" class="form-control" id="registerLastStudent" placeholder="Last Name" name="registerLastStudent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerEmailStudent">Email address (This will be your username)</label>
                            <input type="email" class="form-control" id="registerEmailStudent" placeholder="Enter email" name="registerEmailStudent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerPasswordStudent">Password</label>
                            <input type="password" class="form-control" id="registerPasswordStudent" placeholder="Password" name="registerPasswordStudent">
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
                    $first =  -1;
                    $last = -1;
                    $university_id = -1;
                    $username = -1;
                    $passwordhash = -1;

                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                   
                    $first =  $_POST["registerFirstStudent"];
                    $last = $_POST["registerLastStudent"];
                    $university_id = $_POST["selectSchool"];
                    $username = $_POST["registerEmailStudent"];
                    $passwordhash = $_POST["registerPasswordStudent"];

                    $sql = mysqli_query($conn, "INSERT INTO users (firstName, lastName, university_id, username, passwordhash, privilegeLevel)VALUES ('$first','$last','$university_id', '$username', '$passwordhash', '0')") or die(mysqli_error($conn));

                    $uid = mysqli_insert_id($conn);

                    $sql = mysqli_query($conn, "INSERT INTO students (university_id, username, passwordhash) VALUES ('$university_id', '$username', '$passwordhash')") or die(mysqli_error($conn));

                    if ($conn->multi_query($sql) === TRUE) {
                        echo "New records created successfully";
                    } else {
                        
                    }

                    mysqli_close($conn);
                }
               //
                ?>
.<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

