<?php
    session_start();
    
    $sUserId = $_POST['txtId'];
    $sName = $_POST['txtName'];
    $sEmail = $_POST['txtEmail'];
    $sSubscriptionId = uniqid();
    
    $sData = file_get_contents('data.json');
    $jaData = json_decode($sData);

    $sSubscription = '{
                    "id": "'. $sSubscriptionId .'",
                    "userId": "'. $sUserId .'",
                    "userName": "'. $sName .'",
                    "email": "'. $sEmail .'"
                }';
    $jSubscription = json_decode($sSubscription);

    array_push($jaData->newsEmails, $jSubscription);
    $sData = json_encode($jaData);
    file_put_contents('data.json', $sData);
    echo '{"status": "OK"}';
?>