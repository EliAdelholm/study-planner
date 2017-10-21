<?php
    $sUserId = $_GET['id'];
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aProjects = $aData->projects;
    $aCurrent = [];

    for ($i = 0; $i < count($aProjects); $i++) {
        if ($aProjects[$i]->userId == $sUserId && $aProjects[$i]->status == "active") {
            array_push($aCurrent, $aProjects[$i]);
        }
    }
    
    $sCurrentProjects = json_encode($aCurrent);

    echo $sCurrentProjects;
?>