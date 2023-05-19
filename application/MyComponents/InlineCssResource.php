<?php

namespace Application\MyComponents;

use PHPUI\Core\UIResource;

class InlineCssResource extends UIResource
{
    public const LOAD_ONCE = false;

    public function render(): string
    {
        return sprintf(
            '<style %s>%s</style>',
            $this->getFormattedAttributes(),
            $this->resource
        );
    }
}
