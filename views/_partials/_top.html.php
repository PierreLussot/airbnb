<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?php echo $title_tag ?></title>
</head>
<body>
<header>
    <div class="containerTitleInput">
        <div class="logoTitle">
            <img src="https://www.laboiteverte.fr/wp-content/uploads/2011/08/fauxgo-faux-logo-film-compagnie-05.jpg"
                 alt="">
            <h2>envie d'une location ?</h2>
        </div>
        <?php if (!isset($_SESSION['id'])): ?>
            <div class="connect">
                <input type="text" id="Utilisateur" name="Nom"/>
                <input type="password" id="pass" name="password"/>
                <input type="submit" id="sub" name="submit"/>
            </div>

        <?php endif; ?>


    </div>


    <nav>
        <div class="menu">
            <a href="/inscription">Inscription</a>
            <?php if (isset($_SESSION['id'])): ?>
                <a href="/connexion">Deco</a>
            <?php else : ?>
                <a href="/connexion">connexion</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['type'])&& $_SESSION['type'] === ADMIN): ?>
            <a href="/ajoutAnnonce">Ajouter une annonce</a>
            <?php endif; ?>
            <a href="/liste-annonces">Annonces</a>
            <a href="/home">home</a>
            <a href="/reservation">Reservation</a>
        </div>


    </nav>

</header>

<main>

