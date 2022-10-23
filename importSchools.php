<?php
$handle = fopen("schools.csv", "r");

require 'inc/dbh.inc.php';
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $info = explode(",",$line);
        $sbgi = $info[0];
        $uniName = $info[1];
        $tCourseName = $info[2];
        $GTCourseName = $info[3];
        $stmt = $conn->prepare("INSERT INTO `schools` (`sbgi`, `university name`, `transfer course name`, `GT course name`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $sbgi, $uniName, $tCourseName, $GTCourseName);
        $stmt->execute();

    }

    fclose($handle);
}

?>
?>