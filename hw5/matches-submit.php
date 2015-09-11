<?php
include("top.html");
$name = filter_input(INPUT_POST, "name");
$data = file("singles.txt");
foreach ($data as $entry) {
    $fields = explode(",", $entry);
    if ($fields[0] === $name) {
        $gender = $fields[1];
        $minAge = $fields[5];
        $maxAge = $fields[6];
        $personalityType = $fields[3];
        $favOS = $fields[4];
    }
}
?>

    <div class="match">               
        <h1>Matches for <?= $name ?></h1>
        <?php
        foreach ($data as $otherEntries) {
            $personalityTypeFlag = false;
            $record = explode(",", $otherEntries);
            $entryPesonality = $record[3];
//                    for ($j = 0; $j < strlen($personalityType); $j++) {
//                        for ($i = 0; $i < strlen($entryPesonality); $i++) {
//                            if (substr($personalityType, $j, 1) == substr($entryPesonality, $i, 1)) {
//                                $personalityTypeFlag = true;
//                                break;
//                            }
//                        }
//                    }

            for ($j = 0; $j < strlen($personalityType); $j++) {
                if (substr($personalityType, $j, 1) == substr($entryPesonality, $j, 1)) {
                    $personalityTypeFlag = true;
                    break;
                }
            }
            if ($record[1] != $gender && (($minAge < $record[5]) &&
                    ($maxAge >= $record[6])) && $favOS == $record[4] && $personalityTypeFlag) {
                ?>
                <p><?= $record[0] ?>
                    <img src="images/user.jpg" alt="user">
                <ul>
                    <li><strong>gender:</strong> <?= $record[1] ?></li>
                    <li><strong>age:</strong> <?= $record[2] ?>  </li>
                    <li><strong>Type:</strong> <?= $record[3] ?>  </li>
                    <li><strong>OS:</strong> <?= $record[4] ?>  </li>
                </ul></p>
                <?php
            }
        }
        ?>
    </div>
    <?php include("bottom.html") ?>