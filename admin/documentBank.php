<?php
// Mulai sesi
session_start();
include 'backend/database.php';
include 'backend/core_function.php';

if (!isset($_SESSION['username'])) {
  // Jika tidak ada sesi username, arahkan pengguna kembali ke halaman login
  $_SESSION['error'] = "Kamu belum login, harap kembali !";
  header('Location: loginAdmin.php');
  exit();
}

if(isset($_SESSION['status'])){
  echo "<script>alert('".$_SESSION['status']."')</script>";
  unset($_SESSION['status']);
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMS Karaes</title>
  <link rel="shortcut icon" type="image/png" href="assets//images/logos/favicon.png" />
  <link rel="stylesheet" href="assets//css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- CSS DataTable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <!-- CSS DataTable -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    .card-upload {
      border-radius: 10px;
      box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
      width: 100%;
      height: 100%;
      background-color: #ffffff;
      padding: 10px 30px 40px;
    }

    .card h3 {
      font-size: 22px;
      font-weight: 600;

    }

    .drop_box {
      margin: 10px 0;
      padding: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      border: 3px dotted #a3a3a3;
      border-radius: 5px;
    }

    .drop_box h4 {
      font-size: 16px;
      font-weight: 400;
      color: #2e2e2e;
    }

    .drop_box p {
      margin-top: 10px;
      margin-bottom: 20px;
      font-size: 12px;
      color: #a3a3a3;
    }

    .btn {
      text-decoration: none;
      /* background-color: #005af0; */
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      outline: none;
      transition: 0.3s;
    }

    .btn:hover {
      text-decoration: none;
      background-color: #ffffff;
      color: black;
      padding: 10px 20px;
      border: none;
      outline: 1px solid #010101;
    }

    .form input {
      margin: 10px 0;
      width: 100%;
      background-color: #e2e2e2;
      border: none;
      outline: none;
      padding: 12px 20px;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="assets//images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Features</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="toDoList" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">To Do List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="documentBank" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Document Bank</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="projectList" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Project List</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>

          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="assets//images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="backend/action_logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4 justify-content-center"><strong>Document Bank</strong></h5>
              <div class="row mt-3">
                <div class="col-4">
                  <div class="card alert-success" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Total File</strong></h5>
                      <?php 
                        $sqlCount = "SELECT count(file_id_drive) as `jumlah_file` FROM re_file_list";
                        $executeCount = mysqli_query($conn, $sqlCount);
                        $dataCount = mysqli_fetch_assoc($executeCount);
                      ?>
                      <p class="card-text"><?php echo $dataCount['jumlah_file']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-upload">
                <h3>Upload Files</h3>
                <div class="drop_box">
                  <header>
                    <h4>Select File here</h4>
                  </header>
                  <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
                  <form action="backend/action_push_event.php" method="post" enctype="multipart/form-data">
                    <input type="file" accept=".doc,.docx,.pdf,.xlsx,.xls,.txt" name="fileToUpload">
                    <div class="row mt-2">
                      <button type="submit" name="upload_file" class="btn btn-primary">Upload</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row mt-5">
                <table id="example" class="table table-striped table-bordered mt-4" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>File Name</th>
                      <th>Path to Server</th>
                      <th>Link to Drive</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                  //Function on core_function.php
                  $data = selectSqlDataFileDrive();
                  for($i = 0 ; $i<count($data); $i++){
                  ?>
                    <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $data[$i]['file_name']; ?></td>
                      <td><?php echo $data[$i]['file_directory']; ?></td>
                      <td>
                        <a href="https://drive.google.com/file/d/<?php echo $data[$i]['file_id_drive']; ?>"
                          class="btn btn-primary" target="_blank">
                          Lihat File
                        </a>
                      </td>
                      <td>
                        <form action="backend/action_push_event.php" method="POST" enctype="multipart/form-data">
                          <input type="text" name="file_id_drive" value="<?php echo $data[$i]['file_id_drive'];?>"
                            hidden>
                          <input type="text" name="file_directory" value="<?php echo $data[$i]['file_directory'];?>"
                            hidden>
                          <button type="submit" name="delete_file" class="btn btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    <?php  
                  }
                  ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>File Name</th>
                      <th>Path to Server</th>
                      <th>Link to Drive</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets//libs/jquery/dist/jquery.min.js"></script>
    <script src="assets//libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets//js/sidebarmenu.js"></script>
    <script src="assets//js/app.min.js"></script>
    <script src="assets//libs/simplebar/dist/simplebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Script Datatables -->
    <script>
      $(document).ready(function () {
        $('#example').DataTable();
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Script Datatables -->

</body>

</html>