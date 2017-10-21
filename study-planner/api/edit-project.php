<?php
    $sId = $_POST['txtId'];
    $sTitle = $_POST['txtTitle'];
    $sCourse = $_POST['txtCourse'];
    $sType = $_POST['txtType'];
    $sTrello = $_POST['txtTrello'];
    $sDeadline = $_POST['txtDeadline'];
    
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);

    for ($i = 0; $i < count($aData->projects); $i++) {
        if ($aData->projects[$i]->id == $sId) {

            $aData->projects[$i]->title = $sTitle;
            $aData->projects[$i]->course = $sCourse;
            $aData->projects[$i]->type = $sType;
            $aData->projects[$i]->trello = $sTrello;
            $aData->projects[$i]->deadline = $sDeadline;
            
            $sData = json_encode($aData);
            file_put_contents('data.json', $sData);
    
            echo '{"status": "OK"}';
            exit;
        }
    }
    echo '{"status": "ERR", "message": "Invalid id"}';
?>