<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Go Travel</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        .card {
            min-width: 22.5rem;
            margin-bottom: 5px;
            
        }

        .data {
            padding-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
    </style>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
<script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php 
                include 'db/db.php';
                include 'routes/home.php';
                session_start();
                if (isset($_SESSION['admin'])) {
                    $rediract = "admin.php";
                    
                } else {
                    $rediract = "login.php";
                }
                if (isset($_COOKIE['data'])){
                    $data=$_COOKIE['data'];
                    alert("success", "$data");
                    
                }
                ?>
                <a class="navbar-brand" href="<?php echo $rediract ?>">Go Travel!</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"><b class="active">Home</b> <span class="sr-only">(current)</span></a>
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
        <!--Slider-->
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide mt-20" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" ">
                    <div class="carousel-item active">
                        <img src="public/images/slider-1.jpg" class="d-block w-100 " style="height: 700px;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Taj Mahal</h5>
                            <p>Agra, Utter Pradesh </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/slider-2.jpg" class="d-block w-100" style="height: 700px;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Red fort</h5>
                            <p>New Delhi</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/slider-3.jpg" class="d-block w-100" style="height: 700px;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gateway of India </h5>
                            <p>Mumbai</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/slider-4.jpg" class="d-block w-100" style="height: 700px;" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Golde Tample</h5>
                            <p>Panjab </p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Cards -->

            <div class="data">
                <?php

                

                error_reporting(E_ERROR | E_PARSE);
        
                $q = "select * from travel";

                $query = mysqli_query($con, $q);

                while ($result = mysqli_fetch_array($query)) {
                    $id = $result['page_no']; ?>
                    <div class="card">
                        <img src="<?php echo $result['image'];?>" class="card-img-top" alt="<?php echo $result['title'];?>">
                        <div class="card-body">
                            <h5 class="card-title">
                            <?php echo $result['title'];?>
                            </h5>
                            <a href="sight.php?id=<?php echo $id ?>" class="btn btn-primary">Read</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>  
        </div> <!--container-->
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
    
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.public/js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery-3.4.1.min.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/toast.js"></script>
    <link rel="stylesheet" href="public/js/toast.css">
</body>
</html>