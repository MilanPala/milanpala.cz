<?php

namespace App\Filters;


class Datum
{

	public function filter($value)
	{
		$date = new \DateTime($value);

		return $date->format('j. n. Y');
	}

}