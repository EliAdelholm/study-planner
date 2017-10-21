<?php
session_start();
// GET FORM DATA
$sUserName = $_POST['txtUserName'];
$sEmail = $_POST['txtUserEmail'];
$sPassword = $_POST['txtUserPassword'];
$sFileName = $_FILES['fileUserImg']['name'];

// CREATE A UNIQUE ID FOR THE USER
$sUserId = uniqid();

// SAVE FILE AS USER-$USERID
if(file_exists($_FILES['fileUserImg']['tmp_name'])) {
    $sFolder = '../images/';
    $sFileName = $sFolder."User-".$sUserId."-".$sFileName;
    move_uploaded_file($_FILES['fileUserImg']['tmp_name'], $sFileName);
} else {
    $sFileName = '../images/default-goat.jpg';
}

// GET USERS DATA
$sData = file_get_contents('data.json');
$ajData = json_decode($sData);
$jUsers = $ajData->users;

// VALIDATE FIELDS
if (!$sUserName) {
    echo '{"status": "ERR", "message": "You must enter a username"}';
    exit;
} else if (!filter_var($sEmail, FILTER_VALIDATE_EMAIL)) {
    echo '{"status": "ERR", "message": "Invalid email"}';
    exit;
} else if (!$sPassword) {
    echo '{"status": "ERR", "message": "You must set a password"}';
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
$sjNewUser = '{ "id": "'.$sUserId.'", 
                "role": "user",
                "name": "'.$sUserName.'",
                "email": "'.$sEmail.'",
                "password": "'.$sPassword.'",
                "img": "'.$sFileName.'" 
              }';
$jNewUser = json_decode($sjNewUser);

// GET WEBSITE DATA
$sData = file_get_contents('data.json');
$ajData = json_decode($sData);

// ADD THE USER TO THE "DATABASE"
array_push($ajData->users, $jNewUser);
$sData = json_encode($ajData);
file_put_contents('data.json', $sData);

// LOG IN DIRECTLY
$_SESSION['sUserName'] = $sUserName;
$_SESSION['sUserImg'] = $sFileName;

// RETURN DATA TO CLIENT
echo '{"status": "OK"}';



?>