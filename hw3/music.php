<?php
$totalSongs = 5678;
$pagesCount = filter_input(INPUT_GET, 'newspages');
if (!isset($pagesCount)) {
    $pagesCount = 5;
}
$songs = glob("songs/*.mp3");
$m3usongsFile = glob("songs/*.m3u");
?>
<!DOCTYPE html>
<html>
    <!--
    Web Programming Step by Step
    Lab #3, PHP
    -->

    <head>
        <title>Music Viewer</title>
        <meta charset="utf-8" />
        <link href="viewer.css" type="text/css" rel="stylesheet" />
    </head>

    <body>

        <h1>My Music Page</h1>

        <!-- Exercise 1: Number of Songs (Variables) -->
        <p>
            I love music.
            I have <?php echo $totalSongs ?> total songs,
            which is over <?php
            echo $totalSongs * (1 / 10);
            ?> hours of music!
        </p>

        <!-- Exercise 2: Top Music News (Loops) -->
        <!-- Exercise 3: Query Variable -->
        <div class="section">
            <h2>Yahoo! Top Music News</h2>

            <ol>
                <?php for ($i = 1; $i < $pagesCount + 1; $i++) {
                    ?>
                    <li><a href="http://music.yahoo.com/news/archive/<?= $i ?>.html">Page <?= $i ?></a></li>
                <?php } ?>
            </ol>
        </div>

        <!-- Exercise 4: Favorite Artists (Arrays) -->
        <!-- Exercise 5: Favorite Artists from a File (Files) -->
        <div class="section">
            <h2>My Favorite Artists</h2>
            <?php
            // $artists = array("Britney Spears", "Christina Aguilera", "Justin Bieber","lady gaga");
            $contents = file("favorite.txt");
            ?>
            <ol>
                <?php
                foreach ($contents as $artist) {
                    $artistArray = explode(" ", strtolower($artist));
                    ?>
                    <li> <a href="http://music.yahoo.com/videos/<?= implode("-", $artistArray) ?>"><?= $artist ?></a></li>
                <?php } ?>
            </ol>
        </div>

        <!-- Exercise 6: Music (Multiple Files) -->
        <!-- Exercise 7: MP3 Formatting -->
        <div class="section">
            <h2>My Music and Playlists</h2>

            <ul id="musiclist">
                <?php foreach ($songs as $song) {
                    ?>
                    <li class="mp3item">
                        <a  href="http://mumstudents.org/cs472/Labs/3/songs/<?= str_replace(' ', '%20', basename($song)) ?>"> <?= basename($song) ?></a>
                        (<?= intVal(fileSize($song)/1024) ?>) <audio controls="controls" src="http://mumstudents.org/cs472/Labs/3/songs/<?= str_replace(' ', '%20', basename($song)) ?>"></audio>
                    </li>
                <?php } ?>
                <!--                <li class="mp3item">
                                    <a href="http://mumstudents.org/cs472/Labs/3/songs/be-more.mp3">be-more.mp3</a>
                                </li>
                
                                <li class="mp3item">
                                    <a href="http://mumstudents.org/cs472/Labs/3/songs/just-because.mp3">just-because.mp3</a>
                                </li>
                
                                <li class="mp3item">
                                    <a href="http://mumstudents.org/cs472/Labs/3/songs/drift-away.mp3">drift-away.mp3</a>
                                </li>
                
                                 Exercise 8: Playlists (Files) 
                                <li class="playlistitem">472-mix.m3u:
                                    <ul>
                                        <li>Hello.mp3</li>
                                        <li>Be More.mp3</li>
                                        <li>Drift Away.mp3</li>
                                        <li>190M Rap.mp3</li>
                                        <li>Panda Sneeze.mp3</li>
                                    </ul>
                                </li>-->

                <?php
                foreach ($m3usongsFile as $m3uSong) {
                    $file = $m3uSong
                    ?>
                    <li class="playlistitem"> <?= basename($m3uSong) ?>:
                        <?php
                        $m3uInner = file($file);
                        foreach ($m3uInner as $m3uInnerSong) {
                            if (strpos(trim($m3uInnerSong), "#") === 0) {
                                continue;
                            }
                            ?>
                            <ul> <li><?= $m3uInnerSong ?></li></ul>
                        <?php } ?>

                    </li>
                <?php } ?>

            </ul>
        </div>

        <div>
            <a href="http://validator.w3.org/check/referer">
                <img src="http://mumstudents.org/cs472/Labs/3/w3c-html.png" alt="Valid HTML5" />
            </a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img src="http://mumstudents.org/cs472/Labs/3/w3c-css.png" alt="Valid CSS" />
            </a>
        </div>
    </body>
</html>


