<?php
include 'admin/backend/database.php';
include 'admin/backend/core_function.php';

$dataToDoListPlanned = getToDoList("Planned");
$dataToDoListCompleted = getToDoList("Completed");
$dataToDoListCancelled = getToDoList("Cancelled");
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>라카 웹사이트</title>
    <link href='https://upload.wikimedia.org/wikipedia/commons/5/53/Rockstar_Games_Logo.svg' rel='shortcut icon'>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description"
        content="Saya adalah seorang website developer dengan fokus pada backend system. Lihat portofolio saya untuk melihat karya-karya terbaru dan proyek-proyek yang telah saya selesaikan.">
    <meta name="author" content="Raka Putra Eshardiansyah">
    <link rel="stylesheet" href="assets/css/todolist.css" />
    <link rel="stylesheet" href="assets/css/todolist2.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            opacity: 0;
            transition: opacity 2s;
        }

        .overlay.active {
            display: flex;
            /* Menggunakan flex untuk mengatur gambar di tengah */
            justify-content: center;
            align-items: center;
            opacity: 1;
        }

        .overlay img {
            max-width: 100%;
            /* Sesuaikan ukuran gambar GIF sesuai kebutuhan */
            max-height: 100%;
        }
    </style>
</head>

<body class="is-preload">
    <?php
