<?php

    // GET FORM DATA
    $sName = $_POST['txtName'];
    $sEmail = $_POST['txtEmail'];

    // CREATE A UNIQUE ID FOR THE USER
    $sId = uniqid();

    // GET USERS DATA
    $sData = file_get_contents('data.json');
    $ajData = json_decode($sData);
    $jUsers = $ajData->users;

    // VALIDATE FIELDS
    if (!$sName) {
        echo '{"status": "ERR", "message": "You must enter a Name"}';
        exit;
    } else if (!filter_var($sEmail, FILTER_VALIDATE_EMAIL)) {
        echo '{"status": "ERR", "message": "Invalid email"}';
        exit;
    }

    // CHECK IF EMAIL IS ALREADY REGISTERED
    for($i = 0; $i < count($jUsers); $i++) {
        if($jUsers[$i]->email == $sEmail) {
            echo '{"status": "ERR", "message": "Email is already registered"}';
            exit;
        }
    }

    // NEW USER OBJECT
    $sjAdmin = '  { "id": "'.$sId.'", 
                    "role": "admin",
                    "name": "'.$sName.'",
                    "email": "'.$sEmail.'",
                    "password": ""
                }';
    $jAdmin = json_decode($sjAdmin);

    // GET WEBSITE DATA
    $sData = file_get_contents('data.json');
    $ajData = json_decode($sData);

    // ADD THE USER TO THE "DATABASE"
    array_push($ajData->users, $jAdmin);
    $sData = json_encode($ajData);
    file_put_contents('data.json', $sData);

    echo '{"status": "OK"}';



?>