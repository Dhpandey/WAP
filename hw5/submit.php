<?php
$name = filter_input(INPUT_POST, "name");
$gender = filter_input(INPUT_POST, "gender");
$age = filter_input(INPUT_POST, "age");
$personalityType = filter_input(INPUT_POST, "personalityType");
$favOS = filter_input(INPUT_POST, "favOS");
$minAge = filter_input(INPUT_POST, "minAge");
$maxAge = filter_input(INPUT_POST, "maxAge");
file_put_contents("singles.txt","\n$name,$gender, $age, $personalityType, $favOS,$minAge,$maxAge",FILE_APPEND);
header("Location: signup-submit.php?name=" . urlencode($name));


