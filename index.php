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
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Menyertakan file CSS dari MDB melalui CDN -->
    <style>

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
                <header id="header" class="mt-3">
                    <a href="index.php" class="logo"><strong>Portfolio</strong> by Raka Putra Eshardiansyah
                        <img src="images/indonesia.png" alt="" height="20" width="20" style="margin-top: 20px;">
                    </a>
                    <ul class="icons">
                        <li>
                            <a href="mailto:rakaeshardiansyah@gmail.com" class="icon brands fa-google"><span
                                    class="label">Gmail</span></a>
                        </li>
                        <li><a href="https://instagram.com/rakaeshardiansyah" class="icon brands fa-instagram"><span
                                    class="label">Instagram</span></a></li>
                    </ul>
                </header>

                <!-- Banner -->
                <section id="banner" style="padding: 3em 0 4em 0;">
                    <div class="content">
                        <header>
                            <!-- Element to contain animated typing -->
                            <h2><span id="typed-heading"></span></h2>
                            <p class="mt-4">Currently with 2+ years professional experience in Tech Developing</p>
                        </header>
                        <p style="font-size:1.1rem;">
                            Hello there! 👋 I'm a seasoned Website Developer with a strong command of PHP, particularly
                            its frameworks. My proficiency extends to Golang, where I specialize in crafting robust
                            APIs. Let's bring your digital ideas to life and create powerful web solutions together!</p>
                        <ul class="actions">
                            <li><a href="https://www.linkedin.com/in/rakaesh/" class="button-index">Touch Me 💻</a></li>
                        </ul>
                    </div>
                    <span class="image object">
                        <img src="images/fotoRaka.jpeg" alt="" height="50" width="50" data-aos="fade-down" />
                    </span>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>Daily Mood' of Mine</h2>
                    </header>
                    <div class="row mt-3">
                        <div class="emotion-image col-md-6 col-12" style="">
                            <div class="row">
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_1.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_2.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_3.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_9.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_5.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_6.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_7.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                                <div class="img-resize" style="width:140px; height: 140px;">
                                    <img src="images/emoji_8.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="content">
                                <header>
                                    <p class="mt-1"><span id="typed-mood"></span></p>
                                </header>
                                <p class="mt-4" style="font-size:1.1rem;">

                                    Staying positive enhances productivity. A good mood fosters focus, creativity, and
                                    efficiency at work. Maintain a positive mindset and a supportive work environment
                                    for optimal productivity. Manage time effectively and prioritize leisure to maximize
                                    productivity. Would you mind to share your mood with me ?
                                </p>
                                <ul class="actions ">
                                    <li class="mt-3"><a href="https://www.linkedin.com/in/rakaesh/"
                                            class="button-index">Share
                                            Yours ✨</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>Wohoo I Love My Job ~~</h2>
                    </header>
                    <div class="row mt-3">
                        <div class="col-md-5 col-12 order-2 mt-4">
                            <header>
                                <p class="mt-1"><span id="typed-code"></span></p>
                            </header>
                            <div class="content">
                                <p class="mt-3" style="font-size:1.1rem;">
                                    Absolutely in love with my job as a Website Developer! Constantly diving into
                                    new stacks, sparking creativity, and turning ideas into digital magic. Work is not
                                    just about code; it's an adventure of exploration and creating wonders in the
                                    digital realm.
                                </p>
                                <ul class="actions">
                                    <li class="mt-3"><a href="project" class="button-index">Explore More 🚀</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="emotion-image col-md-7 order-1 col-12">
                            <div class="row">
                                <div class="img-resize">
                                    <img src="images/tech-stack.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>And, I'm Also The Content Creator Too ! </h2>
                    </header>
                    <div class="row mt-4">
                        <div class="emotion-image col-md-6 col-12">
                            <div class="row">
                                <div class="img-resize">
                                    <img src="images/tiktok.png" alt="" height="100%" width="100%"
                                        style="object-fit:contain;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 mt-5 text-content-creator">
                            <header>
                                <p class="mt-1"><span id="typed-content-creator"></span></p>
                            </header>
                            <div class="content">
                                <p class="mt-3" style="font-size:1.1rem;">
                                    Dive into my TikTok world, where creativity runs wild and fun never sleeps! 🕺🎥 I'm
                                    not just living life; I'm capturing its quirks, one TikTok at a time. Join the fun
                                    ride, hit that follow button, and let's turn the ordinary into extraordinary!
                                </p>
                                <ul class="actions">
                                    <li class="mt-3"><a href="https://www.tiktok.com/@karaaaes"
                                            class="button-index">Visit Me 🚀</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section -->
                <section data-aos="fade-down">
                    <header class="major">
                        <h2>Professional Experience Journey</h2>
                    </header>
                    <div class="row mt-4">
                        <div class="col-md-6 mt-2">
                            <div class="img-wrapper mb-3">
                                <img src="images/MNC_Media_2015.png" alt="" style="margin-right: 15px;">
                            </div>
                            <div class="content">
                                <h3>MNC Portal Indonesia</h3>
                                <p>
                                    Work as Backend Developer in <a href="https://www.sindonews.com/"
                                        style="color: black; text-decoration: none;"><strong>Sindonews
                                            Group</strong></a>. Taking
                                    priority on maintaing ads, bug
                                    fixing and upgrade code. Also work on Celebrities.id with handling on Gitlab,
                                    Docker, and Codeigniter 3.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="img-wrapper mb-3">
                                <img src="images/Mastersystem_2022.png" alt="" style="margin-right: 15px;">
                            </div>
                            <div class="content">
                                <h3>Mastersystem Infotama</h3>
                                <p>
                                    Worked as Fullstack Developer - PHP in hand of MSIZone Internal Apps, Google
                                    Workspace Integration and Wrike Automation Management. Handling the end user to
                                    guide them for newest update. Fully access on linux server (Ubuntu + Putty) for cron
                                    management and any other automation.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="img-wrapper mb-3">
                                <img src="images/EshPro_2022.png" alt="" style="margin-right: 15px;">
                            </div>
                            <div class="content">
                                <h3>Esh Project</h3>
                                <p>
                                    Worked as Content Creator of Self Projection in Design on Instagram. Publishing my
                                    latest project for selling my great value on design and copywriting.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="img-wrapper mb-3">
                                <img src="images/GoogleLogo_2022.png" alt="" style="margin-right: 50px;">
                            </div>
                            <div class="content">
                                <h3>Google Senior IT Manager</h3>
                                <p>
                                    Still coming soon to reach my dream company :D.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Load library from the CDN -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <!-- Setup and start animation! -->
    <script>
        var typed = new Typed('#typed-heading', {
            strings: ['Hi, I’m a Professional Website Dev !', 'My Name is Raka !'],
            typeSpeed: 50,
            backSpeed: 25, // Kecepatan penghapusan
            backDelay: 1000, // Delay sebelum memulai penghapusan (dalam milidetik)
            startDelay: 500, // Delay sebelum memulai animasi (dalam milidetik)
            loop: true
        });

        var typedMood = new Typed('#typed-mood', {
            strings: ['Have a good day !'],
            typeSpeed: 50,
            backSpeed: 25, // Kecepatan penghapusan
            backDelay: 1000, // Delay sebelum memulai penghapusan (dalam milidetik)
            startDelay: 500, // Delay sebelum memulai animasi (dalam milidetik)
            loop: true
        });

        var typedCode = new Typed('#typed-code', {
            strings: ['Just code and moreee !!!'],
            typeSpeed: 50,
            backSpeed: 25, // Kecepatan penghapusan
            backDelay: 1000, // Delay sebelum memulai penghapusan (dalam milidetik)
            startDelay: 500, // Delay sebelum memulai animasi (dalam milidetik)
            loop: true
        });

        var typedCreator = new Typed('#typed-content-creator', {
            strings: ['I love gaming, i love creating'],
            typeSpeed: 50,
            backSpeed: 25, // Kecepatan penghapusan
            backDelay: 1000, // Delay sebelum memulai penghapusan (dalam milidetik)
            startDelay: 500, // Delay sebelum memulai animasi (dalam milidetik)
            loop: true
        });
    </script>
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