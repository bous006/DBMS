<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Portal</title>

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
            <h1 class="page-header">Event Portal
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Image Header -->
    <div class="row">
        <div class="col-lg-12">
            <img class="img-responsive" src="images/event.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->

    <!-- Service Tabs -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Here are some Public Events coming up</h2>
        </div>
        <div class="col-lg-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Event Info</a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-list"></i> Create An Event (must be an Admin)</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                <h4>Events</h4>
                     <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>

                        <th>Description</th>

                        <th>Date</th>

                        <th>Time</th>

                        <th>Contact Email</th>

                        <th>Contact Phone</th>

                        <th>Address</th>                        

                        <th>Category</th>

                        <th>View Event</th>


                    </tr>
                </thead>

                <tbody>
                    <?php
                    
                    $conn = new mysqli("localhost", "root", "root", "dbms");
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                    }
                    // Retrieve all the data from the "tblstudent" table
                    $result = mysqli_query($conn, "SELECT * FROM event") or die(mysql_error());
                    // store the record of the "tblstudent" table into $row
                    
                    while ($row = mysqli_fetch_array($result)) {
                    // Print out the contents of the entry

                        echo '
                        <tr>
                            ';
                            echo '
                            <td>' . $row['name'] . '</td>';
                            echo '
                            <td>' . $row['description'] . '</td>';
                            echo '
                            <td>' . $row['date'] . '</td>';
                            echo '
                            <td>' . $row['time'] . '</td>';

                            echo '
                            <td>' . $row['email'] . '</td>';
                            echo '
                            <td>' . $row['phone_num'] . '</td>';
                            echo '
                            <td>' . $row['street'] . ' ' . $row['city'] . ' ' . $row['zip'] . '</td>';                            
                            echo '
                            <td>' . $row['type'] . '</td>';
                            
                            $curr_eventid = $row['eventid'];
                            echo '<td>' . '<a href="eventDetails.php?eventid=' . $curr_eventid . '">View Event</a>' .'</td>';
                           
                           //if (!empty($_POST['view-submit']))
                            //{
                                //$var_value = $row['eventid'];
                               // $_SESSION['selected_eventid'] = $var_value;
                           // }
                        }

                        error_reporting(E_ALL);
                        mysqli_close($conn);
                        ?>

                    </tbody>

                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="service-two">
            <h4>Create An Event</h4>
             <form action="#" method="post">
                        <fieldset class="form-group">
                            <label for="registerTypeEvent">Type of Event</label>
                            <select class="form-control form-control-sm" name="registerTypeEvent">
                                <option value="RSO">RSO</option>
                                <option value="Private">Private</option>
                                <option value="Public">Public</option>
                            </select>
                        </fieldset>                       
                        <fieldset class="form-group">
                            <label for="registerNameEvent">Event Name</label>
                            <input type="text" class="form-control" id="registerNameEvent" placeholder="Event Name" name="registerNameEvent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerDescEvent">Event Description</label>
                            <input type="text" class="form-control" id="registerDescEvent" placeholder="Event Description" name="registerDescEvent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerTimeEvent">Event Time</label>
                            <input type="time" class="form-control" id="registerTimeEvent" placeholder="ex. 5:00 AM - 5:00 PM" name="registerTimeEvent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerDateEvent">Event Date</label>
                            <input type="date" class="form-control" id="registerDateEvent" placeholder="MM/DD/YY" name="registerDateEvent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerEmailEvent">Contact Email Address</label>
                            <input type="email" class="form-control" id="registerEmailEvent" placeholder="Enter email" name="registerEmailEvent"> 
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerNumberEvent">Contact Phone Number</label>
                            <input type="text" class="form-control" id="registerNumberEvent" placeholder="(xxx)xxx - xxxx" name="registerNumberEvent">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="registerStreetEvent">Where is your Event happening?</label>
                            <input type="text" class="form-control" id="registerStreetEvent" placeholder="Street" name="registerStreetEvent">
                            <input type="text" class="form-control" id="registerCityEvent" placeholder="City" name="registerCityEvent">
                            <input type="text" class="form-control" id="registerZipEvent" placeholder="Zip Code" name="registerZipEvent">
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
                    $email =  -1;
                    $phone_num = -1;
                    $date = -1;
                    $description = -1;
                    $name = -1;
                    $time = -1;
                    $type = -1;
                    $street = -1;
                    $city = -1;
                    $zip = -1;


                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                   
                    $email =  $_POST["registerEmailEvent"];
                    $phone_num = $_POST["registerNumberEvent"];
                    $date = $_POST["registerDateEvent"];
                    $description = $_POST["registerDescEvent"];
                    $name = $_POST["registerNameEvent"];
                    $time = $_POST["registerTimeEvent"];
                    $type = $_POST["registerTypeEvent"];
                    $street = $_POST["registerStreetEvent"];
                    $city = $_POST["registerCityEvent"];
                    $zip = $_POST["registerZipEvent"];

                    $sql = mysqli_query($conn, "INSERT INTO event (email, phone_num, date, description, name, time, type, street, city, zip)VALUES ('$email','$phone_num','$date', '$description', '$name', '$time', '$type', '$street', '$city', '$zip')") or die(mysqli_error($conn));

                    $eventid = mysqli_insert_id($conn);

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
