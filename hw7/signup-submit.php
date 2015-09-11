<?php
require 'db-connection.php';
$name = filter_input(INPUT_POST, "name");
$gender = filter_input(INPUT_POST, "gender");
$age = filter_input(INPUT_POST, "age");
$personalityType = filter_input(INPUT_POST, "personalityType");
$favOS = filter_input(INPUT_POST, "favOS");
$minAge = filter_input(INPUT_POST, "minAge");
$maxAge = filter_input(INPUT_POST, "maxAge");
$password = filter_input(INPUT_POST, "password");
$stmt = $db->prepare("INSERT INTO singles VALUES (NULL, :name, :pass_hash, :gender, :age, :type1,
:type2, :type3, :type4, :os, :min, :max)");
$stmt->execute(array(':name' => $name, ':pass_hash' => password_hash($password, PASSWORD_DEFAULT), 'gender' => $gender
    , ':age' => $age, ':type1' => $personalityType[0], ':type2' => $personalityType[1], ':type3' => $personalityType[2]
    , ':type4' => $personalityType[3], ':os' => $favOS, ':min' => $minAge, ':max' => $maxAge));


$stmt1 = $db->prepare("SELECT * FROM singles WHERE name = :name");
$stmt1->execute(array(':name' => $name));
$user = $stmt1->fetch();

session_start();
    $_SESSION['username'] = $name;
    
    $stmtMatches = $db->prepare("SELECT * FROM singles WHERE gender <> :gender
                AND age >= :min AND age <= :max AND os = :os AND
                (type1= :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");

    $stmtMatches->execute(array(':gender' => $user["gender"], ':min' => $user["min"],
        ':max' => $user["max"], ':os' => $user["os"], ':type1' => $user["type1"]
        , ':type2' => $user["type2"], ':type3' => $user["type3"], ':type4' => $user["type4"]));
    
    $_SESSION['matches'] = $stmtMatches->fetchAll();
    
header("Location: thank-you.php?name=" . urlencode($name));


