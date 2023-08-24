<?php
function selectSpesificTask($taskNumber){
    include "database.php";
    $dataFinal = array();
    $sqlCheckData = "SELECT * FROM re_events WHERE task_number = $taskNumber";
    $executeCheckData = mysqli_query($conn, $sqlCheckData);

    if ($executeCheckData && mysqli_num_rows($executeCheckData) > 0) {
        $data = mysqli_fetch_assoc($executeCheckData);
        $dataFinal['task_number'] = $data['task_number'];
        $dataFinal['event_details'] = $data['event_details'];
        $dataFinal['plan_completed_date'] = $data['plan_completed_date'];
    }

    return $dataFinal;
}

function updateEvent($taskNumber, $eventDetails, $planCompletedDate){
    include "database.php";

    $modifiedDate = date('Y-m-d H:i:s');
    $sqlUpdate = "UPDATE re_events SET event_details = '$eventDetails', plan_completed_date = '$planCompletedDate', modified_date = '$modifiedDate' 
    WHERE task_number = $taskNumber";
    $executeUpdateData = mysqli_query($conn, $sqlUpdate);

    $dataFinal = "Success";
    return $dataFinal;
}

function selectSqlDataFileDrive(){
    include "database.php";
    $sqlSelect = "SELECT * FROM re_file_list";
    $executeSelectData = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_all($executeSelectData, MYSQLI_ASSOC);

    return $data;
}

function selectSqlDataProject(){
    include "database.php";
    $sqlSelect = "SELECT * FROM re_project_list";
    $executeSelectData = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_all($executeSelectData, MYSQLI_ASSOC);

    return $data;
}

function selectSqlWidgetList(){
    include "database.php";
    $sqlSelect = "SELECT * FROM re_widget_list";
    $executeSelectData = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_all($executeSelectData, MYSQLI_ASSOC);

    return $data;
}

function deleteSqlDataFileDrive($fileIdDrive){
    include "database.php";
    $sqlDelete = "DELETE FROM re_file_list WHERE file_id_drive = '$fileIdDrive'";
    $executeDeleteRow = mysqli_query($conn, $sqlDelete);

    $data = "Success";
    return $data;
}

function insertDataFileDrive($fileName, $fileIdDrive, $fileDirectory){
    include "database.php";
    $sqlInsert = "INSERT INTO re_file_list (file_name, file_id_drive, file_directory)
    VALUES ('$fileName', '$fileIdDrive', '$fileDirectory')";
    $executeInsertData = mysqli_query($conn, $sqlInsert);

    $dataFinal = "Success";
    return $dataFinal;
}

function insertFileToDrive( $file_path, $file_name, $parent_file_id = null ){
    $service = new Google_Service_Drive( $GLOBALS['client'] );
    $file = new Google_Service_Drive_DriveFile();
    $file->setName( $file_name );

    if( !empty( $parent_file_id ) ){
        $file->setParents( [ $parent_file_id ] );        
    }

    $result = $service->files->create(
        $file,
        array(
            'data' => file_get_contents($file_path),
            'mimeType' => 'application/octet-stream',
        )
    );

    $fileId = $result->getId();
    return $fileId;
}

function deleteDataFileDrive($fileIdDrive){
    // Create a new Google Drive client.
    $service = new Google_Service_Drive($GLOBALS['client']);

    // Delete the file.
    try {
        $service->files->delete($fileIdDrive);
        $dataFinal = "Success";
        return $dataFinal;
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}

function deleteDataFileServer($linkToPath){
    $filePath = $linkToPath;

    if (unlink($filePath)) {
        $dataFinal = "Success";
    } else {
        $dataFinal = "Failed";
    }
    
    return $dataFinal;
}
function selectProjectList(){
    include "database.php";
    $sqlSelect = "SELECT * FROM re_project_list";
    $executeSelectData = mysqli_query($conn, $sqlSelect);
    
    $allRecord = mysqli_fetch_all($executeSelectData, MYSQLI_ASSOC);
    
    return $allRecord;
}

function insertProjectList($arrInsert = array()){
    include "database.php";
    $arrInsert['filePath'] = str_replace("../", "", $arrInsert['filePath']);
    $dateNow = date("Y-m-d H:i:s");
    $sqlInsert = "INSERT INTO re_project_list (project_name, cover_project, description, github_link, created_date)
    VALUES ('".$arrInsert['projectName']."', '".$arrInsert['filePath']."', '".$arrInsert['description']."', '".$arrInsert['githubLink']."', '$dateNow')";
    $executeInsertData = mysqli_query($conn, $sqlInsert);

    if($executeInsertData){
        $dataFinal = "Success";
    }else{
        $dataFinal = "Failed";
    }

    return $dataFinal;
}

function updateWidgetList($arrUpdate = array()){
    include "database.php";
    $arrUpdate['filePath'] = str_replace("../", "", $arrUpdate['filePath']);
    
    $dateNow = date("Y-m-d H:i:s");
    
    if ($arrUpdate['bannerPath'] != "") {
        $fileDirectory = "file_directory = '".$arrUpdate['filePath']."".$arrUpdate['bannerPath']."',";
    } else {
        $fileDirectory = "";
    }
    
    $sqlUpdate = "UPDATE re_widget_list SET $fileDirectory link = '".$arrUpdate['linkTo']."', 
    status = ".$arrUpdate['status'].", created_date = '$dateNow' WHERE id = ".$arrUpdate['widgetId']."";
    $executeUpdateData = mysqli_query($conn, $sqlUpdate);

    if($executeUpdateData){
        $dataFinal = "Success";
    } else {
        $dataFinal = "Failed";
    }

    return $dataFinal;
}

function deleteSqlDataFileProject($idProject){
    include "database.php";
    $sqlDelete = "DELETE FROM re_project_list WHERE id = '$idProject'";
    $executeDeleteRow = mysqli_query($conn, $sqlDelete);

    if($executeDeleteRow){
        $data = "Success";
    }else{
        $data = "Failed";
    }

    return $data;
}

function deleteDataProjectServer($linkToPath){
    $filePath = "../../" . $linkToPath;

    if (unlink($filePath)) {
        $dataFinal = "Success";
    } else {
        $dataFinal = "Failed";
    }
    
    return $dataFinal;
}

function getTrendingStocks(){
    // example code
    $apiUrl = 'https://api.goapi.id/v1/stock/idx/trending?api_key=SkqbdMFXfFfdi7f7PQqPzKVHjbOpCo';

    // Inisialisasi session cURL
    $ch = curl_init();
    
    // Set URL dan opsi cURL
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Eksekusi permintaan cURL
    $response = curl_exec($ch);
    
    // Periksa apakah permintaan berhasil atau tidak
    if ($response === false) {
        $error = curl_error($ch);
        echo 'Error: ' . $error;
    }
    
    // Tutup session cURL
    curl_close($ch);
    
    return $response;
}

function getStocksProfile($symbols){
    // example code
    $apiUrl = "https://api.goapi.id/v1/stock/idx/$symbols?api_key=SkqbdMFXfFfdi7f7PQqPzKVHjbOpCo";

    // Inisialisasi session cURL
    $ch = curl_init();
    
    // Set URL dan opsi cURL
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Eksekusi permintaan cURL
    $response = curl_exec($ch);
    
    // Periksa apakah permintaan berhasil atau tidak
    if ($response === false) {
        $error = curl_error($ch);
        echo 'Error: ' . $error;
    }
    
    // Tutup session cURL
    curl_close($ch);
    
    return $response;
}

?>