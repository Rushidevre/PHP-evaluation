<?php
include 'db.php';
if (isset($_GET['course_name'])) {
    $course_name=$_GET['course_name'];
    $sql=$conn->prepare('delete from courses where course_name=?');
    $sql->bind_param('s',$course_name);
    if ($sql->execute()) {
        header('location:home.php');
    }
    
}
?>
