<?php

declare(strict_types=1);

namespace App\Module\Front\Homepage;

use App\Module\BasePresenter;

final class HomepagePresenter extends BasePresenter
{
    public function renderDefault(): void
    {
        $this->template->setFile($this->getTemplateDirectory() . '/Front/Homepage/default.latte');
    }
}
