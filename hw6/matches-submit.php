<?php
include("top.html");
include("db-connection.php");
$name = filter_input(INPUT_POST, "name");
$password = filter_input(INPUT_POST, "password");
$allMatches = null;

$stmt = $db->prepare("SELECT * FROM singles WHERE name = :name");
$stmt->execute(array(':name' => $name));
$user = $stmt->fetch();

if ($user != NULL) {
    password_verify($password, $user["pass"]);
    $stmtMatches = $db->prepare("SELECT * FROM singles WHERE gender <> :gender
 AND age >= :min AND age <= :max AND os = :os AND
 (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");
    $stmtMatches->execute(array(':gender' => $user["gender"], ':min' => $user["min"], ':max' => $user["max"], ':os' => $user["os"], ':type1' => $user["type1"]
        , ':type2' => $user["type2"], ':type3' => $user["type3"], ':type4' => $user["type4"]));
    $allmatches = $stmtMatches->fetchAll();
}
?>

<div class="match">               
    <h1>Matches for <?= $name ?></h1>
    <?php
    foreach ($allmatches as $record) {
        ?>
        <p><?= $record["name"] ?>
            <img src="images/user.jpg" alt="user">
        <ul>
            <li><strong>gender:</strong> <?= $record["gender"] ?></li>
            <li><strong>age:</strong> <?= $record["age"] ?>  </li>
            <li><strong>Type:</strong> <?= $record["type1"] . $record["type2"] . $record["type3"] . $record["type4"] ?>  </li>
            <li><strong>OS:</strong> <?= $record["os"] ?>  </li>
        </ul></p>
    <?php
}
?>
</div>
<?php include("bottom.html") ?>