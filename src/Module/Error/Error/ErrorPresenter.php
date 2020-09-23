<?php

declare(strict_types=1);

namespace App\Module\Error\Error;

use Nette\Application;
use Nette\Http\IRequest;
use Nette\Http\IResponse;
use Tracy\ILogger;

final class ErrorPresenter implements Application\IPresenter
{
    private ILogger $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function run(Application\Request $request): Application\IResponse
    {
        $exception = $request->getParameter('exception');

        if ($exception instanceof Application\BadRequestException) {
            [$module, $presenter, $separator] = Application\Helpers::splitName($request->getPresenterName());

            return new Application\Responses\ForwardResponse($request->setPresenterName($module . $separator . 'Error4xx'));
        }

        $this->logger->log($exception, ILogger::EXCEPTION);

        return new Application\Responses\CallbackResponse(function (IRequest $httpRequest, IResponse $httpResponse): void {
            if (preg_match('#^text/html(?:;|$)#', (string)$httpResponse->getHeader('Content-Type'))) {
                require __DIR__ . '/../../../../templates/Error/Error/500.phtml';
            }
        });
    }
}
