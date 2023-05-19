<?php

namespace PHPUI\Resources;

use PHPUI\Core\UIResource;

class UICssResource extends UIResource
{
    public function render(): string
    {
        return sprintf(
            '<link %s>',
            $this->getFormattedAttributes(['href' => $this->resource, 'rel' => 'stylesheet'])
        );
    }
}
