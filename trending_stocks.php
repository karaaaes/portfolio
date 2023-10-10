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
    <title>Portfolio Raka | Trending Stocks</title>
    <link href='https://upload.wikimedia.org/wikipedia/commons/5/53/Rockstar_Games_Logo.svg' rel='shortcut icon'>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/trending-stocks.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
            padding-left: 10px;
            padding-left: 10px;
        }

        /* CSS untuk tampilan desktop */
        @media (min-width: 768px) {
            body {
                font-family: 'Roboto', sans-serif !important;
                padding-left: 200px !important;
                padding-right: 200px !important;
            }
        }

        .main-content {
            margin-top: 80px;
        }

        .subheader {
            margin-top: 40px;
            font-size: 16px;
            letter-spacing: 0.16em;
            font-style: italic;
        }

        .header {
            margin-top: 10px;
            font-size: 32px;
            font-weight: 500;
        }

        .header-2 {
            margin-top: 40px;
            font-size: 32px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .content-images {
            transition: transform 0.3s ease;
        }

        .content-images:hover {
            transform: scale(1.1);
        }

        .banner-images {
            margin-top: -35px;
            height: 300px;
            width: 100%;
        }

        /* CSS untuk tampilan desktop */
        @media (min-width: 768px) {
            .banner-images {
                margin-top: 35px;
                height: 300px;
                width: 100%;
            }
        }

        .content-text {
            font-size: 16px;
        }

        /* CSS untuk tampilan desktop */
        @media (min-width: 768px) {
            .content-text {
                margin-top: 55px;
                font-size: 16px;
            }
        }

        .card-list {
            padding-right: 5px !important;
            padding-left: 5px !important;
            padding-top: 2px !important;
            padding-bottom: 10px !important;
        }

        .card-background {
            background-color: #2C2F34;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            padding-bottom: 20px;
        }

        .content-card {
            margin-top: 20px;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .rounded-background {
            background-color: white;
            border-radius: 100px;
            width: 60px;
            height: 60px;
            margin-left: 50px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rounded-background img {
            max-width: 100%;
            height: auto;
            margin: 0;
        }

        .stocks-title {
            color: white;
            font-size: 24px;
            font-weight: 500;
            margin-top: 17px;
            margin-left: 15px;
        }

        .price-change {
            margin-top: 27px;
            width: 15px;
            height: 15px;
            margin-left: 31px;
        }

        .price-text-danger {
            margin-top: 23px;
            margin-left: 20px;
            color: #FF6D60;
        }

        .price-text-success {
            margin-top: 23px;
            margin-left: 20px;
            color: #8EAC50;
        }

        .mark-change {
            text-align: center;
            justify-content: center;
        }

        .plane-icon {
            width: 20px;
            height: 20px;
            margin-top: 25px;
        }

        /* img {
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        } */

        .card-list {
            transition: transform 0.3s ease;
        }

        .card-list:hover {
            transform: scale(1.05);
        }

        .attribute {
            margin-top: 25px;
        }

        .attribute-2{
            margin-top: 10px;
        }

        .group-attribute {
            margin-left: 39px;
        }

        .title-attribute {
            color: #B5B9C0;
        }

        .price-attribute {
            color: white;
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
        <div class="container main-content">
            <!-- Banner -->
            <section class="banner">
                <div class="row subheader">
                    <div class="col-12">
                        Trending Stocks
                    </div>
                </div>
                <div class="row header">
                    <div class="col-12">
                        Trending stocks refer to publicly-traded
                        company shares that are currently experiencing
                        significant in their market value.
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="content-images">
                            <img class="banner-images" src="images/main-header-content.svg" alt="stock-content"
                                style="width:100%;">
                        </div>
                    </div>
                    <div class="col-12 content-text">
                        Trending stocks on the IDX (Indonesia Stock Exchange) refer to publicly traded company shares
                        that are currently experiencing significant changes in their market value, attracting
                        considerable attention from investors and traders. These changes can be driven by various
                        factors such as corporate earnings reports, economic developments, political events, or
                        industry-specific news.
                        <br /><br />
                        These trending stocks often capture the interest of market participants due to their potential
                        for quick gains or losses. Investors and traders actively monitor these stocks to make informed
                        decisions about buying or selling, as the rapid changes in market value can present both
                        opportunities and risks.
                        <br /><br />
                        It's important to note that the stock market can be highly dynamic, and trends can change
                        quickly. Staying updated on the latest news and analysis is crucial for anyone participating in
                        the IDX to navigate the market effectively.
                    </div>
                </div>
                <div class="row header-2">
                    <div class="col-12">
                        Top IDX Composite trending stocks ranking based on Oct 05, 2023.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-12 card-list">
                        <div class="card-background">
                            <div class="row">
                                <div class="col-md-4 content-card">
                                    <!-- Tambahkan class d-flex dan justify-content-center -->
                                    <div class="rounded-background">
                                        <img src="images/goto-logo.svg" alt="Logo">
                                    </div>
                                </div>
                                <div class="col-md-2 content-card">
                                    <div class="stocks-title">
                                        GOTO
                                    </div>
                                </div>
                                <div class="col-md-1 content-card mark-change">
                                    <img class="price-change" src="images/triangle-red.svg" alt="">
                                </div>
                                <div class="col-md-3 content-card">
                                    <div class="price-text-danger">
                                        -1.91%
                                    </div>
                                </div>
                                <div class="col-md-2 content-card">
                                    <a href="#">
                                        <img class="plane-icon" src="images/plane-icon.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="row attribute">
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Open
                                    </div>
                                    <div class="price-attribute">
                                        80
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Close
                                    </div>
                                    <div class="price-attribute">
                                        85
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Low
                                    </div>
                                    <div class="price-attribute">
                                        83
                                    </div>
                                </div>
                            </div>
                            <div class="row attribute-2">
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        High
                                    </div>
                                    <div class="price-attribute">
                                        83
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Volume
                                    </div>
                                    <div class="price-attribute">
                                        242800
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 card-list">
                        <div class="card-background">
                            <div class="row">
                                <div class="col-md-4 content-card">
                                    <!-- Tambahkan class d-flex dan justify-content-center -->
                                    <div class="rounded-background">
                                        <img src="images/goto-logo.svg" alt="Logo">
                                    </div>
                                </div>
                                <div class="col-md-2 content-card">
                                    <div class="stocks-title">
                                        BBNI
                                    </div>
                                </div>
                                <div class="col-md-1 content-card mark-change">
                                    <img class="price-change" src="images/triangle-green.svg" alt="">
                                </div>
                                <div class="col-md-3 content-card">
                                    <div class="price-text-success">
                                        7.91%
                                    </div>
                                </div>
                                <div class="col-md-2 content-card">
                                    <a href="#">
                                        <img class="plane-icon" src="images/plane-icon.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="row attribute">
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Open
                                    </div>
                                    <div class="price-attribute">
                                        5000
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Close
                                    </div>
                                    <div class="price-attribute">
                                        5125
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Low
                                    </div>
                                    <div class="price-attribute">
                                        4995
                                    </div>
                                </div>
                            </div>
                            <div class="row attribute-2">
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        High
                                    </div>
                                    <div class="price-attribute">
                                        5225
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Volume
                                    </div>
                                    <div class="price-attribute">
                                        242800
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 card-list">
                        <div class="card-background">
                            <div class="row">
                                <div class="col-md-4 content-card">
                                    <!-- Tambahkan class d-flex dan justify-content-center -->
                                    <div class="rounded-background">
                                        <img src="images/goto-logo.svg" alt="Logo">
                                    </div>
                                </div>
                                <div class="col-md-2 content-card">
                                    <div class="stocks-title">
                                        GOTO
                                    </div>
                                </div>
                                <div class="col-md-1 content-card mark-change">
                                    <img class="price-change" src="images/triangle-red.svg" alt="">
                                </div>
                                <div class="col-md-3 content-card">
                                    <div class="price-text-danger">
                                        -1.91%
                                    </div>
                                </div>
                                <div class="col-md-2 content-card">
                                    <a href="#">
                                        <img class="plane-icon" src="images/plane-icon.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="row attribute">
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Open
                                    </div>
                                    <div class="price-attribute">
                                        80
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Close
                                    </div>
                                    <div class="price-attribute">
                                        85
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Low
                                    </div>
                                    <div class="price-attribute">
                                        83
                                    </div>
                                </div>
                            </div>
                            <div class="row attribute-2">
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        High
                                    </div>
                                    <div class="price-attribute">
                                        83
                                    </div>
                                </div>
                                <div class="col-md-2 group-attribute">
                                    <div class="title-attribute">
                                        Volume
                                    </div>
                                    <div class="price-attribute">
                                        242800
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="col-lg-12 animate__animated animate__zoomIn">
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
                                        style="padding:auto; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                        <img class="card-img-top" src="<?= $resultProfile['data']['result']['logo'] ?>"
                                            alt="Card image cap" style="width: 100%;">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $resultProfile['data']['result']['name']; ?>
                                            (<?= $resultProfile['data']['result']['ticker']; ?>)</h5>
                                        <p class="card-text">
                                            <table class="table" border="0">
                                                <thead>
                                                    <tr style="">
                                                        <th scope="col" style="font-weight: 700; color:black;">
                                                            Details</th>
                                                        <th scope="col" style="font-weight: 700; color:black;">
                                                            Values</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Open</th>
                                                        <td><?= $resultProfile['data']['last_price']['open']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">High</th>
                                                        <td><?= $resultProfile['data']['last_price']['high']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Low</th>
                                                        <td><?= $resultProfile['data']['last_price']['low']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Close</th>
                                                        <td><?= $resultProfile['data']['last_price']['close']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Change</th>
                                                        <?php 
                                                                $formattedNumber = number_format($stock['percent'], 2);
                                                                // Mengecek string1
                                                                if (strpos($formattedNumber, '-') !== false) {
                                                                    ?>
                                                        <td style="color: red; font-weight: 300;">
                                                            <?= $formattedNumber; ?>%</td>
                                                        <?php
                                                                }else {
                                                                    ?>
                                                        <td style="color: green; font-weight: 300;">
                                                            <?= $formattedNumber; ?>%</td>
                                                        <?php
                                                                }
                                                            ?>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Volume</th>
                                                        <td><?= $resultProfile['data']['last_price']['volume']; ?>
                                                        </td>
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
                    </div> -->
            </section>
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