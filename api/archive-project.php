<?php
    $sProjectId = $_POST['txtId'];

    if(isset($_POST['txtGrade'])) {
        $sGrade = $_POST['txtGrade'];
    } else {
        $sGrade = null;
    }

    $sData = file_get_contents('data.json');
    $jData = json_decode($sData);

    $sArchivedDate = date("Y-m-d");

    for ($i = 0; $i < count($jData->projects); $i++) {
        if ($jData->projects[$i]->id == $sProjectId) {

            $jData->projects[$i]->status = "archived";
            $jData->projects[$i]->archiveDate = $sArchivedDate;
            $jData->projects[$i]->grade = $sGrade;
            
            $sData = json_encode($jData);
            file_put_contents('data.json', $sData);
            echo '{"status": "OK"}';
            exit;
        }
    }
    echo '{"status": "ERR", "message": "Invalid Id"}';
?>