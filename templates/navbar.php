<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<!-- Menyertakan file CSS dari MDB melalui CDN -->


<style>
    /* Color of the links BEFORE scroll */
    .navbar-scroll .nav-link,
    .navbar-scroll .navbar-toggler-icon,
    .navbar-scroll .navbar-brand {
        color: #EEEEEE !important;
        font-weight: 700 !important;
    }

    /* Color of the navbar BEFORE scroll */
    .navbar-scroll {
        background-color: #482121 !important;
    }

    /* Color of the links AFTER scroll */
    .navbar-scrolled .nav-link,
    .navbar-scrolled .navbar-toggler-icon,
    .navbar-scroll .navbar-brand {
        color: #262626 !important;
    }

    /* Color of the navbar AFTER scroll */
    .navbar-scrolled {
        background-color: #fff !important;
    }

    /* An optional height of the navbar AFTER scroll */
    .navbar.navbar-scroll.navbar-scrolled {
        padding-top: auto !important;
        padding-bottom: auto !important;
    }

    .navbar-brand {
        font-size: unset !important;
        height: 3.5rem !important;
    }

    .nav-item {
        margin-right: 10px;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
    <div class="container" style="">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="project">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trending_stocks">Trending Stocks</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Menyertakan file JavaScript dari MDB melalui CDN -->
<script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@3.11.0/js/mdb.min.js"></script>

<!-- Kode JavaScript untuk inisialisasi navbar hamburger -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new mdb.Collapse(document.querySelector('#navbarSupportedContent'));
    });
</script>