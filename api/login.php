<?php
    session_start();

    // GET FORM DATA
    $sUserEmail = $_POST['txtUserEmail'];
    $sUserPassword = $_POST['txtUserPassword'];

    // GET USERS DATA
    $sData = file_get_contents('data.json');
    $ajData = json_decode($sData);
    $jUsers = $ajData->users;

    for($i = 0; $i < count($jUsers); $i++) {
        if ($jUsers[$i]->email == $sUserEmail) {
            //echo "Emails match";
            if ($jUsers[$i]->password == $sUserPassword) {

                $_SESSION['sUserName'] = $jUsers[$i]->name;
                $_SESSION['sUserRole'] = $jUsers[$i]->role;
                $_SESSION['sUserId'] = $jUsers[$i]->id;
                
                echo '{"status": "OK", "userId": "'. $jUsers[$i]->id .'", "userRole": "'. $jUsers[$i]->role .'" }';

            } else {
                echo '{"status": "ERR", "message": "Incorrect password"}';
            }
            exit;
        };
    };

    echo '{"status": "ERR", "message": "Email not registered"}';
?>