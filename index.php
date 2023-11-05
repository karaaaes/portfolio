<?php
include 'admin/backend/database.php';
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Portfolio Raka</title>
    <link href='https://upload.wikimedia.org/wikipedia/commons/5/53/Rockstar_Games_Logo.svg' rel='shortcut icon'>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description"
        content="Saya adalah seorang website developer dengan fokus pada backend system. Lihat portofolio saya untuk melihat karya-karya terbaru dan proyek-proyek yang telah saya selesaikan.">
    <meta name="author" content="Raka Putra Eshardiansyah">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                <header id="header" class="mt-3 animate__animated animate__fadeInDown">
                    <a href="index.php" class="logo"><strong>Portfolio</strong> by Raka Putra Eshardiansyah
                        <img src="images/indonesia.png" alt="" height="20" width="20" style="margin-top: 20px;">
                    </a>
                    <ul class="icons">
                        <li>
                            <a href="mailto:rakaeshardiansyah@gmail.com" class="icon brands fa-google"><span
                                    class="label">Gmail</span></a>
                        </li>
                        <!-- <li><a href="https://twitter.com/karaaaes" class="icon brands fa-twitter"><span
                                    class="label">Twitter</span></a></li>
                        <li><a href="https://facebook.com/raka.noelant" class="icon brands fa-facebook-f"><span
                                    class="label">Facebook</span></a></li> -->
                        <li><a href="https://instagram.com/rakaeshardiansyah" class="icon brands fa-instagram"><span
                                    class="label">Instagram</span></a></li>
                    </ul>
                </header>

                <!-- Banner -->
                <section id="banner" class="animate__animated animate__fadeInDown">
                    <div class="content">
                        <header>
                            <h1>Hi, I’m a Professional Website Developer</h1>
                            <p class="mt-3">Currently with 2+ years professional experience in Tech Developing</p>
                        </header>
                        <p>
                            Proven track record of successfully delivering projects, collaborating in
                            teams, and ensuring high-quality software development practices. With a combination of
                            technical proficiency and creative thinking, adept at delivering robust, innovative, and
                            user-centric web applications.</p>
                        <ul class="actions">
                            <li><a href="https://www.linkedin.com/in/rakaesh/" class="button big">Touch Me</a></li>
                        </ul>
                    </div>
                    <span class="image object">
                        <img src="images/fotoRaka.jpeg" alt="" height="50" width="50" data-aos="fade-down" />
                    </span>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>What's New !</h2>
                    </header>
                    <div class="col-12 mt-3">
                        <div class="carousel slide" data-ride="carousel" id="myCarousel">
                            <div class="carousel-inner">
                                <?php 
                                $sqlGetWidget = "SELECT * FROM re_widget_list 
                                WHERE widget_type = 1 
                                AND status = 1 
                                AND (file_directory IS NOT NULL AND file_directory != '')";
                                $executeGetWidget = mysqli_query($conn, $sqlGetWidget);

                                $numRows = mysqli_num_rows($executeGetWidget);
                                for ($i = 0; $i < $numRows; $i++) {
                                    $data = mysqli_fetch_assoc($executeGetWidget);
                                    $activeClass = ($i === 0) ? 'active' : ''; // Tambahkan ini untuk menentukan kelas active
                            ?>
                                <div class="carousel-item <?php echo $activeClass; ?>">
                                    <a href="<?php echo $data['link']; ?>">
                                        <img class="d-block w-100" src="<?php echo $data['file_directory'];?>"
                                            alt="Slide <?php echo $i + 1; ?>" />
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>Daily Mood' of Mine</h2>
                    </header>
                    <div class="row mt-3">
                        <div class="col-6" style="padding-left: 20px; padding-right: 20px;">
                            <div class="row">
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_1.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_2.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_3.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_9.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_5.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_6.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_7.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:160px; height: 160px;">
                                    <img src="images/emoji_8.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="content">
                                <header>
                                    <h1>Great moods can brings a lot of productivity</h1>
                                </header>
                                <p class="mt-4">
                                    Positive emotions, like enthusiasm and optimism, can significantly boost
                                    productivity. When you're in a great mood, you tend to be more focused, creative,
                                    and efficient in your work. It's essential to maintain a positive mindset and a work
                                    environment that supports it for optimal productivity. Great moods can significantly enhance productivity. Remember to manage your time and make room for some leisure! Maximizing your time is the key to being more productive.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>Professional Experience Journey</h2>
                    </header>
                    <div class="features mt-4">
                        <article>
                            <img src="images/MNC_Media_2015.png" class="mb-3" alt="" height="70" width="200"
                                style="margin-right: 15px;">
                            <div class="content">
                                <h3>MNC Portal Indonesia</h3>
                                <p>
                                    Work as Backend Developer - PHP in hand of OkeZone, IdxChannel, iNews, etc.</p>
                            </div>
                        </article>
                        <article>
                            <img src="images/Mastersystem_2022.png" class="mb-3" alt="" height="70" width="200"
                                style="margin-right: 15px;">
                            <div class="content">
                                <h3>Mastersystem Infotama</h3>
                                <p>
                                    Worked as Fullstack Developer - PHP in hand of MSIZone, Google Workspace, Wrike
                                    Project Management, etc.</p>
                            </div>
                        </article>
                        <article>
                            <img src="images/EshPro_2022.jpg" class="mb-3" alt="" height="150" width="200"
                                style="margin-right: 15px;">
                            <div class="content">
                                <h3>Esh Project</h3>
                                <p>
                                    Worked as Content Creator of Self Projection in Design on Instagram</p>
                            </div>
                        </article>
                        <article>
                            <img src="images/GoogleLogo_2022.png" class="mb-3" alt="" height="100" width="200"
                                style="margin-right: 50px;">
                            <div class="content">
                                <h3>Google Senior IT Manager</h3>
                                <p>
                                    Still coming soon to reach my dream company :D.</p>
                            </div>
                        </article>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
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