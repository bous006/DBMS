<? php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DBMS Project</title>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!--<a href="#" data-toggle="modal" data-target="#myModal1">Sign In</a>-->
                    <?php                                       
                    //session_start();
                    $username = -1;
                    $password = -1;                    
                    $uid = -1;
                    //login form was submitted
                    if (!isset($_POST['login']))
                    {
                         echo "<p><b>Login</b> <span class=\"caret\"></span></p>";
                     }
                     else if (isset($_POST['login'])) {
                        
                        $username =  $_POST["loginUserName"];
                        $password = $_POST["loginPassword"];

                        $conn = new mysqli("localhost", "root", "root", "dbms");
                        if ($conn->connect_errno) {
                            echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
                        }

                        $result = mysqli_query($conn, "SELECT * FROM users WHERE userName like '$username' AND passwordHash like '$password'");
                        $num_rows = mysqli_num_rows($result);

                        if($result->num_rows > 0)
                        {
                            $name = $result->fetch_assoc();
                            $uid = $name["uid"];                                                  
                            echo "<p><b>Welcome " .$name["firstName"]. ", Logout?</b></p>";  


                            $sql = mysqli_query($conn,"UPDATE logged_in SET uid = $uid WHERE flagged = 1");

                            if ($conn->multi_query($sql) === TRUE) {
                                echo "New records created successfully";
                            } else {
                                
                            }

                        }               
                        else
                        {
                         $msg = 'Wrong username or password';                            
                     }
                     mysqli_close($conn);
                 }
                 ?>
             </a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form" role="form" action="" method="post" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="loginUserName">Username (Usually Email)</label>
                                            <input type="text" class="form-control" id="loginUserName" placeholder="Username (Usually Email)" required name="loginUserName">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="loginPassword">Password</label>
                                            <input type="password" class="form-control" id="loginPassword" placeholder="Password" required name="loginPassword">                                            
                                        </div>
                                        <div class="form-group">
                                            <button id="login" name="login" type="submit" value="login" class="btn btn-primary btn-block">Login</button>
                                        </div>                            
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
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

  <!-- Header Carousel -->
  <header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('images/event1.jpg');"></div>
            <div class="carousel-caption">
                <h1>Game</h1>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('images/event2.jpeg');"></div>
            <div class="carousel-caption">
                <h1>Play</h1>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('images/event3.jpg');"></div>
            <div class="carousel-caption">
                <h1>Study</h1>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<!-- Page Content -->
<div class="container">

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Create, Collaborate, Explore</h2>
        </div>
        <div class="col-md-6">
            <p>Welcome to your all-in-one stop for creating and finding college events!</p>
            <ul>
                <li><strong>Here you can</strong>
                </li>
                <li>Register as a Student</li>
                <li>Register a College or University</li>
                <li>Create Events or RSO's with ease</li>
                <li>Have full access to information on all registered RSO's and Events</li>
            </ul>
            <p>Signing up is easy. Just click on Student Portal, register as a student and you're ready to go.</p>    
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="images/group1.jpg" alt="">
        </div>
    </div>
    <!-- /.row -->
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

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

</body>

</html>
<?php ob_end_flush(); ?>