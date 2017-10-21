<?php
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aProjects = $aData->projects;
    
    $sProjects = json_encode($aProjects);
    
    echo $sProjects;
?>