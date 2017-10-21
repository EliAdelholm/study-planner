<?php
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aUsers = $aData->users;
    $aProjects = $aData->projects;

    for ($i = 0; $i < count($aUsers); $i++) {
        if ($aUsers[$i]->role !== "user") {
            array_splice($aUsers, $i, 1);
            $i--;
        } else {
            $active = 0;
            $archived = 0;
            for ($j = 0; $j < count($aProjects); $j++) {
                if ($aProjects[$j]->userId == $aUsers[$i]->id) {
                    $aProjects[$j]->status == "active" ? $active++ : $archived++;
                }
            }
            $aUsers[$i]->activeProjects = $active;
            $aUsers[$i]->archivedProjects = $archived;
            $aUsers[$i]->totalProjects = $active + $archived;
        }
    }
    
    $sUsers = json_encode($aUsers);
    
    echo $sUsers;
?>