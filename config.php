<?php

$debug = 0;
$session_debug = 0;

if ($debug == 1) {
    ini_set(display_errors, 1);
    error_reporting(E_ALL);
    }

if ($session_debug==1) {
echo "Session Debugging Change 1.1 ";
print_r($_SESSION);
} else {} ;

?>