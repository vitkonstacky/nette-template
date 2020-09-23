<?php

declare(strict_types=1);

namespace App\Service\DirectoryProvider;

class DirectoryProvider
{
    private string $templateDirectory;

    private string $translationDirectory;

    private string $rootDirectory;

    public function __construct(
        string $templateDirectory,
        string $translationDirectory,
        string $rootDirectory
    ) {
        $this->templateDirectory = $templateDirectory;
        $this->translationDirectory = $translationDirectory;
        $this->rootDirectory = $rootDirectory;
    }

    public function getTemplateDirectory(): string
    {
        return $this->templateDirectory;
    }

    public function getTranslationDirectory(): string
    {
        return $this->translationDirectory;
    }

    public function getRootDirectory(): string
    {
        return $this->rootDirectory;
    }
}
