<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;

class BookingController
{
public  function listBooking()
{
    session_start();
    $viewData = [];
    switch ($_SESSION['type'])
    {
        case ADMIN:
            $rentals = AppRepoManager::getRm()->getRentalRepository()->findRentalsAddresse($_SESSION['id']);
        $booking = null;
        foreach ($rentals as $rental)
        {
            $booking = AppRepoManager::getRm()->getBookingRepository()->listBookingOwner($_SESSION['id']);
        }
            $viewData = [
                'rentals'=> $booking
            ];
            break;
        case STANDARD:
            $viewData = [
                'rentals'=> AppRepoManager::getRm()->getBookingRepository()->listBooking($_SESSION['id'])];
            break;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
         AppRepoManager::getRm()->getBookingRepository()->addBooking($_SESSION['id'],
             $_POST['rental_id'],$_POST['checking'],$_POST['checkoot']);
    }

    $viewBooking = new View('pages/booking');
    $viewBooking->title= 'booking';
    $viewBooking->render($viewData);

}



}