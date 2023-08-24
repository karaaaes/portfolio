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
        #car-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        #car-image {
            /* position: absolute; */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: transform 0.2s ease-in;
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
                    <a href="index.php" class="logo"><strong>Trending Stocks</strong> by Raka Putra Eshardiansyah
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

                <div id="car-container">
                    <img id="car-image" width="50" src="images/205.jpg" alt="Car">
                </div>
                <!-- Banner -->
                <section class="banner" style="margin-top: -30px; margin-left: 30px;">
                    <div class="row">
                        <div class="col-lg-9 animate__animated animate__zoomIn">
                            <div class="row">
                                <?php $projectList = selectProjectList();?>
                                <?php for($i=0; $i < count($projectList); $i++) : ?>
                                <div class="col-md-6 mb-4">
                                    <div class="card card-ruler">
                                        <img class="card-img-top" src="<?= $projectList[$i]['cover_project'] ?>"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $projectList[$i]['project_name'] ?></h5>
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
                            <div class="card card-ruler mb-4">
                                <img class="card-img-top"
                                    src="https://media1.giphy.com/media/xxzJMQkS8X5hgXI7C8/giphy.gif?cid=ecf05e47st8lt1fkj55ubswbsbzf8d363rlc133b2xo3m0zq&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                                    alt="Card image cap">
                            </div>
                            <div class="card card-ruler">
                                <img class="card-img-top"
                                    src="https://media4.giphy.com/media/9hNRI84INPXlQvgEyv/giphy.gif?cid=ecf05e47st8lt1fkj55ubswbsbzf8d363rlc133b2xo3m0zq&ep=v1_gifs_search&rid=giphy.gif&ct=g"
                                    alt="Card image cap">
                            </div>
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
    var carImage = document.getElementById('car-image');
    var containerWidth = document.getElementById('car-container').offsetWidth;
    var carWidth = carImage.offsetWidth;
    var maxTranslateX = containerWidth - carWidth;
    var direction = 1;
    var currentPosition = 0;

    function moveCar() {
        currentPosition += 5 * direction;

        // Memeriksa jika gambar mobil mencapai batas maksimum
        if (currentPosition >= containerWidth) {
            // currentPosition = -carWidth; // Mengatur kembali posisi ke sisi kiri
        }

        carImage.style.transform = 'translateX(' + currentPosition + 'px)';
    }

    function resetCarPosition() {
        currentPosition = -carWidth;
        carImage.style.transform = 'translateX(' + currentPosition + 'px)';
    }

    setTimeout(resetCarPosition, 1000);
    setInterval(moveCar, 10);
</script>

</body>

</html>