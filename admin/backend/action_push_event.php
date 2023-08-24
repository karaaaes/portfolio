<?php 
error_reporting(E_ERROR | E_PARSE);
require 'google_drive.php';
include 'database.php';
include 'core_function.php';
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['submit_event'])){
    $taskNumber = $_POST['task_number'];
    $eventDetail = $_POST['event_detail'];
    $planCompletedDate = $_POST['plan_completed_date'];
    $dateNow = date('Y-m-d H:i:s');

    echo "$taskNumber - $eventDetail - $dateNow - $planCompletedDate";

    $insertEvent = "INSERT INTO re_events (task_number, event_details, created_date, plan_completed_date, status)
    VALUES ('$taskNumber', '$eventDetail', '$dateNow', '$planCompletedDate', 'Planned')";
    $executeInsertEvent = mysqli_query($conn, $insertEvent);

    if ($executeInsertEvent) {
        session_start();
        $_SESSION['status'] = "Data event berhasil di push !";
        header('Location: ../toDoList.php');
        exit();
    }else{
        session_start();
        $_SESSION['status'] = "Data event gagal di push !";
        header('Location: ../toDoList.php');
        exit();
    }
}

if(isset($_POST['update_completed'])){
    $taskNumber = $_POST['task_number_completed'];
    $actualCompletedDate = date('Y-m-d');
    $modifiedDate = date('Y-m-d H:i:s');

    $sqlUpdateCompelete = "UPDATE re_events SET status = 'Completed', actual_completed_date = '$actualCompletedDate', modified_date = '$modifiedDate' WHERE task_number = $taskNumber";
    $executeUpdateComplete = mysqli_query($conn, $sqlUpdateCompelete);

    if($executeUpdateComplete){
        session_start();
        $_SESSION['status'] = "Task Number $taskNumber telah di Completed.";
        header('Location: ../toDoList.php');
    }else{
        session_start();
        $_SESSION['status'] = "Update Status Gagal";
        header('Location: ../toDoList.php');
    }
}

if(isset($_POST['update_cancelled'])){
    $taskNumber = $_POST['task_number_cancelled'];
    $modifiedDate = date('Y-m-d H:i:s');

    $sqlUpdateCancelled = "UPDATE re_events SET status = 'Cancelled', modified_date = '$modifiedDate' WHERE task_number = $taskNumber";
    $executeUpdateCancelled = mysqli_query($conn, $sqlUpdateCancelled);

    if($executeUpdateCancelled){
        session_start();
        $_SESSION['status'] = "Task Number $taskNumber telah di Cancelled";
        header('Location: ../toDoList.php');
    }else{
        session_start();
        $_SESSION['status'] = "Update Status Gagal";
        header('Location: ../toDoList.php');
    }
}

if(isset($_POST['update_recall'])){
    $taskNumber = $_POST['task_number_recall'];
    $modifiedDate = date('Y-m-d H:i:s');

    $sqlUpdateRecall = "UPDATE re_events SET status = 'Planned', modified_date = '$modifiedDate' WHERE task_number = $taskNumber";
    $executeUpdateRecall = mysqli_query($conn, $sqlUpdateRecall);

    if($executeUpdateRecall){
        session_start();
        $_SESSION['status'] = "Task Number $taskNumber telah di Planned";
        header('Location: ../toDoList.php');
    }else{
        session_start();
        $_SESSION['status'] = "Update Status Gagal";
        header('Location: ../toDoList.php');
    }
}

if(isset($_POST['update_data'])){
    $taskNumber = $_POST['task_number'];
    $eventDetails = $_POST['event_details'];
    $planCompletedDate = $_POST['plan_completed_date'];

    $data = updateEvent($taskNumber, $eventDetails, $planCompletedDate);

    if(!$data){
        session_start();
        $_SESSION['status'] = "Data gagal di Update";
        header('Location: ../toDoList.php');   
        return;
    }
    
    session_start();
    $_SESSION['status'] = "Data berhasil di Update";
    header('Location: ../toDoList.php');
}

