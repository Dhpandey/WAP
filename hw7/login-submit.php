<?php


require 'db-connection.php';

$name = filter_input(INPUT_POST, "name");
$password = filter_input(INPUT_POST, "password");
$stmt = $db->prepare("SELECT * FROM singles WHERE name = :name");
$stmt->execute(array(':name' => $name));
$user = $stmt->fetch();
session_start();


$rememberme = filter_input(INPUT_POST, "remembercheck");
if ($rememberme) {
    setcookie("rememberme", $name, time() + 60*60*24*60);
} else if (isset($_COOKIE['rememberme'])){
    setcookie("rememberme", "", time() -1);
}

if ($user != NULL && password_verify($password, $user["pass"])) {

    $_SESSION['username'] = $name;    //session variable

    $stmtMatches = $db->prepare("SELECT * FROM singles WHERE gender <> :gender
                AND age >= :min AND age <= :max AND os = :os AND
                (type1= :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");

    $stmtMatches->execute(array(':gender' => $user["gender"], ':min' => $user["min"],
        ':max' => $user["max"], ':os' => $user["os"], ':type1' => $user["type1"]
        , ':type2' => $user["type2"], ':type3' => $user["type3"], ':type4' => $user["type4"]));
    $_SESSION['matches'] = $stmtMatches->fetchAll();
    header("Location: view-match.php");
} else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: login.php");
    exit();
}
?>
