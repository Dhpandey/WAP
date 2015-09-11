<?php
include("top.html");
require 'db-connection.php';

$matchIndex = filter_input(INPUT_GET, "match");
$name = filter_input(INPUT_POST, "name");
$password = filter_input(INPUT_POST, "password");

session_start();

$allMatches = $_SESSION['matches'];

if (!isset($matchIndex)) {
    $match = $allMatches[0];
} else {
    $match = $allMatches[$matchIndex];
}
if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "Please login First";
    header("Location:login.php");
} else {
    ?>
    <div class="match">               
        <h1>Matches for <?= $_SESSION['username'] ?></h1>
        <div><a class="matchRight" href="logout.php">Logout</a></div>
        <p><?= $match["name"] ?>
            <img src="images/user.jpg" alt="user">
        <ul>
            <li><strong>gender:</strong> <?= $match["gender"] ?></li>
            <li><strong>age:</strong> <?= $match["age"] ?>  </li>
            <li><strong>Type:</strong> <?= $match["type1"] . $match["type2"] . $match["type3"] . $match["type4"] ?>  </li>
            <li><strong>OS:</strong> <?= $match["os"] ?>  </li>
        </ul></p>

    <?php
}
if ($matchIndex > 0) {
    ?>
    <span class="matchLeft"> <a href="view-match.php?match=<?= $matchIndex - 1; ?>">previous Match</a> </span> 
    <?php
}
if ((count($allMatches) - 1) > $matchIndex) {
    ?>
    <span class="matchRight"><a href="view-match.php?match=<?= $matchIndex + 1; ?>"> Next Match</a></span> </div>

    <?php
}
?>
<?php include("bottom.html") ?>