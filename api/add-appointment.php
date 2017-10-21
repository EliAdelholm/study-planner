<?php
    session_start();
    
    $sTitle = $_POST['txtTitle'];
    $sType = $_POST['txtType'];
    $sAddress = $_POST['txtAddress'];
    $sLat = $_POST['txtLat'];
    $sLng = $_POST['txtLng'];
    $sDate = $_POST['txtDate'];
    $sTime = $_POST['txtTime'];
    $sUserId = $_SESSION['sUserId'];
    
    $sData = file_get_contents('data.json');
    $jaData = json_decode($sData);

    $sAppointmentId = uniqid();
    $sCreatedDate = date("Y-m-d");

    $sAppointment = '{
                    "id": "'. $sAppointmentId .'",
                    "userId": "'. $sUserId .'",
                    "title": "'. $sTitle .'",
                    "type": "'. $sType .'",
                    "location": {
                        "address": "'. $sAddress .'",
                        "lat": "'. $sLat .'",
                        "lng": "'. $sLng .'"
                    },
                    "createdDate": "'. $sCreatedDate .'",
                    "date": "'. $sDate .'",
                    "time": "'. $sTime .'"
                }';
    $jAppointment = json_decode($sAppointment);

    array_push($jaData->appointments, $jAppointment);
    $sData = json_encode($jaData);
    file_put_contents('data.json', $sData);
    echo '{"status": "OK"}';
?>