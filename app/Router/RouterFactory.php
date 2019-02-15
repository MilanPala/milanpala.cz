<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public function create(): Nette\Application\IRouter
	{
		$router = new Nette\Application\Routers\RouteList();
		$router[] = new Nette\Application\Routers\Route('atlet/', [
			'module' => 'Athlete',
			'presenter' => 'Competition',
			'action' => 'default',
		]);
		$router[] = new Nette\Application\Routers\Route('atlet/zavody/<year [0-9]+>', [
			'module' => 'Athlete',
			'presenter' => 'Competition',
			'action' => 'year',
		]);
		$router[] = new Nette\Application\Routers\Route('atlet/zavody/rekordy', [
			'module' => 'Athlete',
			'presenter' => 'Competition',
			'action' => 'records',
		]);
		$router[] = new Nette\Application\Routers\Route('<presenter>/<action>', [
			'module' => 'Personal',
			'presenter' => 'Homepage',
			'action' => 'default',
		]);

		return $router;
	}

}
