<?php

namespace Application\MyComponents;

use PHPUI\Core\UIResource;

class InlineJsResource extends UIResource
{
    public const LOAD_ONCE = false;

    public function render(): string
    {
        return sprintf(
            '<script %s>%s</script>',
            $this->getFormattedAttributes(),
            $this->resource
        );
    }
}
