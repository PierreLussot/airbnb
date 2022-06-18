<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;

class ToyController
{
	public function index(): void
	{
		$view_data = [
			'h1_tag' => 'Nos Jouets',
			'toys' => AppRepoManager::getRm()->getToyRepo()->findAll()
		];

		$view = new View( 'toy/list' );
		$view->title = 'Tous nos jouets - Mon super site MVC';
		$view->render( $view_data );
	}

	public function show( int $id ): void
	{
		$toy_result = AppRepoManager::getRm()->getToyRepo()->findById( $id );

		// Si le jouet n'existe pas on lance l'erreur 404
		if( is_null( $toy_result ) ){
			View::renderError();
			die;
		}

		$view_data = [
			'toy' => $toy_result
		];

		$view = new View( 'toy/details' );
		$view->title = $toy_result->name . ' - Mon Super site';

		$view->render( $view_data );
	}
}