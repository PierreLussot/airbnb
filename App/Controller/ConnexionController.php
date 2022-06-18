<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;

class ConnexionController
{
public function connexion():void
{
    session_start();
    session_destroy();
    $_SESSION = [];


$viewConnexion = new View('pages/connexion');
$viewConnexion->title= 'connexion';
    $viewConnexion->render();
}
public function controlConnexion():void
{
   $user = AppRepoManager::getRm()->getUserRepository()->findUser($_POST['email'],$_POST['password']);

if ($user === null){
   header('location:/connexion?account=wrong');

   die();
}
session_start();
$_SESSION['id'] = $user->id;
$_SESSION['type'] = $user->type;
    header('location:/liste-annonces');


}
public function inscription(): void
{
    $viewData = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $user = AppRepoManager::getRm()->getUserRepository()->findUser($_POST['email'],$_POST['password']);
if ($user === null )
{
    if ( isset($_POST['email']) && isset($_POST['password']) && $_POST['email']!== '' && $_POST['password'] !== '')
    {
            AppRepoManager::getRm()->getUserRepository()->ajoutUser($_POST);
            header('location:/connexion');
            die();
    }
} else{
            $viewData = [
                'error'=> 'deja inscrit'
            ];
        }
    }
    $viewInscription = new View('pages/inscription');
    $viewInscription->title= 'inscription';
    $viewInscription->render($viewData);
}

    public function home(): void
    {
        session_start();
        $viewHome = new View('pages/home');
        $viewHome->title= 'home';
        $viewHome->render();

    }


}