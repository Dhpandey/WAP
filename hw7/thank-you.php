<?php
include("top.html");
$name = filter_input(INPUT_GET, "name");
?>
<div>
    <h2>Thank you !</h2>
    <p> <span> Welcome to NerdLuv , </span> <?= $name ?> </p>
    <p> Now <a href="view-match.php" >Now continue on to see your matches!</a></p>
</div>
<?php
// put your code here
?>
<?php include("bottom.html") ?>
