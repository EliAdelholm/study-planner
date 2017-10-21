<?php
    $sData = file_get_contents('data.json');
    $aData = json_decode($sData);
    $aNewsletters = $aData->newsletters;
    
    $sNewsletters = json_encode($aNewsletters);
    
    echo $sNewsletters;
?>