<?php

namespace Application\Base;

use PHPUI\Core\UIComponent;

class MyImage extends UIComponent
{
    protected string $url = '';

    public function __construct(string $imageUrl)
    {
        $this->url = $imageUrl;

        $this->setTemplate('views/image.php');
    }

    public function getVariables(): array
    {
        return [
            'url' => $this->url
        ];
    }
}
