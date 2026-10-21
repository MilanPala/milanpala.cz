<?php

namespace App\PersonalModule\Presenters;

use Nette;
use Nette\Application\Attributes\Requires;
use Tracy\ILogger;


#[Requires(forward: true)]
class ErrorPresenter extends Nette\Application\UI\Presenter
{

	public function __construct(
		private ILogger $logger,
	) {
		parent::__construct();
	}

	public function renderDefault(\Throwable $exception): void
	{
		if ($exception instanceof Nette\Application\BadRequestException) {
			$code = $exception->getHttpCode();
			$this->getHttpResponse()->setCode($code);
			$this->setView(is_file(__DIR__ . "/../templates/Error/$code.latte") ? (string) $code : '4xx');
			return;
		}

		$this->logger->log($exception, ILogger::EXCEPTION);
		$this->getHttpResponse()->setCode(Nette\Http\IResponse::S500_InternalServerError);
		$this->setView('500');
	}

}
