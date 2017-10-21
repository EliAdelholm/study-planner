<?php
    session_start();
    session_destroy();

    echo '{"status": "OK"}';
?>