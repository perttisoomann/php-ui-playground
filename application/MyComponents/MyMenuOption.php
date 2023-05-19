<?php

namespace Application\MyComponents;

use PHPUI\Core\UIComponent;

class MyMenuOption extends UIComponent
{
    protected string $label = '';
    protected string $route = '';
    protected bool $isActive = false;

    public function __construct(string $label, string $route, bool $isActive = false)
    {
        $this->label = $label;
        $this->route = $route;
        $this->isActive = $isActive;

        $this->setTemplate('views/menu-option.php');
    }

    public function getVariables(): array
    {
        return [
            'route' => $this->route,
            'label' => $this->label,
            'isActive' => $this->isActive,
            'subMenu' => $this->isActive ? $this->getComponents()->filter(MyMenu::class) : null,
        ];
    }
}
