<?php

namespace App\AthleteModule\Presenters;

use Nette;


class CompetitionPresenter extends Nette\Application\UI\Presenter
{

	public function actionDefault()
	{
		$this->redirect('year', 2003);
	}

	public function actionYear($year)
	{
		if ($year < 2003 || $year > 2007) $this->redirect('default');

		$this->template->nadpis = 'Závody roku ' . $year;

		$this->setView($year);
	}

	public function renderRecords()
	{
		$this->template->nadpis = 'Rekordy';
	}


}
