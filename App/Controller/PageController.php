<?php

namespace App\Controller;

use App\AppRepoManager;
use LidemCore\View;

class PageController
{
	public function index(): void
	{
		// ... Préparation des données à transmettre
		$view_data = [
			'list_title' => 'Voici les fruits',
			'fruit_list' => [
				'banane',
				'kiwi',
				'fraise',
				'pomme'
			]
		];

		//var_dump( AppRepoManager::getRm()->getToyRepo()->findbyId(2) );

		$view = new View( 'pages/home' );
		$view->title = 'Mon super site en MVC';

		$view->render( $view_data );
	}

	public function legalNotice(): void
	{
		$view = new View( 'pages/legal-notice' );
		$view->title = 'Mentions illégalement illégales';

		$view->render();
	}
}