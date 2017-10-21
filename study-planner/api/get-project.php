<?php
    $sProjectId = $_GET['id'];
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aProjects = $aData->projects;

    for ($i = 0; $i < count($aProjects); $i++) {
        if ($aProjects[$i]->id == $sProjectId) {
            $sProject = json_encode($aProjects[$i]);
            echo $sProject;
            exit;
        }
    }
?>