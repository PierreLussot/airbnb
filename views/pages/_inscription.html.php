<?php
if (isset($error))
{
    echo $error;
}
    ?>

<form action="/inscription" method="POST" style="text-align: center">

    <input type="text" id="Utilisateur" name="email" placeholder="email"/> <br>
    <input type="password" id="pass" name="password" placeholder="password"/><br><br>
    <select name="typeSelect">
        <option value="1">admin</option>
        <option value="2" selected>standard</option>

    </select><br>
    <input type="submit" id="sub" name="submit" />
</form>