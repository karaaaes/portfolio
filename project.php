<?php
include 'admin/backend/database.php';
include 'admin/backend/core_function.php';
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>라카 웹사이트</title>
    <link href='https://upload.wikimedia.org/wikipedia/commons/5/53/Rockstar_Games_Logo.svg' rel='shortcut icon'>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .item {
            overflow: hidden;
            transition: max-height 0.3s;
        }

        .title-detail {
            cursor: pointer;
        }

        .detail {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s;
        }

        .card-ruler {
            margin-right: 10px !important;
            margin-bottom: 10px;
            /* margin-top: -30px; */
        }

        img {
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }

        .card-img-top {
            width: fit-content;
            height: fit-content;
        }
    </style>
</head>

<body class="is-preload">
    <?php
include 'templates/navbar.php'
?>
    <div id="wrapper">
        <!-- Main -->
        <div id="main">
            <div class="inner">
                <!-- Header -->
                <header id="header" class="mt-3 animate__animated animate__zoomIn">
                    <a href="index.php" class="logo"><strong>Project List</strong> by Raka Putra Eshardiansyah
                        <img src="images/indonesia.png" alt="" height="20" width="20" style="margin-top: 20px;">
                    </a>
                    <ul class="icons">
                        <li><a href="https://twitter.com/karaaaes" class="icon brands fa-twitter"><span
                                    class="label">Twitter</span></a></li>
                        <li><a href="https://facebook.com/raka.noelant" class="icon brands fa-facebook-f"><span
                                    class="label">Facebook</span></a></li>
                        <li><a href="https://instagram.com/rakaeshardiansyah" class="icon brands fa-instagram"><span
                                    class="label">Instagram</span></a></li>
                    </ul>
                </header>


                <!-- Banner -->
                <section class="banner" style="margin-top: -30px; margin-left: 30px;">
                    <div class="row">
                        <div class="col-lg-9 animate__animated animate__zoomIn">
                            <div class="row">
                                <?php $projectList = selectProjectList();?>
                                <?php for($i=0; $i < count($projectList); $i++) : ?>
                                <div class="col-md-6 mb-4">
                                    <div class="card card-ruler">
                                        <img class="card-img-top" src="<?= $projectList[$i]['cover_project'] ?>" alt="Card image cap"
                                            >
                                        <div class="card-body">
                                            <h5 class="card-title"><?= ucwords($projectList[$i]['project_name']); ?></h5>
                                            <p class="card-text"><?= $projectList[$i]['description'] ?></p>
                                            <p class="card-text">Github Link : <a
                                                    href="<?= $projectList[$i]['github_link'] ?>">Here</a></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 animate__animated animate__zoomIn">
                        <?php 
                                $sqlGetWidget = "SELECT * FROM re_widget_list 
                                WHERE widget_type = 2 
                                AND status = 1 
                                AND (file_directory IS NOT NULL AND file_directory != '')";
                                $executeGetWidget = mysqli_query($conn, $sqlGetWidget);

                                $numRows = mysqli_num_rows($executeGetWidget);
                                for ($i = 0; $i < $numRows; $i++) {
                                    $data = mysqli_fetch_assoc($executeGetWidget);
                        ?>
                            <div class="card card-ruler mb-4">
                                <img class="card-img-top"
                                    src="<?php echo $data['file_directory']; ?>"
                                    alt="Card image cap">
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function toggleDetail(id) {
            var detail = document.getElementById("detail" + id);
            detail.style.maxHeight = detail.style.maxHeight ? null : detail.scrollHeight + "px";
        }
    </script>

</body>

</html>