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

        /* CSS styling for the text animation */
        .marquee {
            white-space: nowrap;
            overflow: hidden;
        }

        .marquee span {
            display: inline-block;
            padding-right: 30px;
            animation: marquee-animation 10s linear infinite;
        }

        @keyframes marquee-animation {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
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

                <!-- Banner -->
                <section class="banner" style="margin-top: -30px; margin-left: 30px;">
                    <div class="row">
                        <div class="col-lg-12 animate__animated animate__zoomIn">
                            <h2><?php echo date("D, d-M-Y"); ?> - Trending Stocks IDX Composite Today</h2>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 animate__animated animate__zoomIn">
                            <div class="row">
                                <?php 
                                    $data = getTrendingStocks();
                                    if ($data) {
                                        // Mengkonversi data JSON menjadi array asosiatif
                                        $result = json_decode($data, true);
                                    
                                        // Memeriksa apakah permintaan berhasil
                                        if (isset($result['status']) && $result['status'] == 'success') {
                                            $trendingStocks = $result['data']['results'];
                                            foreach ($trendingStocks as $stock) {
                                                $dataProfile = getStocksProfile($stock['ticker']);
                                                $resultProfile = json_decode($dataProfile, true);
                                                ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card card-ruler">
                                        <div class="card-img-cover"
                                            style="background-color: padding:auto; display: flex; justify-content: center; align-items: center; overflow:hidden;">
                                            <img class="card-img-top"
                                                src="<?= $resultProfile['data']['result']['logo'] ?>"
                                                alt="Card image cap" style="width: 100%;">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $resultProfile['data']['result']['name']; ?>
                                                (<?= $resultProfile['data']['result']['ticker']; ?>)</h5>
                                            <p class="card-text">
                                                <table class="table" border="0">
                                                    <thead>
                                                        <tr style="">
                                                            <th scope="col" style="font-weight: 700; color:black;">Details</th>
                                                            <th scope="col" style="font-weight: 700; color:black;">Values</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Open</th>
                                                            <td><?= $resultProfile['data']['last_price']['open']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">High</th>
                                                            <td><?= $resultProfile['data']['last_price']['high']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Low</th>
                                                            <td><?= $resultProfile['data']['last_price']['low']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Close</th>
                                                            <td><?= $resultProfile['data']['last_price']['close']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Change</th>
                                                            <?php 
                                                                $formattedNumber = number_format($stock['percent'], 2);
                                                                // Mengecek string1
                                                                if (strpos($formattedNumber, '-') !== false) {
                                                                    ?>
                                                                        <td style="color: red; font-weight: 300;"><?= $formattedNumber; ?>%</td>
                                                                    <?php
                                                                }else {
                                                                    ?>
                                                                        <td style="color: green; font-weight: 300;"><?= $formattedNumber; ?>%</td>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Volume</th>
                                                            <td><?= $resultProfile['data']['last_price']['volume']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </p>
                                            <p class="card-text">Website
                                                <?= $resultProfile['data']['result']['ticker']; ?> : <a
                                                    href="<?= $resultProfile['data']['result']['website']; ?>">Visit
                                                    Link</a></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                            }
                                        } else {
                                            echo 'Permintaan gagal: ' . $result['message'];
                                        }
                                    } else {
                                        echo 'Gagal mengambil data dari API.';
                                    }
                                ?>
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
        function toggleDetail(id) {
            var detail = document.getElementById("detail" + id);
            detail.style.maxHeight = detail.style.maxHeight ? null : detail.scrollHeight + "px";
        }
    </script>


</body>

</html>