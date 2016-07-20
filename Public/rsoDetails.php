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

    <title>Event Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>


<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <?php
                    
                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                    $email = -1;
                    $phone_num = -1;
                    $date = -1;
                    $description = -1;
                    $name = -1;
                    $time = -1;
                    $type = -1;
                    $city = -1;
                    $street = -1;
                    $zip = -1;
                
                    
                    $var_value = $_GET['rsoid'];

                    $sql = "SELECT rsoid, rsoname, description, student_creator FROM rso WHERE rsoid = $var_value";

                    //(SELECT eventid FROM selected_event WHERE flagged = 1)";

                    $result = $conn->query($sql);

                    //if ($result->num_rows > 0) {

                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        //TODO: REMOVE ECHOS
                        /*
                        echo 
                        "eventid: " . $row["eventid"].
                        "<br>".
                        "email: "  . $row["email"].
                        "<br>".
                        "phone_num: " . $row["phone_num"].
                        "<br>".
                        "date: "  . $row["date"].
                        "<br>".
                        "description: "  . $row["description"].
                        "<br>".
                        "event name: " . $row["name"]. 
                        "<br>".
                        "time: " . $row["time"].
                        "<br>";
                        */
                        
                        $rsoid = $row["rsoid"];
                        $rsoname = $row["rsoname"];
                        $description = $row["description"];
                        $admin = $row["student_creator"];

                     }
                     //} else {
                     //   echo "no results.";
                     //}        
        ?>
        <br>
        <br>

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
        <br>
        <div class="col-lg-12">
            <h1 class="page-header">RSO Details
                <small><br><?php echo $rsoname ?></br></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>Admin Contact Email
            <br>
            <?php echo $admin ?></h3>   
            </div>
            <!-- /.row -->

            <div>
                <div class="col-md-12">
                    <h3>Event Description</h3>
                    <hr>
                    <h4><?php echo $description ?></h4>
                    <br>
                    <br>
                </div>
                <h4>Current Members</h4>
                     <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    
                    $conn = new mysqli("localhost", "root", "root", "dbms");
                    if ($conn->connect_errno) {
                        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                    }
                    // Retrieve all the data from the "tblstudent" table
                     $var_value = $_GET['rsoid'];
                    $result = mysqli_query($conn, "SELECT name FROM is_in_rso WHERE rsoid = $var_value") or die(mysql_error());
                    // store the record of the "tblstudent" table into $row
                    
                    while ($row = mysqli_fetch_array($result)) {
                    // Print out the contents of the entry

                        echo '
                        <tr>
                            ';
                            echo '
                            <td>' . $row['name'] . '</td>';
                           
                           
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
                <div class="col-md-12">
                    <h3>Want to Join?</h3>
                    <hr>
                    <h4>Please contact admin</h4>
                    <br>
                    <br>
                </div>
            </div>
            <div>

            <div>
                <!--<div class="col-md-12">
                    <h4>Comments on <?php echo $rsoname?> </h4>
                    <hr>
                    <?php

                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection+
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                    $sql = "SELECT comment, timestamp, rating 
                            FROM comments c
                            WHERE c.eventid = $eventid
                            ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        
                        $comment = $row["comment"];
                        $timestamp = date('F j, Y     g:i:sa',strtotime($row["timestamp"]));
                        $rating = $row["rating"];
                        echo "$timestamp<br>"."User says: "."<br>".$comment."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".""."<br>"."___________________________________________"."<br><br>";

                     }

                    } 
                    ?>

                </div>-->
            </div>
            <div>

                <div class="col-md-12">
                    <form>
                    <div class="fb-comments" data-href="http://localhost/Public/Public/rsoDetails.php" data-width="600" data-numposts="5"></div>
                    <div class="fb-like" data-href="http://localhost/Public/Public/eventDetails.php" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                
              </form>
                </div>
            </div>
    
            <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file.
        <div class="row">
            <div class="col-md-8">
                <h3>Send us a Message</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                   
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

        </div> -->
        <!-- /.row -->

        

        <!-- Footer -->
        <footer><hr>
            <div class="row">
                <div class="col-lg-12">
                <br>
                <br>-
                    <p>College Event Planner 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

            <?php

                if (isset($_POST['submit']))
                {
                    $uid =  -1;
                    $comment = -1;
                    $rating = -1;

                    $conn = mysqli_connect("localhost","root","root", "dbms");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to my MySQL: " . mysqli_connect_error();
                    }

                    //TODO: get userid
                    $uid =  0;

                    $comment = $_POST["commentEvent"];

                    //Not sure which radial to get here
                    $rating = $_POST["rating1"];

                    $sql = mysqli_query($conn, "INSERT INTO comments (uid, eventid, comment) VALUES ('$uid','$eventid','$comment')") or die(mysqli_error($conn));

                    if ($conn->multi_query($sql) === TRUE) {
                        echo "New records created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    mysqli_close($conn);
                }
               //
                ?>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>