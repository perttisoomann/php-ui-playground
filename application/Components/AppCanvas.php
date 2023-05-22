<?php

namespace Application\Components;

use Application\Base\MyMenu;
use Application\Resources\ResourceLocation;
use PHPUI\Components\UIDebug;
use PHPUI\Core\UIComponent;
use PHPUI\Resources\UICssResource;

class AppCanvas extends UIComponent
{
    public function __construct()
    {
        $this->setTemplate('views/app.php');

        $this->addResource(
            new UICssResource(
                'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css',
                ResourceLocation::HEAD->value
            ),
            new UICssResource('load-multiple-times.css', ResourceLocation::HEAD->value)
        );
    }

    public function getVariables(): array
    {
        return [
            'mainmenu' => $this->getComponents()->filter(MainMenu::class),
            'footermenu' => $this->getComponents()->filter(FooterMenu::class),
            'content' => $this->getComponents()->filter(MyContent::class),
            'debug' => $this->getComponents()->filter(UIDebug::class),
            'resourceLoader' => $this->renderer->getResourceLoader(),
        ];
    }
}
