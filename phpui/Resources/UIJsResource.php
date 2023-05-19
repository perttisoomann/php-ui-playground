<?php

namespace PHPUI\Resources;

use PHPUI\Core\UIResource;

class UIJsResource extends UIResource
{
    public function render(): string
    {
        return sprintf(
            '<script %s></script>',
            $this->getFormattedAttributes(['src' => $this->resource])
        );
    }
}
