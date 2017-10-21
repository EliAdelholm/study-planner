<?php
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aAdmins = $aData->users;

    for ($i = 0; $i < count($aAdmins); $i++) {
        if ($aAdmins[$i]->role !== "admin") {
            array_splice($aAdmins, $i, 1);
            $i--;
        }
    }
    
    $sAdmins = json_encode($aAdmins);
    
    echo $sAdmins;
?>