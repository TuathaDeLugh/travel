<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
<script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
<script src="public/js/main.js"></script>
</head>

<body>
    <?php
    session_start();

function alert($status,$text){
        ?><script>
        new Notify({
    status: '<?php echo $status; ?>',
    title: 'Database',
    text: '<?php echo $text; ?>',
    effect: 'slide',
    speed: 500,
    customClass: null,
    customIcon:null,
    showIcon: false,
    showCloseButton: true,
    autoclose: true,
    autotimeout: 3000,
    gap: 20,
    distance: 20,
    type: 1,
    position: 'right top'
  })    
        </script>
        <?php }
        error_reporting(E_ERROR | E_PARSE);
        if (str_contains($_SERVER['HTTP_REFERER'], 'routes/inspost.php')) {
            alert('success', 'Article Inserted Successfully');
        }
        if (str_contains($_SERVER['HTTP_REFERER'], 'routes/postdel.php')) {
            alert('error', 'Article Deleted Successfully');
        }
        if (str_contains($_SERVER['HTTP_REFERER'], 'updatepost.php')) {
            alert('info', 'Article Updated Successfully');
        }
        if (str_contains($_SERVER['HTTP_REFERER'], 'cc.php')) {
            alert('error', 'Table cleared Successfully');
        }
        if (str_contains($_SERVER['HTTP_REFERER'], 'call.php')) {
            alert('error', 'selected call request deleted');
        }
        if (str_contains($_SERVER['HTTP_REFERER'], 'mail.php')) {
            alert('error', 'selected mail request deleted');
        }
        
        ?>     
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php">Sailor Travel!</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">about us</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contactUs" tabindex="-1"
                                aria-disabled="true">Contacts</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php" tabindex="-1" aria-disabled="true"><b class="active">Admin Page</b></a>
                        </li>
                        <li class="nav-item">
                            <form action="routes/logeddata.php" method="post">
                                <button class="btn btn-outline-secondary log-out-btn" name="logout">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div><!--container-->
        </nav>
    </header>
    <main>
        <div class="container page-wrapper">
            <h1>Admin Page</h1>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-block">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-articles-tab" data-toggle="pill"
                                    href="#v-pills-articles" role="tab" aria-controls="v-pills-articles"
                                    aria-selected="true">Articles</a>
                                <a class="nav-link" id="v-pills-mails-tab" data-toggle="pill" href="#v-pills-mails"
                                    role="tab" aria-controls="v-pills-mails" aria-selected="false">Mails</a>
                                <a class="nav-link" id="v-pills-callback-tab" data-toggle="pill"
                                    href="#v-pills-callback" role="tab" aria-controls="v-pills-callback"
                                    aria-selected="false">Callback requests</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-block">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-articles" role="tabpanel"
                                    aria-labelledby="v-pills-articles-tab">
                                    <button class="btn btn-primary create-post-btn">Add post</button>
                                    <div class="articles">
                                        <table class="table table-striped">

                                            <tr>
                                                <th style="width: 1%;">#</th>
                                                <th>title</th>
                                                <th> area </th>
                                                <th style="width: 8%;">upload time</th>
                                                <th style="width: 8%;"> Delete </th>
                                                <th style="width: 8%;"> Update </th>

                                            </tr>

                                            <?php

                                            include 'db/db.php';
                                            $q = "select * from travel";

                                            $query = mysqli_query($con, $q);
                                            $i = 0;
                                            while ($result = mysqli_fetch_array($query)) {
                                                $i++; ?>
                                                <tr>
                                                    <?php $id = $result['page_no']; ?>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $result['title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $result['area']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $result['uploadtime']; ?>
                                                    </td>
                                                    <td> <a href="routes/postdel.php?page_no=<?php echo $id; ?>"
                                                            class="text-white"> <button
                                                                class="btn-danger btn">Delete</button> </a> </td>
                                                    <td> <a href="updatepost.php?page_no=<?php echo $id; ?>"
                                                            class="text-white"><button class="btn btn-primary btn-edit">Update</button></a> </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- Mail -->
                                <div class="tab-pane fade" id="v-pills-mails" role="tabpanel"
                                    aria-labelledby="v-pills-mails-tab">
                                    <table class="table table-striped">

                                        <tr>
                                            <th style="width: 1%;">#</th>
                                            <th>name</th>
                                            <th> email </th>
                                            <th style="width: 50%;">message</th>
                                            <th style="width: 8%;"> <a href="routes/cc.php?key=mail"><button class="btn-outline-danger btn"> X</button></a> </th>

                                        </tr>

                                        <?php

                                        include 'db/db.php';
                                        $q = "select * from contact";

                                        $query = mysqli_query($con, $q);
                                        $i = 0;
                                        while ($result = mysqli_fetch_array($query)) {
                                            $i++; ?>
                                            <tr>
                                                <?php $id = $result['c_no']; ?>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['message']; ?>
                                                </td>
                                                <td> <a href="routes/mail.php?c_no=<?php echo $id; ?>" class="text-white">
                                                        <button class="btn-danger btn">X</button> </a> </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                <!-- Call -->
                                <div class="tab-pane fade" id="v-pills-callback" role="tabpanel"
                                    aria-labelledby="v-pills-callback-tab">
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="width: 1%;">#</th>
                                            <th>Mobileno</th>
                                            <th style="width: 8%;"><a href="routes/cc.php?key=calls"><button class="btn-outline-danger btn"> Delete</button></a>  </th>

                                        </tr>

                                        <?php

                                        include 'db/db.php';
                                        $q = "select * from calls";

                                        $query = mysqli_query($con, $q);
                                        $i = 0;
                                        while ($result = mysqli_fetch_array($query)) {
                                            $i++; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['mno']; ?>
                                                </td>
                                                <td> <a href="routes/call.php?mno=<?php echo $result['mno']; ?>" class="text-white">
                                                        <button class="btn-danger btn">Delete</button> </a> </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="v-pills-create-post" role="tabpanel"
                                    aria-labelledby="v-pills-create-post-tab">
                                    <h2>Create Post</h2>
                                    <form class="create-post-form" method="post" action="routes/inspost.php">
                                        <div class="form-group">
                                            <label for="create-title">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="create-country">Country/Area</label>
                                            <input type="text" class="form-control" name="area"
                                                placeholder="Country/Area">
                                        </div>
                                        <div class="form-group">
                                            <label for="create-image-url">Image</label>
                                            <input type="text" class="form-control" name="image"
                                                placeholder="URL">
                                            <!-- <p>or</p>
                                            <input type="file" class="form-control-file form-control "
                                                id="create-image-file"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="create-text">Text</label>
                                            <textarea class="form-control" name="data" rows="20"></textarea>
                                        </div>
                                        <a href="admin.php" class="btn btn-danger">Cancel Create<a>
                                        <button class="btn btn-primary" name="done">Create Post</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/admin/js/main.js"></script>
    
</body>

</html>