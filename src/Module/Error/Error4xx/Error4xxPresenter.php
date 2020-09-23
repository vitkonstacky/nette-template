<?php

declare(strict_types=1);

namespace App\Module\Error\Error4xx;

use App\Module\BasePresenter;
use Nette\Application\BadRequestException;
use Nette\Application\Request;

final class Error4xxPresenter extends BasePresenter
{
    public function startup(): void
    {
        parent::startup();

        if ($this->getRequest()->isMethod(Request::FORWARD) === false) {
            $this->error();
        }
    }

    public function renderDefault(BadRequestException $exception): void
    {
        $file = $this->getTemplateDirectory() . '/Error/Error4xx/' . $exception->getCode() . '.latte';

        $this->template->setFile(is_file($file) ? $file : $this->getTemplateDirectory() . '/Error/Error4xx/4xx.latte');
    }
}
