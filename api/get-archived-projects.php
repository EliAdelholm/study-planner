<?php
    $sUserId = $_GET['id'];
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aProjects = $aData->projects;
    $aArchived = [];

    for ($i = 0; $i < count($aProjects); $i++) {
        if ($aProjects[$i]->userId == $sUserId && $aProjects[$i]->status == "archived") {
            array_push($aArchived, $aProjects[$i]);
        }
    }
    
    $sArchivedProjects = json_encode($aArchived);
    
    echo $sArchivedProjects;
?>