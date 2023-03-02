<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <?php
    session_start();
    ?>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php">Let's Travel!</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                          <li class="nav-item">
              <a class="nav-link" href="about.php">about us</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contactUs" tabindex="-1"
                                aria-disabled="true">Contacts</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php" tabindex="-1" aria-disabled="true">Admin Page</a>
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
    <main id="md" class="md">
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
                                <a class="nav-link aria-disabled">Mails</a>
                                <a class="nav-link aria-disabled">Callback requests</a>
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
                                    <h2>Update Post</h2>
                                    <?php
                                    include('db/db.php');
                                    $page_no = $_GET['page_no'];
                                    $s = "select * from travel where page_no=$page_no";
                                    $fill = mysqli_query($con, $s);
                                    $result = mysqli_fetch_array($fill);
                                    ?>
                                    <form class="update-post-form" method="post" action="routes/inspost.php?page_no=<?php echo $page_no ?>">
                                        <div class="form-group">
                                        <?php
                                        $page_no = $_GET['page_no'];?>
                                            <label for="create-title">Title</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $result['title']?>"placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="create-country">Country/Area</label>
                                            <input type="text" class="form-control" name="area" value="<?php echo $result['area']?>" placeholder="Country/Area">
                                        </div>
                                        <div class="form-group">
                                            <label for="create-image-url">Image</label>
                                            <input type="text" class="form-control" name="image" value="<?php echo $result['image']?>" placeholder="URL">
                                        </div>
                                        <div class="form-group">
                                            <label for="create-text">Text</label>
                                            <textarea class="form-control" name="data" rows="20"><?php echo $result['data']?></textarea>
                                        </div>
                                        <!-- <a href="admin.php" class="btn btn-danger">Cancel Update<a> -->
                                        <button class="btn btn-primary" name="update">Update Post</button>
                                        
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
    <script src="public/js/main.js"></script>
</body>
</html>