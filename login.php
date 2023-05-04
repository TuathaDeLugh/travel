<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
</head>

<body>
        <header>



            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    include('db/db.php');
                    include('routes/home.php');
                    session_start();
                    if (isset($_SESSION['admin'])) {
                        $rediract = "admin.php";

                    } else {
                        $rediract = "login.php";
                    }
                    if (isset($_COOKIE['data'])) {
                        ?>
                        <script>
                            swal("Database", "<?php echo $_COOKIE['data'] ?>");</script>
                        <?php
                    }
                    ?>
                    <a class="navbar-brand" href="<?php echo $rediract ?>">Go Travel!</a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">about us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#contactUs" tabindex="-1"
                                    aria-disabled="true">Contacts</a>

                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0 call-me-form" method="post" action="login.php"
                            autocomplete="off">
                            <input class="form-control mr-sm-2" type="search" placeholder="Phone number" name="mno"
                                aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="call">Call
                                me</button>
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
            <div class="container">
                <div class="row">
                    <div class="col-6 offset-3 login-container"><!--offset-3 moves .col-6 over three columns-->
                        <h1>Admin Page</h1>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="sign-in-tab" data-toggle="tab" href="#sign-in" role="tab"
                                    aria-controls="sign-in" aria-selected="true">Sign In</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                aria-controls="register" aria-selected="false">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="forgot-tab" data-toggle="tab" href="#forgot" role="tab"
                                aria-controls="forgot" aria-selected="false">forgot password</a>
                        </li> -->
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="sign-in" role="tabpanel"
                                aria-labelledby="sign-in-tab">
                                <form class="sign-in-form" method="post" action="routes/logeddata.php"
                                    autocomplete="off">
                                    <div class="form-group">
                                        <label for="sign-in-email">Email address</label>
                                        <input type="text" class="form-control" name="sign-in-email"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="sign-in-password">Password</label>
                                        <input type="password" class="form-control" name="sign-in-password"
                                            placeholder="Password">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Sign In">
                                </form>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form class="register-form" method="post" action="routes/logeddata.php">
                                    <div class="form-group">
                                        <label for="register-email">Email address</label>
                                        <input type="email" class="form-control" name="register-email"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-password">Password</label>
                                        <input type="password" class="form-control" name="register-password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-re-enter-password">Re-enter Password</label>
                                        <input type="password" class="form-control" name="register-re-enter-password"
                                            placeholder="Re-enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-re-enter-password">Secret text</label>
                                        <input type="password" class="form-control" name="register-secret-text"
                                            placeholder="Secret Text">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="forgot" role="tabpanel" aria-labelledby="forgot-tab">
                                <form class="register-form" method="post" action="routes/logeddata.php">
                                    <div class="form-group">
                                        <label for="register-re-enter-password">Secret text</label>
                                        <input type="password" class="form-control" name="register-secret-text"
                                            placeholder="secret text">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-password">Password</label>
                                        <input type="password" class="form-control" name="forgot-password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-re-enter-password">Re-enter Password</label>
                                        <input type="password" class="form-control" name="register-re-enter-password"
                                            placeholder="Re-enter password">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="reset">reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <form class="email-request-form" method="post" action="login.php">
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
                        <input type="submit" class="btn btn-primary" data-toggle="modal" name="contact"
                            data-target="#myModal">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/main.js"></script>
</body>

</html>