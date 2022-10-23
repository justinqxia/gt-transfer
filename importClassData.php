<?php
$handle = fopen("classData.csv", "r");

require 'inc/dbh.inc.php';
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $info = explode(",",$line);
        $sbgi = $info[0];
        $uniName = $info[1];
        $tCourseName = $info[2];
        $GTCourseName = $info[3];
        $credits = intval($info[4]);
        $location = $info[5];
        $stmt = $conn->prepare("INSERT INTO `classes` (`sbgi`, `university name`, `transfer course name`, `GT course name`, `Credits`, `Location`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssis", $sbgi, $uniName, $tCourseName, $GTCourseName, $credits, $location);
        $stmt->execute();

    }

    fclose($handle);
}

?>