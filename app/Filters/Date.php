<?php

namespace App\Filters;


class Date
{

	public function filter($value)
	{
		$date = new \DateTime($value);

		return $date->format('j. n. Y');
	}

}
