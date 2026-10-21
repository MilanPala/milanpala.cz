<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	public function create(): Nette\Routing\Router
	{
		$router = new Nette\Application\Routers\RouteList();
		$router->addRoute('atlet/', [
			'module' => 'Athlete',
			'presenter' => 'Competition',
			'action' => 'default',
		]);
		$router->addRoute('atlet/zavody/<year [0-9]+>', [
			'module' => 'Athlete',
			'presenter' => 'Competition',
			'action' => 'year',
		]);
		$router->addRoute('atlet/zavody/rekordy', [
			'module' => 'Athlete',
			'presenter' => 'Competition',
			'action' => 'records',
		]);
		$router->addRoute('<presenter>/<action>', [
			'module' => 'Personal',
			'presenter' => 'Homepage',
			'action' => 'default',
		]);

		return $router;
	}

}
