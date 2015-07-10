<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	/**
	 * @param bool $ssl
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter($ssl)
	{
		if ($ssl) Nette\Application\Routers\Route::$defaultFlags = Nette\Application\Routers\Route::SECURED;

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
