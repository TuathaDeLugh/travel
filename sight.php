<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landmark</title>
    <link rel="stylesheet"  href="public/css/bootstrap.min.css">
	<link rel="stylesheet"  href="public/css/style.css">

	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <style>
        textarea{
            height: 100vh;
            resize: none;
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                session_start();
                if (isset($_SESSION['admin'])) {
                    $rediract = "admin.php";
                    
                } else {
                    $rediract = "login.php";
                }
                ?>
                <a class="navbar-brand" href="<?php echo $rediract ?>">Sailor Travel!</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">about us</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactUs" tabindex="-1" aria-disabled="true">Contacts</a>
                        
                        </li>
                        <?php 
                            if (isset($_SESSION['admin'])) {
                                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php" tabindex="-1" aria-disabled="true">Admin Panal</a>
                            </li>
                            <?php    
                            }
                            ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 call-me-form" method="post" action="index.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Phone number" name="mno"
                            aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="call">Call me</button>
                    </form>
                </div>
            </div><!--container-->
        </nav>
    </header>
    <div class="back" id="back">
          <div id="preloader">
      <div id="loader"></div>
    </div>
</div>
    <main id="md" class="md">
	<?php
	$id = $_GET['id'];
include 'db/db.php';
$q = "select * from travel where page_no=$id";
$query = mysqli_query($con, $q);
$result = mysqli_fetch_array($query);
?>
        <div class="container sight-container">
            <h1><?php echo $result['title']?></h1>
            <hr>
            <img src="<?php echo $result['image']?>" alt="GG">
            <hr>
            
            <p class="h5">Location: <?php echo $result['area']?></p>
			<hr>
            <p class="text"><textarea disabled class="container"><?php echo $result['data']?></textarea></p>
            <hr>
            <p class="text">Updated:<?php echo $result['uploadtime']?>(IST)</p>
        </div>
	</main>
	
	    <!--Modal window of Contact Us button -->
		<div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="email-request-form" method="post" action="index.php">
                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" rows="5"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" data-toggle="modal" name="contact" data-target="#myModal">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <p class="copy">©2023, All Rights Reserved by UmangSailor</p>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <!--<button class="btn btn-primary">Contact Us</button>-->
                    <button class="btn btn-primary" id="contactUs" data-toggle="modal" data-target="#myModal">Contact
                        Us</button>
                </div>
            </div>
        </div>
        <!--Arrow button-->
        <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    </footer>             
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.public/js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery-3.4.1.min.js"></script>
    <script src="public/js/main.js"></script>
</body>
</html>