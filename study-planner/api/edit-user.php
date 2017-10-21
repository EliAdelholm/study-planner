<?php
    $sId = $_POST['txtId'];
    $sName = $_POST['txtUserName'];
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);

    for ($i = 0; $i < count($aData->users); $i++) {
        if ($aData->users[$i]->id == $sId) {

            if ($aData->users[$i]->password == $sPassword) {
                if (isset($_POST['txtNewPassword'])) {
                    $sPassword = $_POST['txtNewPassword'];
                } 
            } else {
                echo '{"status": "ERR", "message": "Current password does not match"}';
                exit;
            }

            $aData->users[$i]->name = $sName;
            $aData->users[$i]->email = $sEmail;
            $aData->users[$i]->password = $sPassword;
            
            $sData = json_encode($aData);
            file_put_contents('data.json', $sData);
    
            echo '{"status": "OK"}';
            exit;
        }
    }
    echo '{"status": "ERR", "message": "Invalid id"}';
?>