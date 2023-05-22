<?php

namespace Application\Base;

class MyMainMenu extends MyMenu
{
    public function __construct()
    {
        $this->setTemplate('views/menu.php');
    }
}