include 'templates/navbar.php'
?>
    <div id="wrapper">
        <div class="header-section">
            <div class="cover-area">
                <div class="container">
                    <div class="cover-text">
                        <div class="upper-text">
                            Portofolio
                        </div>
                        <p>
                            My To Do Lists
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="cover-page"></div>
        </div>

        <div class="container">
            <div class="accordion-wrap">
                <div class="row">
                    <div class="col-md-4">
                        <div class="accordion" id="accordion">
                            <div class="card" style="border:none !important;">
                                <div class="card-header" id="headingOne">
                                    <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <div class="row">
                                            <div class="col-md-10 button-header">
                                                In Progress
                                                <img class="icon-color" src="images/Ellipse-Orange.png" alt="">
                                            </div>
                                            <div class="col-md-2 button-switcher">
                                                <img class="toggle-image" src="images/minus-icon.png" alt="">
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <?php 
                                        foreach ($dataToDoListPlanned as $data) : 
                                            $planDate = $data['plan_completed_date'];
                                            $newFormatDate = date("d-M-Y", strtotime($planDate));

                                            $createDate = $data['created_date'];
                                            $newCreatedDate = date("d-M-Y", strtotime($createDate));
                                    ?>
                                    <!-- Task List -->
                                    <div class="card-body task-list-in-progress mt-2">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="title-text">
                                                    <strong>Deadline</strong>
                                                </div>
                                                <strong><?= $newFormatDate; ?></strong>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="arrow">
                                                    <img class="icon-showed" src="images/arrow-right.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-name">
                                            <?= $data['event_details'] ?>
                                        </div>
                                        <div class="task-footer">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="created-at">
                                                        Created at : <?= $newCreatedDate; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="admin-icon">
                                                        <img class="admin-icon-img" src="images/admin-icon-noshadow.png"
                                                            style="width: 45px; height: 45px;" alt="" title="Admin">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Task List -->
                                    <?php 
                                        endforeach
                                    ?>
                                    <div class="overlay overlay-in-progress">
                                        <img src="images/inprogress-gif.gif" alt="Animated GIF">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="accordion" id="accordionTwo">
                            <div class="card" style="border:none !important;">
                                <div class="card-header" id="headingOne">
                                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo">
                                        <div class="row">
                                            <div class="col-md-10 button-header">
                                                Completed
                                                <img class="icon-color" src="images/Ellipse-Green.png" alt="">
                                            </div>
                                            <div class="col-md-2 button-switcher">
                                                <img class="toggle-image" src="images/minus-icon.png" alt="">
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionTwo">
                                    <?php 
                                        foreach($dataToDoListCompleted as $dataCompleted) : 
                                            $actualDateCompleted = $dataCompleted['actual_completed_date'];
                                            $actualDateCompletedFinal = date("d-M-Y", strtotime($actualDateCompleted));
                                            
                                            $planDateCompleted = $dataCompleted['plan_completed_date'];
                                            $planDateCompletedFinal = date("d-M-Y", strtotime($planDateCompleted));

                                            $createdDateCompleted = $dataCompleted['created_date'];
                                            $createdDateCompletedFinal = date("d-M-Y", strtotime($createdDateCompleted));
                                    ?>
                                    <!-- Task List -->
                                    <div class="card-body task-list-completed mt-2">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="title-text">
                                                    <strong>Completed</strong>
                                                </div>
                                                <!-- <strong><?= $actualDateCompletedFinal; ?></strong> -->
                                            </div>
                                            <div class="col-md-4">
                                                <div class="arrow">
                                                    <img class="icon-showed" src="images/arrow-right.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-name-completed">
                                            <?= $dataCompleted['event_details']; ?>
                                        </div>
                                        <div class="task-footer-completed">
                                            <div class="row">
                                                <div class="col-md-8" style="">
                                                    <!-- <div class="created-at-completed">
                                                        Deadline : <?= $planDateCompletedFinal; ?>
                                                    </div> -->
                                                    <div class="created-at">
                                                        Created at : <?= $createdDateCompletedFinal; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="admin-icon">
                                                        <img class="admin-icon-img" src="images/admin-icon-noshadow.png"
                                                            style="width: 45px; height: 45px;" alt="" title="Admin">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Task List -->
                                    <?php 
                                        endforeach
                                    ?>
                                    <div class="overlay overlay-completed">
                                        <img src="images/completed-people.gif" alt="Animated GIF">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="accordion" id="accordionThree">
                            <div class="card" style="border:none !important;">
                                <div class="card-header" id="headingOne">
                                    <button data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree">
                                        <div class="row">
                                            <div class="col-md-10 button-header">
                                                Cancelled
                                                <img class="icon-color" src="images/Ellipse-Red.png" alt="">
                                            </div>
                                            <div class="col-md-2 button-switcher">
                                                <img class="toggle-image" src="images/minus-icon.png" alt="">
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionThree">
                                    <?php 
                                        foreach ($dataToDoListCancelled as $dataCancelled) : 
                                            $planDateCancelled = $dataCancelled['plan_completed_date'];
                                            $newFormatDateCancelled = date("d-M-Y", strtotime($planDateCancelled));

                                            $createDateCancelled = $dataCancelled['created_date'];
                                            $newCreatedDateCancelled = date("d-M-Y", strtotime($createDateCancelled));
                                    ?>
                                    <!-- Task List -->
                                    <div class="card-body task-list-cancelled mt-2">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="title-text">
                                                    <strong>Cancelled</strong>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="arrow">
                                                    <img class="icon-showed" src="images/arrow-right.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-name-cancelled">
                                            <?= $dataCancelled['event_details']; ?>
                                        </div>
                                        <div class="task-footer-completed">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <!-- <div class="created-at-completed">
                                                        Deadline : <?= $newFormatDateCancelled; ?>
                                                    </div> -->
                                                    <div class="created-at">
                                                        Created at : <?= $newCreatedDateCancelled; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="admin-icon" style="">
                                                        <img class="admin-icon-img" src="images/admin-icon-noshadow.png"
                                                            style="width: 45px; height: 45px;" alt="" title="Admin">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Task List -->
                                    <?php 
                                        endforeach
                                    ?>
                                    <div class="overlay overlay-cancelled">
                                        <img src="images/cancelled.gif" alt="Animated GIF">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-divider"></div>
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
        var toggleButtons = document.querySelectorAll('[data-toggle="collapse"]');
        toggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var toggleImage = this.querySelector('.toggle-image');
                if (toggleImage) {
                    if (this.getAttribute('aria-expanded') === 'true') {
                        toggleImage.src = 'images/plus-icon.png';
                    } else {
                        toggleImage.src = 'images/minus-icon.png';
                    }
                }
            });
        });
    </script>
    <script>
        // Dapatkan elemen overlay dan card-body
        var overlay = document.querySelector('.overlay-in-progress');
        var overlayCompleted = document.querySelector('.overlay-completed');
        var overlayCancelled = document.querySelector('.overlay-cancelled');
        var cardBodyInProgress = document.querySelector('.task-list-in-progress');
        var cardBodyCompleted = document.querySelector('.task-list-completed');
        var cardBodyCancelled = document.querySelector('.task-list-cancelled');

        // Tambahkan event listener untuk mengaktifkan overlay saat card-body diklik
        cardBodyInProgress.addEventListener('click', function () {
            // Aktifkan overlay
            overlay.classList.add('active');

            // Setelah 2 detik, nonaktifkan overlay
            setTimeout(function () {
                overlay.classList.remove('active');
            }, 2500); // 2000 milidetik (2 detik)
        });

        // Tambahkan event listener untuk mengaktifkan overlay saat card-body diklik
        cardBodyCompleted.addEventListener('click', function () {
            // Aktifkan overlay
            overlayCompleted.classList.add('active');

            // Setelah 2 detik, nonaktifkan overlay
            setTimeout(function () {
                overlayCompleted.classList.remove('active');
            }, 2000); // 2000 milidetik (2 detik)
        });

        // Tambahkan event listener untuk mengaktifkan overlay saat card-body diklik
        cardBodyCancelled.addEventListener('click', function () {
            // Aktifkan overlay
            overlayCancelled.classList.add('active');

            // Setelah 2 detik, nonaktifkan overlay
            setTimeout(function () {
                overlayCancelled.classList.remove('active');
            }, 2000); // 2000 milidetik (2 detik)
        });
    </script>

</body>

</html>