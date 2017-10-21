<?php
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aSubscribers = $aData->newsEmails;
    
    $sSubscribers = json_encode($aSubscribers);
    
    echo $sSubscribers;
?>