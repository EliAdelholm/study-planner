<?php
    $sUserId = $_GET['id'];

    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aSubscriptions = $aData->newsEmails;
    $aUserSubscriptions = [];

    for ($i = 0; $i < count($aSubscriptions); $i++) {
        if ($aSubscriptions[$i]->userId == $sUserId) {
            array_push($aUserSubscriptions, $aSubscriptions[$i]);
        }
    }
    
    $sUserSubscriptions = json_encode($aSubscriptions);

    echo $sUserSubscriptions;
?>