<?php
session_start();
$conn=new mysqli("localhost",'root','','student');
if (! $conn) {
    echo 'not Connected';
}

?>
