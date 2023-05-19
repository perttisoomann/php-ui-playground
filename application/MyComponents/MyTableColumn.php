<?php

namespace Application\MyComponents;

use Closure;

class MyTableColumn
{
    protected string $label;
    protected string|Closure $value;

    public function __construct(string $label = '')
    {
        $this->label = $label;
    }

    public function setValue(string|Closure $value): MyTableColumn
    {
        $this->value = $value;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label ?? '';
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}