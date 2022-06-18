<?php
if ( isset($_GET['account'] ) && $_GET['account'] === 'wrong'){
    echo 'identifiant invalide';
}
?>
<form action="/connexion" method="POST">
    <input type="text" id="Utilisateur" name="email" />
    <input type="password" id="pass" name="password" />
    <input type="submit" id="sub" name="submit" />
</form>