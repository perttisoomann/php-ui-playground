<?php

namespace Application\Components;

use Application\Base\MyImage;
use Application\Resources\ResourceLocation;
use PHPUI\Core\UIComponent;
use PHPUI\Resources\UICssResource;

class MyContent extends UIComponent
{
    public function __construct()
    {
        $this->addResource(new UICssResource('/additional.css', ResourceLocation::BODY->value));

        $this->setTemplate('views/content.php');

        $this->addComponent(
            new MyImage('https://upload.wikimedia.org/wikipedia/commons/8/84/Lemmy-02.jpg'),
            new MyImage('https://ichef.bbci.co.uk/news/226/mcs/media/images/49371000/jpg/_49371747_lemmy.jpg'),
            new MyUserDataTable()
        );
    }

    public function getVariables(): array
    {
        return [
            'content' => $this->getComponents()
        ];
    }
}
