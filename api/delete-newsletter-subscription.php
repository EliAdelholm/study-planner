<?php
    $subscriptionId = $_GET['id'];

    $sData = file_get_contents('data.json');
    $jData = json_decode($sData);

    for ($i = 0; $i < count($jData->newsEmails); $i++) {
        if ($jData->newsEmails[$i]->id == $subscriptionId) {
            array_splice($jData->newsEmails, $i, 1);
            $sData = json_encode($jData);
            file_put_contents('data.json', $sData);
            echo '{"status": "OK"}';
            exit;
        }
    }
    echo '{"status": "ERR", "message": "Invalid Id"}';
?>