
<?php var_dump($_POST);
if (isset($error))
{
    echo $error;
}
?>

<form action="/ajoutAnnonce" method="POST">
    <input type="text"  name="titre" placeholder="titre"/>
    <input type="text"  name="description" placeholder="description"/>
    <input type="text"  name="pays" placeholder="pays"/>
    <input type="text"  name="ville" placeholder="ville"/>
    <input type="text"  name="capacity" placeholder="capacity"/>
    <input type="text"  name="surface" placeholder="surface"/>
    <input type="text"  name="prix" placeholder="prix"/>

    <label>
        maison
        <input type="radio" name="logementType" value="1"  >
    </label>
    <label>
        appart
        <input type="radio" name="logementType" value="2">
    </label>
    <label>
        chambre
        <input type="radio" name="logementType" value="3">
    </label>

    <label>
tv
        <input type="checkbox" name="items[]" value="1"  >
    </label>
    <label>
        wifi
        <input type="checkbox" name="items[]" value="2">
    </label>
    <label>
        grille pain
        <input type="checkbox" name="items[]" value="3">
    </label>
    <label>
        machine a laver
        <input type="checkbox" name="items[]" value="4">
    </label>
    <label>
        lave vaiselle
        <input type="checkbox" name="items[]" value="5">
    </label>


    <input type="submit"  name="submit" />
</form>
