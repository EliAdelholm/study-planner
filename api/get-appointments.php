<?php
    session_start();
    
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aAppointments = $aData->appointments;
    $sUserId = $_SESSION['sUserId'];
    $aUserAppointments = [];

    for ($i = 0; $i < count($aAppointments); $i++) {
        if ($aAppointments[$i]->userId == $sUserId) {
            array_push($aUserAppointments, $aAppointments[$i]);
        }
    }
    
    $sAppointments = json_encode($aUserAppointments);
    
    echo $sAppointments;
?>