if(isset($_POST['upload_file'])){
    $service = new Google_Service_Drive($GLOBALS['client']);
    $folder = new Google_Service_Drive_DriveFile();

    $folder_id = "1vRz7LokgUNyaHPTzAPCMImVyb5WC6HB_";

    $file_tmp  = $_FILES["fileToUpload"]["tmp_name"];
    $file_type = $_FILES["fileToUpload"]["type"];
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $path = "uploads/".$file_name;

    move_uploaded_file($file_tmp, $path);
    $success = insertFileToDrive($path, $file_name, $folder_id);
    $data = insertDataFileDrive($file_name, $success, $path);

    if($data == 'Success'){
        session_start();
        $_SESSION['status'] = "File berhasil di Upload";
        header('Location: ../documentBank.php');
    }
}

if(isset($_POST['delete_file'])){
    $fileIdDrive = $_POST['file_id_drive'];
    $fileDirectory = $_POST['file_directory'];
    $actionDrive = deleteDataFileDrive($fileIdDrive);
    $actionServer = deleteDataFileServer($fileDirectory);
    $actionSqlDelete = deleteSqlDataFileDrive($fileIdDrive);

    if($actionDrive == "Success" && $actionServer == "Success" && $actionSqlDelete == "Success"){
        session_start();
        $_SESSION['status'] = "File berhasil di Hapus";
        header('Location: ../documentBank.php');
    }else{
        session_start();
        $_SESSION['status'] = "Ada directory yang belum di Hapus";
        header('Location: ../documentBank.php');
    }
}

if(isset($_POST['submitProject'])){
    $projectName = $_POST['projectName'];
    $githubLink = $_POST['githubLink'];
    $description = $_POST['description'];
    $coverImage = $_FILES['coverProject']['name']; // Nama file yang diunggah
    $coverImageTmp = $_FILES['coverProject']['tmp_name']; // Lokasi sementara file yang diunggah

    // Tentukan path dan nama file tujuan
    $destination = '../../images/images_project/' . $coverImage;

    $arrayInsertProject = array(
        "projectName" => $projectName,
        "githubLink" => $githubLink,
        "description" => $description,
        "filePath" => $destination
    );

    $insertData = insertProjectList($arrayInsertProject);

    if($insertData == "Success"){
        // Pindahkan file yang diunggah ke folder "images_project"
        $moveUploadFile = move_uploaded_file($coverImageTmp, $destination);
    
        session_start();
        $_SESSION['status'] = "Project telah di upload";
        header('Location: ../projectList');
    }else{
        session_start();
        $_SESSION['status'] = "Project gagal di upload";
        header('Location: ../projectList');
    }
}

if(isset($_POST['deleteProject'])){
    $idProject = $_POST['idProject'];
    $coverProject = $_POST['coverProject'];

    $actionServer = deleteDataProjectServer($coverProject);
    $actionSqlDelete = deleteSqlDataFileProject($idProject);

    if($actionServer == "Success" && $actionSqlDelete == "Success"){
        session_start();
        $_SESSION['status'] = "Project berhasil di Hapus";
        header('Location: ../projectList');
    }else{
        session_start();
        $_SESSION['status'] = "Project gagal di Hapus";
        header('Location: ../projectList');
    }
}

if(isset($_POST['submitWidget'])){
    $widgetId = $_POST['widgetId'];
    $linkTo = $_POST['linkTo'];
    $bannerPath = $_FILES['bannerPath']['name']; // Nama file yang diunggah
    $bannerPathTmp = $_FILES['bannerPath']['tmp_name']; // Lokasi sementara file yang diunggah
    $status = $_POST['status'];

    // Tentukan path dan nama file tujuan
    $destination = '../../images/';
    $fullDestination = $destination . "$bannerPath";

    $arrayInsertProject = array(
        "widgetId" => $widgetId,
        "linkTo" => $linkTo,
        "filePath" => $destination,
        "bannerPath" => $bannerPath,
        "status" => $status
    );

    $updateData = updateWidgetList($arrayInsertProject);

    if($updateData == "Success"){
        // Pindahkan file yang diunggah ke folder "images_project"
        $moveUploadFile = move_uploaded_file($bannerPathTmp, $fullDestination);
        session_start();
        $_SESSION['status'] = "Widget telah di update";
        header('Location: ../widgetList');
    }else{
        session_start();
        $_SESSION['status'] = "Widget gagal di update";
        header('Location: ../widgetList');
    }
}




?>