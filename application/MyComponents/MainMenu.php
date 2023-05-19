<?php

namespace Application\MyComponents;

class MainMenu extends MyMenu
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
                    (new MyMenu())
                        ->addComponent(new MyMenuOption('MM Sub Home #1', '/'))
                        ->addComponent(new MyMenuOption('MM Sub Home #2', '/'))
                )
        );
    }
}
