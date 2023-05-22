<?php

namespace Application\Components;

use Application\Base\MyMainMenu;
use Application\Base\MyMenuOption;

class FooterMenu extends MyMainMenu
{
    public function __construct()
    {
        $this->setTemplate('views/footer-menu.php');

        $this->addComponent(
            new MyMenuOption('MM Home', '/'),
            new MyMenuOption('MM Home', '/'),
            new MyMenuOption('MM Home', '/'),
            new MyMenuOption('MM Home', '/'),
        );
    }
}
