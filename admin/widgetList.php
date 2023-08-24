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

    .btn {
      text-decoration: none;
      /* background-color: #005af0; */
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      outline: none;
      transition: 0.3s;
    }

    /* .btn:hover {
      text-decoration: none;
      background-color: #ffffff;
      color: black;
      padding: 10px 20px;
      border: none;
      outline: 1px solid #010101;
    } */

    .form input {
      margin: 10px 0;
      width: 100%;
      background-color: #e2e2e2;
      border: none;
      outline: none;
      padding: 12px 20px;
      border-radius: 4px;
    }

    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px;
    }

    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 570px;
      width: 100%;
      background: white;
      padding: 40px;
    }

    .formbold-img {
      margin-bottom: 40px;
    }

    .formbold-input-flex {
      display: flex;
      gap: 20px;
      margin-bottom: 30px;
    }

    .formbold-input-flex>div {
      width: 50%;
    }

    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #dde3ec;
      background: #ffffff;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }

    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-form-label {
      color: #536387;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }

    .formbold-mb-5 {
      margin-bottom: 20px;
    }

    .formbold-radio-flex {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .formbold-radio-label {
      font-size: 14px;
      line-height: 24px;
      color: #07074d;
      position: relative;
      padding-left: 25px;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .formbold-input-radio {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    .formbold-radio-checkmark {
      position: absolute;
      top: -1px;
      left: 0;
      height: 18px;
      width: 18px;
      background-color: #ffffff;
      border: 1px solid #dde3ec;
      border-radius: 50%;
    }

    .formbold-radio-label .formbold-input-radio:checked~.formbold-radio-checkmark {
      background-color: #6a64f1;
    }

    .formbold-radio-checkmark:after {
      content: '';
      position: absolute;
      display: none;
    }

    .formbold-radio-label .formbold-input-radio:checked~.formbold-radio-checkmark:after {
      display: block;
    }

    .formbold-radio-label .formbold-radio-checkmark:after {
      top: 50%;
      left: 50%;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #ffffff;
      transform: translate(-50%, -50%);
    }

    .formbold-btn {
      text-align: center;
      width: 100%;
      font-size: 16px;
      border-radius: 5px;
      padding: 14px 25px;
      border: none;
      font-weight: 500;
      background-color: #6a64f1;
      color: white;
      cursor: pointer;
      margin-top: 25px;
    }

    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
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
            <li class="sidebar-item">
              <a class="sidebar-link" href="widgetList" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Widget List</span>
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
              <h5 class="card-title fw-semibold mb-4 justify-content-center"><strong>Widget List</strong></h5>
              <div class="row mt-3">
                <div class="col-6">
                  <div class="card alert-success" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Widget Slider</strong></h5>
                      <?php 
                        $sqlCount = "SELECT count(id) as `widget_slider` FROM re_widget_list WHERE widget_type = 1 AND status = 1";
                        $executeCount = mysqli_query($conn, $sqlCount);
                        $dataCount = mysqli_fetch_assoc($executeCount);
                      ?>
                      <p class="card-text"><?php echo $dataCount['widget_slider']; ?> / 3</p>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="card alert-danger" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Widget Ads</strong></h5>
                      <?php 
                        $sqlCount = "SELECT count(id) as `widget_ad` FROM re_widget_list WHERE widget_type = 2 AND status = 1";
                        $executeCount = mysqli_query($conn, $sqlCount);
                        $dataCount = mysqli_fetch_assoc($executeCount);
                      ?>
                      <p class="card-text"><?php echo $dataCount['widget_ad']; ?> / 2</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-upload">
                <h3 class="mt-3">Upload Widget</h3>
                <hr />
                <div class="row mt-2">
                  <div class="table-responsive">

                    <table id="example" class="table table-striped table-bordered mt-4" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Widget Name</th>
                          <th>Path File</th>
                          <th>Href Link</th>
                          <th>Status</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                  //Function on core_function.php
                  $data = selectSqlWidgetList();
                  for($i = 0 ; $i<count($data); $i++){
                    if($data[$i]['status'] == 0){
                      $status = 'InActive';
                    }else{
                      $status = 'Active';
                    }
                  ?>
                        <tr>
                          <td><?php echo $i+1; ?></td>
                          <td><?php echo $data[$i]['widget_name']; ?></td>
                          <td><?php echo $data[$i]['file_directory']; ?></td>
                          <td><?php echo $data[$i]['link']; ?></td>
                          <td><?php echo $status; ?></td>
                          <td><?php echo $data[$i]['created_date']; ?></td>
                          <td>
                            <input type="text" name="idProject" class="formbold-form-input"
                              value="<?php echo $data[$i]['id']; ?>" hidden />
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                              data-target="#exampleModal<?php echo $i;?>">
                              Details
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ukuran Banner Wajib 1200x400 pixel
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="mt-2" action="backend/action_push_event.php" method="POST"
                                      enctype="multipart/form-data">
                                      <div class="formbold-input-flex">
                                        <div>
                                          <label for="widgetId" class="formbold-form-label">
                                            Id Slider
                                          </label>
                                          <input type="text" name="widgetId" id="widgetId" placeholder="Widget Id"
                                            class="formbold-form-input" value="<?php echo $data[$i]['id']; ?>"
                                            readonly />
                                        </div>
                                        <div>
                                          <label for="linkTo" class="formbold-form-label"> Link To </label>
                                          <input type="text" name="linkTo" id="linkTo" placeholder="Link To"
                                            class="formbold-form-input" 
                                            value="<?php if($data[$i]['link'] != NULL || $data[$i]['link'] != "") {echo $data[$i]['link']; }?>" />
                                        </div>
                                      </div>
                                      <div class="formbold-input mt-2">
                                        <div>
                                          <label for="bannerPath" class="formbold-form-label"> Cover Project </label>
                                          <input type="file" name="bannerPath" id="bannerPath" placeholder="Cooper"
                                            class="formbold-form-input" />
                                        </div>
                                      </div>
                                      <div class="formbold-input mt-2">
                                        <div>
                                          <label for="bannerPath" class="formbold-form-label"> Status </label>
                                          <div class="input-group">
                                            <select class="formbold-form-input" name="status">
                                              <option disabled>--Choose--</option>
                                              <?php if($data[$i]['status'] == 1){ ?>
                                                <option value="0">InActive</option>
                                                <option value="1" selected>Active</option>
                                              <?php }else{?>
                                                <option value="0" selected>InActive</option>
                                                <option value="1">Active</option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="formbold-mb-5">
                                        <?php if ($data[$i]['file_directory'] != NULL || $data[$i]['file_directory'] != ''){ ?>
                                        <label for="qusOne" class="formbold-form-label">
                                          <?php echo $data[$i]['file_directory']; ?>
                                        </label>
                                        <?php }else{ ?>
                                        <label for="qusOne" class="formbold-form-label">
                                          Oops no image here...
                                        </label>
                                        <?php } ?>
                                        <button class="formbold-btn" name="submitWidget">Submit</button>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php  
                  }
                  ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No.</th>
                          <th>Project Name</th>
                          <th>Cover project</th>
                          <th>Github Link</th>
                          <th>Created Date</th>
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