<?php

declare(strict_types=1);

namespace App\Module;

use App\Service\DirectoryProvider\DirectoryProvider;
use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{
    /** @inject DirectoryProvider */
    public DirectoryProvider $directoryProvider;

    protected function beforeRender(): void
    {
        parent::beforeRender();

        $this->setLayout($this->getTemplateDirectory() . '/@layout.latte');
    }

    protected function getTemplateDirectory(): string
    {
        return $this->directoryProvider->getTemplateDirectory();
    }

    protected function getTranslationDirectory(): string
    {
        return $this->directoryProvider->getTranslationDirectory();
    }

    protected function getRootDirectory(): string
    {
        return $this->directoryProvider->getRootDirectory();
    }
}
