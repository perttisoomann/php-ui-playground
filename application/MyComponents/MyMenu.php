<?php

namespace Application\MyComponents;

use PHPUI\Core\UIComponent;

class MyMenu extends UIComponent
{
    public function __construct()
    {
        $this->setTemplate('views/menu.php');
    }

    public function getVariables(): array
    {
        return [
            'menuItems' => $this->getComponents()->filter(MyMenuOption::class)
        ];
    }
}
