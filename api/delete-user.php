<?php
    session_start();

    $userId = $_GET['id'];

    $sData = file_get_contents('data.json');
    $jData = json_decode($sData);

    // MAKE SURE THE SUPER ADMIN CANNOT BE DELETED
    if ($userId == "1") {
        echo '{"status": "ERR", "message": "Super admin cannot be deleted"}';
        exit;
    }

    for ($i = 0; $i < count($jData->users); $i++) {
        if ($jData->users[$i]->id == $userId) {
            array_splice($jData->users, $i, 1);
            $sData = json_encode($jData);
            file_put_contents('data.json', $sData);

            // DESTROY SESSION IF USER IS DELETING THEIR OWN ACCOUNT
            if($_SESSION['sUserId'] == $userId) {
                session_destroy();
            }

            echo '{"status": "OK"}';
            exit;
        }
    }
    echo '{"status": "ERR", "message": "Invalid Id"}';
?>