<?php
    session_start();
    
    $sTitle = $_POST['txtTitle'];
    $sCourse = $_POST['txtCourse'];
    $sType = $_POST['txtType'];
    $sDeadline = $_POST['txtDeadline'];
    $sUserId = $_SESSION['sUserId'];

    if(isset($_POST['txtTrello'])) {
        $sTrello = $_POST['txtTrello'];
    } else {
        $sTrello = null;
    }
    
    $sData = file_get_contents('data.json');
    $jaData = json_decode($sData);

    $sProjectId = uniqid();
    $sCreatedDate = date("Y-m-d");

    $sProject = '{
                    "id": "'. $sProjectId .'",
                    "userId": "'. $sUserId .'",
                    "status": "active",
                    "title": "'. $sTitle .'",
                    "course": "'. $sCourse .'",
                    "type": "'. $sType .'",
                    "createdDate": "'. $sCreatedDate .'",
                    "deadline": "'. $sDeadline .'",
                    "trello": "'. $sTrello .'"
                }';
    $jProject = json_decode($sProject);

    array_push($jaData->projects, $jProject);
    $sData = json_encode($jaData);
    file_put_contents('data.json', $sData);
    echo '{"status": "OK"}';
?>