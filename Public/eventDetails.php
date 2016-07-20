﻿<?php
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
                
                    
                    $var_value = $_GET['eventid'];

                    $sql = "SELECT eventid, email, phone_num, date, description, name, time, type, city, street, zip FROM event WHERE eventid = $var_value";

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
                        
                        $eventid = $row["eventid"];
                        $email = $row["email"];
                        $phone_num = $row["phone_num"];
                        $date = $row["date"];
                        $description = $row["description"];
                        $name  = $row["name"];
                        $time = $row["time"];
                        $type = $row["type"];          
                        $city = $row["city"];
                        $street = $row["street"];
                        $zip = $row["zip"];              

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
            <h1 class="page-header">Event Details
                <small><br><?php echo $name ?></br></small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8">
             
            <?php 
            $gmapurl = "https://www.google.com/maps/embed/v1/place?key=AIzaSyC3eJzLynNe-bKmaYR7F6z-4GPaaBPo1VQ&q=".$street."+".$city."+".$zip;?>

         <div class="col-md-8">
           <iframe
            width="600"
            height="450"
            frameborder="0" style="border:0"
            src=<?php echo $gmapurl?> allowfullscreen>
            </iframe>
         </div>


            </div>

        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3><?php echo $name ?></h3>
            <p>
                <?php echo $street ?><br><?php echo $city ?>, <?php echo $zip ?><br>
            </p>
            <p><i class="fa fa-phone"></i> 
                <?php echo $phone_num ?></p>
                <p><i class="fa fa-envelope-o"></i> 
                    <a href="mailto:name@example.com"><?php echo $email ?></a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                   <?php echo $date." ".$time ?>
                   <br>
                   <?php echo $_GET['eventid'] ?></p>
                    <ul class="list-unstyled list-inline list-social-icons">
                        <li>
                            <a href="http:www.facebook.com"><i class="fa fa-facebook-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="http:www.twitter.com"><i class="fa fa-twitter-square fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->

            <div>
                <div class="col-md-12">
                    <h3>Event Description</h3>
                    <hr>
                    <p><?php echo $description ?></p>
                    <br>
                    <br>
                </div>
            </div>
            <div>

            <div>
                <div class="col-md-12">
                    <h4>Comments on <?php echo $name?> </h4>
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

                </div>
            </div>
            <div>

                <div class="col-md-12">
                    <form>
                    <div class="fb-comments" data-href="http://localhost/Public/Public/eventDetails.php" data-width="600" data-numposts="5"></div>
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