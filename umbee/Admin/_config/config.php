<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$con = mysqli_connect('localhost', 'root', '', 'medical_record');
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

function base_url($url = null) {
    $base_url = "http://localhost/Admin";
    if($url !=null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
?>

