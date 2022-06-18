<?php

namespace App;

use App\Controller\AnnoncesController;
use App\Controller\BookingController;
use App\Controller\ConnexionController;
use App\Model\Repository\BookingRepository;
use App\Model\Repository\ItemRepository;
use MiladRahimi\PhpRouter\Exceptions\InvalidCallableException;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use MiladRahimi\PhpRouter\Router;

use App\Controller\PageController;
use App\Controller\ToyController;
use LidemCore\Database\DatabaseConfigInterface;
use LidemCore\View;

class App implements DatabaseConfigInterface
{
	private const DB_HOST = 'database';
	private const DB_NAME = 'lamp';
	private const DB_USER = 'lamp';
	private const DB_PASS = 'lamp';

	private static ?self $instance = null;
	public static function getApp(): self
	{
		if( is_null( self::$instance )) self::$instance = new self();

		return self::$instance;
	}

	private Router $router;

	private function __construct() {
		$this->router = Router::create();
	}

	public function getHost(): string
	{
		return self::DB_HOST;
	}

	public function getName(): string
	{
		return self::DB_NAME;
	}

	public function getUser(): string
	{
		return self::DB_USER;
	}

	public function getPass(): string
	{
		return self::DB_PASS;
	}

	public function start(): void
	{
		$this->registerRoutes();
		$this->startRouter();
	}

	private function registerRoutes(): void
	{
		// Déclaration des patterns pour tester les valeurs des arguments
		$this->router->pattern( 'id', '[1-9]\d*' );

		$this->router->get( '/', [ PageController::class, 'index' ] );
		$this->router->get( '/mentions-legales', [ PageController::class, 'legalNotice' ] );
        $this->router->any('/connexion',[ConnexionController::class,'connexion']);
        $this->router->post('/connexion',[ConnexionController::class,'controlConnexion']);
        $this->router->any('/liste-annonces',[AnnoncesController::class,'listeDesAnnonces']);
        $this->router->any('/inscription',[ConnexionController::class,'inscription']);
        $this->router->any('/home',[ConnexionController::class,'home']);
        $this->router->any('/detail/{id}',[AnnoncesController::class,'detail']);
        $this->router->any('/ajoutAnnonce',[AnnoncesController::class,'ajoutAnnonce']);
        $this->router->any('/reservation',[BookingController::class,'listBooking']);

        //$this->router->any('/detail/{id}',[ItemRepository::class,'items']);
	}

	private function startRouter(): void
	{
		try {
			$this->router->dispatch();
		}
		catch( RouteNotFoundException $e ) {
			View::renderError();
		}
		catch( InvalidCallableException $e ) {
			View::renderError( 500 );
		}
	}

	private function __clone() {}
	private function __wakeup() {}
}