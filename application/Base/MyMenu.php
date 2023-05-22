<?php

namespace Application\Base;

use PHPUI\Core\UIComponent;

class MyMenu extends UIComponent
{
    public function getVariables(): array
    {
        return [
            'menuItems' => $this->getComponents()->filter(MyMenuOption::class)
        ];
    }
}
