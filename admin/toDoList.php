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
      <?php 
      if(isset($_GET['act']) && $_GET['act'] == "edit"){
      ?>
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4 justify-content-center"><strong>Edit Data Form</strong></h5>
              <?php
              $data = selectSpesificTask($_GET['id']);
              ?>
              <form method="POST" action="backend/action_push_event.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Task Number</label>
                  <input type="text" name="task_number" class="form-control" value="<?php echo $data['task_number']; ?>"
                    readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Event Details</label>
                  <textarea class="form-control" name="event_details"><?php echo $data['event_details']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Plan Completed Date</label>
                  <input type="date" class="form-control" name="plan_completed_date"
                    value="<?php echo $data['plan_completed_date']; ?>">
                </div>
                <button type="submit" name="update_data" class="btn btn-warning float-right">Edit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
      }else{
      ?>
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4 justify-content-center"><strong>Manage To Do List</strong></h5>
              <div class="row">
                <div class="col-12" style="margin-left: auto;">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: auto;">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data To Do List</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="backend/action_push_event.php" method="post">
                            <div class="form-group">
                              <label for="task_number">Task Number</label>
                              <?php 
                              $sqlCheckData = "SELECT * FROM re_events ORDER BY task_number DESC LIMIT 1";
                              $executeCheckData = mysqli_query($conn, $sqlCheckData);
                              if ($executeCheckData && mysqli_num_rows($executeCheckData) < 1) {
                                $taskNo = 1;
                              }else{
                                $dataEvents = mysqli_fetch_assoc($executeCheckData);
                                if(isset($dataEvents['task_number'])){
                                  $taskNo = $dataEvents['task_number'] + 1;
                                }
                              }
                              ?>
                              <input type="text" class="form-control" id="task_number" aria-describedby="emailHelp"
                                name="task_number" value="<?php echo $taskNo;?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="event_details">Event Details</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="event_detail"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="plan_completed_date">Plan Completed Date</label>
                              <input type="date" class="form-control" id="plan_completed_date"
                                name="plan_completed_date">
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="submit_event" class="btn btn-primary">Submit Event</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              // Count event/task Planned
              $sqlGetPlannedTask = "SELECT COUNT(task_number) as 'jumlah_task_planned' FROM re_events WHERE status = 'Planned'";
              $executeGetPlannedTask = mysqli_query($conn, $sqlGetPlannedTask);
              $dataPlannedTask = mysqli_fetch_assoc($executeGetPlannedTask);
              $totalPlannedTask = $dataPlannedTask['jumlah_task_planned'];

              // Count event/task Completed
              $sqlGetCompletedTask = "SELECT COUNT(task_number) as 'jumlah_task_completed' FROM re_events WHERE status = 'Completed'";
              $executeGetCompletedTask = mysqli_query($conn, $sqlGetCompletedTask);
              $dataCompletedTask = mysqli_fetch_assoc($executeGetCompletedTask);
              $totalCompletedTask = $dataCompletedTask['jumlah_task_completed'];

              // Count event/task Cancelled
              $sqlGetCancelledTask = "SELECT COUNT(task_number) as 'jumlah_task_cancelled' FROM re_events WHERE status = 'Cancelled'";
              $executeGetCancelledTask = mysqli_query($conn, $sqlGetCancelledTask);
              $dataCancelledTask = mysqli_fetch_assoc($executeGetCancelledTask);
              $totalCancelledTask = $dataCancelledTask['jumlah_task_cancelled'];

              ?>
              <div class="row mt-3">
                <div class="col-4">
                  <div class="card alert-primary" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Planned</strong></h5>
                      <p class="card-text"><?php echo $totalPlannedTask; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="card alert-success" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Completed</strong></h5>
                      <p class="card-text"><?php echo $totalCompletedTask; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="card alert-danger" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Cancelled</strong></h5>
                      <p class="card-text"><?php echo $totalCancelledTask; ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <table id="example" class="table table-striped table-bordered" width="100%">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Event Details</th>
                    <th>Created Date</th>
                    <th>Plan Completed Date</th>
                    <th>Actual Completed Date</th>
                    <th>Current Status</th>
                    <th>Mark</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sqlGetEvent = "SELECT * FROM re_events";
                  $executeGetEvent = mysqli_query($conn, $sqlGetEvent);
                  if ($executeGetEvent && mysqli_num_rows($executeGetEvent) < 1) {
                    echo "<tr>
                    <td colspan = '8'>Kosong</td>
                  </tr>";
                  }else{
                    for($i=0 ; $i < mysqli_num_rows($executeGetEvent) ; $i++){
                      $dataEventList[$i] = mysqli_fetch_assoc($executeGetEvent);
                      $taskNumber = $dataEventList[$i]['task_number'];
                    echo "<tr>
                    <td>".$taskNumber."</td>
                    <td>".$dataEventList[$i]['event_details']."</td>
                    <td>".$dataEventList[$i]['created_date']."</td>
                    <td>".$dataEventList[$i]['plan_completed_date']."</td>
                    <td>".$dataEventList[$i]['actual_completed_date']."</td>
                    <td><strong>".$dataEventList[$i]['status']."</strong></td>
                    <td>
                      <form action='backend/action_push_event.php' method='post' enctype='multipart/form-data'>
                      <div class='col-12'>
                        <input type='text' name='task_number_completed' value='$taskNumber' hidden>
                        <button type='submit' name='update_completed' class='btn btn-success' style='width: 100%;'>Completed</button>
                      </div>
                      <div class='col-12'>
                        <input type='text' name='task_number_cancelled' value='$taskNumber' hidden>
                        <button type='submit' name='update_cancelled' class='btn btn-danger' style='width: 100%;'>Cancelled</button>
                      </div>
                      <div class='col-12'>
                        <input type='text' name='task_number_recall' value='$taskNumber' hidden>
                        <button type='submit' name='update_recall' class='btn btn-primary' style='width: 100%;'>Recall</button>
                      </div>
                      </form>
                      <div class='col-12'>
                        <input type='text' name='task_number_edit' value='$taskNumber' hidden>
                        <a href='toDoList.php?act=edit&id=$taskNumber' name='update_edit' id='update_edit' class='btn btn-warning' style='width: 100%;'>
                          Edit
                        </a>
                      </div>
                    </td>
                  </tr>";
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Event Details</th>
                    <th>Created Date</th>
                    <th>Plan Completed Date</th>
                    <th>Actual Completed Date</th>
                    <th>Current Status</th>
                    <th>Mark</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
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