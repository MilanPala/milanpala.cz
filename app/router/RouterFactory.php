<?php

namespace App\Router;

use Nette;


class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new Nette\Application\Routers\RouteList();
		$router[] = new Nette\Application\Routers\Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}

}
