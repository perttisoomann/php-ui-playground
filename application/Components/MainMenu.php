<?php

namespace Application\Components;

use Application\Base\MyMainMenu;
use Application\Base\MyMenuOption;

class MainMenu extends MyMainMenu
{
    public function __construct()
    {
        parent::__construct();

        $this->addComponent(
            new MyMenuOption('MM Home', '/')
        );

        $this->addComponent(
            (new MyMenuOption('MM Option #2', '/option-2', true))
                ->addComponent(
                    (new MyMainMenu())
                        ->addComponent(new MyMenuOption('MM Sub Home #1', '/'))
                        ->addComponent(new MyMenuOption('MM Sub Home #2', '/'))
                )
        );
    }
}
