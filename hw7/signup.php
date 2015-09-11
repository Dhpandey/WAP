<?php include ("top.html"); ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div>      
    <?php
    // put your code here
    ?>
    <form action="signup-submit.php" method="post">
        <fieldset>
            <legend>New user Signup:</legend>
            <p>  <span  class="column">Name:</span><input type="text" maxlength="16" name="name"/>
            </p>
            <p>  <span  class="column">Password:</span><input type="password" maxlength="16" name="password"/>
            </p>
            <p>
                <span class="column">Gender:</span><input type="radio" name="gender" value="Male" />Male
                <input type="radio" name="gender" value="female" checked="checked" />
                Female
            </p>
            <p>
                <span class="column">Age:</span><input type="text" name="age" maxlength="2" size="6"/>
            </p>
            <p>
                <span class="column">Personality Type:</span><input type="text" name="personalityType" maxlength="4" size="6"/>
                (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type ?</a>)
            </p>
            <p>
                <span class="column">Favorite OS:</span> <select name="favOS">
                    <option>Mac OS X</option>
                    <option>Linux</option>
                    <option selected> Windows</option>  
                </select>
            </p>
            <p>
                <span class="column"> Seeking age: </span><input type="text" maxlength="2" size="6" placeholder="min" name="minAge"> to 
                <input type="text" name="maxAge" maxlength="2" size="6" placeholder="max">
            </p>
            <input type="submit" value="Sign up"/>
        </fieldset>
    </form>
</div>
<?php include ("bottom.html"); ?>
