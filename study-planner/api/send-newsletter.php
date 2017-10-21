<?php

    $sData = file_get_contents('data.json');
    $jaData = json_decode($sData);
    $aSubscribers = $jaData->newsEmails; 

    $sId = uniqid();
    $sTitle = $_POST['txtTitle'];
    $sContent = $_POST['txtContent'];
    $sSentDate = date("Y-m-d");
    $aRecipients = [];

    for($i = 0; $i < count($aSubscribers); $i++) {
        array_push($aRecipients, $aSubscribers[$i]->email);
    }

    $sRecipients = json_encode($aRecipients);

    // MAIL CANNOT BE SENT FROM LOCALHOST WITHOUT INSTALLING A MAILSERVER
    // SO FOR NOW WE JUST SAVE THE DATA AND PRETEND IT WAS SENT
    $sMail = '{
        "id": "'. $sId .'",
        "title": "'. $sTitle .'",
        "content": "'. $sContent .'",
        "recipients": '. $sRecipients .',
        "sentDate": "'. $sSentDate .'"
    }';

    $jMail = json_decode($sMail);
    array_push($jaData->newsletters, $jMail);

    $sData = json_encode($jaData);
    file_put_contents('data.json', $sData);
    echo '{"status": "OK"}';
?>