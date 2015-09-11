<?php
include("top.html");
session_start();
$error = NULL;
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
$user = filter_input(INPUT_COOKIE, "rememberme");
?>
<div>
    <form action="login-submit.php" method="post">
        <fieldset>
            <legend>Returning User</legend>
            <?php if ($error): ?>
                <p align="center" style="color: red"><?= $error ?></p>
            <?php endif; ?>
            <p><span class="column">
                    Name: </span>
                <input type="text" name="name" size="16"<?php if ($user) : ?>
                           value="<?= $user ?>"  <?php endif; ?>  />
            </p>
            <p><span class="column">
                    Password: </span>
                <input type="password" name="password" size="16">
            </p>
            <input type="checkbox" name="remembercheck" value="on"
            <?php if ($user) : ?>
                       checked
                   <?php endif; ?>
                   />Remember me<br />
            <p><input type="submit"  value="View my macthes"/></p>
        </fieldset>
    </form>
</div>
<?php 

include("bottom.html"); ?>
