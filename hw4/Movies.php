<?php
$film = filter_input(INPUT_GET, 'film');
//$movie=  glob("*");
?> 
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Rancid Tomatoes</title>
        <meta charset="utf-8">
        <link href="movie.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" 
              type="image/png" 
              href="images/rotten.gif" />
    </head>
    <body>
        <div id="bgHeader">
            <img src="images/banner.png" alt="banner"/>
        </div>

        <h1><?php
            $movieContent = file($film . "/info.txt");
            ?> 
            <?= $movieContent[0]; ?>
            (
            <?= $movieContent[1]; ?>
            )
        </h1>
        <div id="contents">
            <div id="content-left">
                <div id="content-left-top" >
                    <?php
                    if ($movieContent[2] > 59) {
                        ?>
                        <img src="images/freshbig.png" alt="freshbig"/>
                    <?php } else { ?>
                        <img src="images/rottenbig.png" alt="rottenbig"/>
                    <?php } ?>
                    <span id="numeric-value"> <?= $movieContent[2]; ?>%</span>
                </div>
                <?php $reviewFiles = glob($film . "/review*.txt");
                ?>
                <div id="content-left1">
                    <?php
                    for ($j = 0; $j < (intval(count($reviewFiles) / 2) - 1); $j++) {
                        $reviewFileContent = file($reviewFiles[$j]);
                        ?>
                        <p class="boxed">
                            <img src="images/<?= trim(strtolower($reviewFileContent[1])) ?>.gif" alt="Rotten" />
                            <q><?= $reviewFileContent[0] ?></q>
                        </p>
                        <p class="post">
                            <img src="images/critic.gif" alt="Critic" />
                            <?= $reviewFileContent[2] ?> <br />
                            <?= $reviewFileContent[3] ?>
                        </p>
                    <?php } ?>  
                </div>
                <div id="content-left-right1">           
                    <?php
                    for ($i = intval(count($reviewFiles) / 2); $i < count($reviewFiles); $i++) {
                        $reviewFileContent = file($reviewFiles[$i]);
                        ?>
                        <p class="boxed">
                            <img src="images/<?= trim(strtolower($reviewFileContent[1])) ?>.gif" alt="Rotten" />
                            <q><?= $reviewFileContent[0] ?></q>
                        </p>
                        <p class="post">
                            <img src="images/critic.gif" alt="Critic" />
                            <?= $reviewFileContent[2] ?> <br />
                            <?= $reviewFileContent[3] ?>
                        </p>
                    <?php } ?>  

                </div>

            </div>     

            <div id="content-right">
                <div id="overview">

                    <img src= <?= $film . "/overview.png" ?> alt="overview"/>
                </div>
                <div class="bottomRight">
                    <?php
                    $overviewContent = file($film . "/overview.txt");
                    foreach ($overviewContent as $overview) {
                        $contentsInfo = explode(':', $overview);
                        ?>
                        <dl>
                            <dt><?= $contentsInfo[0]; ?></dt>
                            <dd><?= $contentsInfo[1]; ?></dd>
                        </dl>
                        <?php
                    }
                    ?>
                </div>
            </div>    
            <div id="bottomContent"> <p>(1-10) of 88</p> </div>
        </div> 

        <div id="footer">
            <a href="http://validator.w3.org/check/referer"><img src="images/w3c-html.png" alt="Valid HTML5"></a> <br>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/w3c-css.png" alt="Valid CSS"></a>
        </div>
    </body></html>