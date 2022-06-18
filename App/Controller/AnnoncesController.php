<?php

namespace App\Controller;

use App\App;
use App\AppRepoManager;
use LidemCore\Database\Database;
use LidemCore\View;

class AnnoncesController
{
public function listeDesAnnonces(): void
{
    session_start();
    $dataView = [];

    if (!isset($_SESSION['type']))
    {
        View::renderError(403);
        die();
    }
    switch ($_SESSION['type'])
    {
        case STANDARD:
            $dataView = [
                'rentals' => AppRepoManager::getRm()->getRentalRepository()->findRentalsAddresseStandard()
            ];
            break;
        case ADMIN:
            $dataView = [
                'rentals' => AppRepoManager::getRm()->getRentalRepository()->findRentalsAddresse(intval($_SESSION['id'] ))

            ];
            break;

    }
    $viewAnnonces = new View('pages/listeAnnonces');
    $viewAnnonces->title= 'liste des annonces';
    $viewAnnonces->render($dataView);
}

public function detail(int $id):void
{
session_start();
    $dataView =[
        'items' => AppRepoManager::getRm()->getItemRepository()->items($id),
        'rental' => AppRepoManager::getRm()->getRentalRepository()->details($id)
    ];
    $viewDetail = new View('pages/detail');
    $viewDetail->title= 'detail';
    $viewDetail->render($dataView);
}
    public function ajoutAnnonce(): void
    {
        $viewData = [];

        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {

             $regexText = "/^\D+$/";
              $regexInt = "/[0-9]+/";

             if ( preg_match($regexText ,$_POST['titre']) && preg_match($regexText ,$_POST['description'])
                 && preg_match($regexText,$_POST['pays']) && preg_match($regexText,$_POST['ville'])
                  && preg_match($regexInt ,$_POST['capacity']) && preg_match($regexInt ,$_POST['prix'])
                 ){

                    $address_id = null;
                 $address =   AppRepoManager::getRm()->getAddressRepository()->findAdresses($_POST['pays'],$_POST['ville']);
                 var_dump($address);
                 if($address === null)
                 {

                     AppRepoManager::getRm()->getAddressRepository()->addNewAddresse($_POST['pays'],$_POST['ville']);
                     $address_id = Database::getPDO(App::getApp())->lastInsertId();
                 }else{
                     $address_id = $address->id;
                 }

                 AppRepoManager::getRm()->getRentalRepository()->addRental($_SESSION['id'],$_POST,$address_id );
                 $rental_id = Database::getPDO(App::getApp())->lastInsertId();
                 AppRepoManager::getRm()->getItemRepository()->additem($rental_id,$_POST['items']);

             }else{
                 $viewData = [
                    'error'=> 'error'];
             }

        }
        $viewHome = new View('pages/ajoutAnnonce');
        $viewHome->title= 'ajoutAnnonce';
        $viewHome->render($viewData);

    }
}