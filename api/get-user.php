<?php
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aUsers = $aData->users;

    $sUserId = $_GET['id'];

    for ($i = 0; $i < count($aUsers); $i++) {
        if ($aUsers[$i]->id == $sUserId) {
            $sUser = json_encode($aUsers[$i]);
            echo $sUser;
            exit;
        }
    }
?>