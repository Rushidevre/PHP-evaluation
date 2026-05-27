<?php
include 'db.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data.csv"');
$output = fopen('php://output', 'w');
fputcsv($output, array('id', 'course_name', 'description', 'duration', 'image'));
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
?>