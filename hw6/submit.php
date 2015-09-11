<?php
include("db-connection.php");
$name = filter_input(INPUT_POST, "name");
$gender = filter_input(INPUT_POST, "gender");
$age = filter_input(INPUT_POST, "age");
$personalityType = filter_input(INPUT_POST, "personalityType");
$favOS = filter_input(INPUT_POST, "favOS");
$minAge = filter_input(INPUT_POST, "minAge");
$maxAge = filter_input(INPUT_POST, "maxAge");
$password = filter_input(INPUT_POST, "password");
//$pass_hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $db->prepare("INSERT INTO singles VALUES (NULL, :name, :pass_hash, :gender, :age, :type1,
:type2, :type3, :type4, :os, :min, :max)");
$stmt->execute(array(':name' => $name, ':pass_hash' => password_hash($password, PASSWORD_DEFAULT), 'gender' => $gender
    , ':age' => $age, ':type1' => $personalityType[0], ':type2' => $personalityType[1], ':type3' => $personalityType[2]
    , ':type4' => $personalityType[3], ':os' => $favOS, ':min' => $minAge, ':max' => $maxAge));
header("Location: signup-submit.php?name=" . urlencode($name));


